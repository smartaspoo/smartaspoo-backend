<?php
namespace App\Modules\InputSCM;

use App\Modules\InputSCM\Controllers\AlamatController;
use App\Modules\InputSCM\Controllers\BahanController;
use App\Modules\InputSCM\Controllers\BarangController;
use App\Modules\InputSCM\Controllers\InputSCMController;
use App\Modules\InputSCM\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

// USE MARKER (DONT DELETE THIS LINE)

Route::prefix('/input-scm')->group(function() {

    // SUB MENU MARKER (DONT DELETE THIS LINE)

    Route::prefix("/{id_umkm}")->group(function(){
        Route::prefix("/barang")->group(function(){
            Route::get('/', [BarangController::class, 'index'])->middleware('authorize:read-input_scm');
            Route::get('/datatable', [BarangController::class, 'datatable'])->middleware('authorize:read-input_scm');
            Route::get('/create', [BarangController::class, 'create'])->middleware('authorize:create-input_scm');
            Route::post('/create', [BarangController::class, 'store'])->middleware('authorize:create-input_scm');
            Route::get('/{id_barang}', [BarangController::class, 'show'])->middleware('authorize:read-input_scm');
            Route::get('/{id_barang}/edit', [BarangController::class, 'edit'])->middleware('authorize:update-input_scm');
            Route::put('/{id_barang}', [BarangController::class, 'update'])->middleware('authorize:update-input_scm');
            Route::delete('/{id_barang}', [BarangController::class, 'destroy'])->middleware('authorize:delete-input_scm');
        });
    });

    
    Route::prefix("/bahan")->group(function(){
            Route::prefix("/{id_barang}")->group(function(){
            Route::get('/', [BahanController::class, 'index'])->middleware('authorize:read-input_scm');
            Route::get('/datatable', [BahanController::class, 'datatable'])->middleware('authorize:read-input_scm');
            Route::get('/create', [BahanController::class, 'create'])->middleware('authorize:create-input_scm');
            Route::get('/create/datatable', [BahanController::class,'datatableSupplier'])->middleware('authorize:read-input_scm');
            Route::post('/create', [BahanController::class, 'store'])->middleware('authorize:create-input_scm');
            Route::get('/{id_bahan}', [BahanController::class, 'show'])->middleware('authorize:read-input_scm');
            Route::get('/{id_bahan}/edit', [BahanController::class, 'edit'])->middleware('authorize:update-input_scm');
            Route::put('/{id_bahan}', [BahanController::class, 'update'])->middleware('authorize:update-input_scm');
            Route::delete('/{id_bahan}', [BahanController::class, 'destroy'])->middleware('authorize:delete-input_scm');
        });
    });
     Route::prefix("/supplier")->group(function(){
        Route::prefix("/{id_bahan}")->group(function(){
        Route::get('/', [SupplierController::class, 'index'])->middleware('authorize:read-input_scm');
        Route::get('/datatable', [SupplierController::class, 'datatable'])->middleware('authorize:read-input_scm');
        Route::get('/create', [SupplierController::class, 'create'])->middleware('authorize:create-input_scm');
        Route::post('/create', [SupplierController::class, 'store'])->middleware('authorize:create-input_scm');
        Route::get('/{id_supplier}', [SupplierController::class, 'show'])->middleware('authorize:read-input_scm');
        Route::get('/{id_supplier}/edit', [SupplierController::class, 'edit'])->middleware('authorize:update-input_scm');
        Route::put('/{id_supplier}', [SupplierController::class, 'update'])->middleware('authorize:update-input_scm');
        Route::delete('/{id_supplier}', [SupplierController::class, 'destroy'])->middleware('authorize:delete-input_scm');
        });
     });
    
    Route::get('/', [InputSCMController::class, 'index'])->middleware('authorize:read-input_scm');
    Route::get('/datatable', [InputSCMController::class, 'datatable'])->middleware('authorize:read-input_scm');
    Route::get('/create', [InputSCMController::class, 'create'])->middleware('authorize:create-input_scm');
    Route::post('/', [InputSCMController::class, 'store'])->middleware('authorize:create-input_scm');
    Route::get('/{input_scm_id}', [InputSCMController::class, 'show'])->middleware('authorize:read-input_scm');
    Route::get('/{input_scm_id}/edit', [InputSCMController::class, 'edit'])->middleware('authorize:update-input_scm');
    Route::put('/{input_scm_id}', [InputSCMController::class, 'update'])->middleware('authorize:update-input_scm');
    Route::delete('/{input_scm_id}', [InputSCMController::class, 'destroy'])->middleware('authorize:delete-input_scm');

  

    Route::prefix('/alamat')->group(function() {
        Route::get('/provinsi', [AlamatController::class, 'provinsi'])->middleware('authorize:read-input_scm');
        Route::get('/kota/{id}', [AlamatController::class, 'kota'])->middleware('authorize:read-input_scm');
        Route::get('/kecamatan/{id}', [AlamatController::class, 'kecamatan'])->middleware('authorize:read-input_scm');
        Route::get('/kelurahan/{id}', [AlamatController::class, 'kelurahan'])->middleware('authorize:read-input_scm');
    });
});
