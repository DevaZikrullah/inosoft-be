<?php

namespace App\Models;


class Mobil extends Kendaraan
{
    protected string $mesin;
    protected int $kapasitas_penumpang;
    protected string $tipe;
    /**
     * @var string[]
     */
    protected $fillable = [
        'mesin',
        'kapasitas_penumpang',
        'tipe',
    ];
}
