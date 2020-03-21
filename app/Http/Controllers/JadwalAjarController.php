<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JadwalAjar;

class JadwalAjarController extends Controller
{
    public function __construct()
    {
        $this->relationship = ['pemesanan'];
    }

    public function getJadwalAjarByIdGuru($id)
    {
        return JadwalAjar::with($this->relationship)
        ->join('pemesanan', 'pemesanan.id_pemesanan', 'jadwal_ajar.id_pemesanan')
        ->where([
            'pemesanan.id_guru' => $id
        ])
        ->select('jadwal_ajar.*')
        ->get();
    }
}
