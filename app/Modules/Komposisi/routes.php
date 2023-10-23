<?php
namespace App\Modules\Komposisi;

use App\Modules\Komposisi\Controllers\KomposisiController;
use Illuminate\Support\Facades\Route;

// USE MARKER (DONT DELETE THIS LINE)

Route::prefix('/komposisi')->group(function() {

    // SUB MENU MARKER (DONT DELETE THIS LINE)

    Route::get('/', [KomposisiController::class, 'index'])->middleware('authorize:read-komposisi');
    Route::get('/all', [KomposisiController::class, 'all'])->middleware('authorize:read-komposisi');
    Route::get('/datatable', [KomposisiController::class, 'datatable'])->middleware('authorize:read-komposisi');
    Route::get('/create', [KomposisiController::class, 'create'])->middleware('authorize:create-komposisi');
    Route::post('/', [KomposisiController::class, 'store'])->middleware('authorize:create-komposisi');
    Route::get('/{komposisi_id}', [KomposisiController::class, 'show'])->middleware('authorize:read-komposisi');
    Route::get('/{komposisi_id}/edit', [KomposisiController::class, 'edit'])->middleware('authorize:update-komposisi');
    Route::put('/{komposisi_id}', [KomposisiController::class, 'update'])->middleware('authorize:update-komposisi');
    Route::delete('/{komposisi_id}', [KomposisiController::class, 'destroy'])->middleware('authorize:delete-komposisi');
});