<?php

namespace App\Http\Controllers;

use App\GrafikPemesanan;
use App\User;
use App\Pemesanan;
use App\PendaftaranGuru;
use App\GuruMapel;
use App\Absen;
use App\Alamat;
use App\Jenjang;
use App\MataPelajaran;
use App\ProfileMatching;
use App\JadwalAvailable;
use App\KriteriaBobotTarget;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->relationshipGuru = ['alamat'];
        $this->relationshipMurid = ['alamat'];
        $this->relationshipCariGuru = ['alamat', 'guruMapel.mataPelajaran', 'guruMapel.mataPelajaran.jenjang', 'guruMapel'];
        $this->relationshipPendaftaranGuru = ['user', 'season', 'profileMatching'];
        $this->realationshipGuruMapel = ['mataPelajaran', 'mataPelajaran.jenjang'];
        // todo pemesanan
        $this->relationship = ['murid', 'guru', 'murid.alamat', 'mataPelajaran', 'mataPelajaran.jenjang', 'jadwalPemesananPerminggu', 'jadwalPemesananPerminggu.jadwalAvailable'];
        // todo absensi
        $this->relationship = [
            'jadwalPemesananPerminggu',
            'jadwalPemesananPerminggu.pemesanan',
            'jadwalPemesananPerminggu.pemesanan.murid',
            'jadwalPemesananPerminggu.pemesanan.guru',
            'jadwalPemesananPerminggu.pemesanan.mataPelajaran',
            'jadwalPemesananPerminggu.pemesanan.mataPelajaran.jenjang'
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('hai');
        // $pemesanan = $this->pemesananPerJenjang();
        // $grafikPemesanan = GrafikPemesanan::all();
        // $grafikPemesanan = DB::table('grafikpemesanan')->get();
        // dd($grafikPemesanan);
        return view('admin.admin_dashboard');
    }

       /**
     * Menampilkan data pemesanan pada aplikasi admin
     */
    public function indexPemesanan()
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

    /**
     * Menampilkan Data Absensi
     */
    public function indexAbsensi()
    {
        $absen = Absen::with($this->relationship)->get();
        // dd($absen);
        return view('admin.absensi', compact('absen'));
    }

    /**
     * Function untuk ngeget pemesanan per jenjang
     */
    public function pemesananPerJenjang()
    {
        $pemesanan = Pemesanan::select(
            DB::raw('count(*) as `data_pemesanan`'),
            'jenjang.nama_jenjang',
            DB::raw('YEAR(waktu_pemesanan) year, MONTHNAME(waktu_pemesanan) month')
        )
            ->join('mata_pelajaran', 'mata_pelajaran.id_mapel', 'pemesanan.id_mapel')
            ->join('jenjang', 'mata_pelajaran.id_jenjang', 'jenjang.id_jenjang')
            ->groupby('year', 'month', 'jenjang.nama_jenjang')
            ->orderByRaw('month DESC')
            ->get();
        return response()->json($pemesanan);
    }

    /**
     * Display a listing of Data Guru
     */
    public function usersGuru()
    {
        return view('admin.users_guru');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Menampilkan Data Guru Pada Halaman Admin
     */
    public function dataGuru()
    {
        // dd('hai');
        $pendaftaranGuru = PendaftaranGuru::with(['user'])
            ->join('users', 'users.id', 'pendaftaran_guru.id_user')
            ->select('pendaftaran_guru.*')
            ->where('users.id', '!=', '')
            ->get();
        // $pendaftaranGuru = PendaftaranGuru::with(['user'])->where('id_user', '!=', null)->get();
        $guruMapel = GuruMapel::with('mataPelajaran')->get();
        // dd($pendaftaranGuru);
        // dd($guruMapel);
        return view('admin.users_guru', compact('pendaftaranGuru', 'guruMapel'));
    }
    /**
     * Menampilkan Data Murid Pada Halaman Admin
     */
    public function dataMurid()
    {
        $user = User::where('role', 1)->with($this->relationshipMurid)->get();
        // $user = Alamat::all();
        // dd($user);
        return view('admin.users_murid', compact('user'));
    }
    /**
     * Menampilkan Data Nilai GAP
     */
    public function nilaiGAP()
    {
        $pendaftaranGuru = PendaftaranGuru::with($this->relationshipPendaftaranGuru)->get();
        return view('admin.nilai_gap', compact('pendaftaranGuru'));
    }
     /**
     * Data Pembobotan Nilai GAP
     */
    public function pembobotanNilaiGAP()
    {
        $pendaftaranGuru = PendaftaranGuru::with($this->relationshipPendaftaranGuru)->get();
        return view('admin.pembobotan_nilai_gap', compact('pendaftaranGuru'));
    }
      /**
     * Data Hasil Seleksi
     */
    public function hasilSeleksi()
    {
        $pendaftaranGuru = PendaftaranGuru::with($this->relationshipPendaftaranGuru)->get();
        return view('admin.hasil_seleksi', compact('pendaftaranGuru'));
    }
    /**
     * Data Video Microteaching
     */
    public function videoMicroteaching()
    {
        $pendaftaranGuru = PendaftaranGuru::with($this->relationshipPendaftaranGuru)->get();
        // dd($pendaftaranGuru);
        return view('admin.video_microteaching', compact('pendaftaranGuru'));
    }
    public function scoreVideoMicroteaching(Request $request)
    {
        $data = [
            'pm_vas' => $request->vas,
            'pm_kk' => $request->kk,
            'pm_cm' => $request->cm,
            'pm_pemat' => $request->pemat
        ];
        $profileMatching = ProfileMatching::where('id_pendaftaran_guru', $request->id_pendaftaran)
            ->update($data);
        return redirect('video-microteaching');
    }
     // todo perhitungan profile matching
     public function hitungProfileMatching()
     {
         $pendaftaranGuru = PendaftaranGuru::with($this->relationshipPendaftaranGuru)
             ->join('profile_matching', 'pendaftaran_guru.id_pendaftaran', 'profile_matching.id_pendaftaran_guru')
             ->where(['profile_matching.pm_result' => null])
             ->select('pendaftaran_guru.*')
             ->get();
         $nt = []; //* nilai target
         // * Core Factor
         $nt['pm_pk'] = KriteriaBobotTarget::where('kriteria', 'Pengalaman Mengajar')->first()->nilai_target; // 4
         $nt['pm_vas'] = KriteriaBobotTarget::where('kriteria', 'Volume dan Artikulasi Suara Video Microteaching')->first()->nilai_target; // 4
         $nt['pm_kk'] = KriteriaBobotTarget::where('kriteria', 'Keefektifan Kalimat Video Microteaching')->first()->nilai_target; // 3
         $nt['pm_cm'] = KriteriaBobotTarget::where('kriteria', 'Cara Mengajar Video Microteaching')->first()->nilai_target; //4
         $nt['pm_pemat'] = KriteriaBobotTarget::where('kriteria', 'Penguasaan Materi Video Microteaching')->first()->nilai_target; // 5
         // * Secondary Factor
         $nt['pm_ipk'] = KriteriaBobotTarget::where('kriteria', 'Nilai Indeks Prestasi Terakhir (IPK)')->first()->nilai_target; // 4
         $nt['pm_usia'] = KriteriaBobotTarget::where('kriteria', 'Usia Guru')->first()->nilai_target; // 4
         $nt['pm_km'] = KriteriaBobotTarget::where('kriteria', 'Ketersediaan Mata Pelajaran')->first()->nilai_target; // 3
         // dd($nt);
         $pht = []; //* perhitungan
         foreach ($pendaftaranGuru as $pg) {
             $pht[$pg->profileMatching->id_profile_matching]['name'] = $pg->user->name;
             $pht[$pg->profileMatching->id_profile_matching]['nilai_awal']['pm_pk'] = $pg->profileMatching->pm_pk;
             $pht[$pg->profileMatching->id_profile_matching]['nilai_awal']['pm_vas'] = $pg->profileMatching->pm_vas;
             $pht[$pg->profileMatching->id_profile_matching]['nilai_awal']['pm_kk'] = $pg->profileMatching->pm_kk;
             $pht[$pg->profileMatching->id_profile_matching]['nilai_awal']['pm_cm'] = $pg->profileMatching->pm_cm;
             $pht[$pg->profileMatching->id_profile_matching]['nilai_awal']['pm_pemat'] = $pg->profileMatching->pm_pemat;
             $pht[$pg->profileMatching->id_profile_matching]['nilai_awal']['pm_ipk'] = $pg->profileMatching->pm_ipk;
             $pht[$pg->profileMatching->id_profile_matching]['nilai_awal']['pm_usia'] = $pg->profileMatching->pm_usia;
             $pht[$pg->profileMatching->id_profile_matching]['nilai_awal']['pm_km'] = $pg->profileMatching->pm_km;
             // todo mendapatkan nilai gap = user - target
             $pht[$pg->profileMatching->id_profile_matching]['nilai_gap']['pm_pk'] = $pht[$pg->profileMatching->id_profile_matching]['nilai_awal']['pm_pk'] - $nt['pm_pk'];
             $pht[$pg->profileMatching->id_profile_matching]['nilai_gap']['pm_vas'] =  $pht[$pg->profileMatching->id_profile_matching]['nilai_awal']['pm_vas'] - $nt['pm_vas'];
             $pht[$pg->profileMatching->id_profile_matching]['nilai_gap']['pm_kk'] = $pht[$pg->profileMatching->id_profile_matching]['nilai_awal']['pm_kk'] - $nt['pm_kk'];
             $pht[$pg->profileMatching->id_profile_matching]['nilai_gap']['pm_cm'] = $pht[$pg->profileMatching->id_profile_matching]['nilai_awal']['pm_cm'] - $nt['pm_cm'];
             $pht[$pg->profileMatching->id_profile_matching]['nilai_gap']['pm_pemat'] = $pht[$pg->profileMatching->id_profile_matching]['nilai_awal']['pm_pemat'] - $nt['pm_pemat'];
             $pht[$pg->profileMatching->id_profile_matching]['nilai_gap']['pm_ipk'] = $pht[$pg->profileMatching->id_profile_matching]['nilai_awal']['pm_ipk'] - $nt['pm_ipk'];
             $pht[$pg->profileMatching->id_profile_matching]['nilai_gap']['pm_usia'] = $pht[$pg->profileMatching->id_profile_matching]['nilai_awal']['pm_usia'] - $nt['pm_usia'];
             $pht[$pg->profileMatching->id_profile_matching]['nilai_gap']['pm_km'] = $pht[$pg->profileMatching->id_profile_matching]['nilai_awal']['pm_km'] - $nt['pm_km'];
             // todo mendapatkan nilai pembobotan
             $pht[$pg->profileMatching->id_profile_matching]['nilai_bobot']['pm_pk'] = $this->hitungBobot($pht[$pg->profileMatching->id_profile_matching]['nilai_gap']['pm_pk']);
             $pht[$pg->profileMatching->id_profile_matching]['nilai_bobot']['pm_vas'] = $this->hitungBobot($pht[$pg->profileMatching->id_profile_matching]['nilai_gap']['pm_vas']);
             $pht[$pg->profileMatching->id_profile_matching]['nilai_bobot']['pm_kk'] = $this->hitungBobot($pht[$pg->profileMatching->id_profile_matching]['nilai_gap']['pm_kk']);
             $pht[$pg->profileMatching->id_profile_matching]['nilai_bobot']['pm_cm'] = $this->hitungBobot($pht[$pg->profileMatching->id_profile_matching]['nilai_gap']['pm_cm']);
             $pht[$pg->profileMatching->id_profile_matching]['nilai_bobot']['pm_pemat'] = $this->hitungBobot($pht[$pg->profileMatching->id_profile_matching]['nilai_gap']['pm_pemat']);
             $pht[$pg->profileMatching->id_profile_matching]['nilai_bobot']['pm_ipk'] = $this->hitungBobot($pht[$pg->profileMatching->id_profile_matching]['nilai_gap']['pm_ipk']);
             $pht[$pg->profileMatching->id_profile_matching]['nilai_bobot']['pm_usia'] = $this->hitungBobot($pht[$pg->profileMatching->id_profile_matching]['nilai_gap']['pm_usia']);
             $pht[$pg->profileMatching->id_profile_matching]['nilai_bobot']['pm_km'] = $this->hitungBobot($pht[$pg->profileMatching->id_profile_matching]['nilai_gap']['pm_km']);
             // todo average NCF
             $pht[$pg->profileMatching->id_profile_matching]['ncf'] =
                 ($pht[$pg->profileMatching->id_profile_matching]['nilai_bobot']['pm_pk'] +
                     $pht[$pg->profileMatching->id_profile_matching]['nilai_bobot']['pm_vas'] +
                     $pht[$pg->profileMatching->id_profile_matching]['nilai_bobot']['pm_kk'] +
                     $pht[$pg->profileMatching->id_profile_matching]['nilai_bobot']['pm_cm'] +
                     $pht[$pg->profileMatching->id_profile_matching]['nilai_bobot']['pm_pemat']) / 5;
             $pht[$pg->profileMatching->id_profile_matching]['scf'] =
                 ($pht[$pg->profileMatching->id_profile_matching]['nilai_bobot']['pm_ipk'] +
                     $pht[$pg->profileMatching->id_profile_matching]['nilai_bobot']['pm_usia'] +
                     $pht[$pg->profileMatching->id_profile_matching]['nilai_bobot']['pm_km']) / 3;
             // todo nilai akhir
             $pht[$pg->profileMatching->id_profile_matching]['nilai_akhir'] = $pht[$pg->profileMatching->id_profile_matching]['ncf'] * 0.7 + $pht[$pg->profileMatching->id_profile_matching]['scf'] * 0.3;
         }
         // dd($pht);
 
         foreach ($pht as $key => $value) {
             // var_dump($value);
             // todo update nilai gap
             ProfileMatching::where('id_profile_matching', $key)->update(['pm_gap_pk' => $value['nilai_gap']['pm_pk']]);
             ProfileMatching::where('id_profile_matching', $key)->update(['pm_gap_vas' => $value['nilai_gap']['pm_vas']]);
             ProfileMatching::where('id_profile_matching', $key)->update(['pm_gap_kk' => $value['nilai_gap']['pm_kk']]);
             ProfileMatching::where('id_profile_matching', $key)->update(['pm_gap_cm' => $value['nilai_gap']['pm_cm']]);
             ProfileMatching::where('id_profile_matching', $key)->update(['pm_gap_pemat' => $value['nilai_gap']['pm_pemat']]);
             ProfileMatching::where('id_profile_matching', $key)->update(['pm_gap_ipk' => $value['nilai_gap']['pm_ipk']]);
             ProfileMatching::where('id_profile_matching', $key)->update(['pm_gap_usia' => $value['nilai_gap']['pm_usia']]);
             ProfileMatching::where('id_profile_matching', $key)->update(['pm_gap_km' => $value['nilai_gap']['pm_km']]);
             // todo update nilai bobot gap
             ProfileMatching::where('id_profile_matching', $key)->update(['pm_bobot_pk' => $value['nilai_bobot']['pm_pk']]);
             ProfileMatching::where('id_profile_matching', $key)->update(['pm_bobot_vas' => $value['nilai_bobot']['pm_vas']]);
             ProfileMatching::where('id_profile_matching', $key)->update(['pm_bobot_kk' => $value['nilai_bobot']['pm_kk']]);
             ProfileMatching::where('id_profile_matching', $key)->update(['pm_bobot_cm' => $value['nilai_bobot']['pm_cm']]);
             ProfileMatching::where('id_profile_matching', $key)->update(['pm_bobot_pemat' => $value['nilai_bobot']['pm_pemat']]);
             ProfileMatching::where('id_profile_matching', $key)->update(['pm_bobot_ipk' => $value['nilai_bobot']['pm_ipk']]);
             ProfileMatching::where('id_profile_matching', $key)->update(['pm_bobot_usia' => $value['nilai_bobot']['pm_usia']]);
             ProfileMatching::where('id_profile_matching', $key)->update(['pm_bobot_km' => $value['nilai_bobot']['pm_km']]);
             // todo update nilai ncf
             ProfileMatching::where('id_profile_matching', $key)->update(['pm_ncf' => $value['ncf']]);
             // todo update nilai scf
             ProfileMatching::where('id_profile_matching', $key)->update(['pm_scf' => $value['scf']]);
             // todo update nilai akhir
             ProfileMatching::where('id_profile_matching', $key)->update(['pm_result' => $value['nilai_akhir']]);
         }
         $this->getPesertaLulus();
         return redirect()->route('hasil.seleksi')->with('status', 'Proses Seleksi Telah Selesai');
     }
     public function hitungBobot($bobot)
     {
         switch ($bobot) {
             case 0:
                 return 5;
                 break;
             case 1:
                 return 4.5;
                 break;
             case -1:
                 return 4;
                 break;
             case 2:
                 return 3.5;
                 break;
             case -2:
                 return 3;
                 break;
             case 3:
                 return 2.5;
                 break;
             case -3:
                 return 2;
                 break;
             case 4:
                 return 1.5;
                 break;
             case -4:
                 return 1;
                 break;
         }
     }
    public function getPesertaLulus()
    {
        $id_peserta_lulus = array();
        $pesertaLulus = PendaftaranGuru::with($this->relationshipPendaftaranGuru)
            ->join('profile_matching', 'pendaftaran_guru.id_pendaftaran', 'profile_matching.id_pendaftaran_guru')
            ->orderBy('profile_matching.pm_result')
            ->limit(3)
            ->select('pendaftaran_guru.*')
            ->get();
        foreach ($pesertaLulus as $pl) {
            array_push($id_peserta_lulus, $pl->id_pendaftaran);
        }
        $pendaftaranGuru = PendaftaranGuru::with($this->relationshipPendaftaranGuru)
            ->whereIn('pendaftaran_guru.id_pendaftaran', $id_peserta_lulus)
            ->update(['pendaftaran_guru.status' => 1]);
        $pendaftaranGuru = PendaftaranGuru::with($this->relationshipPendaftaranGuru)
            ->where('pendaftaran_guru.status', 0)
            ->update(['pendaftaran_guru.status' => 2]);
    }
}
