<?php

namespace App\Modules\PortalUser\Models;
    
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TokoUser extends Model
{
    use SoftDeletes;
    protected $table = 'users_toko';
    protected $guarded = [];
}