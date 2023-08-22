<?php

namespace App\Modules\InputSCM\Controllers;

use App\Handler\FileHandler;
use App\Handler\JsonResponseHandler;
use App\Http\Controllers\Controller;
use App\Modules\InputSCM\Repositories\InputSCMRepository;
use App\Modules\InputSCM\Requests\InputSCMCreateRequest;
use App\Modules\Permission\Repositories\PermissionRepository;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(Request $request,$id)
    {
        $permissions = PermissionRepository::getPermissionStatusOnMenuPath("input-scm");
        return view('InputSCM::barang.index', ['permissions' => $permissions, 'id_umkm'=> $id]);
    }

    public function datatable(Request $request)
    {
        $per_page = $request->input('per_page') != null ? $request->input('per_page') : 15;
        $data = InputSCMRepository::datatable($per_page);
        return JsonResponseHandler::setResult($data)->send();
    }

    public function create()
    {
        return view('InputSCM::create');
    }

    public function store(InputSCMCreateRequest $request)
    {
        $payload = $request->all();
        $playload['voice_file'] = FileHandler::store(file : $request->file("voice_file"),targetDir: "uploads/voice",allowedExtensions : ["mp3","m4a"]);
        $input_scm = InputSCMRepository::create($payload);

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
        $delete = InputSCMRepository::delete($id);
        return JsonResponseHandler::setResult($delete)->send();
    }
}
