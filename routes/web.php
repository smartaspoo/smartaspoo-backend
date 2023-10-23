<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['auth'])->group(function () {
    require app_path('Modules/Dashboard/routes.php');
    require app_path('Modules/User/routes.php');
    require app_path('Modules/Menu/routes.php');
    require app_path('Modules/Role/routes.php');
    require app_path('Modules/Permission/routes.php');
    require app_path('Modules/Module/routes.php');
    require app_path('Modules/Penjualan/routes.php');
    require app_path('Modules/DataBarang/routes.php');
    require app_path('Modules/Diskon/routes.php');
    require app_path('Modules/Pembelian/routes.php');
    require app_path('Modules/Satuan/routes.php');
    require app_path('Modules/InputSCM/routes.php');
    require app_path('Modules/PortalUser/routes.php');
    require app_path('Modules/Slider/routes.php');
    require app_path('Modules/KategoriProduk/routes.php');
    require app_path('Modules/Keranjang/routes.php');
    require app_path('Modules/TransaksiBarang/routes.php');
    require app_path('Modules/ApproveUser/routes.php');
    require app_path('Modules/ApproveTransaksi/routes.php');
    require app_path('Modules/ValidasiTransaksi/routes.php');
    require app_path('Modules/KirimBarang/routes.php');
    require app_path('Modules/Komposisi/routes.php');
    
    // ROUTE_MARKER
    // Add routes in the line below (DONT REMOVE THIS SECTION !!!!!!, because this line is LINE_MARKER used by Module Generator)
});


// Mengisikan Routing untuk portal
require base_path("routes/portal.php");

Route::get('/', function () {
    return redirect('/p');
});

Route::get('/p/order', [OrderController::class, 'order']);
Route::post('/bayar', [OrderController::class, 'bayar']);
Route::get('/p/invoice/{id}', [OrderController::class, 'invoice']);