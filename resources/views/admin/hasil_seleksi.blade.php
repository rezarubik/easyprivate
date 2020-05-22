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
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row">
        <div class="form-group col-md-12">
            <div class="text-right">
                <p>
                    <a class="btn btn-wide btn-primary" href="{{route('profile.matching')}}"><i class="fa fa-floppy-o"></i> Lakukan Seleksi</a>
                </p>
            </div>
        </div>
    </div>
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
                        @foreach($pendaftaranGuru as $pg)
                        <tr>
                            <td>{{$pg->user->id}}</td>
                            <td>{{$pg->user->name}}</td>
                            <td>{{$pg->user->email}}</td>
                            <td>
                                @if($pg->status == null)
                                <label class="badge badge-warning">
                                    Belum diproses
                                </label>
                                @elseif($pg->status == 1)
                                <label class="badge badge-success">
                                    Lulus
                                </label>
                                @elseif($pg->status == 2)
                                <label class="badge badge-danger">
                                    Tidak Lulus
                                </label>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="http://" class="label label-success" title="Kirim Email"><i class="ti-email"></i></a>
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