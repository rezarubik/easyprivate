<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';
    public $timestamps = false;

    /**
     * Menampilkan Data Pemesanan
     */
    public function index()
    {
        return view('admin.pemesanan');
    }

    public function murid()
    {
        return $this->hasOne('App\User', 'id', 'id_murid');
    }

    public function guru()
    {
        return $this->hasOne('App\User', 'id', 'id_guru');
    }

    public function mataPelajaran()
    {
        return $this->hasOne('App\MataPelajaran', 'id_mapel', 'id_mapel');
    }

    public function jadwalPemesananPerminggu()
    {
        return $this->hasMany('App\JadwalPemesananPerminggu', 'id_pemesanan', 'id_pemesanan');
    }
}
