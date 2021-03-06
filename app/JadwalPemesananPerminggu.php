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

    public function pemesanan()
    {
        return $this->belongsTo('App\Pemesanan','id_pemesanan','id_pemesanan');
    }

    public function absen()
    {
        return $this->belongsTo('App\Absen','id_jadwal_pemesanan_perminggu','id_jadwal_pemesanan_perminggu');
    }
    
}
