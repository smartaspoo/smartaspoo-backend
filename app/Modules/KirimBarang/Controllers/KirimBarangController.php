<?php

namespace App\Modules\KirimBarang\Controllers;

use App\Handler\JsonResponseHandler;
use App\Http\Controllers\Controller;
use App\Modules\KirimBarang\Repositories\KirimBarangRepository;
use App\Modules\KirimBarang\Requests\KirimBarangCreateRequest;
use App\Modules\Permission\Repositories\PermissionRepository;
use Illuminate\Http\Request;

class KirimBarangController extends Controller
{
    public function index(Request $request)
    {
        $permissions = PermissionRepository::getPermissionStatusOnMenuPath($request->path());
        return view('KirimBarang::index', ['permissions' => $permissions]);
    }

    public function datatable(Request $request)
    {
        $per_page = $request->input('per_page') != null ? $request->input('per_page') : 15;
        $data = KirimBarangRepository::datatable($per_page);
        return JsonResponseHandler::setResult($data)->send();
    }

    public function create()
    {
        return view('KirimBarang::create');
    }

    public function store(KirimBarangCreateRequest $request)
    {
        $payload = $request->all();
        $kirim_barang = KirimBarangRepository::create($payload);
        return JsonResponseHandler::setResult($kirim_barang)->send();
    }

    public function show(Request $request, $id)
    {
        $kirim_barang = KirimBarangRepository::get($id);
        return JsonResponseHandler::setResult($kirim_barang)->send();
    }

    public function edit($id)
    {
        return view('KirimBarang::edit', ['kirim_barang_id' => $id]);
    }

    public function update(Request $request, $id)
    {
        $payload = $request->all();
        unset($payload['created_at']);
        unset($payload['updated_at']);
        $kirim_barang = KirimBarangRepository::update($id, $payload);
        return JsonResponseHandler::setResult($kirim_barang)->send();
    }

    public function destroy(Request $request, $id)
    {
        $delete = KirimBarangRepository::delete($id);
        return JsonResponseHandler::setResult($delete)->send();
    }
}
