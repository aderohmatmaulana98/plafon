<?php

use App\Http\Controllers\AreaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BulanController;
use App\Http\Controllers\CountManagerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PenjabController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\RoleController;
use App\Models\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('backend.auth.login');
});
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'login_action'])->name('login.action');

Route::get('/forgot-password', [AuthController::class, 'showForget'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    //barang
    Route::get('/barang', [BarangController::class, 'index'])->name('barang');
    Route::get('/barang/add', [BarangController::class, 'add'])->name('barang.add');
    Route::get('/barang/edit/{id}', [BarangController::class, 'edit'])->name('barang.edit');
    Route::post('/addBarang', [BarangController::class, 'addBarang'])->name('barang.addBarang');
    Route::post('/editBarang', [BarangController::class, 'editBarang'])->name('barang.editBarang');
    Route::get('/deleteBarang/{id}', [BarangController::class, 'deleteBarang'])->name('barang.deleteBarang');
    //detail dashboard
    Route::get('/detailBarang/{id}', [DashboardController::class, 'detailBarang'])->name('barang.detailBarang');

Route::controller(RoleController::class)->group( function (){
    Route::get('/role','index')->name('role');
    Route::get('/role/add','add')->name('role.add');
    Route::get('/role/edit/{id}','edit')->name('role.edit');
    Route::post('/addRole','addRole')->name('role.addRole');
    Route::post('/editRole/{id}','editRole')->name('role.editRole');
    Route::delete('/deleteRole/{id}','deleteRole')->name('role.deleteRole');
});

Route::controller(PenjabController::class)->group( function (){
    Route::get('/penjab','index')->name('penjab');
    Route::get('/penjab/add','add')->name('penjab.add');
    Route::get('/penjab/edit/{id}','edit')->name('penjab.edit');
    Route::post('/addPenjab','addPenjab')->name('penjab.addPenjab');
    Route::post('/editPenjab/{id}','editPenjab')->name('penjab.editPenjab');
    Route::delete('/deletePenjab/{id}','deletePenjab')->name('penjab.deletePenjab');
});


Route::controller(BulanController::class)->group( function (){
    Route::get('/bulan','index')->name('bulan');
    Route::get('/bulan/add','add')->name('bulan.add');
    Route::get('/bulan/edit/{id}','edit')->name('bulan.edit');
    Route::post('/addBulan','addBulan')->name('bulan.addBulan');
    Route::post('/editBulan/{id}','editBulan')->name('bulan.editBulan');
    Route::delete('/deleteBulan/{id}','deleteBulan')->name('bulan.deleteBulan');
});

Route::controller(CountManagerController::class)->group( function (){
    Route::get('/cm','index')->name('cm');
    Route::get('/cm/add','add')->name('cm.add');
    Route::get('/cm/edit/{id}','edit')->name('cm.edit');
    Route::post('/addCM','addCM')->name('cm.addCM');
    Route::post('/editCM/{id}','editCM')->name('cm.editCM');
    Route::delete('/deleteCM/{id}','deleteCM')->name('cm.deleteCM');
});

Route::controller(DistributorController::class)->group( function (){
    Route::get('/distributor','index')->name('distributor');
    Route::get('/distributor/add','add')->name('distributor.add');
    Route::get('/distributor/edit','edit')->name('distributor.edit');
    Route::get('/detail_distributor/{id}','detailDistributor')->name('detail.distributor');
    Route::post('/addDistributor','addDistributor')->name('distributor.addDistributor');
    Route::post('/editDistributor/{id}','editDistributor')->name('distributor.editDistributor');
    Route::delete('/deleteDistributor/{id}','deleteDistributor')->name('distributor.deleteDistributor');
});

Route::controller(PenjualanController::class)->group( function(){
    Route::get('penjualan','index')->name('penjualan');
    Route::get('/penjualan/add','add')->name('penjualan.add');
    Route::post('/addPenjualan','addPenjualan')->name('penjualan.addPenjualan');
    Route::delete('/delete-penjualan/{id}', 'delete_penjualan')->name('delete.penjualan');
});

Route::controller(PemesananController::class)->group( function (){
    Route::get('/pemesanan','index')->name('pemesanan');
});


Route::get('/route-cache', function () {
    Artisan::call('route:cache');
    return 'Routes cache cleared';
});
Route::get('/config-cache', function () {
    Artisan::call('config:cache');
    return 'Config cache cleared';
});
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return 'Application cache cleared';
});
Route::get('/view-clear', function () {
    Artisan::call('view:clear');
    return 'View cache cleared';
});
Route::get('/optimize', function () {
    Artisan::call('optimize');
    return 'Routes cache cleared';
});
