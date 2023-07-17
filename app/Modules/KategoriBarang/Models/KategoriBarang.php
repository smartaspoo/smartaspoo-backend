<?php

namespace App\Modules\KategoriBarang\Models;
    
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriBarang extends Model
{
    protected $table = 'kategori_barang';
    protected $guarded = [];
}