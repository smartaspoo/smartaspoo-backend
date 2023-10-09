<?php

namespace App\Modules\ApproveTransaksi\Models;

use App\Models\User;
use App\Modules\TransaksiBarang\Models\TransaksiBarangChildren;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengiriman extends Model
{
    use SoftDeletes;
    protected $table = 'pengiriman';
    protected $guarded = [];

    public function barangchildren(){
        return $this->belongsTo(TransaksiBarangChildren::class,"transaksi_id","id");
    }
}