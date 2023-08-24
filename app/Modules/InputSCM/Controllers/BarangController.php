<?php

namespace App\Modules\InputSCM\Controllers;

use App\Handler\FileHandler;
use App\Handler\JsonResponseHandler;
use App\Http\Controllers\Controller;
use App\Modules\InputSCM\Models\BarangSCM;
use App\Modules\InputSCM\Models\UMKM;
use App\Modules\InputSCM\Repositories\BarangSCMRepository;
use App\Modules\InputSCM\Requests\InputSCMCreateRequest;
use App\Modules\Permission\Repositories\PermissionRepository;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(Request $request,$id)
    {
        $umkm = UMKM::find($id);
        $permissions = PermissionRepository::getPermissionStatusOnMenuPath("input-scm");
        return view('InputSCM::barang.index', ['permissions' => $permissions, 'umkm'=> $umkm, 'urlnow' => $request->path()]);
    }

    public function datatable(Request $request,$id)
    {
        $per_page = $request->input('per_page') != null ? $request->input('per_page') : 15;
        $data = BarangSCMRepository::datatable($per_page,$id);
        return JsonResponseHandler::setResult($data)->send();
    }

    public function create(Request $request,$id)
    {
        $umkm = UMKM::find($id);
  
        return view('InputSCM::barang.create',["umkm" => $umkm, 'urlnow' => $request->path()]);
    }

    public function store(Request $request,$id)
    {
        $payload = $request->all();
        if($request->perlakuan_barang_tidak_laku == "LAINNNYA"){
            $payload['perlakuan_barang_tidak_laku'] = $request->perlakuan_barang_tidak_laku_lainnya;
        }
        if($request->jenis_kemasan == "LAINNNYA"){
            $payload['jenis_kemasan'] = $request->jenis_kemasan_lainnya;
        }
        $payload['detail_tempat_barang_dijual'] = implode(",",$payload['detail_tempat_barang_dijual']);
        $payload['tempat_barang_dijual'] = implode(",",$payload['tempat_barang_dijual']);
        $payload['ukuran_kemasan'] = implode(",",$payload['ukuran_kemasan']);
        $payload['id_umkm'] = $id;
        unset($payload['perlakuan_barang_tidak_laku_lainnya']);
        unset($payload['jenis_kemasan_lainnya']);


        $input_scm = BarangSCMRepository::create($payload);
        return JsonResponseHandler::setResult($input_scm)->send();
    }

    public function show(Request $request, $id)
    {
        $input_scm = InputSCMRepository::get($id);
        return JsonResponseHandler::setResult($input_scm)->send();
    }

    public function edit($id)
    {
        return view('InputSCM::edit', ['input_scm_id' => $id]);
    }

    public function update(Request $request, $id)
    {
        $payload = $request->all();
        unset($payload['created_at']);
        unset($payload['updated_at']);
        $input_scm = InputSCMRepository::update($id, $payload);
        return JsonResponseHandler::setResult($input_scm)->send();
    }

    public function destroy(Request $request, $id)
    {
        $delete = BarangSCMRepository::delete($id);
        return JsonResponseHandler::setResult($delete)->send();
    }
}
