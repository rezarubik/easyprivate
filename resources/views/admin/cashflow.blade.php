@extends('layouts.master')
@section('title', 'Cashflow')
@section('css')
<link href="{{asset('vendor/bootstrap-fileinput/jasny-bootstrap.min.css')}}" rel="stylesheet" media="screen">
<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="screen">
<link href="{{asset('vendor/DataTables/css/DT_bootstrap.css')}}" rel="stylesheet" media="screen">
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
@stop
@section('main-title', 'Cashflow Easy Private')
@section('description', 'Inflow, Outflow, dan Saldo Akhir')
@section('blank-page', 'Cashflow')
@section('content')
<div class="container-fluid container-fullw bg-white">
  <div class="row">
    <div class="col-md-12">
      <h5 class="over-title margin-bottom-15">Togglable <span class="text-bold">Tabs</span></h5>
      <p>
        Add quick, dynamic tab functionality to transition through panes of content, even via dropdown menus.
      </p>
      <div class="tabbable">
        <ul id="myTab1" class="nav nav-tabs">
          <li class="active">
            <a href="#inflow" data-toggle="tab">
              Inflow
            </a>
          </li>
          <li>
            <a href="#outflow" data-toggle="tab">
              Outflow
            </a>
          </li>
          <li>
            <a href="#profit" data-toggle="tab">
              Profit
            </a>
          </li>
        </ul>
        <div class="tab-content">
          <!-- todo Inflow -->
          <div class="tab-pane fade in active" id="inflow">
            <div class="row">
              <div class="col-md-12">
                <h5 class="over-title margin-bottom-15">
                  Data <span class="text-bold">Pemasukan</span>
                </h5>
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                    <thead>
                      <tr>
                        <!--<th class="text-center">ID</th>-->
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Periode</th>
                        <th class="text-center">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($absenPembayaran as $inflow)
                      <tr>
                        <!--<td>{{$inflow->id}}</td>-->
                        <td>Pembayaran Murid {{$inflow->murid->name}}</td>
                        <td>
                          <?php
                          $monthNum  = $inflow->bulan;
                          $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                          $monthName = $dateObj->format('F'); // March
                          echo $monthName;
                          ?>
                          , {{$inflow->tahun}}
                        </td>
                        <td>
                          Rp<?php
                            $total = 0;
                            $total = $inflow->jumlah_absen * $inflow->pemesanan->mataPelajaran->jenjang->harga_per_pertemuan;
                            echo number_format($total, 2, ',', '.')
                            ?>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- todo Outflow -->
          <div class="tab-pane fade" id="outflow">
            <div class="row">
              <div class="col-md-12">
                <h5 class="over-title margin-bottom-15">
                  Data <span class="text-bold">Pengeluaran</span>
                </h5>
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                    <thead>
                      <tr>
                        <!--<th class="text-center">ID</th>-->
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Periode</th>
                        <th class="text-center">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($absenPembayaran as $outflow)
                      <tr>
                        <!--<td>1</td>-->
                        <td>Fee Guru {{$outflow->guru->name}}</td>
                        <td>
                          <?php
                          $monthNum  = $outflow->bulan;
                          $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                          $monthName = $dateObj->format('F'); // March
                          echo $monthName;
                          ?>
                          , {{$outflow->tahun}}
                        </td>
                        <td>
                          Rp<?php
                            $total = 0;
                            $total = $outflow->jumlah_absen * $outflow->pemesanan->mataPelajaran->jenjang->upah_guru_per_pertemuan;
                            echo number_format($total, 2, ',', '.')
                            ?>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- todo Profit -->
          <div class="tab-pane fade" id="profit">
            <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
              <thead>
                <tr>
                  <th class="text-center">Inflow</th>
                  <th class="text-center">Outflow</th>
                  <th class="text-center">Periode</th>
                  <th class="text-center">Profit</th>
                </tr>
              </thead>
              <tbody>
                @foreach($absenPembayaran as $ap)
                <tr>
                  <td>
                    Rp<?php
                      $profitInflow = 0;
                      $profitInflow = $ap->jumlah_absen * $ap->pemesanan->mataPelajaran->jenjang->harga_per_pertemuan;
                      echo number_format($profitInflow, 2, ',', '.');
                      ?>
                  </td>
                  <td>
                    Rp<?php
                      $profitOutflow = 0;
                      $profitOutflow = $ap->jumlah_absen * $ap->pemesanan->mataPelajaran->jenjang->upah_guru_per_pertemuan;
                      echo number_format($profitOutflow, 2, ',', '.');
                      ?>
                  </td>
                  <td>
                    <?php
                    $monthNum  = $outflow->bulan;
                    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                    $monthName = $dateObj->format('F'); // March
                    echo $monthName;
                    ?>
                    , {{$outflow->tahun}}
                  </td>
                  <td>
                    Rp<?php
                      $profit = 0;
                      $profit = $profitInflow - $profitOutflow;
                      echo number_format($profit, 2, ',', '.');
                      ?>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@stop

@section('javascript')
<script src="{{asset('vendor/maskedinput/jquery.maskedinput.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
<script src="{{asset('vendor/autosize/autosize.min.js')}}"></script>
<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<script src="{{asset('vendor/selectFx/classie.js')}}"></script>
<script src="{{asset('vendor/selectFx/selectFx.js')}}"></script>
<!-- <script src="{{asset('assets/js/form-elements.js')}}"></script> -->
<script src="{{asset('vendor/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap-timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap-fileinput/jasny-bootstrap.js')}}"></script>
<!-- form validation -->
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="{{asset('vendor/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('vendor/ckeditor/adapters/jquery.js')}}"></script>
<script src="{{asset('vendor/jquery-validation/jquery.validate.min.js')}}"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="{{asset('assets/js/form-validation.js')}}"></script>
<script>
  jQuery(document).ready(function() {
    // Main.init();
    // FormValidator.init();
  });
</script>
@stop