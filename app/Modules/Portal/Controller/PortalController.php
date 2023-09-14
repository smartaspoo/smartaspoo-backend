<?php

namespace App\Modules\Portal\Controller;

use App\Handler\JsonResponseHandler;
use App\Http\Controllers\Controller;
use App\Modules\DataBarang\Models\DataBarang;
use App\Modules\KategoriProduk\Models\KategoriProduk;
use App\Modules\KategoriProduk\Models\PivotKategoriProduk;
use App\Modules\Slider\Models\Slider;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function detailBarang($id){
        $data = DataBarang::where('id',$id)->with(['satuan','foto'])->get();
        return JsonResponseHandler::setResult($data)->send();
    }
    public function searchBarang(Request $request){
        $payload = $request->input('nama');
        $data = DataBarang::where('nama_barang','LIKE',"%".$payload."%")->with(['satuan','foto'])->get();
        return JsonResponseHandler::setResult($data)->send();

    }
    public function listByKategoriProduk($id){
        $data = PivotKategoriProduk::where('kategori_produk_id',$id)->with(['barang'])->get();
        return JsonResponseHandler::setResult($data)->send();
    }
    public function dashboard(){
        $slider = Slider::all();
        $barang = DataBarang::all();
        $kategori = PivotKategoriProduk::with('barang')->get();
        $data = [
            'slider' => $slider,
            'kategori_produk' => $kategori
        ];
        return JsonResponseHandler::setResult($data)->send();

    }
    public function index(Request $request){
        return view('Portal::index');
    }
    public function login(Request $request){
        return view('Portal::login');
    }
    public function registrasi(Request $request){
        return view('Portal::registrasi');
    }
    public function statuspengiriman(Request $request){
        return view('Portal::statuspengiriman');
    }
    public function detailbarangpenjualan(Request $request){
        return view('Portal::detailbarangpenjualan');
    }
    public function daftartransaksi(Request $request){
        return view('Portal::daftartransaksi');
    }
    public function profile(Request $request){
        return view('Portal::profile');
    }
    public function detailproduk(Request $request){
        return view('Portal::detailproduk');
    }
    public function keranjang(Request $request){
        return view('Portal::keranjang');
    }
    public function infotoko(Request $request){
        return view('Portal::infotoko');
    }
    public function checkout(Request $request){
        return view('Portal::checkout');
    }
    public function pencarianbarangtoko(Request $request){
        return view('Portal::pencarianbarangtoko');
    }
    public function setelahcheckout(Request $request){
        return view('Portal::setelahcheckout');
    }
    public function ratingdanulasan(Request $request){
        return view('Portal::ratingdanulasan');
    }
    public function pencarianbarangumkm(Request $request){
        return view('Portal::pencarianbarangumkm');
    }
}