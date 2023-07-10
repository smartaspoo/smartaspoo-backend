<?php

namespace App\Modules\KategoriBarang\Controllers;

use App\Handler\JsonResponseHandler;
use App\Http\Controllers\Controller;
use App\Modules\KategoriBarang\Repositories\KategoriBarangRepository;
use App\Modules\KategoriBarang\Requests\KategoriBarangCreateRequest;
use App\Modules\Permission\Repositories\PermissionRepository;
use Illuminate\Http\Request;

class KategoriBarangController extends Controller
{
    public function index(Request $request)
    {
        $permissions = PermissionRepository::getPermissionStatusOnMenuPath($request->path());
        return view('KategoriBarang::index', ['permissions' => $permissions]);
    }

    public function datatable(Request $request)
    {
        $per_page = $request->input('per_page') != null ? $request->input('per_page') : 15;
        $data = KategoriBarangRepository::datatable($per_page);
        return JsonResponseHandler::setResult($data)->send();
    }

    public function create()
    {
        return view('KategoriBarang::create');
    }

    public function store(KategoriBarangCreateRequest $request)
    {
        $payload = $request->all();
        $kategori_barang = KategoriBarangRepository::create($payload);
        return JsonResponseHandler::setResult($kategori_barang)->send();
    }

    public function show(Request $request, $id)
    {
        $kategori_barang = KategoriBarangRepository::get($id);
        return JsonResponseHandler::setResult($kategori_barang)->send();
    }

    public function edit($id)
    {
        return view('KategoriBarang::edit', ['kategori_barang_id' => $id]);
    }

    public function update(Request $request, $id)
    {
        $payload = $request->all();
        unset($payload['created_at']);
        unset($payload['updated_at']);
        $kategori_barang = KategoriBarangRepository::update($id, $payload);
        return JsonResponseHandler::setResult($kategori_barang)->send();
    }

    public function destroy(Request $request, $id)
    {
        $delete = KategoriBarangRepository::delete($id);
        return JsonResponseHandler::setResult($delete)->send();
    }
}
