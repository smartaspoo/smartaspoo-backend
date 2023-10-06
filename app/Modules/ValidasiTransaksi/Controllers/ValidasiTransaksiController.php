<?php

namespace App\Modules\ValidasiTransaksi\Controllers;

use App\Handler\JsonResponseHandler;
use App\Http\Controllers\Controller;
use App\Modules\ValidasiTransaksi\Repositories\ValidasiTransaksiRepository;
use App\Modules\ValidasiTransaksi\Requests\ValidasiTransaksiCreateRequest;
use App\Modules\Permission\Repositories\PermissionRepository;
use Illuminate\Http\Request;

class ValidasiTransaksiController extends Controller
{
    public function index(Request $request)
    {
        $permissions = PermissionRepository::getPermissionStatusOnMenuPath($request->path());
        return view('ValidasiTransaksi::index', ['permissions' => $permissions]);
    }

    public function datatable(Request $request)
    {
        $per_page = $request->input('per_page') != null ? $request->input('per_page') : 15;
        $data = ValidasiTransaksiRepository::datatable($per_page);
        return JsonResponseHandler::setResult($data)->send();
    }

    public function create()
    {
        return view('ValidasiTransaksi::create');
    }

    public function store(ValidasiTransaksiCreateRequest $request)
    {
        $payload = $request->all();
        $validasi_transaksi = ValidasiTransaksiRepository::create($payload);
        return JsonResponseHandler::setResult($validasi_transaksi)->send();
    }

    public function show(Request $request, $id)
    {
        $validasi_transaksi = ValidasiTransaksiRepository::get($id);
        return JsonResponseHandler::setResult($validasi_transaksi)->send();
    }

    public function edit($id)
    {
        return view('ValidasiTransaksi::edit', ['validasi_transaksi_id' => $id]);
    }

    public function update(Request $request, $id)
    {
        $payload = $request->all();
        unset($payload['created_at']);
        unset($payload['updated_at']);
        $validasi_transaksi = ValidasiTransaksiRepository::update($id, $payload);
        return JsonResponseHandler::setResult($validasi_transaksi)->send();
    }

    public function destroy(Request $request, $id)
    {
        $delete = ValidasiTransaksiRepository::delete($id);
        return JsonResponseHandler::setResult($delete)->send();
    }
}
