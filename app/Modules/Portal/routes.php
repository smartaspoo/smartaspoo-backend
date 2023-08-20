<?php

namespace App\Modules\Portal;

use Illuminate\Support\Facades\Route;
use App\Modules\Portal\Controller\PortalController;

Route::prefix('/p')->group(function () {
    Route::get("/",[PortalController::class,"index"]);
    Route::get("/status",[PortalController::class,"statuspengiriman"]);
    Route::get("/penjualan",[PortalController::class,"detailbarangpenjualan"]);
    Route::get("/daftartransaksi",[PortalController::class,"daftartransaksi"]);
    Route::get("/profile",[PortalController::class,"profile"]);
    Route::get("/detailproduk",[PortalController::class,"detailproduk"]);
    Route::get("/keranjang",[PortalController::class,"keranjang"]);
    Route::get("/infotoko",[PortalController::class,"infotoko"]);
    Route::get("/checkout",[PortalController::class,"checkout"]);
    Route::get("/pencarianbarangtoko",[PortalController::class,"pencarianbarangtoko"]);
    Route::get("/setelahcheckout",[PortalController::class,"setelahcheckout"]);
    Route::get("/ratingdanulasan",[PortalController::class,"ratingdanulasan"]);
});