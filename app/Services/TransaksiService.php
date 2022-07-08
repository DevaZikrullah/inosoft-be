<?php

namespace App\Services;

use App\Models\Transaksi;
use App\Repositories\TransaksiRepository;
use App\Validation\ValidateTransaksi;
use Exception;

class TransaksiService
{
    use ValidateTransaksi;

    protected TransaksiRepository $tranksaksiRepository;

    public function __construct(TransaksiRepository $tranksaksiRepository)
    {
        $this->tranksaksiRepository = $tranksaksiRepository;
    }


    /**
     * @param $data
     * @return Transaksi
     * @throws Exception
     */
    public function transaksi($data): Transaksi
    {
        $this->validateCreate($data);
        if ($data['stok_item'] <= 0)
        {
            throw new Exception("if the desired stock is negative it will cause the stock in the database to be added to the desired stock");
        }
        $kendaraanData = $this->tranksaksiRepository->findId($data['id_item']);
        $kendaraanData['stok']-=$data['stok_item'];

        switch ($kendaraanData)
        {
            case $kendaraanData == null:
                throw new Exception("this id is not in the database");
            case $kendaraanData['stok'] < $data['stok_item']:
                throw new Exception("stok tidak mencukupi");
        }

        $this->tranksaksiRepository->decrement($data['id_item'],$kendaraanData['stok']);


        return $this->tranksaksiRepository->addTransaksi($data);
    }

    public function getHistoryMobil(): \Illuminate\Support\Collection
    {
        return $this->tranksaksiRepository->historyMobil();
    }

    public function getHistoryMotor(): \Illuminate\Support\Collection
    {
        return $this->tranksaksiRepository->historyMotor();
    }

    public function getAllHistory(): \Illuminate\Support\Collection
    {
        return $this->tranksaksiRepository->allHistory();
    }

}


