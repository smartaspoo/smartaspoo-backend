<?php

namespace App\Modules\TransaksiBarang\Models;
    
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
}