<?php

namespace App\Http\Controllers;

use App\Services\TransaksiService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    protected TransaksiService $transaksiService;

    public function __construct(TransaksiService $transaksiService)
    {
        $this->middleware('auth:api', ['except' => ['login']]);
        $this->transaksiService = $transaksiService;
    }

    public function transaksi(Request $request): JsonResponse
    {
        $data = $request->only([
            'nama',
            'id_item',
            'stok_item'
        ]);


        try {
            $result = ['status' => 200];
            $result['data'] = $this->transaksiService->transaksi($data);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    public function getHistoryMotor(): JsonResponse
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->transaksiService->getHistoryMotor();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    public function getHistoryMobil(): JsonResponse
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->transaksiService->getHistoryMobil();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    public function getAllHistory(): JsonResponse
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->transaksiService->getAllHistory();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

}
