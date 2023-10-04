<?php

namespace App\Modules\Portal\Model;
    
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDetail extends Model
{
    protected $table = 'user_details';
    protected $guarded = [];
}