<?php

namespace App\Modules\InputSCM\Models\Alamat;
    
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'regencies';
    protected $guarded = [];
    
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'province_id', 'id');
    }
}