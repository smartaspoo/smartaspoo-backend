<?php

namespace App\Modules\InputSCM\Controllers;

use App\Handler\FileHandler;
use App\Handler\JsonResponseHandler;
use App\Http\Controllers\Controller;
use App\Modules\InputSCM\Models\InputSCM;
use App\Modules\InputSCM\Models\UMKM;
use App\Modules\InputSCM\Repositories\InputSCMRepository;
use App\Modules\InputSCM\Requests\InputSCMCreateRequest;
use App\Modules\Permission\Repositories\PermissionRepository;
use Illuminate\Http\Request;

class InputSCMController extends Controller
{
    public function index(Request $request)
    {
        $permissions = PermissionRepository::getPermissionStatusOnMenuPath($request->path());
        return view('InputSCM::index', ['permissions' => $permissions]);
    }

    public function datatable(Request $request)
    {
        $per_page = $request->input('per_page') != null ? $request->input('per_page') : 15;
        $data = InputSCMRepository::datatable($per_page);
        return JsonResponseHandler::setResult($data)->send();
    }
    public function excel(Request $request){
        $data = UMKM::with(['kecamatan','kota','kelurahan','provinsi','barang','barang.bahan','barang.bahan.supplier'])->get();
     
        return JsonResponseHandler::setResult($data)->send();

    }

    public function create()
    {
        return view('InputSCM::create');
    }

    public function store(InputSCMCreateRequest $request)
    {
        $payload = $request->all();
        $payload['voice_file'] = FileHandler::store(file : $request->file("voice_file"),targetDir: "uploads/voice",allowedExtensions : ["mp3","m4a"]);
        $input_scm = InputSCMRepository::create($payload);

        return JsonResponseHandler::setResult($input_scm)->send();
    }

    public function show(Request $request, $id)
    {
        $input_scm = InputSCMRepository::get($id);
        return JsonResponseHandler::setResult($input_scm)->send();
    }
    public function getEdit($id){
        $data = UMKM::where("id_umkm",$id)->first();
        return JsonResponseHandler::setResult($data)->send();
    }
    public function saveEdit(Request $request,$id){
        $data = UMKM::where("id_umkm",$id)->first();
        $payload = $request->all();
        $data->nama = $payload['nama'];
        $data->tahun_berdiri = $payload['tahun_berdiri'];
        $data->save();
        return JsonResponseHandler::setResult($data)->send();
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
        $delete = InputSCMRepository::delete($id);
        return JsonResponseHandler::setResult($delete)->send();
    }
    public function preview(Request $request, $id)
    {
        $data = UMKM::where('id_umkm',$id)->with(['kecamatan','kota','kelurahan','provinsi','barang','barang.bahan','barang.bahan.supplier'])->first();
        
        return view('InputSCM::preview', ['data' => $data]); 
    }
}