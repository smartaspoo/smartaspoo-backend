<?php

namespace App\Modules\TransaksiBarang\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiBarang extends Model
{
    use SoftDeletes;
    protected $table = 'transaksi';
    protected $guarded = [];
    
    public function dataChildren(){
        return $this->hasMany(TransaksiBarangChildren::class,"transaksi_id");
    }
    public function pembeli(){
        return $this->hasOne(User::class,"id","user_id");
    }
    public function penjual(){
        return $this->hasOne(User::class,"id","toko_id");
    }
}