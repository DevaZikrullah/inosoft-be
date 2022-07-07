<?php

namespace App\Services;

use App\Models\Transaksi;
use App\Repositories\TransaksiRepository;
use App\Traits\ValidateTransaksi;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class TransaksiService
{
    use ValidateTransaksi;

    protected TransaksiRepository $tranksaksiRepository;

    public function __construct(TransaksiRepository $tranksaksiRepository)
    {
        $this->tranksaksiRepository = $tranksaksiRepository;
    }


    /**
     * @throws Exception
     */
    public function transaksi($data): Transaksi
    {
        $this->validateCreate($data);
        return $this->tranksaksiRepository->addTransaksi($data);
    }

    public function getHistory(): Collection|array
    {
        return $this->tranksaksiRepository->history();
    }

    public function getLatestHistory()
    {
        return $this->tranksaksiRepository->latestHistory();
    }
}


