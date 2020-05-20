<?php

namespace App\Http\Controllers;

use App\Pemesanan;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemesanan = $this->pemesananPerJenjang();
        return view('admin.admin_dashboard');
    }

    /**
     * Function untuk ngeget pemesanan per jenjang
     */
    public function pemesananPerJenjang(){
        $pemesanan = Pemesanan::select(DB::raw('count(*) as `data_pemesanan`'), 'jenjang.nama_jenjang',
        DB::raw('YEAR(waktu_pemesanan) year, MONTHNAME(waktu_pemesanan) month'))
        ->join('mata_pelajaran', 'mata_pelajaran.id_mapel', 'pemesanan.id_mapel')
        ->join('jenjang', 'mata_pelajaran.id_jenjang', 'jenjang.id_jenjang')
        ->groupby('year','month', 'jenjang.nama_jenjang')
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
}
