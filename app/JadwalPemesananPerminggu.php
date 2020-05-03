<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalPemesananPerminggu extends Model
{
    protected $table = 'jadwal_pemesanan_perminggu';
    protected $primaryKey = 'id_jadwal_pemesanan_perminggu';
    public $timestamps = false;

    public function jadwalAvailable()
    {
        return $this->hasOne('App\JadwalAvailable','id_jadwal_available','id_jadwal_available');
    }
}
