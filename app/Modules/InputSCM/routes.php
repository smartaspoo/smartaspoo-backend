<?php
namespace App\Modules\InputSCM;

use App\Modules\InputSCM\Controllers\InputSCMController;
use Illuminate\Support\Facades\Route;

// USE MARKER (DONT DELETE THIS LINE)

Route::prefix('/input-scm')->group(function() {

    // SUB MENU MARKER (DONT DELETE THIS LINE)

    Route::get('/', [InputSCMController::class, 'index'])->middleware('authorize:read-input_scm');
    Route::get('/datatable', [InputSCMController::class, 'datatable'])->middleware('authorize:read-input_scm');
    Route::get('/create', [InputSCMController::class, 'create'])->middleware('authorize:create-input_scm');
    Route::post('/', [InputSCMController::class, 'store'])->middleware('authorize:create-input_scm');
    Route::get('/{input_scm_id}', [InputSCMController::class, 'show'])->middleware('authorize:read-input_scm');
    Route::get('/{input_scm_id}/edit', [InputSCMController::class, 'edit'])->middleware('authorize:update-input_scm');
    Route::put('/{input_scm_id}', [InputSCMController::class, 'update'])->middleware('authorize:update-input_scm');
    Route::delete('/{input_scm_id}', [InputSCMController::class, 'destroy'])->middleware('authorize:delete-input_scm');
});