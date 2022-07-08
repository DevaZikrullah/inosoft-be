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

    public function getByFilter(array $data): array
    {
        $filter=[];
        if (isset($data['tipe_kendaraan']))
        {
            $filter[] = ['tipe_kendaraan','=',$data['tipe_kendaraan']];
        } else if (isset($data['id']))
        {
            $filter[] = ['_id','=',$data['id']];
        }else if (isset($data['id_item']))
        {
            $filter[] = ['id_item','=',$data['id_item']];
        }

        $datahistory = $this->tranksaksiRepository->getByFilter($filter)->toArray();
        $formatedArr = [];
        foreach($datahistory as $dt) {
            // we have return new array because we need to format the structure
            $dt['_id'] = (string)$dt['_id'];
            $dt['updated_at'] = $dt['updated_at']->toDateTime()->format("d M Y H:i:s");
            $dt['created_at'] = $dt['created_at']->toDateTime()->format("d M Y H:i:s");

            $formatedArr[] = $dt;
        }
        return $formatedArr;
    }

}


