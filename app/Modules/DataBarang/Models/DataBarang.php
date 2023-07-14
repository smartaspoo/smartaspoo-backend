<?php

namespace App\Modules\DataBarang\Models;
    
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataBarang extends Model
{
    protected $table = 'barang';
    protected $guarded = [];
    protected $primaryKey = "kode_barang";
    public $incrementing = false;
    protected $fillable = ['kode_barang','nama_barang','harga_barang_jual','harga_barang_beli','stock_global','created_by_user_id','satuan_id'];
}