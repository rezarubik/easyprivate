@extends('layouts.master')

@section('title', 'Kriteria dan Bobot')
@section('css')
<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->

<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
@stop
@section('main-title', 'Kriteria dan Bobot')
@section('description', 'Admin dapat mengedit data kriteria dan bobot seleksi penerimaan')
@section('pages', 'Home')
@section('active-pages', 'Kriteria dan Bobot Seleksi')
@section('content')
<div class="container-fluid container-fullw bg-white">
  <div class="row">
    <div class="col-md-12">
      <h2>Edit Data Kriteria dan Bobot</h2>
      <form action="{{route('kriteria.bobot.update', $kbt)}}" method="post" id="form" role="form">
        @csrf
        @method('patch')
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="control-label" for="kriteria">
                Kriteria <span class="symbol required"></span>
              </label>
              <input type="text" name="kriteria" placeholder="Masukkan nama kriteria" class="form-control" value="{{$kbt->kriteria}}" id="kriteria">
            </div>
            <div class="form-group">
              <label class="control-label" for="bobot">
                Bobot (dalam %) <span class="symbol required"></span>
              </label>
              <input type="text" name="bobot" placeholder="Masukkan nama bobot" class="form-control" value="{{$kbt->bobot}}" id="bobot" min="0" max="1">
            </div>
            <div class="form-group">
              <label class="control-label" for="faktor_kriteria">
                Faktor Kriteria <span class="symbol required"></span>
              </label>
              <input type="text" name="faktor_kriteria" placeholder="Masukkan nama faktor kriteria" class="form-control" value="{{$kbt->faktor_kriteria}}" id="faktor_kriteria">
            </div>
            <div class="form-group">
              <label class="control-label" for="nilai_target">
                Nilai Target <span class="symbol required"></span>
              </label>
              <input type="text" name="nilai_target" placeholder="Masukkan nama nilai_target" class="form-control" value="{{$kbt->nilai_target}}" id="nilai_target" min="1" max="5">
            </div>
            <button class="btn btn-primary btn-wide pull-right" type="submit">
              Simpan <i class="fa fa-arrow-circle-right"></i>
            </button>
            <a class="btn btn-wide btn-warning" href="{{route('kriteria.bobot')}}"><i class="fa fa-remove"></i> Batal</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@stop

@section('javascript')
<script src="{{asset('vendor/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('vendor/ckeditor/adapters/jquery.js')}}"></script>
<script src="{{asset('vendor/jquery-validation/jquery.validate.min.js')}}"></script>
@stop