<?php

namespace App\Services;

use App\Models\Kendaraan;
use App\Repositories\KendaraanRepository;
use Jenssegers\Mongodb\Collection;

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
    public function getAllKendaraan(): \Illuminate\Support\Collection|array
    {
        return $this->kendaraanRepository->getKendaraan();
    }
}
