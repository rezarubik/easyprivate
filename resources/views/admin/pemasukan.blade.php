@extends('layouts.master')

@section('title', 'Pemasukan')
@section('css')
<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="screen">
<link href="{{asset('vendor/DataTables/css/DT_bootstrap.css')}}" rel="stylesheet" media="screen">
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
@stop
@section('main-title', 'Data Pemasukan Easy Private')
@section('description', 'Pemasukan per periode')
@section('pages', 'Home')
@section('active-pages', 'Pemasukan')
@section('content')
<div class="container-fluid container-fullw bg-white">
  <div class="row">
    <div class="col-md-12">
      <h5 class="over-title margin-bottom-15">
        Data <span class="text-bold">Pemasukan</span>
      </h5>
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
          <thead>
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">Keterangan</th>
              <th class="text-center">Periode</th>
              <th class="text-center">Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Pembayaran Murid A</td>
              <td>April 2020</td>
              <td>Rp600.000,00</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


@stop