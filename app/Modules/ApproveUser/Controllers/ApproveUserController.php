<?php

namespace App\Modules\ApproveUser\Controllers;

use App\Handler\JsonResponseHandler;
use App\Http\Controllers\Controller;
use App\Modules\ApproveUser\Repositories\ApproveUserRepository;
use App\Modules\ApproveUser\Requests\ApproveUserCreateRequest;
use App\Modules\Permission\Repositories\PermissionRepository;
use Illuminate\Http\Request;

class ApproveUserController extends Controller
{
    public function index(Request $request)
    {
        $permissions = PermissionRepository::getPermissionStatusOnMenuPath($request->path());
        return view('ApproveUser::index', ['permissions' => $permissions]);
    }

    public function datatable(Request $request)
    {
        $per_page = $request->input('per_page') != null ? $request->input('per_page') : 15;
        $data = ApproveUserRepository::datatable($per_page);
        return JsonResponseHandler::setResult($data)->send();
    }

    public function create()
    {
        return view('ApproveUser::create');
    }

    public function store(ApproveUserCreateRequest $request)
    {
        $payload = $request->all();
        $approve_user = ApproveUserRepository::create($payload);
        return JsonResponseHandler::setResult($approve_user)->send();
    }

    public function show(Request $request, $id)
    {
        $approve_user = ApproveUserRepository::get($id);
        return JsonResponseHandler::setResult($approve_user)->send();
    }

    public function edit($id)
    {
        return view('ApproveUser::edit', ['approve_user_id' => $id]);
    }

    public function update(Request $request, $id)
    {
        $payload = $request->all();
        unset($payload['created_at']);
        unset($payload['updated_at']);
        $approve_user = ApproveUserRepository::update($id, $payload);
        return JsonResponseHandler::setResult($approve_user)->send();
    }

    public function destroy(Request $request, $id)
    {
        $delete = ApproveUserRepository::delete($id);
        return JsonResponseHandler::setResult($delete)->send();
    }
}
