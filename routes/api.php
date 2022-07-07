<?php

use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\TransaksiController;
use App\Repositories\TransaksiRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {

    Route::post('/login', [
        UserController::class, 'login'
    ]);

    Route::get('/kendaraan', [
        KendaraanController::class, 'getAllKendaraan'
    ]);

    Route::post('/transaksi', [
        TransaksiController::class, 'transaksi'
    ]);

});
