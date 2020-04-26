<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuruMapel extends Model
{
    protected $table = 'guru_mapel';
    protected $primaryKey = 'id_guru_mapel';
    public $timestamps = false;

    public function guru()
    {
        return $this->belongsTo('App\User', 'id', 'id_guru');
    }

    public function mataPelajaran()
    {
        return $this->hasOne('App\MataPelajaran', 'id_mata_pelajaran', 'id_mapel');
    }
}
