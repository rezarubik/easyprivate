<?php

namespace App\Http\Controllers;

use App\JadwalPemesananPerminggu;
use App\JadwalAvailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Pemesanan;
use Carbon\Carbon;

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
        $this->relationship = ['murid', 'guru', 'murid.alamat','guru.alamat', 'mataPelajaran', 'mataPelajaran.jenjang', 'jadwalPemesananPerminggu', 'jadwalPemesananPerminggu.jadwalAvailable'];
        $this->relationshipPemesanan=['murid', 'guru', 'murid.alamat','guru.alamat', 'mataPelajaran', 'mataPelajaran.jenjang', 'jadwalPemesananPerminggu', 'jadwalPemesananPerminggu.jadwalAvailable','guru.pendaftaranGuru','guru.guruMapel','guru.guruMapel.mataPelajaran','guru.guruMapel.mataPelajaran.jenjang'];
        $this->datetimeFormat = "Y-m-d H:i:s";
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

    //Get semua pemesanan
    public function getPemesanan()
    {
        //With untuk get relationship
        return Pemesanan::with($this->relationship)->get();
        // return Pemesanan::get();
    }

    public function getPemesananById($id)
    {
        return Pemesanan::with($this->relationshipPemesanan)->find($id);
        // return Pemesanan::with($this->relationship)->where(['id_pemesanan'=>$id])->first();

        //->where(['id' => $id]);
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

    public function getPemesananFiltered(Request $r)
    {
        $where = [];

        // if($r->id_pemesanan != null && $r->id_pemesanan != ''){

        // }
        if (isset($r->id_pemesanan)) {
            $where['id_pemesanan'] = $r->id_pemesanan;
        }

        if (isset($r->id_guru)) {
            $where['id_guru'] = $r->id_guru;
        }

        if (isset($r->id_murid)) {
            $where['id_murid'] = $r->id_murid;
        }

        if (isset($r->status)) {
            $where['status'] = $r->status;
        }

        return Pemesanan::with($this->relationship)
            ->where($where)
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

    public function createPemesanan(Request $r)
    {
        $pemesanan = new Pemesanan();
        $pemesanan->id_guru = $r->id_guru;
        $pemesanan->id_murid = $r->id_murid;
        $pemesanan->id_mapel = $r->id_mapel;
        $pemesanan->kelas = $r->kelas;
        $pemesanan->waktu_pemesanan = date_format(Carbon::now(), $this->datetimeFormat);
        $pemesanan->first_meet = $r->first_meet;   
        $pemesanan->status = 0;
        $pemesanan->save();
        $id_pemesanan = $pemesanan->id_pemesanan;


        $idAvailable = [];
        $idAvailable = $r->id_jadwal_available;

        foreach($idAvailable as $idSatuan){
            $jpp = new JadwalPemesananPerminggu();
            $jpp->id_pemesanan = $id_pemesanan;
            $jpp->id_jadwal_available = $idSatuan;

            $jpp->save();
        }
        return Pemesanan::with($this->relationship)->find($pemesanan->id_pemesanan); 
    }

    public function update(Request $r)
    {
        $pemesanan = Pemesanan::find($r->id_pemesanan);
        $pemesanan->status = $r->status;
        $pemesanan->save();

        //Mengambil jadwalpemesananperminggu
        $jpp = JadwalPemesananPerminggu::where([
            'id_pemesanan' => $r->id_pemesanan
        ])->get();

        $idJa = [];
        foreach($jpp as $j){
            array_push($idJa, $j->id_jadwal_available);
        }

        //Jika pemesanan diterima
        if($pemesanan->status == 1){
            //Menyelesaikan konflik pemesanan yang ada
            $this->solveConflictedPemesanan($r->id_pemesanan);

            //Input yang diperlukan pada API jadwalAvailable/update
            $data = [
                'id_available' => null,
                'id_terisi' => $idJa
            ];

            $this->updateJadwalAvailable($data);

        }else if($pemesanan->status == 3){
            //Input yang diperlukan pada API jadwalAvailable/update
            $data = [
                'id_available' => $idJa,
                'id_terisi' => null
            ];

            $this->updateJadwalAvailable($data);
        }

        return $pemesanan;
    }

    public function updateJadwalAvailable($data)
    {
        // dd($r);
        
        if(isset($data['id_available'])){
            $idAvailable = $data['id_available'];

            $jadwalAvailable = JadwalAvailable::whereIn('id_jadwal_available', $idAvailable)
                ->where('available', '!=', '0')
                ->update([
                    'available' => 1
                ]);
                // ->get();
        }

        if(isset($data['id_terisi'])){
            $idTerisi = $data['id_terisi'];
            $jadwalTerisi = JadwalAvailable::whereIn('id_jadwal_available', $idTerisi)
                ->update([
                    'available' => 2
                ]);
                // ->get();
        }
    }

    public function cariGuru(Request $r)
    {
    }

    public function getConflictedPemesanan($id){
        $pemesanan = $this->getPemesananById($id);

        //memasukkan masing masing id_jadwal_available ke dalam array
        $idja = [];
        foreach($pemesanan->jadwalPemesananPerminggu as $jpp){
            array_push($idja, $jpp->jadwalAvailable->id_jadwal_available);
        }

        //id_pemesanan
        $idguru = $pemesanan->id_guru;
        $idpem = $pemesanan->id_pemesanan;

        $conflictedPemesanan = Pemesanan::with($this->relationship)
            ->join('jadwal_pemesanan_perminggu as jpp', 'jpp.id_pemesanan', 'pemesanan.id_pemesanan')
            ->join('jadwal_available as ja', 'ja.id_jadwal_available', 'jpp.id_jadwal_available')
            ->whereIn('ja.id_jadwal_available', $idja)
            ->whereIn('pemesanan.status', [0, 1])
            ->where('pemesanan.id_guru', $idguru)
            ->where('pemesanan.id_pemesanan', '<>', $idpem)
            ->select('pemesanan.*')
            ->get();

        return $conflictedPemesanan;
    }

    public function getCountOfConflictedPemesanan($id)
    {
        $conflictedPemesanan = $this->getConflictedPemesanan($id);
        $count = count($conflictedPemesanan);

        return $count;
    }

    public function solveConflictedPemesanan($id)
    {
        $conflictedPemesanan = $this->getConflictedPemesanan($id);

        $idConflictedPemesanan = [];
        foreach($conflictedPemesanan as $cp){
            array_push($idConflictedPemesanan, $cp->id_pemesanan);
        }

        Pemesanan::whereIn('id_pemesanan', $idConflictedPemesanan)
            ->where('status', 0)
            ->update([
                'status' => 2
            ]);
    }
    
}
