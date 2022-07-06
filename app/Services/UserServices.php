<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;

class UserServices
{
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
        return $this->userRepository->login($data);
    }


}
