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
     * @return array
     */
    public function getAllKendaraan(): array
    {
        $datakendaraan =  $this->kendaraanRepository->getKendaraan()->toArray();
        $formatedArr = [];
        foreach ($datakendaraan as $dt)
        {
            $dt['_id'] = (string)$dt['_id'];
            $dt['updated_at'] = $dt['updated_at']->toDateTime()->format("d M Y H:i:s");
            $dt['created_at'] = $dt['created_at']->toDateTime()->format("d M Y H:i:s");
            $formatedArr[] = $dt;
        }
        return $formatedArr;
    }
}
