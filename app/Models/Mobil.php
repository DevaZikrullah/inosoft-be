<?php

namespace App\Models;


class Mobil extends Kendaraan
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'mesin',
        'kapasitas_penumpang',
        'tipe',
    ];
}
