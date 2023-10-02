<?php

namespace App\Modules\ApproveUser\Repositories;

use App\Modules\ApproveUser\Models\ApproveUser;

class ApproveUserRepository
{
    public static function datatable($per_page = 15)
    {
        $data = ApproveUser::where("email_verifier_id",null)->paginate($per_page);
        return $data;
    }
    public static function get($approve_user_id)
    {
        $approve_user = ApproveUser::where('id', $approve_user_id)->first();
        return $approve_user;
    }
    public static function create($approve_user)
    {
        $approve_user = ApproveUser::create($approve_user);
        return $approve_user;
    }

    public static function update($approve_user_id, $approve_user)
    {
        ApproveUser::where('id', $approve_user_id)->update($approve_user);
        $approve_user = ApproveUser::where('id', $approve_user_id)->first();
        return $approve_user;
    }

    public static function delete($approve_user_id)
    {
        $delete = ApproveUser::where('id', $approve_user_id)->delete();
        return $delete;
    }
}
