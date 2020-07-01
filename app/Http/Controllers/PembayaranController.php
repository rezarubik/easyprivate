<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use App\Absen;

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

    public function getPembayaranFiltered(Request $r)
    {
        $where = [];
        if(isset($r->id_pembayaran)){
            $where['id_pembayaran'] = $r->id_pembayaran;
        }
        if(isset($r->id_user)){
            $where['id_user'] = $r->id_user;
        }
        if(isset($r->status)){
            $where['status'] = $r->status;
        }
        if(isset($r->periode_bulan)){
            $where['periode_bulan'] = $r->periode_bulan;
        }
        if(isset($r->periode_tahun)){
            $where['periode_tahun'] = $r->periode_tahun;
        }
        return Pembayaran::where($where)->get();
    }
    public function storeDetailPembayaran(Request $r)
    {
        //Untuk memasukkan data ke dalam database easy private
        $pembayaran = new Pembayaran();
        $pembayaran->id_transaksi = $r->id_transaksi;
        $pembayaran->id_user = $r->id_user;
        $pembayaran->id_order = $r->id_order;
        $pembayaran->status = $r->status;
        $pembayaran->jumlah_bayar = $r->jumlah_bayar;
        $pembayaran->tanggal_bayar = $r->tanggal_bayar;
        $pembayaran->periode_bulan = $r->periode_bulan;
        $pembayaran->periode_tahun = $r->periode_tahun;
        $pembayaran->redirect_url = $r->redirect_url;
        $pembayaran->save();
        $absen = Absen::join('pemesanan', 'pemesanan.id_pemesanan', 'absen.id_pemesanan')->whereRaw('pemesanan.id_murid =' . $r->id_user . ' AND extract(MONTH from absen.waktu_absen) =' . $r->periode_bulan . ' AND extract(Year from absen.waktu_absen)=' . $r->periode_tahun)->get();
        $absenUser = [];
        foreach ($absen as $key => $value) {
            array_push(
                $absenUser,
                $value->id_absen
            );
        }
        if (sizeof($absenUser) > 0) {
            Absen::whereIn('id_absen', $absenUser)->update([
                'absen.id_pembayaran' => $pembayaran->id_pembayaran
            ]);
        }
    }
}
