@extends('layouts.master')

@section('title', 'Pembobotan Nilai GAP')
@section('css')
<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="screen">
<link href="{{asset('vendor/DataTables/css/DT_bootstrap.css')}}" rel="stylesheet" media="screen">
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
@stop
@section('main-title', 'Pembobotan Nilai GAP')
@section('description', 'Admin dapat melihat data Pembobotan Nilai GAP seleksi penerimaan')
@section('pages', 'Home')
@section('active-pages', 'Pembobotan Nilai GAP Seleksi')
@section('content')
<div class="container-fluid container-fullw bg-white">
    <div class="row">
        <div class="col-md-12">
            <h5 class="over-title margin-bottom-15">
                Pemberian bobot pada nilai GAP mengikuti aturan berikut
            </h5>
            <div class="table-responsive margin-bottom-30">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Selisih</th>
                            <th>Bobot Nilai</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>0</td>
                            <td>5</td>
                            <td>Kompetensi Individu sesuai dengan yang dibutuhkan (tidak ada selisih)</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>4.5</td>
                            <td>Kompetensi Individu kelebihan 1 tingkat</td>
                        </tr>
                        <tr>
                            <td>-1</td>
                            <td>4</td>
                            <td>Kompetensi Individu kekurangan 1 tingkat</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>3.5</td>
                            <td>Kompetensi Individu kelebihan 2 tingkat</td>
                        </tr>
                        <tr>
                            <td>-2</td>
                            <td>3</td>
                            <td>Kompetensi Individu kekurangan 2 tingkat</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>2.5</td>
                            <td>Kompetensi Individu kelebihan 3 tingkat</td>
                        </tr>
                        <tr>
                            <td>-3</td>
                            <td>2</td>
                            <td>Kompetensi Individu kekurangan 3 tingkat</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>1.5</td>
                            <td>Kompetensi Individu kelebihan 4 tingkat</td>
                        </tr>
                        <tr>
                            <td>-4</td>
                            <td>1</td>
                            <td>Kompetensi Individu kekurangan 4 tingkat</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h5 class="over-title margin-bottom-15">
                Pemetaan Pembobotan Nilai GAP Seleksi Penerimaan Guru Private
            </h5>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                        <tr>
                            <th class="text-center" rowspan="2">ID</th>
                            <th class="text-center" rowspan="2">Nama Peserta</th>
                            <th class="text-center" class="text-center" colspan="8">Kriteria</th>
                        </tr>
                        <tr>
                            <th>Pengalaman Mengajar</th>
                            <th>Volume dan Artikulasi Suara pada Video <i>Microteaching</i></th>
                            <th>Keefektifan Kalimat pada Video <i>Microteaching</i></th>
                            <th>Cara Mengajar pada Video <i>Microteaching</i></th>
                            <th>Penguasaan Materi pada Video <i>Microteaching</i></th>
                            <th>Nilai IPK Akhir</th>
                            <th>Usia Peserta</th>
                            <th>Ketersediaan Mata Pelajaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendaftaranGuru as $pg)
                        <tr>
                            <td>{{$pg->id_pendaftaran}}</td>
                            <td>{{$pg->user->name}}</td>
                            <td>{{$pg->profileMatching->pm_pk}}</td>
                            <td>{{$pg->profileMatching->pm_vas}}</td>
                            <td>{{$pg->profileMatching->pm_kk}}</td>
                            <td>{{$pg->profileMatching->pm_cm}}</td>
                            <td>{{$pg->profileMatching->pm_pemat}}</td>
                            <td>{{$pg->profileMatching->pm_ipk}}</td>
                            <td>{{$pg->profileMatching->pm_usia}}</td>
                            <td>{{$pg->profileMatching->pm_km}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop