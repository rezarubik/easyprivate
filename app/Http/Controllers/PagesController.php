<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // ? Users Murid dan Guru
    public function usersGuru()
    {
        return view('admin.users_guru');
    }
}
