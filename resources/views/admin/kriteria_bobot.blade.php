@extends('layouts.master')

@section('title', 'Kriteria dan Bobot')
@section('css')
<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="screen">
<link href="{{asset('vendor/DataTables/css/DT_bootstrap.css')}}" rel="stylesheet" media="screen">
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
@stop
@section('main-title', 'Kriteria dan Bobot')
@section('description', 'Admin dapat mengedit data kriteria dan bobot seleksi penerimaan')
@section('pages', 'Home')
@section('active-pages', 'Kriteria dan Bobot Seleksi')
@section('content')
<div class="container-fluid container-fullw bg-white">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <h5 class="over-title margin-bottom-15">
                Data <span class="text-bold">Kriteria dan Bobot</span>
            </h5>

            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Kriteria</th>
                            <th class="text-center">Bobot (dalam %)</th>
                            <th class="text-center">Faktor Kriteria</th>
                            <th class="text-center">Nilai Target</th>
                            <!-- <th class="text-center">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kriteriaBobotTarget as $kbt)
                        <tr>
                            <td>{{$kbt->id_kriteria_bobot_target}}</td>
                            <td>{{$kbt->kriteria}}</td>
                            <td>{{$kbt->bobot}}</td>
                            <td><i>{{$kbt->faktor_kriteria}}</i></td>
                            <td>{{$kbt->nilai_target}}</td>
                            <!-- <td class="text-center"> -->
                            <!-- <a href="{{route('kriteria.bobot.edit', $kbt)}}" class="label label-success" title="Edit"><i class="ti-pencil"></i></a> -->
                            <!-- <a href="http://" class="label label-danger" title="Hapus"><i class="ti-trash"></i></a> -->
                            <!-- </td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <h5 class="over-title margin-bottom-15">
                <span class="text-bold">Keterangan Nilai Target</span>
            </h5>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                        <tr>
                            <th class="">Nilai Target</th>
                            <th class="">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Sangat Kurang</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Kurang</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Cukup</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Baik</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Sangat Baik</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop