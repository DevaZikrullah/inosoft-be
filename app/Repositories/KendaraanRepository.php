<?php

namespace App\Repositories;

use App\Models\Kendaraan;
use Illuminate\Database\Eloquent\Collection;

class KendaraanRepository
{
    /**
     * @return Collection|array
     */
    public function getKendaraan(): Collection|array
    {
        return Kendaraan::all();
    }
}
