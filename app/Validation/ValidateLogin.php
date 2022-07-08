<?php

namespace App\Validation;

use Illuminate\Support\Facades\Validator;

trait ValidateLogin
{
    public function validateLogin($data): void
    {
        $validator=Validator::make($data,[
            'email' => 'required',
            'password' => 'required'
        ]);


        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }
    }
}
