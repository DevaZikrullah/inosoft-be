<?php

namespace App\Traits;

use InvalidArgumentException;
use Illuminate\Support\Facades\Validator;

trait ValidateTransaksi
{
    public function validateCreate($data): void
    {
        $validator=Validator::make($data,[
            'nama' => 'required|string',
            'id_item' => 'required',
            'stok_item' => 'required'
        ]);


        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }
    }
}
