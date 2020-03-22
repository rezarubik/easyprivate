@extends('layouts.master')

@section('title', 'Video Microteaching')
@section('css')
<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="screen">
<link href="{{asset('vendor/DataTables/css/DT_bootstrap.css')}}" rel="stylesheet" media="screen">
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
@stop
@section('main-title', 'Video Microteaching')
@section('description', 'Admin dapat melihat dan memberi nilai pada Video Microteaching Peserta')
@section('pages', 'Home')
@section('active-pages', 'Video Microteaching')
@section('content')
<div class="container-fluid container-fullw bg-white">
    <div class="row">
        <div class="col-md-12">
            <h5 class="over-title margin-bottom-15">
                Video Microteaching Penerimaan Guru Private
            </h5>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Peserta</th>
                            <th>Email</th>
                            <th>Video</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Muhammad Reza Pahlevi Y</td>
                            <td>muhammad.reza.pahlevi.y@gmail.com</td>
                            <td><button type="button" class="btn btn-wide btn-o btn-info">Lihat Video</button></td>
                            <td class="text-center">
                                <a href="http://" class="label label-success" title="Beri Nilai"><i class="ti-gift"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Nadiah Tsamara Pratiwi</td>
                            <td>tspnadiah@gmail.com</td>
                            <td><button type="button" class="btn btn-wide btn-o btn-info">Lihat Video</button></td>
                            <td class="text-center">
                                <a href="http://" class="label label-success" title="Beri Nilai"><i class="ti-gift"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop