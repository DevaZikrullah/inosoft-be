<?php

namespace App\Services;

use App\Repositories\KendaraanRepository;

class KendaraanServices
{
    /**
     * @var KendaraanRepository
     */
    protected $kendaraanRepository;

    /**
     * @param KendaraanRepository $kendaraanRepository
     */
    public function __construct(KendaraanRepository $kendaraanRepository)
    {
        $this->kendaraanRepository = $kendaraanRepository;
    }

    /**
     * @return \App\Models\Kendaraan[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllKendaraan()
    {
        return $this->kendaraanRepository->getKendaraan();
    }
}
