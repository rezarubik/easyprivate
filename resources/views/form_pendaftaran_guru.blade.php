<!-- //! app untuk guru -->
@extends('layouts.app')

@section('title', 'Dashboard Guru')
@section('main-title', 'Pendaftaran Guru')
@section('description', 'Form Pendaftaran Guru')
@section('blank-page', 'Pendaftaran Guru')
@section('content')
<!-- //todo start: tabs -->
<div class="container-fluid container-fullw bg-white">
    <!-- //todo start: form -->
    <form action="{{url('test')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="tabbable">
                    <ul class="nav nav-tabs tab-padding tab-space-3 tab-blue" id="myTab4">
                        <li class="active">
                            <a data-toggle="tab" href="#data_diri">
                                Data Diri
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#alamat">
                                Alamat
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#mata_pelajaran">
                                Mata Pelajaran
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#cv_video">
                                CV dan Video <i>Microteaching</i>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="data_diri" class="tab-pane fade in active">
                            <div class="row padding-20">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" placeholder="Contoh: nama@gmail.com">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="nama_lengkap">Nama Lengkap</label>
                                                    <input type="text" class="form-control" placeholder="Contoh: Muhammad Reza Pahlevi Y">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="birthday">Tanggal Lahir</label>
                                                    <input class="form-control format-datepicker" type="text" placeholder="Pilih tanggal lahir Anda">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="nilai_ipk">Nilai IPK</label>
                                                    <input type="number" class="form-control" placeholder="Contoh: 4.0" step="0.01" min="0">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="pengalaman_mengajar">Pengalaman Mengajar (tahun)</label>
                                                    <input type="number" class="form-control" placeholder="Contoh: 4 tahun" min="0">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                                    <select class="js-example-placeholder-single js-states form-control">
                                                        <option value=""></option>
                                                        <option value="laki-laki">Laki-Laki</option>
                                                        <option value="perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="no_hp">Nomor <i>Handphone</i> yang dapat dihubungi </label>
                                                    <input type="number" class="form-control" placeholder="Contoh: 089501011011" min="0">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="alamat" class="tab-pane fade in">
                            <div class="row padding-20">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-8">
                                                    <h5 class="over-title margin-bottom-15">Alamat Lengkap</h5>
                                                    <form id="geocoding_form" method="post">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" placeholder="Alamat:" id="address" name="address">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-bricky" type="submit">
                                                                        Cari
                                                                    </button> </span>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="map" id="map4"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="mata_pelajaran" class="tab-pane fade in">
                            <div class="row padding-20">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" placeholder="Contoh: nama@gmail.com">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" placeholder="Contoh: nama@gmail.com">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" placeholder="Contoh: nama@gmail.com">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="cv_video" class="tab-pane fade in">
                            <div class="row padding-20">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" placeholder="Contoh: nama@gmail.com">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" placeholder="Contoh: nama@gmail.com">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" placeholder="Contoh: nama@gmail.com">
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
        </div>
    </form>
    <!-- //todo end: form -->
</div>
<!-- //todo end: tabs -->

@endsection