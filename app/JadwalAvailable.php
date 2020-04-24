<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalAvailable extends Model
{
    protected $table = 'jadwal_available';
    protected $primaryKey = 'id_jadwal_available';
    public $timestamps = false;
}
