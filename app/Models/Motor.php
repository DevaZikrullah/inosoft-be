<?php

namespace App\Models;


class Motor extends Kendaraan
{
    protected string $mesin;
    protected string $tipe_suspensi;
    protected string $tipe_transmisi;
    /**
     * @var string[]
     */
    protected $fillable = [
        'mesin',
        'tipe_suspensi',
        'tipe_transmisi',
    ];}
