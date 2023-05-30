<?php

use App\Http\Controllers\api\ApiAllController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ApiAuthController;

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
Route::post('/login', [ApiAuthController::class, 'login']);
Route::post('/password/forgot', [ApiAuthController::class, 'forgotPassword']);
Route::post('/password/reset', [ApiAuthController::class, 'resetPassword']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/me', [ApiAuthController::class, 'me']);
    Route::get('/logout', [ApiAuthController::class, 'logout']);

    //barang
    Route::get('/barang', [ApiAllController::class, 'barang']);
    Route::get('/get_barang_by_id/{id}', [ApiAllController::class, 'get_barang_by_id']);

    //pemesanan
    Route::get('/pemesanan',[ApiAllController::class, 'pemesanan']);
    Route::get('/get_pemesanan_by_id/{id}',[ApiAllController::class, 'get_pemesanan_by_id']);
    Route::post('/tambah_pemesanan',[ApiAllController::class, 'tambah_pemesanan']);
    Route::delete('/delete_pemesanan',[ApiAllController::class, 'delete_pemesanan']);
    Route::post('/updateTransaksi', [ApiAllController::class, 'updateTransaksi']);
});
