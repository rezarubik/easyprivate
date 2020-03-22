@extends('layouts.master')

@section('title', 'Kriteria dan Bobot')
@section('css')
<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="screen">
<link href="{{asset('vendor/DataTables/css/DT_bootstrap.css')}}" rel="stylesheet" media="screen">
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
@stop
@section('main-title', 'Kriteria dan Bobot')
@section('description', 'Admin dapat melakukan CRUD pada data kriteria dan bobot seleksi penerimaan')
@section('pages', 'Home')
@section('active-pages', 'Kriteria dan Bobot Seleksi')
@section('content')
<div class="container-fluid container-fullw bg-white">
    <div class="row">
        <div class="col-md-12">
            <h5 class="over-title margin-bottom-15">
                Basic <span class="text-bold">Data Table</span>
            </h5>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde sint alias tenetur eveniet, sit, eaque molestias inventore eos ea cupiditate temporibus consequuntur dicta nulla, ex ducimus sed nisi! Aliquam, commodi.
            </p>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Kriteria</th>
                            <th class="text-center">Bobot (dalam %)</th>
                            <th class="text-center">Faktor Kriteria</th>
                            <th class="text-center">Nilai Target</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Pengalaman Mengajar</td>
                            <td>30%</td>
                            <td><i>Core Factor</i></td>
                            <td>4</td>
                            <td class="text-center">
                                <a href="http://" class="label label-success" title="Edit"><i class="ti-pencil"></i></a>
                                <a href="http://" class="label label-danger" title="Hapus"><i class="ti-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Volume dan Artikulasi Suara Video <i>Microteaching</i> </td>
                            <td>10%</td>
                            <td><i>Core Factor</i></td>
                            <td>4</td>
                            <td class="text-center">
                                <a href="http://" class="label label-success" title="Edit"><i class="ti-pencil"></i></a>
                                <a href="http://" class="label label-danger" title="Hapus"><i class="ti-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Keefektifan Kalimat Video <i>Microteaching</i> </td>
                            <td>10%</td>
                            <td><i>Core Factor</i></td>
                            <td>3</td>
                            <td class="text-center">
                                <a href="http://" class="label label-success" title="Edit"><i class="ti-pencil"></i></a>
                                <a href="http://" class="label label-danger" title="Hapus"><i class="ti-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Cara Mengajar Video <i>Microteaching</i> </td>
                            <td>10%</td>
                            <td><i>Core Factor</i></td>
                            <td>4</td>
                            <td class="text-center">
                                <a href="http://" class="label label-success" title="Edit"><i class="ti-pencil"></i></a>
                                <a href="http://" class="label label-danger" title="Hapus"><i class="ti-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Penguasaan Materi Video <i>Microteaching</i> </td>
                            <td>10%</td>
                            <td><i>Core Factor</i></td>
                            <td>5</td>
                            <td class="text-center">
                                <a href="http://" class="label label-success" title="Edit"><i class="ti-pencil"></i></a>
                                <a href="http://" class="label label-danger" title="Hapus"><i class="ti-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Nilai Indeks Prestasi Terakhir (IPK) </td>
                            <td>6%</td>
                            <td><i>Secondary Factor</i></td>
                            <td>4</td>
                            <td class="text-center">
                                <a href="http://" class="label label-success" title="Edit"><i class="ti-pencil"></i></a>
                                <a href="http://" class="label label-danger" title="Hapus"><i class="ti-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Usia Guru</td>
                            <td>12%</td>
                            <td><i>Secondary Factor</i></td>
                            <td>4</td>
                            <td class="text-center">
                                <a href="http://" class="label label-success" title="Edit"><i class="ti-pencil"></i></a>
                                <a href="http://" class="label label-danger" title="Hapus"><i class="ti-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Ketersediaan Mata Pelajaran</td>
                            <td>12%</td>
                            <td><i>Secondary Factor</i></td>
                            <td>4</td>
                            <td class="text-center">
                                <a href="http://" class="label label-success" title="Edit"><i class="ti-pencil"></i></a>
                                <a href="http://" class="label label-danger" title="Hapus"><i class="ti-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <h5 class="over-title margin-bottom-15">
                <span class="text-bold">Keterangan Nilai Target</span>
            </h5>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                        <tr>
                            <th class="">Nilai Target</th>
                            <th class="">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Sangat Kurang</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Kurang</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Cukup</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Baik</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Sangat Baik</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop