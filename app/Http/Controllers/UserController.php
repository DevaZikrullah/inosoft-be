<?php

namespace App\Http\Controllers;

use App\Services\UserServices;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @var UserServices
     */

    protected UserServices $userServices;

    public function __construct(UserServices $userServices)
    {
        $this->middleware('auth:api', ['except' => ['login']]);
        $this->userServices = $userServices;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        $data = $request->only([
            'email','password'
        ]);

        try {
            $result = ['status' => 200];
            $result['data'] = $this->userServices->login($data);
        } catch (Exception $exception) {
            $result = [
                'status' => 401,
                'error' => $exception="Inccorect"
            ];
        }

        return response()->json($result, $result['status']);
    }


}
