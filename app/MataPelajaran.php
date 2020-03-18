<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $table = 'mata_pelajaran';
    protected $primaryKey = 'id_mapel';
    public $timestamps = false;

    public function jenjang(){
        return $this->hasOne('App\Jenjang', 'id_jenjang', 'id_jenjang');
    }
}
