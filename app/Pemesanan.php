<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';
    public $timestamps = false;

    public function murid(){
        return $this->hasOne('App\User', 'id', 'id_murid');
    }

    public function guru(){
        return $this->hasOne('App\User', 'id', 'id_guru');
    }

    public function mataPelajaran(){
        return $this->hasOne('App\MataPelajaran', 'id_mapel', 'id_mapel');
    }
}
