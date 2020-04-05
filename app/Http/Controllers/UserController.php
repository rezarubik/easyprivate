<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\PendaftaranGuru;
use App\GuruMapel;
use App\Alamat;
use App\Jenjang;
use App\MataPelajaran;
use App\Microteaching;

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
        $jenjang = Jenjang::all();
        $mapel = MataPelajaran::all();
        return view('calon_guru.mentor_pendaftaran', compact('jenjang', 'mapel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(Auth()->user());
        // dd($request);
        $request->validate([
            'birthday' => 'required',
            'gender' => 'required',
            'handphone_number' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'alamat_lengkap' => 'required',
            'file_cv' => 'required',
            'teach_experience' => 'required',
            'ipk_score' => 'required',
            'file_microteaching' => 'required'
        ]);
        $messages = [
            'handphone_number.required' => ':attribute wajib diisi!'
        ];
        $user = User::findOrFail(Auth()->user()->id);
        // dd($user);
        $user->tanggal_lahir = date_format(date_create($request->birthday), "Y/m/d");
        $user->jenis_kelamin = $request->gender;
        $user->no_handphone = $request->handphone_number;
        $user->role = 0;
        $user->save();

        $alamat = new Alamat;
        $alamat->id_user = $user->id;
        $alamat->latitude = -6.23884;
        $alamat->longitude = 106.912;
        $alamat->alamat_lengkap = 'Jl. Teluk Langsa 4 Blok C.8 No.4';
        $alamat->save();

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

        $pendaftaranGuru = new PendaftaranGuru();
        $pendaftaranGuru->id_user = $user->id;
        $pendaftaranGuru->dir_cv = $request->file_cv;
        $pendaftaranGuru->pengalaman_mengajar = $request->teach_experience;
        $pendaftaranGuru->nilai_ipk = $request->ipk_score;
        $pendaftaranGuru->save();

        $microteaching = new Microteaching();
        $microteaching->id_pendaftaran = $pendaftaranGuru->id_pendaftaran;
        $microteaching->dir_video = $request->file_microteaching;
        $microteaching->save();

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

    /**
     * Menampilkan Data Guru Pada Halaman Admin
     */
    public function dataGuru()
    {
        $user = User::where('role', 2)->with($this->relationshipGuru)->get();
        // $guruMapel = GuruMapel::where('id_mapel')->with('mataPelajaran')->get();
        // dd($guruMapel);
        return view('admin.users_guru', compact('user'));
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
