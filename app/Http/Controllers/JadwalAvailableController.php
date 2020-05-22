<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JadwalAvailable;

class JadwalAvailableController extends Controller
{
    public function __construct()
    {
        
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

    public function getJadwalAvailableById($id)
    {
        return JadwalAvailable::find($id);
    }

    public function getJadwalAvailableFiltered(Request $r)
    {
        $where = [];
        $hari = [];

        if(isset($r->id_user)){
            $where['id_user'] = $r->id_user;
        }

        if(isset($r->available)){
            $where['available'] = $r->available;
        }
        
        if(isset($r->start)){
            $where['start'] = $r->start;
        }
        
        if(isset($r->end)){
            $where['end'] = $r->end;
        }

        if(isset($r->hari)){
            $hari = $r->hari;

            return JadwalAvailable::where($where)
                ->whereIn('hari', $hari)
                ->orderBy('id_jadwal_available')
                ->get();
        }else{
            return JadwalAvailable::where($where)
                ->orderBy('id_jadwal_available')
                ->get();
        }
        
    }

    public function updateJadwalAvailable(Request $r)
    {
        if(isset($r->id_available)){
            $idAvailable = $r->id_available;
            $jadwalAvailable = JadwalAvailable::whereIn('id_jadwal_available', $idAvailable)
                ->update([
                    'available' => 1
                ]);
                // ->get();
        }

        if(isset($r->id_non_available)){
            $idNonAvailable = $r->id_non_available;
            $jadwalNonAvailable = JadwalAvailable::whereIn('id_jadwal_available', $idNonAvailable)
                ->update([
                    'available' => 0
                ]);
                // ->get();
        }

        if(isset($r->id_terisi)){
            $idTerisi = $r->id_terisi;
            $jadwalTerisi = JadwalAvailable::whereIn('id_jadwal_available', $idTerisi)
                ->update([
                    'available' => 2
                ]);
                // ->get();
        }
    }
}
