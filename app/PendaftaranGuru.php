<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendaftaranGuru extends Model
{
    protected $table = 'pendaftaran_guru';
    protected $primaryKey = 'id_pendaftaran';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }

    public function season()
    {
        return $this->belongsTo('App\Season', 'id_season', 'id_season');
    }
    
    public function profileMatching()
    {
        return $this->hasOne('App\ProfileMatching', 'id_pendaftaran_guru', 'id_pendaftaran');
    }
}
