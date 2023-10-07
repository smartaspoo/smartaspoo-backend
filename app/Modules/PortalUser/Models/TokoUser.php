<?php

namespace App\Modules\PortalUser\Models;

use App\Modules\Portal\Model\UserDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TokoUser extends Model
{
    use SoftDeletes;
    protected $table = 'users_toko';
    protected $guarded = [];
    protected $appends = ['foto_readable'];

    public function detail(){
        return $this->hasOne(UserDetail::class,"user_id","user_id");
    }

    public function getFotoReadableAttribute(){
        if($this->foto == null){
            return url("/img/portal/produk.png");
        }else{
            return url($this->foto);
        }
    }
}