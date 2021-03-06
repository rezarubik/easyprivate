<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JadwalPemesananPerminggu;

class JadwalPemesananPermingguController extends Controller
{
    public function __construct()
    {
        $this->relationshipPemesananGuru = ['pemesanan', 'pemesanan.murid', 'pemesanan.murid.alamat','pemesanan.guru','pemesanan.guru.alamat', 'pemesanan.mataPelajaran', 'pemesanan.mataPelajaran.jenjang', 'jadwalAvailable'];
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

    public function getJadwalPemesananPermingguById($id)
    {
        return JadwalPemesananPerminggu::with($this->relationshipPemesananGuru)->where(['id_jadwal_pemesanan_perminggu'=>$id])->first();
    }

    public function getJadwalPemesananPermingguFiltered(Request $r)
    {
        $where = [];

        if(isset($r->id_pemesanan)){
            $where['p.id_pemesanan'] = $r->id_pemesanan;
        }

        if(isset($r->id_guru)){
            $where['p.id_guru'] = $r->id_guru;
        }
        if(isset($r->id_murid)){
            $where['p.id_murid'] = $r->id_murid;
        }

        if(isset($r->status_pemesanan)){
            $where['p.status'] = $r->status_pemesanan;
        }

        return JadwalPemesananPerminggu::with($this->relationshipPemesananGuru)
            ->join('pemesanan as p', 'p.id_pemesanan', 'jadwal_pemesanan_perminggu.id_pemesanan')
            ->join('jadwal_available as ja', 'ja.id_jadwal_available', 'jadwal_pemesanan_perminggu.id_jadwal_available')
            ->where($where)
            ->orderBy('ja.id_jadwal_available')
            ->select('jadwal_pemesanan_perminggu.*')
            ->get();
    }

    public function updateIdEvent(Request $r)
    {
        $idJpp = $r->id_jadwal_pemesanan_perminggu;
        $idEv = $r->id_event;

        JadwalPemesananPerminggu::where('id_jadwal_pemesanan_perminggu', $idJpp)
            ->update([
                'id_event' => $idEv
            ]);
    }   
}
