<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Traits\ValidateLogin;
use Illuminate\Http\JsonResponse;

class UserServices
{
    use ValidateLogin;
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository )
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param $data
     * @return JsonResponse
     */
    public function login($data): JsonResponse
    {
        $this->validateLogin($data);
        return $this->userRepository->login($data);
    }

}
