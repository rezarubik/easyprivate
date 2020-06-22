<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JadwalAvailable;
use App\JadwalPemesananPerminggu;

class JadwalAvailableController extends Controller
{
    public function __construct()
    {
       $this->relationship = [
           'jadwalPemesananPerminggu',
           'jadwalPemesananPerminggu.pemesanan',
           'jadwalPemesananPerminggu.pemesanan.murid', 
           'jadwalPemesananPerminggu.pemesanan.murid.alamat',
           'jadwalPemesananPerminggu.pemesanan.guru', 
           'jadwalPemesananPerminggu.pemesanan.guru.alamat',
           'jadwalPemesananPerminggu.pemesanan.mataPelajaran',
           'jadwalPemesananPerminggu.pemesanan.mataPelajaran.jenjang'
        ]; 
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
        // $where['p.status'] = 1;

        $hari = [];

        if(isset($r->id_user)){
            $where['jadwal_available.id_user'] = $r->id_user;
        }

        if(isset($r->available)){
            $where['jadwal_available.available'] = $r->available;
        }
        
        if(isset($r->start)){
            $where['jadwal_available.start'] = $r->start;
        }
        
        if(isset($r->end)){
            $where['jadwal_available.end'] = $r->end;
        }

        $query = JadwalAvailable::with($this->relationship)
            ->where($where)
            ->select('jadwal_available.*')
            ->orderBy('jadwal_available.id_jadwal_available')
            ->whereIn('hari', $hari);

        if(isset($r->hari)){
            $hari = $r->hari;

            return $query->whereIn('jadwal_available.hari', $hari)->get();

        }else{
            return $query->get();
        }
        
    }

    public function updateJadwalAvailable(Request $r)
    {
        // dd($r);
        
        if(isset($r->id_available)){
            $idAvailable = $r->id_available;

            $jadwalAvailable = JadwalAvailable::whereIn('id_jadwal_available', $idAvailable)
                ->update([
                    'available' => 1
                ]);
                // ->get();
            
            $ja = JadwalAvailable::where('id_jadwal_available', $idAvailable[0])->first();
            $id_jadwal_terisi = $this->getIdJadwalTerisiGuru($ja->id_user);

            // dd($id_jadwal_terisi);
            
            if($id_jadwal_terisi != null){
                $jadwalTerisi = JadwalAvailable::whereIn('id_jadwal_available', $id_jadwal_terisi)
                    ->update([
                        'available' => 2
                    ]);
                    // ->get();
            }
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

    public function getIdJadwalTerisiGuru($id_guru)
    {
        $jpp = JadwalPemesananPerminggu::join('pemesanan as p', 'p.id_pemesanan', 'jadwal_pemesanan_perminggu.id_pemesanan')
                ->where([
                    'p.status' => 1,
                    'p.id_guru'=> $id_guru
                    ])
                ->select('jadwal_pemesanan_perminggu.id_jadwal_available')
                ->get();

        if(count($jpp) > 0){
            $id_jadwal_non_available = [];
            foreach($jpp as $j){
                array_push($id_jadwal_non_available, $j->id_jadwal_available);
            }
    
            return $id_jadwal_non_available;
        }else{
            return null;
        }
    }
}
