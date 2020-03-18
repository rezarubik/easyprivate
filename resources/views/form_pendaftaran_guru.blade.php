<!-- //! app untuk guru -->
@extends('layouts.app')

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
                <h5 class="over-title margin-bottom-15">Pendaftaran <span class="text-bold">Guru Baru</span></h5>
                <p>
                    Isilah form berikut dengan data yang benar.
                </p>
                <div class="tabbable">
                    <ul id="myTab1" class="nav nav-tabs">
                        <li class="active">
                            <a href="#biodata" data-toggle="tab">
                                Data Diri
                            </a>
                        </li>
                        <li>
                            <a href="#address" data-toggle="tab">
                                Alamat
                            </a>
                        </li>
                        <li>
                            <a href="#mata_pelajaran" data-toggle="tab">
                                Mata Pelajaran
                            </a>
                        </li>
                        <li>
                            <a href="#upload_file" data-toggle="tab">
                                CV dan Video <i>Microteaching</i>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="biodata">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="email">
                                            Email
                                        </label>
                                        <input type="email" class="form-control" placeholder="Contoh: nama@gmail.com">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="nama_lengkap">
                                            Nama Lengkap
                                        </label>
                                        <input type="text" class="form-control" placeholder="Contoh: Muhammad Reza Pahlevi Y">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="birthday">
                                            Tanggal Lahir
                                        </label>
                                        <input class="form-control format-datepicker" type="text" placeholder="Pilih tanggal lahir Anda">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="nilai_ipk">Nilai IPK</label>
                                        <input type="number" class="form-control" placeholder="Contoh: 4.0" step="0.01" min="0">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="pengalaman_mengajar">Pengalaman Mengajar (tahun)</label>
                                        <input type="number" class="form-control" placeholder="Contoh: 4 tahun" min="0">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select class="js-example-placeholder-single js-states form-control">
                                            <option value=""></option>
                                            <option value="laki-laki">Laki-Laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="no_hp">Nomor <i>Handphone</i> yang dapat dihubungi </label>
                                        <input type="number" class="form-control" placeholder="Contoh: 089501011011" min="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="address">
                            <p>
                                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo.
                            </p>
                            <p>
                                Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.
                            </p>
                        </div>
                        <div class="tab-pane fade" id="mata_pelajaran">
                            <p>
                                Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin.
                            </p>
                            <p>
                                Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.
                            </p>
                        </div>
                        <div class="tab-pane fade" id="upload_file">
                            <p>
                                Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin.
                            </p>
                            <p>
                                Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.
                            </p>
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