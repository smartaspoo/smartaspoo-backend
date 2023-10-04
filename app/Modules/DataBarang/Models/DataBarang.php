<?php

namespace App\Modules\DataBarang\Models;

use App\Models\User;
use App\Modules\Satuan\Models\Satuan;
use App\Modules\User\Model\UserRoleModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class DataBarang extends Model
{
    use SoftDeletes;
    protected $table = 'barang';
    protected $guarded = [];

    protected $fillable = ['nama_barang','harga_supplier','harga_umum','diskon','keterangan','info_penting','stock_global','created_by_user_id','satuan_id'];
    protected $appends = ['harga_user','thumbnail_readable'];

    public function getThumbnailReadableAttribute(){
        if(isNull($this->thumbnail)){
            return url("/img/portal/produk.png");
        }
    }

    public function getHargaUserAttribute(){
        $user = Auth::user();
        if($user){
            $role = UserRoleModel::where('user_id',$user->id)->first();
            if($role == "2"){
                return $this->harga_umum;
            } else{
                return $this->harga_supplier;
            }
        }else{
            return $this->harga_umum;
        }
    }
    public function satuan(){
        return $this->hasOne(Satuan::class,"id","satuan_id");
    }
    public function user(){
        return $this->hasOne(User::class,"id","created_by_user_id");
    }
    public function foto(){
        return $this->hasMany(DataBarangFoto::class,"barang_id",'id');
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