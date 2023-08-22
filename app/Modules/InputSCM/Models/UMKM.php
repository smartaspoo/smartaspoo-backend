<?php

namespace App\Modules\InputSCM\Models;
    
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UMKM extends Model
{
    use SoftDeletes;
    protected $table = 'scm_umkm';
    protected $guarded = [];
}