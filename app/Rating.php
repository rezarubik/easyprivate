<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'rating';
    protected $primaryKey = 'id_rating';
    public $timestamps = false;

    public function pembayaran(){
        return $this->belongsTo('App\Pembayaran', 'id_pembayaran', 'id_pembayaran');
    }
}
