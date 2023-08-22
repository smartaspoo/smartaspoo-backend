<?php

namespace App\Modules\InputSCM\Models;
    
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BarangSCM extends Model
{
    use SoftDeletes;
    protected $table = 'scm_barang';
    protected $guarded = [];
}