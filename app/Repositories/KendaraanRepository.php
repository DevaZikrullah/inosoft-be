<?php

namespace App\Repositories;

use App\Models\Kendaraan;

class KendaraanRepository
{

    public function getKendaraan()
    {
        return Kendaraan::all();
    }
}
