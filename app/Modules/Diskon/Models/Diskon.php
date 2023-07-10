<?php

namespace App\Modules\Diskon\Models;
    
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diskon extends Model
{
    use SoftDeletes;
    protected $table = 'diskon';
    protected $primaryKey = "kode_diskon";
    public $incrementing = false;
    protected $fillable = ['jumlah',"nama"];
    protected $guarded = [];
}