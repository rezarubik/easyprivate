<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MataPelajaran;

class MataPelajaranController extends Controller
{
    public function __construct(){
        $this->relationship = ['jenjang']; 
    }

    public function index(){
        return MataPelajaran::with($this->relationship)->get();
    }

    public function show($id){
        return MataPelajaran::with($this->relationship)->find($id);
    }
}
