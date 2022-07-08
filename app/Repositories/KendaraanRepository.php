<?php

namespace App\Repositories;

use App\Models\Kendaraan;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class KendaraanRepository
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function getKendaraan(): \Illuminate\Support\Collection
    {
        return DB::collection('kendaraans')->get();
    }
}
