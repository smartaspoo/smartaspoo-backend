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
    Route::get("/infotoko",[PortalController::class,"infotoko"]);
    Route::get("/daftartransaksi",[PortalController::class,"daftartransaksi"]);
    Route::post('/updatestatus', [PortalController::class,"updatestatus"])->name('update.status');
    Route::post('/updatestatusgagal', [PortalController::class,"updatestatusgagal"])->name('update.status.gagal');
    Route::get("/detailproduk",[PortalController::class,"detailproduk"]);
    Route::get("/toko", [PortalController::class, "toko"]);
    Route::get("/ratingdanulasan",[PortalController::class,"ratingdanulasan"]);
    Route::get("/listbarang",[PortalController::class,"listbarang"]);
    Route::get("/listtoko",[PortalController::class,"listtoko"]);
    Route::get("/kebijakan",[PortalController::class,"kebijakan"]);
    Route::get("/tentangaspoomarket",[PortalController::class,"tentangaspoomarket"]);
    Route::get("/pusatbantuan",[PortalController::class,"pusatbantuan"]);
    Route::get("/cekongkir",[PortalController::class,"cekongkir"]);
    Route::post("/cekongkir",[PortalController::class,"cekHasil"]);

    Route::prefix("toko")->group(function(){
        Route::get("/", [PortalController::class, "toko"]);
        Route::get('/{id}', [PortalController::class, 'toko']); 
        Route::post('/follow-toko/{tokoId}', [PortalController::class, 'followToko'])->name('follow-toko');
    });

    Route::get("/cari",[PortalController::class,'getCari']);
    Route::prefix("barang")->group(function(){
        Route::get('/{id}',[PortalController::class,'getBarang']);
        Route::post('/keranjang',[PortalController::class,'postKeranjang']);
    });
    Route::prefix("checkout")->group(function(){
        Route::get("/",[PortalController::class,"checkout"]);
        Route::post("/",[PortalController::class,"postCheckout"]);
        Route::get('/success',[PortalController::class,'setelahcheckout']);

    });
    Route::prefix("keranjang")->group(function(){
        Route::get("/",[PortalController::class,"keranjang"]);
        Route::post("/",[PortalController::class,"postKeranjangToCheckout"]);
        Route::delete("/{id}",[PortalController::class,"deleteKeranjang"]);
        Route::post("/data",[PortalController::class,"getKeranjangData"]);
    });

    Route::prefix("profile")->group(function(){
        Route::get("/",[PortalController::class,"profile"]);
        Route::post("/",[PortalController::class,"updateProfile"]);
        Route::get("/data",[PortalController::class,"getDataProfile"]);
    });
    Route::get("/status/{kode}",[PortalController::class,"statuspengiriman"]);
 
    Route::post("/user-role",[PortalController::class,"getRolesUser"]);

    Route::get("/logout",[UserController::class,"logoutWeb"]);
});
