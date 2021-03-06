<?php

namespace App\Http\Controllers;

use App\Http\Requests\PendaftaranRequest;
use Illuminate\Http\Request;
use App\User;
use App\PendaftaranGuru;
use App\GuruMapel;
use App\Alamat;
use App\Http\Requests\PendaftaranProfileRequest;
use App\Jenjang;
use App\MataPelajaran;
use App\ProfileMatching;
use App\JadwalAvailable;
use Illuminate\Support\Facades\DB;
use App\KriteriaBobotTarget;
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
        $this->relationshipCariGuru = ['alamat', 'guruMapel.mataPelajaran', 'guruMapel.mataPelajaran.jenjang', 'guruMapel', 'pendaftaranGuru'];
        $this->relationshipPendaftaranGuru = ['user', 'season', 'profileMatching'];
        $this->realationshipGuruMapel = ['mataPelajaran', 'mataPelajaran.jenjang'];
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
        $data = [];
        $jenjang = Jenjang::all();
        $data['jenjang'] = $jenjang;
        // $mapel = MataPelajaran::all();
        // $users = User::with($this->relationshipGuru)->find(Auth()->user()->id);
        $pendaftaranGuru = PendaftaranGuru::with($this->relationshipPendaftaranGuru)
            ->join('users', 'users.id', 'pendaftaran_guru.id_user')
            // ->join('users as al', 'al.id', 'alamat.id_user')
            ->select('pendaftaran_guru.*')
            ->where('users.id', Auth()->user()->id)->first();
        // dd($pendaftaranGuru);
        $data['pendaftaranGuru'] = $pendaftaranGuru;
        $guruMapel = GuruMapel::with($this->realationshipGuruMapel)->where('id_guru', auth()->user()->id)->get();
        $data['guruMapel'] = $guruMapel;
        if (isset($guruMapel[0])) {
            $mapel1 = MataPelajaran::where('id_jenjang', $guruMapel[0]->mataPelajaran->id_jenjang)->get();
            $data['mapel1'] = $mapel1;
        }
        if (isset($guruMapel[1])) {
            $mapel2 = MataPelajaran::where('id_jenjang', $guruMapel[1]->mataPelajaran->id_jenjang)->get();
            $data['mapel2'] = $mapel2;
        }
        if (isset($guruMapel[2])) {
            $mapel3 = MataPelajaran::where('id_jenjang', $guruMapel[2]->mataPelajaran->id_jenjang)->get();
            $data['mapel3'] = $mapel3;
        }
        if (isset($guruMapel[3])) {
            $mapel4 = MataPelajaran::where('id_jenjang', $guruMapel[3]->mataPelajaran->id_jenjang)->get();
            $data['mapel4'] = $mapel4;
        }
        if (isset($guruMapel[4])) {
            $mapel5 = MataPelajaran::where('id_jenjang', $guruMapel[4]->mataPelajaran->id_jenjang)->get();
            $data['mapel5'] = $mapel5;
        }
        return view('calon_guru.mentor_pendaftaran')->with($data);
        // return view('calon_guru.mentor_pendaftaran', compact('jenjang', 'mapel', 'pendaftaranGuru', 'guruMapel'));
    }
    /**
     * View Create Profile Guru
     */
    public function createProfile()
    {
        // dd('test');
        // $users = User::with($this->relationshipGuru)->find(Auth()->user()->id);
        $pendaftaranGuru = PendaftaranGuru::with($this->relationshipPendaftaranGuru)
            ->join('users', 'users.id', 'pendaftaran_guru.id_user')
            // ->join('users as al', 'al.id', 'alamat.id_user')
            ->select('pendaftaran_guru.*')
            ->where('users.id', Auth()->user()->id)->first();

        // todo Jadwal Available
        $jadwalAvailable = [];
        $senin = JadwalAvailable::where('hari', 'Senin')->where('id_user', auth()->user()->id)->get();
        // dd(count($senin));
        if (count($senin) > 0) {
            // dd($senin);
            $jadwalAvailable['Senin'] = $senin;
        }
        $selasa = JadwalAvailable::where('hari', 'Selasa')->where('id_user', auth()->user()->id)->get();
        if (count($selasa) > 0) {
            $jadwalAvailable['Selasa'] = $selasa;
        }
        $rabu = JadwalAvailable::where('hari', 'Rabu')->where('id_user', auth()->user()->id)->get();
        if (count($rabu) > 0) {
            $jadwalAvailable['Rabu'] = $rabu;
        }
        $kamis = JadwalAvailable::where('hari', 'Kamis')->where('id_user', auth()->user()->id)->get();
        if (count($kamis) > 0) {
            $jadwalAvailable['Kamis'] = $kamis;
        }
        $jumat = JadwalAvailable::where('hari', 'Jumat')->where('id_user', auth()->user()->id)->get();
        if (count($jumat) > 0) {
            $jadwalAvailable['Jumat'] = $jumat;
        }
        $sabtu = JadwalAvailable::where('hari', 'Sabtu')->where('id_user', auth()->user()->id)->get();
        if (count($sabtu) > 0) {
            $jadwalAvailable['Sabtu'] = $sabtu;
        }
        $minggu = JadwalAvailable::where('hari', 'Minggu')->where('id_user', auth()->user()->id)->get();
        if (count($minggu) > 0) {
            $jadwalAvailable['Minggu'] = $minggu;
        }
        // dd($jadwalAvailable);
        return view('calon_guru.mentor_pendaftaran_profile', compact('pendaftaranGuru', 'jadwalAvailable'));
    }

    /**
     * Store a newly created resource in storage. -> Pendaftaran Guru
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * todo Pendaftaran Guru
     */
    public function store(PendaftaranRequest $request)
    {
        // dd($request);
        // $request->validated();
        $user = User::findOrFail(Auth()->user()->id);
        $score = [];
        // todo Pengalaman Kerja
        $pk = $request->teach_experience;
        $ipk = $request->ipk_score;
        $currentYear = Carbon::now();
        $tanggal_lahir = $user->tanggal_lahir;
        $age = $currentYear->diffInYears($tanggal_lahir);
        // todo Ketersediaan Mata Pelajaran
        $jumlahMapel = 0;
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
        GuruMapel::where('id_guru', auth()->user()->id)->delete();
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

        $pendaftaranGuru = PendaftaranGuru::where('id_user', auth()->user()->id)->first();
        if ($pendaftaranGuru == null) {
            $pendaftaranGuru = new PendaftaranGuru();
        }
        $pendaftaranGuru->id_user = $user->id;
        //! $pendaftaranGuru->dir_cv = $request->file_cv;

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

        // todo upload file cv
        $dirCV = 'assets/cv_guru';
        if ($request->hasFile('file_cv')) {
            $fileCV = $request->file('file_cv');
            // file name
            $fileNameCV = 'file_cv_' . $pendaftaranGuru->id_pendaftaran . '.' . $fileCV->getClientOriginalExtension();
            // file move to directory
            $fileCV->move($dirCV, $fileNameCV);
            PendaftaranGuru::where('id_pendaftaran', $pendaftaranGuru->id_pendaftaran)
                ->update([
                    'dir_cv' => $fileNameCV
                ]);
        }

        // todo upload video microteaching
        // dir
        $dir = 'assets/video_microteaching';
        // file
        if ($request->file('file_microteaching') != null) {
            $file = $request->file('file_microteaching');
            // file name
            $fileName = 'video_microteaching_' . $pendaftaranGuru->id_pendaftaran . '.' . $file->getClientOriginalExtension();
            // file move to directory
            $file->move($dir, $fileName);
            PendaftaranGuru::where('id_pendaftaran', $pendaftaranGuru->id_pendaftaran)
                ->update([
                    'dir_video' => $fileName
                ]);
        }
        // dd($pendaftaranGuru);

        // todo Profile Matching
        $nilai['id_pendaftaran_guru'] = $pendaftaranGuru->id_pendaftaran;
        $profileMatching = ProfileMatching::insert($nilai);
        // dd($request);
        return redirect('/user/create')->with('status', 'Aplikasi Anda berhasil di simpan!');
    }
    /**
     * todo Store Profile Guru
     */
    public function storeProfile(PendaftaranProfileRequest $request)
    {
        // dd($request->get('hari'));
        $user = User::findOrFail(Auth()->user()->id);
        $pendaftaranGuru = PendaftaranGuru::where('id_user', auth()->user()->id)->first();
        if ($pendaftaranGuru == null) {
            $pendaftaranGuru = new PendaftaranGuru();
        }
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
        $user->tanggal_lahir = date_format(date_create($request->birthday), "y/m/d");
        // todo insert into table user
        // todo upload Foto Profile
        // dir
        $dirAvatars = 'assets/avatars';
        // dd($dirAvatars);
        if ($request->file('foto_profile') != null) {
            // file
            $fileFotoProfile = $request->file('foto_profile');
            //   dd($fileFotoProfile->getRealPath());
            // file name
            $fileNameFotoProfile = 'foto_profile_' . $user->id . '.' . $fileFotoProfile->getClientOriginalExtension();
            // file move to directory
            $fileFotoProfile->move($dirAvatars, $fileNameFotoProfile);
            // dd($file);
            User::where('id', $user->id)
                ->update([
                    'avatar' => $fileNameFotoProfile
                ]);
        }

        $user->jenis_kelamin = $request->gender;
        $user->no_handphone = $request->handphone_number;
        $user->universitas = $request->universitas;
        $user->role = 0; // sebelum diterima jadi guru
        $user->save();

        // todo insert into table alamat
        $alamat = Alamat::where('id_user', auth()->user()->id)->first();
        if ($alamat != null) {
            $alamat->latitude = $request->lat;
            $alamat->longitude = $request->lng;
            $alamat->alamat_lengkap = $request->alamat_lengkap;
            $alamat->save();
        } else {
            $alamat = new Alamat;
            $alamat->id_user = $user->id;
            $alamat->latitude = $request->lat;
            $alamat->longitude = $request->lng;
            $alamat->alamat_lengkap = $request->alamat_lengkap;
            $alamat->save();
        }

        // todo Jadwal Available
        $jadwalAvailable = JadwalAvailable::where('id_user', auth()->user()->id)->get();
        if (count($jadwalAvailable) == 0) {
            $data = [
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Senin',
                    'start' => '09:00',
                    'end' => '10:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Senin',
                    'start' => '11:00',
                    'end' => '12:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Senin',
                    'start' => '13:00',
                    'end' => '14:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Senin',
                    'start' => '15:00',
                    'end' => '16:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Senin',
                    'start' => '17:00',
                    'end' => '18:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Senin',
                    'start' => '19:00',
                    'end' => '20:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Selasa',
                    'start' => '09:00',
                    'end' => '10:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Selasa',
                    'start' => '11:00',
                    'end' => '12:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Selasa',
                    'start' => '13:00',
                    'end' => '14:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Selasa',
                    'start' => '15:00',
                    'end' => '16:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Selasa',
                    'start' => '17:00',
                    'end' => '18:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Selasa',
                    'start' => '19:00',
                    'end' => '20:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Rabu',
                    'start' => '09:00',
                    'end' => '10:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Rabu',
                    'start' => '11:00',
                    'end' => '12:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Rabu',
                    'start' => '13:00',
                    'end' => '14:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Rabu',
                    'start' => '15:00',
                    'end' => '16:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Rabu',
                    'start' => '17:00',
                    'end' => '18:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Rabu',
                    'start' => '19:00',
                    'end' => '20:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Kamis',
                    'start' => '09:00',
                    'end' => '10:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Kamis',
                    'start' => '11:00',
                    'end' => '12:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Kamis',
                    'start' => '13:00',
                    'end' => '14:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Kamis',
                    'start' => '15:00',
                    'end' => '16:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Kamis',
                    'start' => '17:00',
                    'end' => '18:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Kamis',
                    'start' => '19:00',
                    'end' => '20:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Jumat',
                    'start' => '09:00',
                    'end' => '10:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Jumat',
                    'start' => '11:00',
                    'end' => '12:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Jumat',
                    'start' => '13:00',
                    'end' => '14:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Jumat',
                    'start' => '15:00',
                    'end' => '16:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Jumat',
                    'start' => '17:00',
                    'end' => '18:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Jumat',
                    'start' => '19:00',
                    'end' => '20:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Sabtu',
                    'start' => '09:00',
                    'end' => '10:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Sabtu',
                    'start' => '11:00',
                    'end' => '12:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Sabtu',
                    'start' => '13:00',
                    'end' => '14:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Sabtu',
                    'start' => '15:00',
                    'end' => '16:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Sabtu',
                    'start' => '17:00',
                    'end' => '18:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Sabtu',
                    'start' => '19:00',
                    'end' => '20:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Minggu',
                    'start' => '09:00',
                    'end' => '10:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Minggu',
                    'start' => '11:00',
                    'end' => '12:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Minggu',
                    'start' => '13:00',
                    'end' => '14:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Minggu',
                    'start' => '15:00',
                    'end' => '16:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Minggu',
                    'start' => '17:00',
                    'end' => '18:30',
                    'available' => 0
                ],
                [
                    'id_user' => auth()->user()->id,
                    'hari' => 'Minggu',
                    'start' => '19:00',
                    'end' => '20:30',
                    'available' => 0
                ],
            ];
            // dd($data);
            JadwalAvailable::insert($data);
        } else {
            JadwalAvailable::whereIn('id_jadwal_available', $request->get('hari'))
                ->where('id_user', auth()->user()->id)
                ->update([
                    'available' => 1
                ]);
            // ! ketika uncheck
            JadwalAvailable::whereNotIn('id_jadwal_available', $request->get('hari'))
                ->where('id_user', auth()->user()->id)
                ->update([
                    'available' => 0
                ]);
        }
        return redirect('/user-profile/create')->with('status', 'Aplikasi Anda berhasil di simpan!');
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
            $alamat->id_user = $u->id;
            $alamat->latitude = $r->latitude;
            $alamat->longitude = $r->longitude;
            $alamat->alamat_lengkap = $r->alamat_lengkap;
            $alamat->save();
            return User::with($this->relationshipMurid)->where('id', $u->id)->first();
        } else {
            return null;
        }
    }

    public function detailGuru($id)
    {
        $guru = User::with($this->relationshipCariGuru)
            ->join('pendaftaran_guru', 'pendaftaran_guru.id_user', 'users.id')
            ->where([
                'pendaftaran_guru.status' => 1,
                'users.id' => $id,
            ])
            ->select('users.*')
            ->first();
        return $guru;
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

    public function cariGuru(Request $r)
    {
        $where = [];

        $where['role'] = 2;
        $where['jadwal_available.available'] = 1;

        $jadwalAvailable = array();

        if (isset($r->id_mapel)) {
            $where['mata_pelajaran.id_mapel'] = $r->id_mapel;
        }

        if (isset($r->jenis_kelamin) && $r->jenis_kelamin != "") {
            $where['jenis_kelamin'] = $r->jenis_kelamin;
        }

        $cariGuruQuery = User::with($this->relationshipCariGuru)
            ->join('guru_mapel', 'guru_mapel.id_guru', 'users.id')
            ->join('mata_pelajaran', 'mata_pelajaran.id_mapel', 'guru_mapel.id_mapel')
            ->join('jadwal_available', 'jadwal_available.id_user', 'users.id')
            ->where($where)
            ->select('users.*');

        //dd($jadwalAvailable);
        if (isset($r->hari) && sizeOf($r->hari) > 0) {
            $cariGuruQuery = $cariGuruQuery->whereIn('jadwal_available.hari', $r->hari);
            //dd($cariGuru);    
        }
        $id_guru = [];
        $cariGuru = $cariGuruQuery->distinct()->get();
        foreach ($cariGuru as $idG) {
            array_push($id_guru, $idG->id);
        }
        // dd([$r->latitude_murid,$r->longitude_murid,$id_guru]);
        $jarak = $this->jarakFilter($r->latitude_murid, $r->longitude_murid, $id_guru);
        $jarakStr = "FIELD(id,";
        // dd($jarak);
        foreach ($jarak as $i => $j) {
            $jarakStr = $jarakStr . $j['id'];
            if ($i < sizeof($jarak) - 1) {
                $jarakStr = $jarakStr . ",";
            } else {
                $jarakStr = $jarakStr . ")";
            }
        }
        $cariGuru = $cariGuruQuery->orderByRaw($jarakStr)->get();
        return response()->json([
            'user' => $cariGuru,
            'saw_guru' => $jarak
        ]);
    }
    

    function getDistance($latitude1, $longitude1, $latitude2, $longitude2) {
    
        $earth_radius = 6371;
       
           $dLat = deg2rad($latitude2 - $latitude1);
           $dLon = deg2rad($longitude2 - $longitude1);
       
           $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);
           $c = 2 * atan2(sqrt($a),sqrt(1-$a));
           $d = $earth_radius * $c;
       
           return $d;
    
}

    public function jarakFilter($latitude_murid, $longitude_murid, $id_guru)
    {
        $radius_bumi = 6371;

        // dd([
        //     $rad_lat_guru,$rad_lat_murid,$rad_sel_long
        // ]);
        $jarak = User::select(DB::raw('users.id, profile_matching.pm_result,alamat.latitude,alamat.longitude'))
            ->join('alamat', 'users.id', 'alamat.id_user')
            ->join('pendaftaran_guru', 'users.id', 'pendaftaran_guru.id_user')
            ->join('profile_matching', 'pendaftaran_guru.id_pendaftaran', 'profile_matching.id_pendaftaran_guru')
            ->where('pendaftaran_guru.status', 1)
            ->whereIn('id', $id_guru)->get();
        //   $jarak->sortBy('saw_result');
        // var_dump($jarak);
       
        foreach ($jarak as $key => $j) {

            $jarak[$key]->jarak_haversine=$this->getDistance($latitude_murid,$longitude_murid,$j->latitude,$j->longitude);
            
        }
        $jarakArray = [];
        $resultArray = [];
        foreach ($jarak as $j) {
            array_push($jarakArray, $j->jarak_haversine);
            array_push($resultArray, $j->pm_result);
        }

        $minJarak = min($jarakArray);
        $maxResult = max($resultArray);
        if($maxResult==0){
            $maxResult=1;
            
        }
        foreach($jarak as $key=>$j){
            if($jarak[$key]->jarak_haversine==0){
                $jarak[$key]->jarak_haversine =1;
            }
            $jarak[$key]->saw_result = $this->methodSAW($j->jarak_haversine, $j->pm_result, $minJarak, $maxResult);
        }
    
        

        //  $collect = [];
        // foreach($jarak as $key => $i){
        //     array_push($collect, [
        //         'id' =>$i->id,
        //         'jarak_haversine'=>$i->jarak_haversine,
        //         'pm_result'=>$i->pm_result,
        //         'saw_result'=>$i->saw_result]);

        // }
        // $collection = collect($collect);
        $sorted = $jarak->sortByDesc('saw_result');


        //   dd($collection->values()->all());
        return $sorted->values()->all();
    }

    public function testAlgoJarak()
    {

        $user_guru = User::where('role', 2)->with(['alamat'])->get();
        $user_murid = User::where('id', 23)->with(['alamat'])->first();
        // dd($user_murid);
        foreach ($user_guru as $guru) {
            $hasil =  $this->jarakFilter($user_murid->alamat->latitude, $user_murid->alamat->longitude, $guru->alamat->latitude, $guru->alamat->longitude);
            $guru->jarak = $hasil;
            var_dump($guru->jarak);
        }
    }

    public function methodSAW($jarak, $kompetensi, $minJarak, $maxKom)
    {
        $jarakCri = 0.2;
        $kompetensiCri = 0.8;

        $matrixJarak = $minJarak / $jarak;
        $matrixKompetensi = $kompetensi / $maxKom;
        $hasil = ($matrixJarak * $jarakCri) + ($matrixKompetensi * $kompetensiCri);
        //dd($hasil);
        return $hasil;
    }
}
