<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\ReportBarangController;
use App\Http\Controllers\ReportBarangMasukController;
use App\Http\Controllers\ReportBarangKeluarController;

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
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('userprofile', [AuthController::class, 'userProfile']);
    

});




Route::group([
    'middleware' => 'api',
], function () {
    Route::get('barang', [BarangController::class, 'index']);
    Route::get('barang/{id}', [BarangController::class, 'show']);
    Route::get('barang/cari/{kriteria}', [BarangController::class, 'search']);
    Route::post('barang', [BarangController::class, 'store']);
    Route::put('barang/{id}', [BarangController::class, 'update']);
    Route::delete('barang/{id}', [BarangController::class, 'destroy']);

    Route::get('kategori', [kategoriController::class, 'index']);
    Route::get('kategori/{id}', [kategoriController::class, 'show']);
    Route::post('kategori', [kategoriController::class, 'store']);
    Route::put('kategori/{id}', [kategoriController::class, 'update']);
    Route::delete('kategori/{id}', [kategoriController::class, 'destroy']);

    Route::get('barangmasuk', [BarangMasukController::class, 'index']);
    Route::get('barangmasuk/user', [BarangMasukController::class, 'getDataByUser']);
    Route::get('barangmasuk/{id}', [BarangMasukController::class, 'show']);
    Route::post('barangmasuk', [BarangMasukController::class, 'store']);
    Route::put('barangmasuk/{id}', [BarangMasukController::class, 'update']);
    Route::delete('barangmasuk/{id}', [BarangMasukController::class, 'destroy']);
    
    Route::get('barangkeluar', [BarangKeluarController::class, 'index']);
    Route::get('barangkeluar/user', [BarangKeluarController::class, 'getDataByUser']);
    Route::get('barangkeluar/{id}', [BarangKeluarController::class, 'show']);
    Route::post('barangkeluar', [BarangKeluarController::class, 'store']);
    Route::put('barangkeluar/{id}', [BarangKeluarController::class, 'update']);
    Route::delete('barangkeluar/{id}', [BarangKeluarController::class, 'destroy']);

    Route::get('laporanbarang', [ReportBarangController::class, 'reportStock']);
    Route::get('laporanbarangmasuk', [ReportBarangMasukController::class, 'reportBarangMasuk']);
    Route::get('laporanbarangkeluar', [ReportBarangKeluarController::class, 'reportBarangKeluar']);
    

});