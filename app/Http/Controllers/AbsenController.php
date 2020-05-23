<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absen;

class AbsenController extends Controller
{
    public function __construct()
    {
        $this->relationship = [
            'jadwalPemesananPerminggu',
            'jadwalPemesananPerminggu.pemesanan',
            'jadwalPemesananPerminggu.pemesanan.murid',
            'jadwalPemesananPerminggu.pemesanan.guru',
            'jadwalPemesananPerminggu.pemesanan.mataPelajaran',
            'jadwalPemesananPerminggu.pemesanan.mataPelajaran.jenjang'
        ];
        $this->datetimeFormat = "Y-M-d H:i:s";
        date_default_timezone_set('Asia/Jakarta');
    }

    /**
     * Menampilkan Data Absensi
     */
    public function index()
    {
        $absen = Absen::with($this->relationship)->get();
        // dd($absen);
        return view('admin.absensi', compact('absen'));
    }

    public function getAbsen()
    {
        return Absen::with($this->relationship)
            // ->join('jadwal_pemesanan_perminggu as jpp', 'jpp.id_jadwal_pemesanan_perminggu', 'absen.id_jadwal_pemesanan_perminggu')
            // ->join('pemesanan as p', 'p.id_pemesanan', 'jpp.id_pemesanan')
            // ->join('users as guru', 'p.id_guru', 'guru.id')
            // ->join('users as murid', 'p.id_murid', 'murid.id')
            // ->where($where)
            // ->select('absen.*')
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
