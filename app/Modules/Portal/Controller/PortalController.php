<?php

namespace App\Modules\Portal\Controller;

use App\Handler\JsonResponseHandler;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PortalController extends Controller
{
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
    public function pusatbantuan(Request $request){
        return view('Portal::pusatbantuan');
    }
    public function kebijakan(Request $request){
        return view('Portal::kebijakan');
    }
    
    public function cekongkir(Request $request){
        $response = Http::withHeaders ([
            'key' => 'f4f21baace88e503f1f1602d7c07a23a'
        ])->get('https://api.rajaongkir.com/starter/city');
        
        $cities = $response['rajaongkir']['results'];

        return view('Portal::cekongkir', ['cities' => $cities, 'ongkir' => '']);
    }
    public function cekHasil(Request $request){
        $response = Http::withHeaders ([
            'key' => 'f4f21baace88e503f1f1602d7c07a23a'
        ])->get('https://api.rajaongkir.com/starter/city');
        
        $responseCost = Http::withHeaders ([
            'key' => 'f4f21baace88e503f1f1602d7c07a23a'
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => $request->origin,
            'destination' => $request->destination,
            'weight' => $request->weight,
            'courier' => $request->courier,
        ]);

        $cities = $response['rajaongkir']['results'];
        $ongkir = $responseCost['rajaongkir'];
        
        return view('Portal::cekongkir', ['cities' => $cities, 'ongkir' => $ongkir]);
    }

}