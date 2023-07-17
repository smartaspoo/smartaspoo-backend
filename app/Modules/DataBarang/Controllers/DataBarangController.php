<?php

namespace App\Modules\DataBarang\Controllers;

use App\Handler\JsonResponseHandler;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\DataBarang\Models\DataBarang;
use App\Modules\DataBarang\Repositories\DataBarangRepository;
use App\Modules\DataBarang\Requests\DataBarangCreateRequest;
use App\Modules\Permission\Repositories\PermissionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataBarangController extends Controller
{
    public function index(Request $request)
    {
        $permissions = PermissionRepository::getPermissionStatusOnMenuPath($request->path());
        return view('DataBarang::index', ['permissions' => $permissions]);
    }

    public function findKodeBarang(Request $request){
        $page = (isset($request->page) ? $request->page :15);
        $data = DataBarang::where('kode_barang','LIKE',"%".$request->kode_barang."%")->paginate($page);
        return JsonResponseHandler::setResult($data)->send();
    }

    public function datatable(Request $request)
    {
        $per_page = $request->input('per_page') != null ? $request->input('per_page') : 15;
        $data = DataBarangRepository::datatable($per_page);
        return JsonResponseHandler::setResult($data)->send();
    }

    public function create()
    {
        return view('DataBarang::create');
    }

    public function store(DataBarangCreateRequest $request)
    {
        $payload = $request->all();
        $payload['created_by_user_id'] = Auth::user()->id;
        $data_barang = DataBarangRepository::create($payload);
        return JsonResponseHandler::setResult($data_barang)->send();
    }

    public function show(Request $request, $id)
    {
        $data_barang = DataBarangRepository::get($id);
        return JsonResponseHandler::setResult($data_barang)->send();
    }

    public function edit($id)
    {
        return view('DataBarang::edit', ['barang_id' => $id]);
    }

    public function update(Request $request, $id)
    {
        $payload = $request->all();
        unset($payload['created_at']);
        unset($payload['updated_at']);
        $data_barang = DataBarangRepository::update($id, $payload);
        return JsonResponseHandler::setResult($data_barang)->send();
    }

    public function destroy(Request $request, $id)
    {
        $delete = DataBarangRepository::delete($id);
        return JsonResponseHandler::setResult($delete)->send();
    }
}