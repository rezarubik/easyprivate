@extends('layouts.master')

@section('title', 'Data Guru')
@section('css')
<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="screen">
<link href="{{asset('vendor/DataTables/css/DT_bootstrap.css')}}" rel="stylesheet" media="screen">
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
@stop
@section('main-title', 'Detail Data Guru')
@section('description', 'Terdapat data calon guru dan data guru yang sudah diterima')
@section('pages', 'Home')
@section('active-pages', 'Data Guru')
@section('content')
<div class="container-fluid container-fullw bg-white">
    <div class="row">
        <div class="col-md-12">
            <h5 class="over-title margin-bottom-15">Basic <span class="text-bold">Data Table</span>
            </h5>
            <p>
                DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible
                tool, based upon the foundations of progressive enhancement, and will add advanced
                interaction controls to any HTML table.
            </p>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Bidang</th>
                            <th>Curriculum Vitae</th>
                            <th>Video <i>Microteaching</i></th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Muhammad Reza Pahlevi Y</td>
                            <td>muhammad.reza.pahlevi.y@gmail.com</td>
                            <td>
                                <ol>
                                    <li>Matematika</li>
                                    <li>Fisika</li>
                                </ol>
                            </td>
                            <td><button type="button" class="btn btn-wide btn-o btn-info">Download CV</button></td>
                            <td><button type="button" class="btn btn-wide btn-o btn-info">Lihat Video</button></td>
                            <td>Aktif/Tidak Aktif</td>
                            <td>
                                <a href="http://" class="label label-success" title="Terima"><i class="fa fa-check fa-white"></i></a>
                                <a href="http://" class="label label-danger" title="Tolak"><i class="fa fa-times fa-white"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Muhammad Reza Pahlevi Y</td>
                            <td>muhammad.reza.pahlevi.y@gmail.com</td>
                            <td>
                                <ol>
                                    <li>Matematika</li>
                                    <li>Fisika</li>
                                </ol>
                            </td>
                            <td><button type="button" class="btn btn-wide btn-o btn-info">Download CV</button></td>
                            <td><button type="button" class="btn btn-wide btn-o btn-info">Lihat Video</button></td>
                            <td>Aktif/Tidak Aktif</td>
                            <td>
                                <a href="http://" class="label label-success" title="Terima"><i class="fa fa-check fa-white"></i></a>
                                <a href="http://" class="label label-danger" title="Tolak"><i class="fa fa-times fa-white"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Muhammad Reza Pahlevi Y</td>
                            <td>muhammad.reza.pahlevi.y@gmail.com</td>
                            <td>
                                <ol>
                                    <li>Matematika</li>
                                    <li>Fisika</li>
                                </ol>
                            </td>
                            <td><button type="button" class="btn btn-wide btn-o btn-info">Download CV</button></td>
                            <td><button type="button" class="btn btn-wide btn-o btn-info">Lihat Video</button></td>
                            <td>Aktif/Tidak Aktif</td>
                            <td>
                                <a href="http://" class="label label-success" title="Terima"><i class="fa fa-check fa-white"></i></a>
                                <a href="http://" class="label label-danger" title="Tolak"><i class="fa fa-times fa-white"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Muhammad Reza Pahlevi Y</td>
                            <td>muhammad.reza.pahlevi.y@gmail.com</td>
                            <td>
                                <ol>
                                    <li>Matematika</li>
                                    <li>Fisika</li>
                                </ol>
                            </td>
                            <td><button type="button" class="btn btn-wide btn-o btn-info">Download CV</button></td>
                            <td><button type="button" class="btn btn-wide btn-o btn-info">Lihat Video</button></td>
                            <td>Aktif/Tidak Aktif</td>
                            <td>
                                <a href="http://" class="label label-success" title="Terima"><i class="fa fa-check fa-white"></i></a>
                                <a href="http://" class="label label-danger" title="Tolak"><i class="fa fa-times fa-white"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Muhammad Reza Pahlevi Y</td>
                            <td>muhammad.reza.pahlevi.y@gmail.com</td>
                            <td>
                                <ol>
                                    <li>Matematika</li>
                                    <li>Fisika</li>
                                </ol>
                            </td>
                            <td><button type="button" class="btn btn-wide btn-o btn-info">Download CV</button></td>
                            <td><button type="button" class="btn btn-wide btn-o btn-info">Lihat Video</button></td>
                            <td>Aktif/Tidak Aktif</td>
                            <td>
                                <a href="http://" class="label label-success" title="Terima"><i class="fa fa-check fa-white"></i></a>
                                <a href="http://" class="label label-danger" title="Tolak"><i class="fa fa-times fa-white"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Muhammad Reza Pahlevi Y</td>
                            <td>muhammad.reza.pahlevi.y@gmail.com</td>
                            <td>
                                <ol>
                                    <li>Matematika</li>
                                    <li>Fisika</li>
                                </ol>
                            </td>
                            <td><button type="button" class="btn btn-wide btn-o btn-info">Download CV</button></td>
                            <td><button type="button" class="btn btn-wide btn-o btn-info">Lihat Video</button></td>
                            <td>Aktif/Tidak Aktif</td>
                            <td>
                                <a href="http://" class="label label-success" title="Terima"><i class="fa fa-check fa-white"></i></a>
                                <a href="http://" class="label label-danger" title="Tolak"><i class="fa fa-times fa-white"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Muhammad Reza Pahlevi Y</td>
                            <td>muhammad.reza.pahlevi.y@gmail.com</td>
                            <td>
                                <ol>
                                    <li>Matematika</li>
                                    <li>Fisika</li>
                                </ol>
                            </td>
                            <td><button type="button" class="btn btn-wide btn-o btn-info">Download CV</button></td>
                            <td><button type="button" class="btn btn-wide btn-o btn-info">Lihat Video</button></td>
                            <td>Aktif/Tidak Aktif</td>
                            <td>
                                <a href="http://" class="label label-success" title="Terima"><i class="fa fa-check fa-white"></i></a>
                                <a href="http://" class="label label-danger" title="Tolak"><i class="fa fa-times fa-white"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Muhammad Reza Pahlevi Y</td>
                            <td>muhammad.reza.pahlevi.y@gmail.com</td>
                            <td>
                                <ol>
                                    <li>Matematika</li>
                                    <li>Fisika</li>
                                </ol>
                            </td>
                            <td><button type="button" class="btn btn-wide btn-o btn-info">Download CV</button></td>
                            <td><button type="button" class="btn btn-wide btn-o btn-info">Lihat Video</button></td>
                            <td>Aktif/Tidak Aktif</td>
                            <td>
                                <a href="http://" class="label label-success" title="Terima"><i class="fa fa-check fa-white"></i></a>
                                <a href="http://" class="label label-danger" title="Tolak"><i class="fa fa-times fa-white"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Muhammad Reza Pahlevi Y</td>
                            <td>muhammad.reza.pahlevi.y@gmail.com</td>
                            <td>
                                <ol>
                                    <li>Matematika</li>
                                    <li>Fisika</li>
                                </ol>
                            </td>
                            <td><button type="button" class="btn btn-wide btn-o btn-info">Download CV</button></td>
                            <td><button type="button" class="btn btn-wide btn-o btn-info">Lihat Video</button></td>
                            <td>Aktif/Tidak Aktif</td>
                            <td>
                                <a href="http://" class="label label-success" title="Terima"><i class="fa fa-check fa-white"></i></a>
                                <a href="http://" class="label label-danger" title="Tolak"><i class="fa fa-times fa-white"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Muhammad Reza Pahlevi Y</td>
                            <td>muhammad.reza.pahlevi.y@gmail.com</td>
                            <td>
                                <ol>
                                    <li>Matematika</li>
                                    <li>Fisika</li>
                                </ol>
                            </td>
                            <td><button type="button" class="btn btn-wide btn-o btn-info">Download CV</button></td>
                            <td><button type="button" class="btn btn-wide btn-o btn-info">Lihat Video</button></td>
                            <td>Aktif/Tidak Aktif</td>
                            <td>
                                <a href="http://" class="label label-success" title="Terima"><i class="fa fa-check fa-white"></i></a>
                                <a href="http://" class="label label-danger" title="Tolak"><i class="fa fa-times fa-white"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Muhammad Reza Pahlevi Y</td>
                            <td>muhammad.reza.pahlevi.y@gmail.com</td>
                            <td>
                                <ol>
                                    <li>Matematika</li>
                                    <li>Fisika</li>
                                </ol>
                            </td>
                            <td><button type="button" class="btn btn-wide btn-o btn-info">Download CV</button></td>
                            <td><button type="button" class="btn btn-wide btn-o btn-info">Lihat Video</button></td>
                            <td>Aktif/Tidak Aktif</td>
                            <td>
                                <a href="http://" class="label label-success" title="Terima"><i class="fa fa-check fa-white"></i></a>
                                <a href="http://" class="label label-danger" title="Tolak"><i class="fa fa-times fa-white"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Muhammad Reza Pahlevi Y</td>
                            <td>muhammad.reza.pahlevi.y@gmail.com</td>
                            <td>
                                <ol>
                                    <li>Matematika</li>
                                    <li>Fisika</li>
                                </ol>
                            </td>
                            <td><button type="button" class="btn btn-wide btn-o btn-info">Download CV</button></td>
                            <td><button type="button" class="btn btn-wide btn-o btn-info">Lihat Video</button></td>
                            <td>Aktif/Tidak Aktif</td>
                            <td>
                                <a href="http://" class="label label-success" title="Terima"><i class="fa fa-check fa-white"></i></a>
                                <a href="http://" class="label label-danger" title="Tolak"><i class="fa fa-times fa-white"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
<!-- @section('js-pages') -->
<!-- <script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<script src="{{asset('vendor/DataTables/jquery.dataTables.min.js')}}"></script> -->
<!-- @stop -->
<!-- @section('js-handlers-additional') -->
<!-- <script src="{{asset('assets/js/table-data.js')}}"></script> -->
<!-- @stop -->