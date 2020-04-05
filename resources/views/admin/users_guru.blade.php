@extends('layouts.master')

@section('title', 'Data Guru')
@section('css')
<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="screen">
<link href="{{asset('vendor/DataTables/css/DT_bootstrap.css')}}" rel="stylesheet" media="screen">
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
@stop
@section('main-title', 'Detail Data Guru')
@section('description', 'Terdapat data calon guru dan data guru yang sudah diterima')
@section('pages', 'Home')
@section('active-pages', 'Data Guru')
@section('content')
<div class="container-fluid container-fullw bg-white">
    <div class="row">
        <div class="col-md-12">
            <h5 class="over-title margin-bottom-15">Basic <span class="text-bold">Data Table</span>
            </h5>
            <p>
                Untuk guru yang <b>telah diterima</b>, maka aksi hanya terdapat email untuk mengirimkan pesan pembayaran fee per bulan.
            </p>
            <p>
                Untuk calon guru, maka aksi juga terdapat email untuk mengirimkan pesan berupa info kelulusan.
            </p>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Nama Guru</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Bidang</th>
                            <th class="text-center">Curriculum Vitae</th>
                            <th class="text-center">Video <i>Microteaching</i></th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $u)
                        <tr>
                            <td>{{$u->id}}</td>
                            <td>{{$u->name}}</td>
                            <td>{{$u->email}}</td>
                            <td>
                                <ol>
                                    <li>Fisika</li>
                                </ol>
                            </td>
                            <td><button type="button" class="btn btn-wide btn-o btn-info">Download CV</button></td>
                            <td><button type="button" class="btn btn-wide btn-o btn-info">Lihat Video</button></td>
                            <td>Aktif/Tidak Aktif</td>
                            <td class="text-center">
                                <a href="http://" class="label label-success" title="Terima"><i class="ti-email"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop