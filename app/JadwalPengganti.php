<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalPengganti extends Model
{
    protected $table = 'jadwal_penggantis';
    protected $primaryKey = 'id_jadwal_pengganti';
    protected $fillable = ['id_pemesanan', 'id_jadwal_pemesanan', 'waktu_pengganti'];

    public function absen()
    {
        return $this->belongsTo('App\Absen', 'id_jadwal_pengganti', 'id_jadwal_pengganti');
    }
}
