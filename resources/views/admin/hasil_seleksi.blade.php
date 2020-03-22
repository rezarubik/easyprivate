@extends('layouts.master')

@section('title', 'Hasil Seleksi')
@section('css')
<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="screen">
<link href="{{asset('vendor/DataTables/css/DT_bootstrap.css')}}" rel="stylesheet" media="screen">
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
@stop
@section('main-title', 'Hasil Seleksi')
@section('description', 'Admin dapat melihat data Hasil Seleksi penerimaan')
@section('pages', 'Home')
@section('active-pages', 'Hasil Seleksi')
@section('content')
<div class="container-fluid container-fullw bg-white">
    <div class="row">
        <div class="col-md-12">
            <h5 class="over-title margin-bottom-15">
                Hasil Seleksi Penerimaan Guru Private
            </h5>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Peserta</th>
                            <th>Email</th>
                            <th>Hasil</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Muhammad Reza Pahlevi Y</td>
                            <td>muhammad.reza.pahlevi.y@gmail.com</td>
                            <td>
                                <a href="" class="badge badge-success">Lulus</a>
                            </td>
                            <td class="text-center">
                                <a href="http://" class="label label-success" title="Kirim Email"><i class="ti-email"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Nadiah Tsamara Pratiwi</td>
                            <td>tspnadiah@gmail.com</td>
                            <td>
                                <a href="" class="badge badge-success">Lulus</a>
                            </td>
                            <td class="text-center">
                                <a href="http://" class="label label-success" title="Kirim Email"><i class="ti-email"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop