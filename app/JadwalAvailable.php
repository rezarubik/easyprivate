<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalAvailable extends Model
{
    protected $table = 'jadwal_available';
    protected $primaryKey = 'id_jadwal_available';
    public $timestamps = false;

    public function jadwalPemesananPerminggu(){
        return $this->belongsTo('App\JadwalPemesananPerminggu', 'id_jadwal_available', 'id_jadwal_available');
    }
}
