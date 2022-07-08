<?php

namespace App\Repositories;

use App\Models\Kendaraan;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class TransaksiRepository
{
    public function findId(string $data): array
    {
        return Kendaraan::where('_id', $data)->first()->toArray();
    }


    public function decrement($id,$decrement)
    {
        $kendaraan = Kendaraan::where('_id',$id)->first();
        $kendaraan->stok = $decrement;
        $kendaraan->save();
    }

    public function addTransaksi($data)
    {
        $transaksi = New Transaksi();
        $transaksi->nama = $data['nama'];
        $transaksi->id_item = $data['id_item'];
        $transaksi->stok_item = $data['stok_item'];


        $kendaraan = Kendaraan::where('_id', $data['id_item'])->first();

        $transaksi->tipe_kendaraan = ($kendaraan->tipe_kendaraan == 'is_mobil') ? "mobil" : "motor" ;
        $transaksi->harga = $kendaraan->harga;

        $transaksi->save();
        return $transaksi;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function historyMobil(): \Illuminate\Support\Collection
    {
        return DB::collection('transaksis')->where('tipe_kendaraan','mobil')->get();
    }
    public function historyMotor(): \Illuminate\Support\Collection
    {
        return DB::collection('transaksis')->where('tipe_kendaraan','motor')->get();
    }

    public function allHistory(): \Illuminate\Support\Collection
    {
        return DB::collection('transaksis')->get();
    }



}
