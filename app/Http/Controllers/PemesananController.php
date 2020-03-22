<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemesanan;

class PemesananController extends Controller
{
    //Note:
    //Status pemesanan:
    //0 => idle
    //1 => diterima
    //2 => ditolak
    //3 => berakhir

    public function __construct()
    {
        $this->relationship = ['murid', 'guru', 'murid.alamat', 'mataPelajaran', 'mataPelajaran.jenjang'];
        $this->datetimeFormat = "Y-M-d H:i:s";
        date_default_timezone_set('Asia/Jakarta');
    }

    /**
     * Menampilkan data pemesanan pada aplikasi admin
     */
    public function index()
    {
        return view('admin.pemesanan');
    }

    public function getPemesanan()
    {
        return Pemesanan::with($this->relationship)->get();
    }

    public function getPemesananById($id)
    {
        return Pemesanan::with($this->relationship)->find($id);
    }

    public function getPemesananByIdGuru($id)
    {
        return Pemesanan::with($this->relationship)
            ->where([
                'id_guru' => $id
            ])->get();
    }

    public function getPemesananByIdMurid($id)
    {
        return Pemesanan::with($this->relationship)
            ->where([
                'id_murid' => $id
            ])->get();
    }

    public function store(Request $r)
    {
        //Bagian ipeh
    }

    public function update(Request $r)
    {
        $pemesanan = Pemesanan::find($r->id_pemesanan);
        $pemesanan->status = $r->status;

        return $pemesanan;
    }
}
