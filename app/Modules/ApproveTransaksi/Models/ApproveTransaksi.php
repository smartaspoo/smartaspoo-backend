<?php

namespace App\Modules\ApproveTransaksi\Models;
    
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApproveTransaksi extends Model
{
    use SoftDeletes;
    protected $table = 'approve_transaksi';
    protected $guarded = [];
}