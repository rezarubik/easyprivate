<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absen;

class AbsenController extends Controller
{
    public function __construct(){
        $this->relationship = ['jadwalAjar', 'pemesanan'];
        $this->datetimeFormat = "Y-M-d H:i:s";
        date_default_timezone_set('Asia/Jakarta');
    }

    public function getAbsen(){
        return Absen::with($this->relationship)
        ->get();
    }

    public function getAbsenById($id){
        return Absen::with($this->relationship)
        ->find($id);
    }

    public function getAbsenByIdGuru($id){
        return Absen::with($this->relationship)
        ->join('pemesanan', 'pemesanan.id_pemesanan', 'absen.id_pemesanan')
        ->where([
            'pemesanan.id_guru' => $id
        ])
        ->select('absen.*')
        ->get();
    }

    public function getAbsenByIdMurid($id){
        return Absen::with($this->relationship)
        ->join('pemesanan', 'pemesanan.id_pemesanan', 'absen.id_pemesanan')
        ->where([
            'pemesanan.id_murid' => $id
        ])
        ->select('absen.*')
        ->get();
    }

    public function store(Request $r){
        $absen = new Absen;
        $absen->id_pemesanan = $r->id_pemesanan;
        $absen->id_jadwal_ajar = $r->id_jadwal_ajar;
        $absen->waktu_absen = date($this->datetimeFormat);
        $absen->save();
    }
}
