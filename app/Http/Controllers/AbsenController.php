<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absen;
use Carbon\Carbon;

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
        $absenValidity = $this->verifyAbsen($r->id_pemesanan);

        if($absenValidity==1){
            $absen = new Absen;
            $absen->id_pemesanan = $r->id_pemesanan;
    
            if(isset($r->id_jadwal_pemesanan_perminggu)){
                $absen->id_jadwal_pemesanan_perminggu = $r->id_jadwal_pemesanan_perminggu;
            }
    
            $absen->waktu_absen = date($this->datetimeFormat);
            $absen->save();
    
            // return Absen::with($this->relationship)->where('id_absen', $absen->id_absen)->first();
        }
        return $absenValidity;
    }

    public function verifyAbsen($id_pemesanan)
    {
        $absen = Absen::where('id_pemesanan', $id_pemesanan)->orderBy('waktu_absen', 'desc')->first();
        if(!isset($absen)){
            return 0;
        }
        $currDateTime = Carbon::now();

        $currYear = $currDateTime->year;
        $currMonth = $currDateTime->month;
        $currDay = $currDateTime->day;

        $now = [];
        array_push($now, $currYear);
        array_push($now, $currMonth);
        array_push($now, $currDay);

        $absenDateTime = Carbon::parse($absen->waktu_absen);
        $absenYear = $absenDateTime->year;
        $absenMonth = $absenDateTime->month;
        $absenDay = $absenDateTime->day;

        $waktuAbsen = [];
        array_push($waktuAbsen, $absenYear);
        array_push($waktuAbsen, $absenMonth);
        array_push($waktuAbsen, $absenDay);

        // dd([$now, $waktuAbsen]);

        for($i = 0; $i < count($waktuAbsen); $i++){
            if($now[$i] != $waktuAbsen[$i]){
                return 1;
            }
        }
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
            ->join('users as guru', 'p.id_guru', 'guru.id')
            ->join('users as murid', 'p.id_murid', 'murid.id')
            ->where($where)
            ->select('absen.*')
            ->get();
    }
}
