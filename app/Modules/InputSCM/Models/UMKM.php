<?php

namespace App\Modules\InputSCM\Models;
    
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UMKM extends Model
{
    use SoftDeletes;
    protected $primaryKey = "id_umkm";
    protected $table = 'scm_umkm';
    protected $guarded = [];
    protected $appends = ['id'];
    public function getIdAttribute(){
        return $this->id_umkm;
    }
}