<?php

namespace App\Services;

use App\Models\Kendaraan;
use App\Repositories\KendaraanRepository;
use Illuminate\Database\Eloquent\Collection;

class KendaraanServices
{
    /**
     * @var KendaraanRepository
     */
    protected KendaraanRepository $kendaraanRepository;

    /**
     * @param KendaraanRepository $kendaraanRepository
     */
    public function __construct(KendaraanRepository $kendaraanRepository)
    {
        $this->kendaraanRepository = $kendaraanRepository;
    }

    /**
     * @return Kendaraan[]|Collection
     */
    public function getAllKendaraan(): Collection|array
    {
        return $this->kendaraanRepository->getKendaraan();
    }
}
