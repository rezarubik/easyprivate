<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\PendaftaranGuru;
use App\GuruMapel;
use App\Alamat;
use App\Jenjang;
use App\MataPelajaran;
use App\ProfileMatching;
use App\JadwalAvailable;
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
        $this->relationshipCariGuru = ['alamat', 'guruMapel.mataPelajaran', 'guruMapel.mataPelajaran.jenjang', 'guruMapel'];
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
        if(count($senin) > 0){
            // dd($senin);
            $jadwalAvailable['Senin'] = $senin;
        }
        $selasa = JadwalAvailable::where('hari', 'Selasa')->where('id_user', auth()->user()->id)->get();
            if(count($selasa) > 0){
                $jadwalAvailable['Selasa'] = $selasa;
            }
            $rabu = JadwalAvailable::where('hari', 'Rabu')->where('id_user', auth()->user()->id)->get();
                if(count($rabu) > 0){
                    $jadwalAvailable['Rabu'] = $rabu;
                }
                $kamis = JadwalAvailable::where('hari', 'Kamis')->where('id_user', auth()->user()->id)->get();
                    if(count($kamis) > 0){
                        $jadwalAvailable['Kamis'] = $kamis;
                    }
                    $jumat = JadwalAvailable::where('hari', 'Jumat')->where('id_user', auth()->user()->id)->get();
                        if(count($jumat) > 0){
                            $jadwalAvailable['Jumat'] = $jumat;
                        }
                        $sabtu = JadwalAvailable::where('hari', 'Sabtu')->where('id_user', auth()->user()->id)->get();
                            if(count($sabtu) > 0){
                                $jadwalAvailable['Sabtu'] = $sabtu;
                            }
                            $minggu = JadwalAvailable::where('hari', 'Minggu')->where('id_user', auth()->user()->id)->get();
                                if(count($minggu) > 0){
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
     */
    public function store(Request $request)
    {
        // dd('hai');
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

        return redirect('/user/create')->with('status', 'Aplikasi Anda berhasil di simpan!');
    }
    /**
     * Store Profile Guru
     */
    public function storeProfile(Request $request)
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
        if(count($jadwalAvailable) == 0){
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
        }else{
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
            $alamat->id_user = $u->id_user;
            $alamat->latitude = $r->latitude;
            $alamat->longitude = $r->longitude;
            $alamat->alamat_lengkap = $r->alamat_lengkap;
            $alamat->save();
            return User::with($this->relationshipMurid)->find($u->id);
        } else {
            return null;
        }
    }

    public function detailGuru($id)
    {
        return User::with($this->relationshipCariGuru)
            ->find($id);
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

    public function cariGuru(Request $r)
    {
        $where = [];

        $where['role'] = 2;
        $where['available'] = 1;

        $jadwalAvailable = array();

        if (isset($r->id_mapel)) {
            $where['mata_pelajaran.id_mapel'] = $r->id_mapel;
        }

        if (isset($r->jenis_kelamin) && $r->jenis_kelamin != "") {
            $where['jenis_kelamin'] = $r->jenis_kelamin;
        }

        if (isset($r->hari)) {
            $jadwalAvailable = $r->hari;
        }

        // if (isset($r->senin)) {

        //     array_push($jadwalAvailable, 'Senin');
        // }
        // if (isset($r->selasa)) {

        //     array_push($jadwalAvailable, 'Selasa');
        // }
        // if (isset($r->rabu)) {

        //     array_push($jadwalAvailable, 'Rabu');
        // }
        // if (isset($r->kamis)) {

        //     array_push($jadwalAvailable, 'Kamis');
        // }
        // if (isset($r->jumat)) {

        //     array_push($jadwalAvailable, 'Jumat');
        // }
        // if (isset($r->sabtu)) {

        //     array_push($jadwalAvailable, 'Sabtu');
        // }
        // if (isset($r->minggu)) {

        //     array_push($jadwalAvailable, 'Minggu');
        // }
        if (isset($r->hari) && sizeOf($r->hari) > 0) {

            return User::with($this->relationshipCariGuru)
                ->join('guru_mapel', 'guru_mapel.id_guru', 'users.id')
                ->join('mata_pelajaran', 'mata_pelajaran.id_mapel', 'guru_mapel.id_mapel')
                ->join('jadwal_available', 'jadwal_available.id_user', 'users.id')
                ->where($where)
                ->whereIn('jadwal_available.hari', $jadwalAvailable)
                ->select('users.*')
                ->distinct()
                // ->orderBy('status')
                // ->orderBy('waktu_pemesanan', 'desc')
                ->get();
        } else {
            return User::with($this->relationshipCariGuru)
                ->join('guru_mapel', 'guru_mapel.id_guru', 'users.id')
                ->join('mata_pelajaran', 'mata_pelajaran.id_mapel', 'guru_mapel.id_mapel')
                ->join('jadwal_available', 'jadwal_available.id_user', 'users.id')
                ->where($where)
                // ->whereIn('jadwal_available.hari', $jadwalAvailable)
                ->select('users.*')
                ->distinct()
                // ->orderBy('status')
                // ->orderBy('waktu_pemesanan', 'desc')
                ->get();
        }
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
        return redirect('/hasil-seleksi')->with('status', 'Proses Seleksi Telah Selesai');
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
