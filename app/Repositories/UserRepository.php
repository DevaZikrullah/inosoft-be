<?php

namespace App\Repositories;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class UserRepository
{
    /**
     * @param $data
     * @return JsonResponse
     */
    public function login($data): JsonResponse
    {
        $credentials = [
            'email' => $data['email'],
            'password' => $data['password'],
        ];


        if ($token = $this->guard()->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json("can't login");
    }

    /**
     * @param string $token
     * @return JsonResponse
     */
    protected function respondWithToken(string $token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    /**
     * @return Guard
     */
    public function guard(): Guard
    {
        return Auth::guard();
    }

}
