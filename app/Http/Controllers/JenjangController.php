<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenjang;

class JenjangController extends Controller
{
    public function index(){
        return Jenjang::get();
    }

    public function show($id){
        return Jenjang::find($id);
    }
}
