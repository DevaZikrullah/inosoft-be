<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Transaksi extends Model
{

    protected string $nama;
    protected string $id_item;
    protected int $stok_item;
    /**
     * @var mixed|string
     */
    protected string $tipe_kendaraan;
    protected int $harga;
    protected $connection = 'mongodb';

    /**
     * @var string[]
     */
    protected $fillable= [
        'nama',
        'id_item',
        'stok_item',
        'tipe_kendaraan'
    ];

    use HasFactory;
}
