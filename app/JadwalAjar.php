<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalAjar extends Model
{
    protected $table = 'jadwal_ajar';
    protected $primaryKey = 'id_jadwal_ajar';
    public $timestamps = false;

    public function pemesanan(){
        return $this->belongTo('App\Pemesanan', 'id_pemesanan', 'id_pemesanan');
    }
}
