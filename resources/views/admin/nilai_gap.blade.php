@extends('layouts.master')

@section('title', 'Nilai GAP')
@section('css')
<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="screen">
<link href="{{asset('vendor/DataTables/css/DT_bootstrap.css')}}" rel="stylesheet" media="screen">
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
@stop
@section('main-title', 'Nilai GAP')
@section('description', 'Admin dapat melihat data Nilai GAP seleksi penerimaan')
@section('pages', 'Home')
@section('active-pages', 'Nilai GAP Seleksi')
@section('content')
<div class="container-fluid container-fullw bg-white">
    <div class="row">
        <div class="col-md-12">
            <h5 class="over-title margin-bottom-15">
                Pemetaan Nilai GAP Seleksi Penerimaan Guru Private
            </h5>
            <p class="text-bold well text-center" style="width: 50%;">
                GAP = Profil<sub>Calon Peserta</sub> - Profil<sub>Jabatan</sub>
            </p>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                        <tr>
                            <th class="text-center" rowspan="2">ID</th>
                            <th class="text-center" rowspan="2">Nama Peserta</th>
                            <th class="text-center" class="text-center" colspan="8">Kriteria</th>
                        </tr>
                        <tr>
                            <th>Pengalaman Mengajar</th>
                            <th>Volume dan Artikulasi Suara pada Video <i>Microteaching</i></th>
                            <th>Keefektifan Kalimat pada Video <i>Microteaching</i></th>
                            <th>Cara Mengajar pada Video <i>Microteaching</i></th>
                            <th>Penguasaan Materi pada Video <i>Microteaching</i></th>
                            <th>Nilai IPK Akhir</th>
                            <th>Usia Peserta</th>
                            <th>Ketersediaan Mata Pelajaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendaftaranGuru as $pg)
                        <tr>
                            <td>{{$pg->id_pendaftaran}}</td>
                            <td>{{$pg->user->name}}</td>
                            <td>{{$pg->profileMatching->pm_pk}}</td>
                            <td>{{$pg->profileMatching->pm_vas}}</td>
                            <td>{{$pg->profileMatching->pm_kk}}</td>
                            <td>{{$pg->profileMatching->pm_cm}}</td>
                            <td>{{$pg->profileMatching->pm_pemat}}</td>
                            <td>{{$pg->profileMatching->pm_ipk}}</td>
                            <td>{{$pg->profileMatching->pm_usia}}</td>
                            <td>{{$pg->profileMatching->pm_km}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop