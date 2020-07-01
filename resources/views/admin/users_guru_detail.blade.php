@extends('layouts.master')

@section('title', 'Detail Data Guru')
@section('css')
<link href="{{asset('vendor/bootstrap-fileinput/jasny-bootstrap.min.css')}}" rel="stylesheet" media="screen">
<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="screen">
<link href="{{asset('vendor/DataTables/css/DT_bootstrap.css')}}" rel="stylesheet" media="screen">
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
@stop
@section('main-title', 'Detail Data Guru')
@section('description', 'Detail data pendaftaran guru')
@section('pages', 'Home')
@section('active-pages', 'Detail Data Guru')
@section('content')
<div class="container-fluid container-fullw bg-white">
  <div class="row">
    <div class="form-group col-md-12">
      <div class="text-right">
        <p>
          <a class="btn btn-wide btn-dark-grey" href="{{route('admin.users.guru')}}"><i class="fa fa-backward"></i> Kembali</a>
        </p>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h5 class="over-title margin-bottom-15">Detail Data Pendaftaran Guru <b>{{$p->user->name}}</b> </h5>
      <div class="tabbable">
        <ul id="myTab1" class="nav nav-tabs">
          <li class="active">
            <a href="#pengalaman_mengajar" data-toggle="tab">
              Pengalaman Mengajar
            </a>
          </li>
          <li>
            <a href="#microteaching" data-toggle="tab">
              Microteaching
            </a>
          </li>
          <li>
            <a href="#akademis" data-toggle="tab">
              Akademis
            </a>
          </li>
          <li>
            <a href="#data-pribadi" data-toggle="tab">
              Data Pribadi
            </a>
          </li>
        </ul>
        <div class="tab-content">
          <!-- todo pengalaman_mengajar -->
          <div class="tab-pane fade in active" id="pengalaman_mengajar">
            <div class="row">
              <div class="col-md-12">
                <h5 class="over-title margin-bottom-15">
                  Pengalaman Mengajar (bulan)
                </h5>
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" placeholder="Readonly" value="{{$p->pengalaman_mengajar}} bulan" id="form-field-21" class="form-control" readonly>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- todo microteaching -->
          <div class="tab-pane fade" id="microteaching">
            <div class="row">
              <div class="col-md-12">
                <h5 class="over-title margin-bottom-15">
                  Penilaian Video Microteaching
                </h5>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="">Volume dan Artikulasi Suara</label>
                    <input type="text" placeholder="Readonly" value="{{$p->profileMatching->pm_vas}}" id="form-field-21" class="form-control" readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">Keefektifan Kalimat</label>
                    <input type="text" placeholder="Readonly" value="{{$p->profileMatching->pm_kk}}" id="form-field-21" class="form-control" readonly>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="">Cara Mengajar</label>
                    <input type="text" placeholder="Readonly" value="{{$p->profileMatching->pm_cm}}" id="form-field-21" class="form-control" readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">Penguasaan Materi</label>
                    <input type="text" placeholder="Readonly" value="{{$p->profileMatching->pm_pemat}}" id="form-field-21" class="form-control" readonly>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- todo Akademis -->
          <div class="tab-pane fade" id="akademis">
            <div class="row">
              <div class="col-md-12">
                <h5 class="over-title margin-bottom-15">
                  Nilai Akhir IPK
                </h5>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="">Nilai IPK</label>
                    <input type="text" placeholder="Readonly" value="{{$p->nilai_ipk}}" id="form-field-21" class="form-control" readonly>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- todo Data Pribadi -->
          <div class="tab-pane fade" id="data-pribadi">
            <div class="row">
              <div class="col-md-12">
                <h5 class="over-title margin-bottom-15">
                  Data Pribadi
                </h5>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="">Usia</label>
                    <input type="text" placeholder="Readonly" value="{{$age}} tahun" id="form-field-21" class="form-control" readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">Jumlah Ketersediaan Mata Pelajaran</label>
                    <input type="text" placeholder="Readonly" value="{{$guruMapels[0]->jumlah_guru_mapel}}" id="form-field-21" class="form-control" readonly>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop