<?php

namespace App\Modules\Dashboard\Controller;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\DataBarang\Models\DataBarang;
use App\Modules\TransaksiBarang\Models\TransaksiBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Transaction;

class DashboardController extends Controller
{
    public function dummypost(Request $request){
        echo "Input data berikut <br>";
        print_r($request->all());
        echo "Sedang training";
    }
    public function dummyget(Request $request){
        echo "mencari barang";
        echo "barang ditemukan: prediksi barang harganya 15000";
    }
    public function index(Request $request)
    {
        $user = Auth::user();
        $userid = $user->id;
        $total_stock = DataBarang::where('created_by_user_id', $userid)->sum('stock_global');
        $total_barang = DataBarang::where('created_by_user_id', $userid)->get();
        $transaksi_berhasil = TransaksiBarang::where('toko_id', $userid)
        ->where('status',1)->get();
        $transaksi_gagal = TransaksiBarang::where('toko_id', $userid)
        ->where('status','=',11)->get();
        $uang_diterima = TransaksiBarang::where('toko_id', $userid)
        ->where('status',2)->get();
        $uang_ditolak = TransaksiBarang::where('toko_id', $userid)
        ->where('status','=',22)->get();
        $barang_dikirim = TransaksiBarang::where('toko_id', $userid)
        ->where('status',3)->get();
        $barang_tidak_dikirim = TransaksiBarang::where('toko_id', $userid)
        ->where('status','=',33)->get();
        $barang_diterima = TransaksiBarang::where('toko_id', $userid)
        ->where('status',4)->get();
        $barang_tidak_diterima = TransaksiBarang::where('toko_id', $userid)
        ->where('status','=',44)->get();
        $transaksi_dibuat = TransaksiBarang::where('toko_id', $userid)
        ->where('status','')->get();
        $get_data = DataBarang::select('*')->where('created_by_user_id', $userid)->limit(5)->get();


        $total_transaksi = TransaksiBarang::where('toko_id', $userid)->get();

        $card = [

            'total_barang' => count($total_barang),
            'total_stock' => $total_stock,
            'transaksi_berhasil' => count($transaksi_berhasil),
            'transaksi_gagal' => count($transaksi_gagal),
            'total_transaksi' => count($total_transaksi),
            'uang_diterima' => count($uang_diterima),
            'uang_ditolak' => count($uang_ditolak),
            'barang_dikirim' => count($barang_dikirim),
            'barang_tidak_dikirim' => count($barang_tidak_dikirim),
            'barang_diterima' => count($barang_diterima),
            'barang_tidak_diterima' => count($barang_tidak_diterima),           
            'transaksi_dibuat' => count($transaksi_dibuat),
            'get_data' => $get_data         

        ];

        return view('Dashboard::index', ['data' => $card]);
    }
}
