<?php

namespace App\Modules\Komposisi\Models;
    
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Komposisi extends Model
{
    use SoftDeletes;
    protected $table = 'komposisi';
    protected $guarded = [];
}