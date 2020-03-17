<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemesanan;

class PemesananController extends Controller
{
    public function __construct(){
        $this->relationship = ['murid', 'guru', 'mataPelajaran', 'mataPelajaran.jenjang'];
    }

    public function index(){
        return Pemesanan::with($this->relationship)->get();
    }

    public function show($id){
        return Pemesanan::with($this->relationship)->find($id);
    }

    public function store(Request $r){

    }

    public function update(Request $r){

    }
}
