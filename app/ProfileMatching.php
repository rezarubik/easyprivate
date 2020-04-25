<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileMatching extends Model
{
    protected $table = 'profile_matching';
    protected $primaryKey = 'id_profile_matching';
    public $timestamps = false;
}
