<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalPengganti extends Model
{
    protected $primaryKey = 'id_jadwal_pengganti';
    protected $fillable = ['id_pemesanan', 'id_jadwal_pemesanan', 'waktu_pengganti'];
}
