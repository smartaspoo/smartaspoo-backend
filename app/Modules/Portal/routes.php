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
    Route::get("/detailproduk",[PortalController::class,"detailproduk"]);
    Route::get("/infotoko",[PortalController::class,"infotoko"]);
    Route::get("/setelahcheckout",[PortalController::class,"setelahcheckout"]);
    Route::get("/ratingdanulasan",[PortalController::class,"ratingdanulasan"]);
    Route::get("/pencarianbarangumkm",[PortalController::class,"pencarianbarangumkm"]);
    Route::get("/pencarianbarangtoko",[PortalController::class,"pencarianbarangtoko"]);
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
    Route::prefix("checkout")->group(function(){
        Route::get("/",[PortalController::class,"checkout"]);
        Route::post("/",[PortalController::class,"postCheckout"]);

    });
    Route::prefix("keranjang")->group(function(){
        Route::get("/",[PortalController::class,"keranjang"]);
        Route::post("/",[PortalController::class,"postKeranjangToCheckout"]);
        Route::delete("/{id}",[PortalController::class,"deleteKeranjang"]);
        Route::post("/data",[PortalController::class,"getKeranjangData"]);
    });

    Route::prefix("profile")->group(function(){
        Route::get("/",[PortalController::class,"profile"]);
        Route::get("/data",[PortalController::class,"getDataProfile"]);
    });
 
    Route::post("/user-role",[PortalController::class,"getRolesUser"]);

    Route::get("/logout",[UserController::class,"logoutWeb"]);
});
