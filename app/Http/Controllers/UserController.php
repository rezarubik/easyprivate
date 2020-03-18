<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){
        $this->relationshipGuru = ['alamat', 'pendaftaranGuru', 'pendaftaranGuru.microteaching'];
        $this->relationshipMurid = ['alamat'];
    }

    public function loginGuru(Request $r){
        //Get guru berdasarkan email
        $guru = getGuruByEmail($r->email);

        //Memeriksa apakah guru sudah terdaftar atau belum
        if($guru != null){
            $valid = isGuruValid($guru);

            if($valid){
                return $guru;
            }
            else{
                return null;
            }

        }else{
            return null;
        }
    }

    public function getGuruByEmail($email){
        //Get guru dengan role = 2 dan email dari request
        $guru = User::where([
            'role' => 2,
            'email' => $email
        ])
        ->with($this->relationshipGuru)
        ->first();

        return $guru;
    }

    public function isGuruValid(Guru $guru){
        $pendaftaran = Pendaftaran::where([
            'id_user' => $guru->id,
            'status' => 1
        ])->get();

        if($pendaftaran != null){
            return true;
        }else{
            return false;
        }
    }
}
