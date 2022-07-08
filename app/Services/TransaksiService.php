<?php

namespace App\Services;

use App\Models\Transaksi;
use App\Repositories\TransaksiRepository;
use App\Validation\ValidateTransaksi;
use Exception;
use Illuminate\Support\Collection;
use function PHPUnit\Framework\isNull;

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

    public function getByFilter(array $data): Collection
    {
        $filter=[];
        if (isset($data['tipe_kendaraan']))
        {
            $filter[] = ['tipe_kendaraan','=',$data['tipe_kendaraan']];
        } else if (isset($data['id']))
        {
            $filter[] = ['_id','=',$data['id']];
        }

        return $this->tranksaksiRepository->getByFilter($filter);
    }

}


