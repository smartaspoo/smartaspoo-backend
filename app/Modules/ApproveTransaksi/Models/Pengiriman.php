<?php

namespace App\Modules\ApproveTransaksi\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengiriman extends Model
{
    use SoftDeletes;
    protected $table = 'pengiriman';
    protected $guarded = [];

}