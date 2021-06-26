<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    protected $table = 'pengunjung';
    protected $primaryKey = 'id_pengunjung';
    public $timestamps = false; 
}
