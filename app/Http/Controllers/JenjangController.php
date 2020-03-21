<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenjang;

class JenjangController extends Controller
{
    public function getJenjang(){
        return Jenjang::get();
    }

    public function getJenjangById($id){
        return Jenjang::find($id);
    }
}
