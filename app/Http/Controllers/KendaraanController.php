<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Services\KendaraanServices;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Jenssegers\Mongodb\Collection;

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
     * @return JsonResponse
     */
    public function getAllKendaraan(): JsonResponse
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
