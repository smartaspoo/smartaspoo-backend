<?php

namespace App\Modules\InputSCM\Repositories;

use App\Modules\InputSCM\Models\InputSCM;

class InputSCMRepository
{
    public static function datatable($per_page = 15)
    {
        $data = InputSCM::paginate($per_page);
        return $data;
    }
    public static function get($input_scm_id)
    {
        $input_scm = InputSCM::where('id', $input_scm_id)->first();
        return $input_scm;
    }
    public static function create($input_scm)
    {
        $input_scm = InputSCM::create($input_scm);
        return $input_scm;
    }

    public static function update($input_scm_id, $input_scm)
    {
        InputSCM::where('id', $input_scm_id)->update($input_scm);
        $input_scm = InputSCM::where('id', $input_scm_id)->first();
        return $input_scm;
    }

    public static function delete($input_scm_id)
    {
        $delete = InputSCM::where('id', $input_scm_id)->delete();
        return $delete;
    }
}
