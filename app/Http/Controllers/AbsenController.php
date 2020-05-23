<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absen;

class AbsenController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:admin');
        $this->relationship = ['jadwalPemesananPerminggu', 'jadwalPemesananPerminggu.pemesanan','jadwalPemesananPerminggu.pemesanan.murid', 'jadwalPemesananPerminggu.pemesanan.guru', 'jadwalPemesananPerminggu.pemesanan.mataPelajaran', 'jadwalPemesananPerminggu.pemesanan.mataPelajaran.jenjang'];
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

    public function getAbsenFiltered(Request $r)
    {
        $where = [];
        if(isset($r->id_absen)){
            $where['id_absen'] = $r->id_absen;
        }
        if(isset($r->id_pemesanan)){
            $where['p.id_pemesanan'] = $r->id_pemesanan;
        }
        if(isset($r->status)){
            $where['p.status'] = $r->status;
        }
        if(isset($r->id_jadwal_pemesanan_perminggu)){
            $where['jpp.id_jadwal_pemesanan_perminggu'] = $r->id_jadwal_pemesanan_perminggu;
        }
        if(isset($r->id_guru)){
            $where['guru.id'] = $r->id_guru;
        }
        if(isset($r->id_murid)){
            $where['murid.id'] = $r->id_murid;
        }

        return Absen::with($this->relationship)
            ->join('jadwal_pemesanan_perminggu as jpp', 'jpp.id_jadwal_pemesanan_perminggu', 'absen.id_jadwal_pemesanan_perminggu')
            ->join('pemesanan as p', 'p.id_pemesanan', 'jpp.id_pemesanan')
            ->join('user as guru', 'p.id_guru', 'guru.id')
            ->join('user as murid', 'p.id_murid', 'murid.id')
            ->where($where)
            ->select('absen.*')
            ->get();
        
    }

    public function store(Request $r)
    {
        $absen = new Absen;
        $absen->id_jadwal_pemesanan_perminggu = $r->id_jadwal_pemesanan_perminggu;
        $absen->waktu_absen = date($this->datetimeFormat);
        $absen->save();

        //Get pemesanan dengan id absen yang sama
        $pemesanan = Pemesanan::join('jadwal_pemesanan_perminggu as jpp', 'jpp.id_pemesanan', 'p.id_pemesanan')
            ->join('absen as a', 'a.id_jadwal_pemesanan_perminggu', 'jpp.id_jadwal_pemesanan_perminggu')
            ->where('a.id_absen', $absen->id_absen)->first();

        //Hitung jumlah absen dengan id pemesanan yang sama
        $countAbsen = $this->countAbsenByIdPemesanan($pemesanan->id_pemesanan);

        //Update jumlah pertemuan
        Pemesanan::where('id_pemesanan', $pemesanan->id_pemesanan)->update([
            'jumlah_pertemuan' => $countAbsen
        ]);
    }

    public function getAbsenByIdPemesanan($id)
    {
        return Absen::join('jadwal_pemesanan_perminggu as jpp', 'jpp.id_jadwal_pemesanan_perminggu', 'absen.id_jadwal_pemesanan_perminggu')
            ->join('pemesanan as p', 'p.id_pemesanan', 'jpp.id_pemesanan')
            ->where('p.id_pemesanan', $id)
            ->get();
    }

    public function countAbsenByIdPemesanan($id)
    {
        $absen = $this->getAbsenByIdPemesanan($id);
        $countAbsen = count($absen);
    }
}
