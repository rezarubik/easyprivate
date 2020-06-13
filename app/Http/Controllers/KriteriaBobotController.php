<?php

namespace App\Http\Controllers;

use App\KriteriaBobotTarget;
use Illuminate\Http\Request;

class KriteriaBobotController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteriaBobotTarget = KriteriaBobotTarget::all();
        // dd($kriteriaBobotTarget);
        return view('admin.kriteria_bobot', compact('kriteriaBobotTarget'));
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
    public function edit(KriteriaBobotTarget $kbt)
    {
        return view('admin.kriteria_bobot_edit', compact('kbt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KriteriaBobotTarget $kbt)
    {
        $data = [
            'kriteria' => $request->kriteria,
            'bobot' => $request->bobot,
            'faktor_kriteria' => $request->faktor_kriteria,
            ''
        ];
        $kbt->update($data);
        return view('admin.kriteria_bobot')->with('status', 'Data Kriteria dan Bobot berhasil diedit');
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
