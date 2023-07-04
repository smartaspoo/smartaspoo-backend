<?php

namespace App\Modules\DataBarang\Models;
    
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataBarang extends Model
{
    use SoftDeletes;
    protected $table = 'data_barang';
    protected $guarded = [];
}