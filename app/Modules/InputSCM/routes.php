<?php
namespace App\Modules\InputSCM;

use App\Modules\InputSCM\Controllers\AlamatController;
use App\Modules\InputSCM\Controllers\BarangController;
use App\Modules\InputSCM\Controllers\InputSCMController;
use Illuminate\Support\Facades\Route;

// USE MARKER (DONT DELETE THIS LINE)

Route::prefix('/input-scm')->group(function() {

    // SUB MENU MARKER (DONT DELETE THIS LINE)

    Route::prefix("/{id_umkm}")->group(function(){
        Route::prefix("/barang")->group(function(){
            Route::get('/', [BarangController::class, 'index'])->middleware('authorize:read-input_scm');
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
