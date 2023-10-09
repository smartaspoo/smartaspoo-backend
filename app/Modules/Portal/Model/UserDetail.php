<?php

namespace App\Modules\Portal\Model;

use App\Models\User;
use App\Modules\InputSCM\Models\Alamat\Kota;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\URL;

class UserDetail extends Model
{
    protected $table = 'user_details';
    protected $guarded = [];
    protected $appends = ['foto_readable'];

    public function getFotoReadableAttribute(){
        if($this->foto == null){
            return URL::asset('/img/portal/user-icon.png');
        }else{
            return url("storage/".$this->foto);

        }
    }
    public function userDetails()
    {
        return $this->hasOne(UserDetail::class, 'user_id');
    }
    public function userMaster(){
        return $this->belongsTo(User::class,"user_id");
    }
    public function kotaModel(){
        return $this->hasOne(Kota::class, 'id','kota');
    }
}