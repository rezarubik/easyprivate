<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbsenPembayaran extends Model
{
    protected $table = 'absen_pembayaran';
    
    public function murid()
    {
        return $this->hasOne('App\User', 'id', 'id_murid');
    }
    public function guru()
    {
        return $this->hasOne('App\User', 'id', 'id_guru');
    }
    public function pemesanan()
    {
        return $this->hasOne('App\Pemesanan', 'id_pemesanan', 'id_pemesanan');
    }
    public function pembayaran()
    {
        return $this->hasOne('App\Pembayaran', 'id_pembayaran', 'id_pembayaran');
    }
    
}

