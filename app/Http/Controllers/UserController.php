<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\PendaftaranGuru;
use App\GuruMapel;
use App\Alamat;
use App\Http\Requests\UserRequest;
use App\Jenjang;
use App\MataPelajaran;
use App\ProfileMatching;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class UserController extends Controller
{
    public function __construct()
    {
        // ! Untuk calon guru
        // $this->middleware('auth');
        $this->relationshipGuru = ['alamat'];
        $this->relationshipMurid = ['alamat'];
        $this->relationshipCariGuru = ['alamat', 'guruMapel.mataPelajaran', 'guruMapel.mataPelajaran.jenjang','guruMapel'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('test')
        $jenjang = Jenjang::all();
        $mapel = MataPelajaran::all();
        $users = User::with($this->relationshipGuru)->find(Auth()->user()->id);
        return view('calon_guru.mentor_pendaftaran', compact('jenjang', 'mapel', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = User::findOrFail(Auth()->user()->id);
        // dd($user);
        $score = [];
        // todo Pengalaman Kerja
        $pk = $request->teach_experience;
        // todo Nilai IPK
        $ipk = $request->ipk_score;
        // todo Usia
        $currentYear = Carbon::now();
        $tanggal_lahir = new Carbon($request->birthday);
        $age = $currentYear->diffInYears($tanggal_lahir);
        // dd($age);
        // todo Ketersediaan Mata Pelajaran
        $jumlahMapel = 0;


        $user->tanggal_lahir = date_format(date_create($request->birthday), "Y/m/d");
        // todo 
        if ($age > 20 && $age <= 25) {
            $nilai['pm_usia'] = 5;
        } elseif ($age > 25 && $age <= 30) {
            $nilai['pm_usia'] = 4;
        } elseif ($age > 30 && $age <= 35) {
            $nilai['pm_usia'] = 3;
        } elseif ($age > 35 && $age <= 40) {
            $nilai['pm_usia'] = 2;
        } elseif ($age > 40) {
            $nilai['pm_usia'] = 1;
        }
        // dd($nilai);

        $user->jenis_kelamin = $request->gender;
        $user->no_handphone = $request->handphone_number;
        $user->role = 0;
        $user->save();
        // dd($user);

        $alamat = new Alamat;
        $alamat->id_user = $user->id;
        $alamat->latitude = $request->lat;
        $alamat->longitude = $request->lng;
        $alamat->alamat_lengkap = $request->alamat_lengkap;
        $alamat->save();
        // dd($alamat);

        if (isset($request->mapel_1)) {
            $jumlahMapel += 1;
            $guruMapel1 = new GuruMapel;
            $guruMapel1->id_guru = $user->id;
            $guruMapel1->id_mapel = $request->mapel_1;
            $guruMapel1->save();
        }

        if (isset($request->mapel_2)) {
            $jumlahMapel += 1;
            $guruMapel2 = new GuruMapel;
            $guruMapel2->id_guru = $user->id;
            $guruMapel2->id_mapel = $request->mapel_2;
            $guruMapel2->save();
        }

        if (isset($request->mapel_3)) {
            $jumlahMapel += 1;
            $guruMapel3 = new GuruMapel;
            $guruMapel3->id_guru = $user->id;
            $guruMapel3->id_mapel = $request->mapel_3;
            $guruMapel3->save();
        }
        if (isset($request->mapel_4)) {
            $jumlahMapel += 1;
            $guruMapel4 = new GuruMapel;
            $guruMapel4->id_guru = $user->id;
            $guruMapel4->id_mapel = $request->mapel_4;
            $guruMapel4->save();
        }
        if (isset($request->mapel_5)) {
            $jumlahMapel += 1;
            $guruMapel5 = new GuruMapel;
            $guruMapel5->id_guru = $user->id;
            $guruMapel5->id_mapel = $request->mapel_5;
            $guruMapel5->save();
        }
        if ($jumlahMapel == 1) {
            $nilai['pm_km'] = 1;
        } elseif ($jumlahMapel == 2) {
            $nilai['pm_km'] = 3;
        } elseif ($jumlahMapel >= 3) {
            $nilai['pm_km'] = 5;
        }

        $pendaftaranGuru = new PendaftaranGuru();
        $pendaftaranGuru->id_user = $user->id;
        $pendaftaranGuru->dir_cv = $request->file_cv;
        // todo rules pm pengalaman kerja
        if ($pk <= 6) {
            $nilai['pm_pk'] = 1;
        } elseif ($pk > 6 && $pk <= 12) {
            $nilai['pm_pk'] = 2;
        } elseif ($pk > 12 && $pk <= 18) {
            $nilai['pm_pk'] = 3;
        } elseif ($pk > 18 && $pk <= 24) {
            $nilai['pm_pk'] = 4;
        } elseif ($pk > 24) {
            $nilai['pm_pk'] = 5;
        }
        $pendaftaranGuru->pengalaman_mengajar = $request->teach_experience;

        //  todo nilai ipk
        if ($ipk <= 2) {
            $nilai['pm_ipk'] = 1;
        } elseif ($ipk > 2 && $ipk <= 2.5) {
            $nilai['pm_ipk'] = 2;
        } elseif ($ipk > 2.5 && $ipk <= 3.0) {
            $nilai['pm_ipk'] = 3;
        } elseif ($ipk > 3.0 && $ipk <= 3.5) {
            $nilai['pm_ipk'] = 4;
        } elseif ($ipk > 3.5 && $ipk <= 4.0) {
            $nilai['pm_ipk'] = 5;
        }
        $pendaftaranGuru->nilai_ipk = $request->ipk_score;
        $pendaftaranGuru->save();

        // todo Profile Matching
        $nilai['id_pendaftaran_guru'] = $pendaftaranGuru->id_pendaftaran_guru;
        $profileMatching = ProfileMatching::create($nilai);

        return redirect('/user/create')->with('status', 'Aplikasi Anda berhasil di simpan!');
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

    public function getMuridById($id)
    {
        return User::with($this->relationshipMurid)
            ->find($id);
    }

    public function daftarMurid(Request $r)
    {
        $murid = User::where(['email' => $r->email])->first();
        if ($murid == null) {
            $u = new User();
            $u->name = $r->name;
            $u->email = $r->email;
            $u->avatar = $r->avatar;
            $u->jenis_kelamin = $r->jenis_kelamin;
            $u->tanggal_lahir = $r->tanggal_lahir;
            $u->no_handphone = $r->no_handphone;
            $u->role = 1;
            $u->save();
            $alamat = new Alamat();
            $alamat->id_user = $u->id_user;
            $alamat->latitude = $r->latitude;
            $alamat->longitude = $r->longitude;
            $alamat->alamat_lengkap = $r->alamat_lengkap;
            $alamat->save();
            return $murid;
        } else {
            return null;
        }
    }

    public function getMuridByEmail($email)
    {
        $murid = User::where([
            'role' => 1,
            'email' => $email
        ])
            ->with($this->relationshipMurid)
            ->first();
        //dd($murid);
        return $murid;
    }

    public function validMurid(Request $r)
    {
        $murid = User::where([
            'email' => $r->email,
            'role' => 1
        ])->get();

        if (!$murid->isEmpty()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getMuridByEmailPost(Request $r)
    {
        return $this->getMuridByEmail($r->email);
    }

    public function getGuruById($id)
    {
        return User::with($this->relationshipGuru)
            ->find($id);
    }

    //Function untuk login guru
    public function loginGuru(Request $r)
    {
        //Memanggil function getGuruByEmail
        $guru = $this->getGuruByEmail($r->email);
        $emptyGuru = new User;
        $emptyGuru = $emptyGuru[0];

        //Memeriksa apakah guru sudah terdaftar atau belum
        if ($guru != null) {
            $valid = $this->isGuruValid($guru->id);
            // dd($valid);
            if ($valid) {
                return $guru;
            } else {
                return $emptyGuru;
            }
        } else {
            return $emptyGuru;
        }
    }

    //Get guru berdasarkan email
    public function getGuruByEmail($email)
    {
        //Get guru dengan role = 2 dan email dari request
        $guru = User::where([
            'role' => 2,
            'email' => $email
        ])
            ->with($this->relationshipGuru)
            ->first();
        // dd($guru);
        return $guru;
    }

    //Memeriksa apakah guru sudah lolos seleksi
    public function isGuruValid(Request $r)
    {
        //Melihat tabel pendaftaran berdasarkan id guru dan statusnya
        $pendaftaran = PendaftaranGuru::join('users', 'users.id', 'pendaftaran_guru.id_user')
            ->where([
                'users.email' => $r->email,
                'status' => 1
            ])->get();

        if (!$pendaftaran->isEmpty()) {
            return 1;
        } else {
            return 0;
        }
    }

    //Get guru berdasarkan email via POST
    public function getGuruByEmailPost(Request $r)
    {
        // dd($r);
        return $this->getGuruByEmail($r->email);
    }

    public function updateGuru(Request $r)
    {
        $guru = User::where([
            'id' => $r->id
        ])->first();

        $dir = 'assets/avatars';

        if ($guru != null) {
            if ($r->file('avatar') != null) {
                $file = $r->avatar;
                $fileName = 'avatar_' . $r->id . '.' . $file->getClientOriginalExtension();

                $file->move($dir, $fileName);
                $guru->avatar = $fileName;
            }
            $guru->name = $r->name;
            $guru->no_handphone = $r->no_handphone;
            $guru->save();
        }

        return $guru;
    }

    public function getImage()
    {
        return Storage::download('avatars/13');
    }

    /**
     * Menampilkan Data Guru Pada Halaman Admin
     */
    public function dataGuru()
    {
        // dd('hai');
        $pendaftaranGuru = PendaftaranGuru::with(['user', 'microteaching'])
            ->join('users', 'users.id', 'pendaftaran_guru.id_user')
            ->join('microteaching', 'microteaching.id_pendaftaran', 'pendaftaran_guru.id_pendaftaran')
            ->select('pendaftaran_guru.*')
            ->where('users.id', '!=', '')
            ->where('microteaching.id_microteaching', '!=', '')
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

    public function cariGuru(Request $r)
    {
        $where = [];

        $where['role'] = 2;

        $jadwalAvailable = array();

        if(isset($r->id_mapel)){
            $where['mata_pelajaran.id_mapel'] = $r->id_mapel;
        }

        if(isset($r->jenis_kelamin)){
        $where['jenis_kelamin'] = $r->jenis_kelamin;
        }

         if(isset($r->senin)){
             
                array_push($jadwalAvailable, 'Senin');
            }
            if(isset($r->selasa)){
             
                array_push($jadwalAvailable, 'Selasa');
            }
            if(isset($r->rabu)){
             
                array_push($jadwalAvailable, 'Rabu');
            }
            if(isset($r->kamis)){
             
                array_push($jadwalAvailable, 'Kamis');
            }
            if(isset($r->jumat)){
             
                array_push($jadwalAvailable, 'Jumat');
            }
            if(isset($r->sabtu)){
             
                array_push($jadwalAvailable, 'Sabtu');
            }
            if(isset($r->minggu)){
             
                array_push($jadwalAvailable, 'Minggu');
            }

        return User::with($this->relationshipCariGuru)
        ->join('guru_mapel', 'guru_mapel.id_guru', 'users.id')
        ->join('mata_pelajaran', 'mata_pelajaran.id_mapel', 'guru_mapel.id_mapel')
        ->join('jadwal_available', 'jadwal_available.id_user', 'users.id')
            ->where($where)
            ->whereIn('jadwal_available.hari',$jadwalAvailable)
            ->select('users.*')
            // ->orderBy('status')
            // ->orderBy('waktu_pemesanan', 'desc')
            ->get();
    }
    /**
     * Menampilkan Data Nilai GAP
     */
    public function nilaiGAP()
    {
        return view('admin.nilai_gap');
    }

    /**
     * Data Pembobotan Nilai GAP
     */
    public function pembobotanNilaiGAP()
    {
        return view('admin.pembobotan_nilai_gap');
    }

    /**
     * Data Hasil Seleksi
     */
    public function hasilSeleksi()
    {
        return view('admin.hasil_seleksi');
    }

    /**
     * Data Video Microteaching
     */
    public function videoMicroteaching()
    {
        return view('admin.video_microteaching');
    }
}
