<?php

namespace App\Modules\Portal\Controller;

use App\Handler\FileHandler;
use App\Handler\JsonResponseHandler;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\ApproveTransaksi\Models\Pengiriman;
use App\Modules\DataBarang\Models\DataBarang;
use App\Modules\KategoriProduk\Models\KategoriProduk;
use App\Modules\KategoriProduk\Models\PivotKategoriProduk;
use App\Modules\Keranjang\Models\Keranjang;
use App\Modules\Penjualan\Models\Pengikut;
use App\Modules\Portal\Model\Rekening;
use App\Modules\Portal\Model\TransaksiMaster;
use App\Modules\Portal\Model\UserDetail;
use App\Modules\Portal\Model\UserPortal;
use App\Modules\PortalUser\Models\TokoUser;
use App\Modules\Slider\Models\Slider;
use App\Modules\TransaksiBarang\Models\TransaksiBarang;
use App\Modules\TransaksiBarang\Models\TransaksiBarangChildren;
use App\Modules\User\Model\UserModel;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PortalController extends Controller
{

    public function deleteKeranjang(Request $request, $id)
    {
        $delete = Keranjang::where("id", $id)->where('user_id', Auth::user()->id);
        if ($delete) {
            $delete->delete();
        } else {
            $delete = "Barang di keranjang tidak ditemukan";
        }
        return JsonResponseHandler::setResult($delete)->send();
    }
    public function postKeranjangToCheckout(Request $request)
    {
        $datas = json_decode($request->data);
        foreach ($datas->data_keranjang as $data) {
            $keranjang = Keranjang::where('id', $data->id)->first();
            $keranjang->jumlah = $data->jumlah;
            $keranjang->save();
        }
        return JsonResponseHandler::setResult($keranjang)->send();
    }
    public function getKeranjangData()
    {
        $user = Auth::user();
        $keranjang = Keranjang::where("user_id", $user->id)->with("barang")->get();
        return JsonResponseHandler::setResult($keranjang)->send();
    }

    public function getRolesUser()
    {
        return JsonResponseHandler::setResult(2)->send();
    }
    public function detailBarang($id)
    {
        $data = DataBarang::where('id', $id)->with(['satuan', 'foto'])->get();
        return JsonResponseHandler::setResult($data)->send();
    }

    public function postKeranjang(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        $keranjang = Keranjang::create($data);

        if ($keranjang) {
            return JsonResponseHandler::setMessage("SUCCESS")->setResult($keranjang)->send();
        } else {
            return JsonResponseHandler::setMessage("ERROR")->send();
        }

        dd($request->all());
    }

    public function searchBarang(Request $request)
    {
        $payload = $request->input('nama');
        $data = DataBarang::where('nama_barang', 'LIKE', "%" . $payload . "%")->with(['satuan', 'foto'])->get();
        return JsonResponseHandler::setResult($data)->send();
    }
    public function listByKategoriProduk($id)
    {
        $data = PivotKategoriProduk::where('kategori_produk_id', $id)->with(['barang'])->get();
        return JsonResponseHandler::setResult($data)->send();
    }

    public function getCari(Request $request)
    {
        $q = $request->input('q');
        $tipe = $request->input('tipe');
    
        // Hanya jalankan pencarian jika nilai 'q' tidak kosong
        if (!empty($q)) {
            if ($tipe == 'barang') {        
                $results = DataBarang::where("nama_barang", "LIKE", "%" . $q . "%")->get();
                return view('Portal::cari.cari', compact('results', 'q', 'tipe'));
            } elseif ($tipe == 'toko') {
                $results = TokoUser::where("nama", "LIKE", "%" . $q . "%")->with(['user','user.kotaModel'])->get();
                return view('Portal::cari.caritoko', compact('results', 'q', 'tipe'));
            } else {
                // Handle jenis pencarian yang tidak valid
                return redirect()->back()->with('error', 'Jenis pencarian tidak valid.');
            }
        } else {
            // Handle jika nilai 'q' kosong
            return redirect()->back()->with('error', 'Kata kunci pencarian tidak boleh kosong.');
        }
    }
    
    
    
    public function getDataProfile(Request $request)
    {
        $auth = Auth::user();
        $user = UserPortal::find($auth->id)->with(['details'])->first();
        return JsonResponseHandler::setResult($user)->send();
    }

    public function getBarang(Request $request, $id)
    {
        $data = DataBarang::where('id', $id)->with(['satuan', 'foto', 'user', 'user.detail'])->first();
        return view('Portal::barang.detailproduk', compact("data"));
    }
    public function dashboard()
    {
        $slider = Slider::all();
        $barang = DataBarang::limit(10)->get();
        $kategori = KategoriProduk::get();
        $data = [
            'slider' => $slider,
            'kategori_produk' => $kategori,
            'rekomendasi' => $barang,
        ];
        return JsonResponseHandler::setResult($data)->send();
    }
    public function fetchLogin(Request $request)
    {
        $data = Auth::user();
        if ($data) {
            $user = UserModel::with(["roles", 'detail'])->find($data->id);
            return JsonResponseHandler::setResult($user)->send();
        } else {
            return JsonResponseHandler::setCode(400)->send();
        }
    }
    public function index(Request $request)
    {
        return view('Portal::dashboard.dashboard');
    }
    public function login(Request $request)
    {
        return view('Portal::auth.login');
    }
    public function registrasi(Request $request)
    {
        return view('Portal::auth.registrasi');
    }

    public function statuspengiriman(Request $request, $kode)
    {
        $user = Auth::user()->id;
        $transaksi_barang = TransaksiBarang::where('user_id', $user)->where('kode_transaksi', $kode)->first();
        $transaksiChildren = TransaksiBarangChildren::where('transaksi_id', $transaksi_barang->id)->first();
        $pengiriman = Pengiriman::where('transaksi_id', $transaksi_barang->id)->orderBy('created_at', 'desc')->get();
        $barang = DataBarang::find($transaksiChildren->barang_id);

        $keterangan_pengiriman = $pengiriman->first()->keterangan;
        $kurir = $transaksi_barang->kurir_pengiriman;
        $image_product = $barang->thumbnail;

        $status_pengiriman = [
            'transaksi' => $transaksi_barang,
            'transaksi_child' => $transaksiChildren,
            'pengiriman' => $pengiriman,
            'keterangan' => $keterangan_pengiriman,
            'kurir' => $kurir,
            'resi' => $kode,
            'image_product' => $image_product
        ];
        

        return view('Portal::statuspengiriman', ['data' => $status_pengiriman]);
    }
        public function toko(Request $request, $id)
        {
            // Ambil data toko dari database berdasarkan ID
            $toko =TokoUser::find($id);
    
            if (!$toko) {
                return abort(404);
            }
            $barang = DataBarang::with('user')->where('created_by_user_id', $toko->user_id)->get();
            return view('Portal::toko', [
                'toko' => $toko,
                'barang' => $barang,
            ]);
        }
        
        public function followToko($id) {
            $user = Auth::user();
            $toko = TokoUser::find($id); // Mengganti 'TokoUser' menjadi 'UserToko'
        
            // Pastikan 'users_toko' dan user ada
            if (!$toko || !$user) {
                return response()->json(['message' => 'Toko atau user tidak ditemukan'], 404);
            }
        
            // Cek apakah user sudah mengikuti 'users_toko'
            $existingFollow = Pengikut::where('user_id', $user->id)
                ->where('toko_id', $toko->id) // Mengganti 'toko_id' menjadi 'user_toko_id'
                ->first();
        
            if (!$existingFollow) {
                // Jika belum mengikuti, buat record pengikut baru
                Pengikut::create([
                    'user_id' => $user->id,
                    'toko_id' => $toko->id // Mengganti 'toko_id' menjadi 'user_toko_id'
                ]);
        
                // Tambah 1 pada jumlah pengikut 'users_toko'
                $toko->pengikut = $toko->pengikut + 1;
                $toko->save();
        
                return redirect()->back();
            } else {
                // Jika sudah mengikuti, berhenti mengikuti
                $existingFollow->delete();
        
                // Kurangi 1 dari jumlah pengikut 'users_toko'
                $toko->pengikut = $toko->pengikut - 1;
                $toko->save();
        
                return redirect()->back();
            }
        }
        
    public function daftartransaksi(Request $request)
    {
        $user = Auth::user()->id;
        if ($request->has('cari')) {
            $transaksi_barang = TransaksiBarang::where('user_id', $user)->where('kode_transaksi', $request->cari)->get();
        } else {
            $transaksi_barang = TransaksiBarang::where('user_id', $user)->get();
        }
        $data_transaksi = [];
        foreach ($transaksi_barang as $transaksi) {
            $transaksiChildren = TransaksiBarangChildren::where('transaksi_id', $transaksi->id)->first();
            if ($transaksiChildren) {
                $barang = DataBarang::find($transaksiChildren->barang_id);
                $jumlah = $transaksiChildren->jumlah;
                $totalHarga = $transaksi->biaya_pengiriman + $transaksi->total_biaya;
                $totalHargaFormatted = number_format($totalHarga, 0, ',', '.');
                $createdDate = Carbon::parse($transaksi->created_at)->format('d-m-Y');

                $transaksiId = $transaksi->id;
                $kodeTransaksi = $transaksi->kode_transaksi;
                $alamat = $transaksi->alamat;
                $biayaPengiriman = $transaksi->biaya_pengiriman;
                $kurirPengiriman = $transaksi->kurir_pengiriman;
                $pesan = $transaksi->pesan;
                $totalBiaya = $transaksi->total_biaya;
                $userId = $transaksi->user_id;
                $tokoId = $transaksi->toko_id;
                $namaBarang = $barang->nama_barang;
                $thumbnail = $barang->thumbnail;


                $data_transaksi[] = [
                    'transaksiId' => $transaksiId,
                    'kodeTransaksi' => $kodeTransaksi,
                    'createdDate' => $createdDate,
                    'alamat' => $alamat,
                    'biayaPengiriman' => $biayaPengiriman,
                    'kurirPengiriman' => $kurirPengiriman,
                    'pesan' => $pesan,
                    'totalBiaya' => $totalBiaya,
                    'userId' => $userId,
                    'tokoId' => $tokoId,
                    'namaBarang' => $namaBarang,
                    'thumbnail' => $thumbnail,
                    'jumlah' => $jumlah,
                    'totalHarga' => $totalHarga,
                    'totalHargaFormatted' => 'Rp. ' . $totalHargaFormatted,
                    'statusReadable' => $transaksi->status_readable,
                ];
            }
        }
        return view('Portal::transaksi.daftartransaksi', ['data' => $data_transaksi]);

    }
    public function profile(Request $request)
    {

        $data = UserDetail::where('user_id', Auth::id())->with('userMaster')->first();
        $userMaster = UserModel::where('id', Auth::id())->first();
        return view('Portal::auth.profile', ['data' => $data, 'user' => $userMaster]);
    }
    public function updateProfile(Request $request)
    {
        $userDetail = [
            'user_id' => $request->input('user_id'),
            'alamat' => $request->input('alamat'),
            'telepon' => $request->input('telepon'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'provinsi' => $request->input('provinsi'),
            'kota' => $request->input('kota'),
            'kecamatan' => $request->input('kecamatan'),
            'kelurahan' => $request->input('kelurahan'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
        ];
        if ($request->has('foto')) {
            $foto = FileHandler::store(file: $request->file('foto'), targetDir: "uploads/profile");
            $userDetail['foto'] = $foto;
        }


        $userid = $request->input('user_id');

        $insert = UserDetail::updateOrInsert(['user_id' => $request->input('user_id')], $userDetail);

        $userMaster = User::where('id', $userid)->first();
        $userMaster->username = $request->input('username');
        $userMaster->email = $request->input('email');
        $userMaster->name = $request->input('nama');
        $userMaster->save();

        if ($insert) {
            return redirect()->back()->with('success', 'Profil berhasil diperbarui');
        } else {
            return redirect()->back()->with('error', 'Profil gagal diperbarui');
        }
    }
    public function detailproduk(Request $request)
    {
        return view('Portal::detailproduk');
    }
    public function keranjang(Request $request)
    {
        return view('Portal::transaksi.keranjang');
    }
    public function infotoko(Request $request)
    {
        return view('Portal::infotoko');
    }
    public function checkout(Request $request)
    {
        $user = User::find(Auth::id())->with('detail')->first();
        $userid = $user->id;
        
        // $data = DataBarang::has('keranjang')->with(['keranjang' => function($query) use ($userid){
        //     $query->where("user_id",$userid);
        // },"user"])->get()->groupBy("created_by_user_id");
        
        $data = Keranjang::with(['barang' => function($query){
        },'barang.user'])->get()->groupBy('barang.created_by_user_id');
        $userdata = UserDetail::where('user_id',$user->id)->first();
        $kodeUnik = rand(10,99);
        $ret = ['data'=>$data,'userdetail'=>$userdata, 'user'=>$user,'kodeUnik' => $kodeUnik];

        return view('Portal::transaksi.checkout', $ret);
    }
    public function postCheckout(Request $request)
    {
        $user = User::find(Auth::id())->with('detail')->first();
        $userid = $user->id;
        $datas = Keranjang::with(['barang' => function($query){
        },'barang.user'])->get()->groupBy('barang.created_by_user_id');
        $input = $request->all();
        $kode_master = "TR-". Str::random(8);
        $total_biaya = $request->totalPembayaran;
        $kode_unik = $request->kodeUnik;
        $total_pengiriman = $request->totalPengiriman;
        DB::beginTransaction();
        try {
            $i = 0;
            foreach ($datas as $barangs) {
                $total = 0;
                $transaksi = TransaksiBarang::create([
                    'kode_transaksi' => "TR-" . Str::random(8),
                    'alamat' => $request->checkout['alamat'],
                    'biaya_pengiriman' => intval($request->transaksi['ongkir'][$i]),
                    'kurir_pengiriman' => "-",
                    'total_biaya' => 0, //temp
                    'user_id' => Auth::id(),
                    'toko_id' => 0, // temp
                    'kode_transaksi_master' =>$kode_master,
                    'pesan' => $request->transaksi['pesan'][$i],
            ]);
                $toko_id = 0;
                foreach($barangs as $keranjang){
                    $barang = $keranjang->barang;
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
                $transaksi->total_biaya = $total;
                $transaksi->toko_id = $toko_id;
                $transaksi->save();
                $i++;
            }

            $return = TransaksiMaster::create([
                'kode_transaksi' => $kode_master,
                'kode_unik' => $kode_unik,
                'total_biaya' => $total_biaya,
            ]);

            DB::commit();


            return JsonResponseHandler::setResult($return)->send();

        }catch(Exception $e){
            DB::rollBack();
            return JsonResponseHandler::setResult($e->getMessage())->send();
        }
    }
    public function pencarianbarangtoko(Request $request)
    {
        return view('Portal::pencarianbarangtoko');
    }
    public function pencarianbarangumkm(Request $request)
    {
        return view('Portal::pencarianbarangumkm');
    }
    public function setelahcheckout(Request $request)
    {
        $kode = $request->kode;
        $data = TransaksiMaster::where('kode_transaksi',$kode)->first();
        $rekening = Rekening::where('status',1)->first();
        return view('Portal::transaksi.setelahcheckout',compact("data","rekening"));
    }
    public function ratingdanulasan(Request $request)
    {
        return view('Portal::ratingdanulasan');
    }

    public function pusatbantuan(Request $request)
    {
        return view('Portal::pusatbantuan');
    }
    public function kebijakan(Request $request)
    {
        return view('Portal::kebijakan');
    }

    public function cekongkir(Request $request)
    {
        $response = Http::withHeaders([
            'key' => 'f4f21baace88e503f1f1602d7c07a23a'
        ])->get('https://api.rajaongkir.com/starter/city');

        $cities = $response['rajaongkir']['results'];

        return view('Portal::cekongkir', ['cities' => $cities, 'ongkir' => '']);
    }
    public function cekHasil(Request $request)
    {
        $response = Http::withHeaders([
            'key' => 'f4f21baace88e503f1f1602d7c07a23a'
        ])->get('https://api.rajaongkir.com/starter/city');

        $responseCost = Http::withHeaders([
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
