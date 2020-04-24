<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendaftaranGuru extends Model
{
    protected $table = 'pendaftaran_guru';
    protected $primaryKey = 'id_pendaftaran';
    public $timestamps = true;

    public function microteaching()
    {
        return $this->hasOne('App\Microteaching', 'id_pendaftaran', 'id_pendaftaran');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
}
