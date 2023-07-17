<?php

use App\Http\Controllers\ApiController;
use App\Modules\DataBarang\Controllers\DataBarangController;
use App\Modules\Diskon\Controllers\DiskonController;
use App\Modules\Satuan\Controllers\SatuanController;
use App\Modules\KategoriBarang\Controllers\KategoriBarangController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/register',[ApiController::class,'register']);

Route::get('/data-barang',[DataBarangController::class,'datatable']);
Route::get('/diskon',[DiskonController::class,'datatable']);
Route::get('/satuan',[SatuanController::class,'datatable']);
Route::get('/KategoriBarang',[KategoriBarangController::class,'datatable']);

