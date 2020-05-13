@extends('layouts.master')

@section('title', 'Data Absensi')
@section('css')
<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="screen">
<link href="{{asset('vendor/DataTables/css/DT_bootstrap.css')}}" rel="stylesheet" media="screen">
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
@stop
@section('main-title', 'Detail Data Absensi')
@section('description', 'Data Absensi Les Private')
@section('active-pages', 'Data Absensi')
@section('content')
<div class="container-fluid container-fullw bg-white">
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Error fugit ipsa ipsum repudiandae. Quasi unde doloremque facilis magni. Optio doloremque, in explicabo repudiandae vel error placeat ut tenetur eveniet! At.
    </p>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Nama Pemesan</th>
                    <th class="text-center">Nama Guru</th>
                    <th class="text-center">Mata Pelajaran</th>
                    <th class="text-center">Jenjang</th>
                    <th class="text-center">Tanggal Absen</th>
                </tr>
            </thead>
            <tbody>
                @foreach($absen as $ab)
                <tr>
                    <td>{{$ab->id_absen}}</td>
                    <td>{{$ab->pemesanan->murid->name}}</td>
                    <td>{{$ab->pemesanan->guru->name}}</td>
                    <td>{{$ab->pemesanan->mataPelajaran->nama_mapel}}</td>
                    <td>{{$ab->pemesanan->mataPelajaran->jenjang->nama_jenjang}}</td>
                    <td>{{$ab->waktu_absen}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop