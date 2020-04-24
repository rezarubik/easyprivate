<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JadwalAjar;

class JadwalAjarController extends Controller
{
    public function __construct()
    {
        $this->relationship = ['pemesanan', 'pemesanan.murid', 'pemesanan.murid.alamat', 'pemesanan.guru', 'pemesanan.mataPelajaran', 'pemesanan.mataPelajaran.jenjang'];
    }

    public function getJadwalAjarByIdGuru($id)
    {
        return JadwalAjar::with($this->relationship)
        ->join('pemesanan', 'pemesanan.id_pemesanan', 'jadwal_ajar.id_pemesanan')
        ->where([
            'pemesanan.id_guru' => $id
        ])
        ->orderBy('jadwal_ajar.waktu_ajar', 'desc')
        ->select('jadwal_ajar.*')
        ->get();
    }

    public function getJadwalAjarById($id)
    {
        return JadwalAjar::with($this->relationship)->find($id);
    }
}
