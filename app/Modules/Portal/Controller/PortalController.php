<?php

namespace App\Modules\Portal\Controller;

use App\Handler\JsonResponseHandler;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\DataBarang\Models\DataBarang;
use App\Modules\KategoriProduk\Models\KategoriProduk;
use App\Modules\KategoriProduk\Models\PivotKategoriProduk;
use App\Modules\Keranjang\Models\Keranjang;
use App\Modules\Portal\Model\UserDetail;
use App\Modules\Portal\Model\UserPortal;
use App\Modules\Slider\Models\Slider;
use App\Modules\TransaksiBarang\Models\TransaksiBarang;
use App\Modules\User\Model\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PortalController extends Controller
{

    public function getKeranjangData(){
        $user = Auth::user();
        $keranjang = Keranjang::where("user_id",$user->id)->with("barang")->get();
        return JsonResponseHandler::setResult($keranjang)->send();
    }

    public function getRolesUser(){
        return JsonResponseHandler::setResult(2)->send();
        
    }
    public function detailBarang($id){
        $data = DataBarang::where('id',$id)->with(['satuan','foto'])->get();
        return JsonResponseHandler::setResult($data)->send();
    }

    public function postKeranjang(Request $request){
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        $keranjang = Keranjang::create($data);

        if($keranjang){
            return JsonResponseHandler::setMessage("SUCCESS")->setResult($keranjang)->send();
        }else{
            return JsonResponseHandler::setMessage("ERROR")->send();
        }

        dd($request->all());
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

    public function getCari(Request $request){
        return view('Portal::cari');

    }

    public function getBarang(Request $request, $id){
        $data = DataBarang::where('id',$id)->with(['satuan','foto'])->first();
        return view('Portal::barang.detailproduk',compact("data"));
    }
    public function dashboard(){
        $slider = Slider::all();
        $barang = DataBarang::all();
        $kategori = KategoriProduk::get();
        $data = [
            'slider' => $slider,
            'kategori_produk' => $kategori,
            'rekomendasi' => $barang,
        ];
        return JsonResponseHandler::setResult($data)->send();

    }
    public function fetchLogin(Request $request){
        $data = Auth::user();
        if($data){
            $user = UserModel::with("roles")->find($data->id);
            return JsonResponseHandler::setResult($user)->send();
        }else{
            return JsonResponseHandler::setCode(400)->send();
        }
    }
    public function index(Request $request){
        return view('Portal::dashboard.dashboard');
    }
    public function login(Request $request){
        return view('Portal::auth.login');
    }
    public function registrasi(Request $request){
        return view('Portal::auth.registrasi');
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
        $user = Auth::user();
        $data = Keranjang::where('user_id',$user->id)->with(['barang','barang.user'])->first();
        $userdata = UserDetail::where('user_id',$user->id)->first();
        $ret = ['data'=>$data,'userdetail'=>$userdata, 'user'=>$user];
        // dd($data->barang->user);
        return view('Portal::checkout', $ret);
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