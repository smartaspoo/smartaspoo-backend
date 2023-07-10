<?php
namespace App\Modules\KategoriBarang;

use App\Modules\KategoriBarang\Controllers\KategoriBarangController;
use Illuminate\Support\Facades\Route;

// USE MARKER (DONT DELETE THIS LINE)

Route::prefix('/kategori-barang')->group(function() {

    // SUB MENU MARKER (DONT DELETE THIS LINE)

    Route::get('/', [KategoriBarangController::class, 'index'])->middleware('authorize:read-kategori_barang');
    Route::get('/datatable', [KategoriBarangController::class, 'datatable'])->middleware('authorize:read-kategori_barang');
    Route::get('/create', [KategoriBarangController::class, 'create'])->middleware('authorize:create-kategori_barang');
    Route::post('/', [KategoriBarangController::class, 'store'])->middleware('authorize:create-kategori_barang');
    Route::get('/{kategori_barang_id}', [KategoriBarangController::class, 'show'])->middleware('authorize:read-kategori_barang');
    Route::get('/{kategori_barang_id}/edit', [KategoriBarangController::class, 'edit'])->middleware('authorize:update-kategori_barang');
    Route::put('/{kategori_barang_id}', [KategoriBarangController::class, 'update'])->middleware('authorize:update-kategori_barang');
    Route::delete('/{kategori_barang_id}', [KategoriBarangController::class, 'destroy'])->middleware('authorize:delete-kategori_barang');
});