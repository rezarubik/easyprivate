<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\PendaftaranGuru;

class UserController extends Controller
{
    public function __construct()
    {
        $this->relationshipGuru = ['alamat'];
        $this->relationshipMurid = ['alamat'];
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
        return $this->getGuruByEmail($r->email);
    }

    /**
     * Menampilkan Data Guru Pada Halaman Admin
     */
    public function dataGuru()
    {
        return view('admin.users_guru');
    }
    /**
     * Menampilkan Data Murid Pada Halaman Admin
     */
    public function dataMurid()
    {
        return view('admin.users_murid');
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
