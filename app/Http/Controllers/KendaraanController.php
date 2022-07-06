<?php

namespace App\Http\Controllers;

use App\Services\KendaraanServices;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * @var KendaraanServices
     */
    protected KendaraanServices $kendaraanServices;

    /**
     * @param KendaraanServices $kendaraanServices
     */
    public function __construct(KendaraanServices $kendaraanServices)
    {
        $this->middleware('auth:api', ['except' => ['login']]);
        $this->kendaraanServices = $kendaraanServices;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllKendaraan()
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->kendaraanServices->getAllKendaraan();
        } catch (\Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }
}
