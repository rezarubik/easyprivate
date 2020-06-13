<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KriteriaBobotTarget extends Model
{
    protected $primaryKey = 'id_kriteria_bobot_target';
    protected $fillable = ['kriteria', 'bobot', 'faktor_kriteria', 'nilai_target'];
    public $timestamps = false;
}
