<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamar';
    protected $primaryKey = 'id_kamar';
    public $timestamps = false; 

    public function typeKamar()
    {
        return $this->belongsTo('App\Models\TypeKamar', 'id_type_kamar');
    }
}
