<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'provide_name', 'provider_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function alamat(){
        return $this->hasMany('App\Alamat', 'id_user', 'id');
    }

    public function pendaftaranGuru(){
        return $this->hasMany('App\PendaftaranGuru', 'id_user', 'id');
    }

    public function guruMapel(){
        return $this->hasMany('App\GuruMapel', 'id_guru', 'id');
    }
}
