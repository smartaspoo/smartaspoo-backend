<?php

namespace App\Modules\Portal;

use Illuminate\Support\Facades\Route;
use App\Modules\Portal\Controller\PortalController;
use App\Modules\PortalUser\Controllers\PortalUserController;
use App\Modules\User\Controller\UserController;

Route::prefix('/p')->group(function () {
    Route::post("/fetch-login",[PortalController::class,"fetchLogin"]);
    Route::get("/",[PortalController::class,"index"]);
    Route::get('/index-data',[PortalController::class,'dashboard']);
    Route::get("/login",[PortalController::class,"login"]);
    Route::post("/login",[PortalUserController::class, 'login']);
    Route::get("/registrasi",[PortalController::class,"registrasi"]);
    Route::post("/registrasi",[PortalUserController::class, 'store']);
    Route::get("/status",[PortalController::class,"statuspengiriman"]);
    Route::get("/penjualan",[PortalController::class,"detailbarangpenjualan"]);
    Route::get("/daftartransaksi",[PortalController::class,"daftartransaksi"]);
    Route::get("/profile",[PortalController::class,"profile"]);
    Route::get("/detailproduk",[PortalController::class,"detailproduk"]);
    Route::get("/keranjang",[PortalController::class,"keranjang"]);
    Route::get("/infotoko",[PortalController::class,"infotoko"]);
    Route::get("/checkout",[PortalController::class,"checkout"]);
    Route::get("/setelahcheckout",[PortalController::class,"setelahcheckout"]);
    Route::get("/ratingdanulasan",[PortalController::class,"ratingdanulasan"]);
    Route::get("/pencarianbarangumkm",[PortalController::class,"pencarianbarangumkm"]);
    Route::get("/kebijakan",[PortalController::class,"kebijakan"]);
    Route::get("/pusatbantuan",[PortalController::class,"pusatbantuan"]);
    Route::get("/cekongkir",[PortalController::class,"cekongkir"]);
    Route::post("/cekongkir",[PortalController::class,"cekHasil"]);

    // pencarianbarangumkm
    Route::get("/cari",[PortalController::class,"getCari"]);
    Route::prefix("barang")->group(function(){
        Route::get('/{id}',[PortalController::class,'getBarang']);
        Route::post('/keranjang',[PortalController::class,'postKeranjang']);
        
    });

    Route::get("/logout",[UserController::class,"logoutWeb"]);
});