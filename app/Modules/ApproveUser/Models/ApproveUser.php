<?php

namespace App\Modules\ApproveUser\Models;
    
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApproveUser extends Model
{
    use SoftDeletes;
    protected $table = 'users';
    protected $guarded = [];
}