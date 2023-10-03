<?php

namespace App\Modules\ApproveTransaksi\Controllers;

use App\Handler\JsonResponseHandler;
use App\Http\Controllers\Controller;
use App\Modules\ApproveTransaksi\Repositories\ApproveTransaksiRepository;
use App\Modules\ApproveTransaksi\Requests\ApproveTransaksiCreateRequest;
use App\Modules\Permission\Repositories\PermissionRepository;
use Illuminate\Http\Request;

class ApproveTransaksiController extends Controller
{
    public function index(Request $request)
    {
        $permissions = PermissionRepository::getPermissionStatusOnMenuPath($request->path());
        return view('ApproveTransaksi::index', ['permissions' => $permissions]);
    }

    public function datatable(Request $request)
    {
        $per_page = $request->input('per_page') != null ? $request->input('per_page') : 15;
        $data = ApproveTransaksiRepository::datatable($per_page);
        return JsonResponseHandler::setResult($data)->send();
    }

    public function create()
    {
        return view('ApproveTransaksi::create');
    }

    public function store(ApproveTransaksiCreateRequest $request)
    {
        $payload = $request->all();
        $approve_transaksi = ApproveTransaksiRepository::create($payload);
        return JsonResponseHandler::setResult($approve_transaksi)->send();
    }

    public function show(Request $request, $id)
    {
        $approve_transaksi = ApproveTransaksiRepository::get($id);
        return JsonResponseHandler::setResult($approve_transaksi)->send();
    }

    public function edit($id)
    {
        return view('ApproveTransaksi::edit', ['approve_transaksi_id' => $id]);
    }

    public function update(Request $request, $id)
    {
        $payload = $request->all();
        unset($payload['created_at']);
        unset($payload['updated_at']);
        $approve_transaksi = ApproveTransaksiRepository::update($id, $payload);
        return JsonResponseHandler::setResult($approve_transaksi)->send();
    }

    public function destroy(Request $request, $id)
    {
        $delete = ApproveTransaksiRepository::delete($id);
        return JsonResponseHandler::setResult($delete)->send();
    }
}
