<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absen;

class AbsenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->relationship = ['jadwalAjar', 'pemesanan', 'pemesanan.murid', 'pemesanan.guru', 'pemesanan.mataPelajaran', 'pemesanan.mataPelajaran.jenjang'];
        $this->datetimeFormat = "Y-M-d H:i:s";
        date_default_timezone_set('Asia/Jakarta');
    }

    /**
     * Menampilkan Data Absensi
     */
    public function index()
    {
        $absen = Absen::with($this->relationship)
            ->join('pemesanan', 'pemesanan.id_pemesanan', 'absen.id_pemesanan')
            ->join('mata_pelajaran', 'mata_pelajaran.id_mapel', 'pemesanan.id_pemesanan')
            ->join('users as m', 'm.id', 'pemesanan.id_murid')
            ->join('users as g', 'g.id', 'pemesanan.id_murid')
            ->join('jenjang', 'jenjang.id_jenjang', 'mata_pelajaran.id_jenjang')
            ->select('absen.*')
            ->get();
        // dd($absen);

        return view('admin.absensi', compact('absen'));
    }

    public function getAbsen()
    {
        return Absen::with($this->relationship)
            ->get();
    }

    public function getAbsenById($id)
    {
        return Absen::with($this->relationship)
            ->find($id);
    }

    public function getAbsenByIdGuru($id)
    {
        return Absen::with($this->relationship)
            ->join('pemesanan', 'pemesanan.id_pemesanan', 'absen.id_pemesanan')
            ->where([
                'pemesanan.id_guru' => $id
            ])
            ->select('absen.*')
            ->orderBy('waktu_absen', 'desc')
            ->get();
    }

    public function getAbsenByIdMurid($id)
    {
        return Absen::with($this->relationship)
            ->join('pemesanan', 'pemesanan.id_pemesanan', 'absen.id_pemesanan')
            ->where([
                'pemesanan.id_murid' => $id
            ])
            ->select('absen.*')
            ->orderBy('waktu_absen', 'desc')
            ->get();
    }

    public function store(Request $r)
    {
        $absen = new Absen;
        $absen->id_pemesanan = $r->id_pemesanan;
        $absen->id_jadwal_ajar = $r->id_jadwal_ajar;
        $absen->waktu_absen = date($this->datetimeFormat);
        $absen->save();
    }
}
