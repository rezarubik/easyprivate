@extends('layouts.master')

@section('title', 'Data Murid')
@section('css')
<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="screen">
<link href="{{asset('vendor/DataTables/css/DT_bootstrap.css')}}" rel="stylesheet" media="screen">
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
@stop
@section('main-title', 'Detail Data Murid')
@section('description', 'Daftar Data Murid')
@section('pages', 'Home')
@section('active-pages', 'Data Murid')
@section('content')
<?php
// var_dump($user);
// die();
?>
<div class="container-fluid container-fullw bg-white">
    <div class="row">
        <div class="col-md-12">
            <h5 class="over-title margin-bottom-15">Data <span class="text-bold">Murid</span>
            </h5>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Nama Murid</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Nomor <i>Handphone</i></th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $u)
                        <tr>
                            <td>{{$u->id}}</td>
                            <td>{{$u->name}}</td>
                            <td>{{$u->email}}</td>
                            <td>{{$u->no_handphone}}</td>
                            <td>
                                {{$u->alamat->alamat_lengkap}}
                            </td>
                            <td class="text-center">
                                <a href="http://" class="label label-success" title="Kirim Email"><i class="ti-email"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        <!-- <tr>
                            <td>1</td>
                            <td>Nadiah Tsamara Pratiwi</td>
                            <td>tspnadiah@gmail.com</td>
                            <td>089501011011</td>
                            <td>Jl. Kalibata Tengah XVII No.29</td>
                            <td class="text-center">
                                <a href="http://" class="label label-success" title="Kirim Email"><i class="ti-email"></i></a>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop