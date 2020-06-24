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
    public function storeDetailPembayaran(Request $r)
    {
        //Untuk memasukkan data ke dalam database easy private
        $pembayaran = new Pembayaran();
        $pembayaran->id_transaksi = $r->id_transaksi;
        $pembayaran->status = $r->status;
        $pembayaran->jumlah_bayar = $r->jumlah_bayar;
        $pembayaran->tanggal_bayar = $r->tanggal_bayar;
        $pembayaran->periode_bulan = $r->periode_bulan;
        $pembayaran->periode_tahun = $r->periode_tahun;
        $pembayaran->redirect_url = $r->redirect_url;
        $pembayaran->save();
    }
}
