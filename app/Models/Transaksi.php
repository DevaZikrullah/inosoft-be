<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Transaksi extends Model
{

    /**
     * @var float|int|mixed
     */
    protected int $total_harga_kendaraan;
    protected int $harga_kendaraan;
    protected string $nama;
    protected string $id_item;
    protected int $stok_item;
    protected string $tipe_kendaraan;

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
