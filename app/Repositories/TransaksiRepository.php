<?php

namespace App\Repositories;

use App\Models\Kendaraan;
use App\Models\Transaksi;

class TransaksiRepository
{
    /**
     * @throws \Exception
     */
    public function addTransaksi($data): Transaksi
    {

        $transaksi = new Transaksi();
        $transaksi->nama = $data['nama'];
        $transaksi->id_item = $data['id_item'];
        $transaksi->stok_item = $data['stok_item'];

        if ($data['stok_item'] < 0)
        {
            throw new \Exception("if the desired stock is negative it will cause the stock in the database to be added to the desired stock");
        }

        $kendaraan = Kendaraan::where('_id', $data['id_item'])->first();

        if ($kendaraan == null){
            throw new \Exception("this id is not in the database");
        }
        else if ($kendaraan->stok < $data['stok_item'])
        {
            throw new \Exception("stok tidak mencukupi");
        }
        else {
            $kendaraan->decrement('stok', $data['stok_item']);
        }

        $transaksi->tipe_kendaraan = ($kendaraan->tipe_kendaraan == 'is_mobil') ? "mobil" : "motor" ;
        $transaksi->save();
        return $transaksi;
    }

    public function history(): \Illuminate\Database\Eloquent\Collection|array
    {
        return Transaksi::all();
    }

    public function latestHistory()
    {
        return Transaksi::latest()->first();
    }

}
