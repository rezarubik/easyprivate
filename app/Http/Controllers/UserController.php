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
use App\Microteaching;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        // ! Untuk calon guru
        // $this->middleware('auth');
        $this->relationshipGuru = ['alamat'];
        $this->relationshipMurid = ['alamat'];
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
        $age = $user->tanggal_lahir;
        // todo Ketersediaan Mata Pelajaran


        $user->tanggal_lahir = date_format(date_create($request->birthday), "Y/m/d");
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
            $guruMapel1 = new GuruMapel;
            $guruMapel1->id_guru = $user->id;
            $guruMapel1->id_mapel = $request->mapel_1;
            $guruMapel1->save();
        }

        if (isset($request->mapel_2)) {
            $guruMapel2 = new GuruMapel;
            $guruMapel2->id_guru = $user->id;
            $guruMapel2->id_mapel = $request->mapel_2;
            $guruMapel2->save();
        }

        if (isset($request->mapel_3)) {
            $guruMapel3 = new GuruMapel;
            $guruMapel3->id_guru = $user->id;
            $guruMapel3->id_mapel = $request->mapel_3;
            $guruMapel3->save();
        }
        if (isset($request->mapel_4)) {
            $guruMapel4 = new GuruMapel;
            $guruMapel4->id_guru = $user->id;
            $guruMapel4->id_mapel = $request->mapel_4;
            $guruMapel4->save();
        }
        if (isset($request->mapel_5)) {
            $guruMapel5 = new GuruMapel;
            $guruMapel5->id_guru = $user->id;
            $guruMapel5->id_mapel = $request->mapel_5;
            $guruMapel5->save();
        }

        $pendaftaranGuru = new PendaftaranGuru();
        $pendaftaranGuru->id_user = $user->id;
        $pendaftaranGuru->dir_cv = $request->file_cv;
        // todo rules pm pengalaman kerja
        if ($pk <= 6) {
            $nilai['pk'] = 1;
        } elseif ($pk > 6 && $pk <= 12) {
            $nilai['pk'] = 2;
        } elseif ($pk > 12 && $pk <= 18) {
            $nilai['pk'] = 3;
        } elseif ($pk > 18 && $pk <= 24) {
            $nilai['pk'] = 4;
        } elseif ($pk > 24) {
            $nilai['pk'] = 5;
        }

        $pendaftaranGuru->pengalaman_mengajar = $request->teach_experience;
        //  todo nilai ipk
        if ($ipk <= 2) {
            $nilai['ipk'] = 1;
        } elseif ($ipk > 2 && $ipk <= 2.5) {
            $nilai['ipk'] = 2;
        }
        $pendaftaranGuru->nilai_ipk = $request->ipk_score;
        $pendaftaranGuru->save();
        $microteaching = new Microteaching();
        $microteaching->id_pendaftaran = $pendaftaranGuru->id_pendaftaran;
        $microteaching->dir_video = $request->file_microteaching;
        $microteaching->save();
        // dd($microteaching);

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
