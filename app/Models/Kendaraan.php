<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Kendaraan extends Model
{
    protected $connection= 'mongodb';

    protected $collection = "kendaraans";

    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'tahun_keluaran',
        'warna',
        'harga',
        'stok',
    ];
}
