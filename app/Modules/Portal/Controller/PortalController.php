<?php

namespace App\Modules\Portal\Controller;

use App\Handler\JsonResponseHandler;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\ApproveTransaksi\Models\Pengiriman;
use App\Modules\DataBarang\Models\DataBarang;
use App\Modules\KategoriProduk\Models\KategoriProduk;
use App\Modules\KategoriProduk\Models\PivotKategoriProduk;
use App\Modules\Keranjang\Models\Keranjang;
use App\Modules\Portal\Model\UserDetail;
use App\Modules\Portal\Model\UserPortal;
use App\Modules\Slider\Models\Slider;
use App\Modules\TransaksiBarang\Models\TransaksiBarang;
use App\Modules\TransaksiBarang\Models\TransaksiBarangChildren;
use App\Modules\User\Model\UserModel;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PortalController extends Controller
{
    
    public function deleteKeranjang(Request $request,$id){
        $delete = Keranjang::where("id",$id)->where('user_id',Auth::user()->id);
        if($delete){
            $delete->delete();
        }else{
            $delete = "Barang di keranjang tidak ditemukan";
        }
        return JsonResponseHandler::setResult($delete)->send();
        
    }
    public function postKeranjangToCheckout(Request $request){
        $datas = json_decode($request->data);
        foreach($datas->data_keranjang as $data){
            $keranjang = Keranjang::where('id',$data->id)->first();
            $keranjang->jumlah = $data->jumlah;
            $keranjang->save();
        }
        return JsonResponseHandler::setResult($keranjang)->send();
    }
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
    public function getDataProfile(Request $request){
        $auth = Auth::user();
        $user = UserPortal::find($auth->id)->with(['details'])->first();
        return JsonResponseHandler::setResult($user)->send();
    }
    
    public function getBarang(Request $request, $id){
        $data = DataBarang::where('id',$id)->with(['satuan','foto','user','user.detail'])->first();
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
        return view('Portal::transaksi.keranjang');
    }
    public function infotoko(Request $request){
        return view('Portal::infotoko');
    }
    public function checkout(Request $request){
        $user = User::find(Auth::id())->with('detail')->first();
        $userid = $user->id;
        
        $data = DataBarang::with(['keranjang' => function($query) use ($userid){
            $query->where("user_id",$userid);
        },"user"])->has('keranjang')->get()->groupBy("created_by_user_id");
        
        $userdata = UserDetail::where('user_id',$user->id)->first();
        $ret = ['data'=>$data,'userdetail'=>$userdata, 'user'=>$user];
        return view('Portal::transaksi.checkout', $ret);
    }
    public function postCheckout(Request $request){
        $user = User::find(Auth::id())->with('detail')->first();
        $userid = $user->id;
        
        $datas = DataBarang::with(['keranjang' => function($query) use ($userid){
            $query->where("user_id",$userid);
        },"user"])->has('keranjang')->get()->groupBy("created_by_user_id");
        $input = $request->all();
        DB::beginTransaction();
        try{
            $i = 0;
            foreach($datas as $barangs){
                $total = 0;
                $transaksi = TransaksiBarang::create([
                    'kode_transaksi' => "TR-". Str::random(8) ,
                    'alamat' => $request->checkout['alamat'],
                    'biaya_pengiriman' => intval($request->transaksi['ongkir'][$i]),
                    'kurir_pengiriman' => "-",
                    'total_biaya' => 0, //temp
                    'user_id' => Auth::id(),
                    'toko_id' => 0, // temp
                    'pesan' => $request->transaksi['pesan'][$i],
                ]);
                $toko_id = 0;
                foreach($barangs as $barang){
                    foreach($barang->keranjang as $keranjang){
                        $tr_child = TransaksiBarangChildren::create([
                            'transaksi_id' => $transaksi->id,
                            'barang_id' => $keranjang->barang_id,
                            'harga' => $barang->harga_user,
                            'jumlah' => $keranjang->jumlah,
                        ]);
                        $total += intval($tr_child->harga) * intval($tr_child->jumlah); 
                        $toko_id = $barang->created_by_user_id;
                        Keranjang::where('id',$keranjang->id)->delete();
                    }
                }
                $transaksi->total_biaya = $total;
                $transaksi->toko_id = $toko_id;
                $transaksi->save();
                $i++;
                
            }
            DB::commit();
            return JsonResponseHandler::setResult($transaksi)->send();

        }catch(Exception $e){
            DB::rollBack();
            return JsonResponseHandler::setResult($e->getMessage())->send();
            
        }
        
    }
    public function pencarianbarangtoko(Request $request){
        return view('Portal::pencarianbarangtoko');
    }
    public function setelahcheckout(Request $request){
        return view('Portal::transaksi.setelahcheckout');
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
            
            
            