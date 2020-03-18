<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemesanan;

class PemesananController extends Controller
{
    public function __construct(){
        $this->relationship = ['murid', 'guru', 'murid.alamat', 'mataPelajaran', 'mataPelajaran.jenjang'];
    }

    public function index(){
        return Pemesanan::with($this->relationship)->get();
    }

    public function show($id){
        return Pemesanan::with($this->relationship)->find($id);
    }

    public function getPemesananByIdGuru($id){
        return Pemesanan::with($this->relationship)
        ->where([
            'id_guru' => $id
        ])->get();
    }

    public function getPemesananByIdMurid($id){
        return Pemesanan::with($this->relationship)
        ->where([
            'id_murid' => $id
        ])->get();
    }

    public function store(Request $r){

    }

    public function update(Request $r){

    }
}
