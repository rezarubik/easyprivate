@extends('layouts.master')

@section('title', 'Data Guru')
@section('css')
<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="screen">
<link href="{{asset('vendor/DataTables/css/DT_bootstrap.css')}}" rel="stylesheet" media="screen">
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
@stop
@section('main-title', 'Detail Data Guru')
@section('description', 'Data Guru yang diterima, tidak diterima, dan belum diseleksi')
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
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendaftaranGuru as $p)
                        <?php
                        // var_dump($p->status);
                        // die;
                        ?>
                        <tr>
                            <td>{{$p->user->id}}</td>
                            <td> <a href="{{route('users.guru.detail', $p)}}" class="">{{$p->user->name}}</a> </td>
                            <td>{{$p->user->email}}</td>
                            <td>
                                <ol>
                                    @foreach($guruMapel as $mata_pelajaran)
                                    @if($mata_pelajaran->id_guru == $p->user->id)
                                    <li>
                                        {{$mata_pelajaran->mataPelajaran->nama_mapel}}
                                    </li>
                                    @endif
                                    @endforeach
                                </ol>
                            </td>
                            <td>
                                @if(isset($p->dir_cv))
                                <a href="{{asset('assets/cv_guru/' . $p->dir_cv)}}" class="btn btn-sm btn-primary btn-o">
                                    Lihat CV {{$p->dir_cv}}
                                </a>
                                @endif
                            </td>
                            <!-- <td><a href="" class="btn btn-wide btn-o btn-info">{{$p->dir_cv}}</a></td> -->
                            <td>
                                @if($p->status == 0)
                                <label for="" class="label label-warning">Belum Diseleksi</label>
                                @elseif($p->status == 1)
                                <label for="" class="label label-success">Aktif (diterima)</label>
                                @elseif($p->status == 2)
                                <label for="" class="label label-danger">Tidak Aktif (tidak diterima)</label>
                                @endif
                            </td>
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