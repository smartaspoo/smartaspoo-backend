<?php

namespace App\Modules\DataBarang\Models;

use App\Models\User;
use App\Modules\Satuan\Models\Satuan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataBarang extends Model
{
    protected $table = 'barang';
    protected $guarded = [];
    protected $primaryKey = "kode_barang";
    public $incrementing = false;
    protected $fillable = ['kode_barang','nama_barang','harga_barang_jual','harga_barang_beli','stock_global','created_by_user_id','satuan_id'];
    protected $appends = ['id'];

    public function getIdAttribute(){
        return $this->kode_barang;
    }
    public function satuan(){
        return $this->hasOne(Satuan::class,"id","satuan_id");
    }
    public function user(){
        return $this->hasOne(User::class,"id","created_by_user_id");
    }

    
}