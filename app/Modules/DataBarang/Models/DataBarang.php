<?php

namespace App\Modules\DataBarang\Models;

use App\Models\User;
use App\Modules\Satuan\Models\Satuan;
use App\Modules\User\Model\UserRoleModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataBarang extends Model
{
    use SoftDeletes;
    protected $table = 'barang';
    protected $guarded = [];

    protected $appends = ['harga_user'];
    protected $fillable = ['nama_barang','harga_supplier','harga_umum','diskon','keterangan','info_penting','stock_global','created_by_user_id','satuan_id'];
 
    public function satuan(){
        return $this->hasOne(Satuan::class,"id","satuan_id");
    }
    public function user(){
        return $this->hasOne(User::class,"id","created_by_user_id");
    }
    public function foto(){
        return $this->hasMany(DataBarangFoto::class,"barang_id",'id');
    }
    public function getHargaUserAttribute(){
        return 50000;
    }
    public static function getHargaBarang($user, $barang){
        $role = UserRoleModel::where('user_id',$user->id)->first();
        if($role == "2"){
            return $barang->harga_umum;
        } else{
            return $barang->harga_supplier;
        }
    }

    
}