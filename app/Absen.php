<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $table = 'absen';
    protected $primaryKey = 'id_absen';
    public $timestamps = false;

    public function pemesanan(){
        return $this->belongsTo('App\Pemesanan', 'id_pemesanan', 'id_pemesanan');
    }

    public function jadwalAjar(){
        return $this->hasOne('App\JadwalAjar', 'id_jadwal_ajar', 'id_jadwal_ajar');
    }
}
