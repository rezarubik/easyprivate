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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendaftaranGuru as $pg)
                        <tr>
                            <td>{{$pg->id_pendaftaran}}</td>
                            <td>{{$pg->user->name}}</td>
                            <td>{{$pg->user->email}}</td>
                            <td class="text-center">
                                @if(isset($pg->dir_video))
                                <button class="btn-sm btn-primary btn-o" data-toggle="modal" data-target="#penilaianMicroteaching{{$pg->id_pendaftaran}}">
                                    <!-- <a class="label label-success" title="Beri Nilai"><i class="ti-gift"></i></a> -->
                                    Beri Nilai
                                </button>
                                @else
                                <label for="" class="lable-warning">Tidak ada file</label>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Default Modal -->
    <!-- Form -->
    @foreach($pendaftaranGuru as $pg)
    <form action="/score-video-microteaching" method="post">
    @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="modal fade" id="penilaianMicroteaching{{$pg->id_pendaftaran}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <input type="hidden" name="id_pendaftaran" value='{{$pg->id_pendaftaran}}'>
                                    <h4 class="modal-title" id="myModalLabel">Penilaian Video Microteaching</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="text-center form-group col-md-12">
                                            <video width="320" height="240" controls>
                                                <source src="{{URL::asset('/assets/video_microteaching/')}}/{{$pg->dir_video}}" type="video/mp4">
                                            </video>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="vas" class="control-label">Volume dan Artikulasi Suara</label>
                                            <input type="number" name="vas" class="form-control underline" min=0 max=5 placeholder="Penilaian Volume dan Artikulasi Suara">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="km" class="control-label">Keefektifan Kalimat</label>
                                            <input type="number" name="kk" class="form-control underline" min=0 max=5 placeholder="Penilaian Keefektifan Kalimat">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="cm" class="control-label">Cara Mengajar</label>
                                            <input type="number" name="cm" class="form-control underline" min=0 max=5 placeholder="Penilaian Cara Mengajar">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="pemat" class="control-label">Penguasaan Materi</label>
                                            <input type="number" name="pemat" class="form-control underline" min=0 max=5 placeholder="Penilaian Penguasaan Materi">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary btn-o" data-dismiss="modal">
                                        Batal
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        Nilai
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endforeach
    <!-- /Form -->
    <!-- /Default Modal -->
</div>
@stop