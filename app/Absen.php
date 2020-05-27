<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $table = 'absen';
    protected $primaryKey = 'id_absen';
    public $timestamps = false;

    public function jadwalPemesananPerminggu(){
        return $this->hasOne('App\JadwalPemesananPerminggu', 'id_jadwal_pemesanan_perminggu', 'id_jadwal_pemesanan_perminggu');
    }
}
