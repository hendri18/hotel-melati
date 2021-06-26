<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    public $timestamps = false; 

    public function pengunjung()
    {
        return $this->belongsTo('App\Models\Pengunjung', 'id_pengunjung');
    }

    public function kamar()
    {
        return $this->belongsTo('App\Models\Kamar', 'id_kamar');
    }
}
