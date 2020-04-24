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
        $pemesanan = Pemesanan::with($this->relationship)
            ->join('users as m', 'm.id', 'pemesanan.id_murid')
            ->join('users as g', 'g.id', 'pemesanan.id_guru')
            ->join('mata_pelajaran', 'mata_pelajaran.id_mapel', 'pemesanan.id_mapel')
            ->where('pemesanan.id_murid', '!=', '')
            ->where('pemesanan.id_guru', '!=', '')
            ->where('pemesanan.id_mapel', '!=', '')
            ->select('pemesanan.*')
            ->get();
        // dd($pemesanan);
        return view('admin.pemesanan', compact('pemesanan'));
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
            ])
            ->orderBy('status')
            ->orderBy('waktu_pemesanan', 'desc')
            ->get();
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
        $pemesanan->save();

        return $pemesanan;
    }
    
    public function cariGuru(Request $r)
    {
        
        
    }
}
