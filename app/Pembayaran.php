<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    public $timestamps = false;

    public function pemesanan(){
        return $this->belongsTo('App\Pemesanan', 'id_pemesanan', 'id_pemesanan');
    }

    public function rating(){
        return $this->hasOne('App\Rating', 'id_pembayaran', 'id_pembayaran');
    }
}
