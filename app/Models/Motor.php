<?php

namespace App\Models;


class Motor extends Kendaraan
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'mesin',
        'tipe_suspensi',
        'tipe_transisi',
    ];}
