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

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/me', [ApiAuthController::class, 'me']);
    Route::get('/logout', [ApiAuthController::class, 'logout']);

    //barang
    Route::get('/barang', [ApiAllController::class, 'barang']);
    Route::get('/get_barang_by_id', [ApiAdminController::class, 'get_barang_by_id']);

    //distributor
    Route::get('/distributor', [ApiAllController::class, 'distributor']);
    Route::get('/count_manager', [ApiAllController::class, 'count_manager']);
    Route::get('/penjab', [ApiAllController::class, 'penjab']);
    Route::get('/users', [ApiAllController::class, 'users']);
    Route::post('/tambah_distributor',[ApiAllController::class,'tambah_distributor']);

    //pemesanan
    Route::get('/pemesanan',[ApiAllController::class, 'pemesanan']);
    Route::delete('/delete_pemesanan',[ApiAllController::class, 'delete_pemesanan']);
});
