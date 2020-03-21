<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;

class PembayaranController extends Controller
{
    public function __construct()
    {
        $this->relationship = ['pemesanan'];
    }

    public function getPembayaran()
    {
        return Pembayaran::all();
    }

    public function getPembayaranByIdGuru($id)
    {
        return Pembayaran::with($this->relationship)
        ->join('pemesanan', 'pemesanan.id_pemesanan', 'pembayaran.id_pemesanan')
        ->where([
            'pemesanan.id_guru' => $id
        ])
        ->get();
    }

    public function getPembayaranByIdMurid($id)
    {
        return Pembayaran::with($this->relationship)
        ->join('pemesanan', 'pemesanan.id_pemesanan', 'pembayaran.id_pemesanan')
        ->where([
            'pemesanan.id_murid' => $id
        ])
        ->get();
    }
}
