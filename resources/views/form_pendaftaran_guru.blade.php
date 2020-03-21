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
            <div class="form-group col-md-12">
                <div class="text-right">
                    <p>
                        <button type="submit" class="btn btn-wide btn-primary"><i class="fa fa-floppy-o"></i> Simpan
                        </button>
                        <a class="btn btn-wide btn-default" href="{{url('user/mentor-dashboard')}}"><i class="fa fa-remove"></i> Batal</a>
                    </p>
                </div>
            </div>
        </div>
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
                                                    <label class="control-label" for="email">Email</label>
                                                    <input type="email" class="form-control" placeholder="Contoh: nama@gmail.com">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="nama_lengkap">Nama Lengkap</label>
                                                    <input type="text" class="form-control" placeholder="Contoh: Muhammad Reza Pahlevi Y">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="birthday">Tanggal Lahir</label>
                                                    <p class="input-group input-append datepicker date">
                                                        <input type="text" class="form-control" />
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-default">
                                                                <i class="glyphicon glyphicon-calendar"></i>
                                                            </button> </span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="nilai_ipk">Nilai IPK</label>
                                                    <input type="number" class="form-control" placeholder="Contoh: 4.0" step="0.01" min="0">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="pengalaman_mengajar">Pengalaman Mengajar (tahun)</label>
                                                    <input type="number" class="form-control" placeholder="Contoh: 4 tahun" min="0">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="jenis_kelamin">Jenis Kelamin</label>
                                                    <select id="jenis_kelamin" class="js-example-placeholder-single js-states form-control">
                                                        <option value=""></option>
                                                        <option value="laki-laki">Laki-Laki</option>
                                                        <option value="perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="no_hp">Nomor <i>Handphone</i> yang dapat dihubungi </label>
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
                                                <h5 class="over-title margin-bottom-15">Alamat Lengkap</h5>
                                                <div class="col-sm-12">
                                                    <h5 class="over-title margin-bottom-15">Basic <span class="text-bold">Map</span></h5>
                                                    <div class="map" id="map"></div>
                                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.173842211692!2d106.82202801440098!3d-6.371543964099168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ec04b217fe09%3A0x2f054fe3a0295245!2sPoliteknik+Negeri+Jakarta!5e0!3m2!1sen!2sid!4v1527524060872" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
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
                                                    <p>
                                                        Anda dapat memilih <span class="text-bold">minimal satu pilihan jenjang dan mata pelajaran</span> serta <span class="text-bold">maksimal tiga pilihan jenjang dan mata pelajaran</span> yang Anda kuasai.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="jenjang_1">Jenjang 1</label>
                                                    <select name="jenjang_1" id="jenjang_1" class="form-control" style="width:100%;">
                                                        <option value=""></option>
                                                        <option value="sd">SD</option>
                                                        <option value="smp">SMP</option>
                                                        <option value="sma">SMA</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="mapel_1">Mata Pelajaran 1</label>
                                                    <select name="mapel_1" id="mapel_1" class="form-control" style="width:100%;">
                                                        <option value=""></option>
                                                        <option value="matematika">Matematika</option>
                                                        <option value="fisika">Fisika</option>
                                                        <option value="kimia">Kimia</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="jenjang_2">Jenjang 2</label>
                                                    <select name="jenjang_2" id="jenjang_2" class="form-control" style="width:100%;">
                                                        <option value=""></option>
                                                        <option value="sd">SD</option>
                                                        <option value="smp">SMP</option>
                                                        <option value="sma">SMA</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="mapel_2">Mata Pelajaran 2</label>
                                                    <select name="mapel_2" id="mapel_2" class="form-control" style="width:100%;">
                                                        <option value=""></option>
                                                        <option value="matematika">Matematika</option>
                                                        <option value="fisika">Fisika</option>
                                                        <option value="kimia">Kimia</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="jenjang_3">Jenjang 3</label>
                                                    <select name="jenjang_3" id="jenjang_3" class="form-control" style="width:100%;">
                                                        <option value=""></option>
                                                        <option value="sd">SD</option>
                                                        <option value="smp">SMP</option>
                                                        <option value="sma">SMA</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="mapel_3">Mata Pelajaran 3</label>
                                                    <select name="mapel_3" id="mapel_3" class="form-control" style="width:100%;">
                                                        <option value=""></option>
                                                        <option value="matematika">Matematika</option>
                                                        <option value="fisika">Fisika</option>
                                                        <option value="kimia">Kimia</option>
                                                    </select>
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
                                                    <p>
                                                        Upload file <i>Curriculum Vitae</i> dan <i>Video Microteaching</i> Anda
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="cv" class="control-label"><i>Curriculum Vitae</i></label>
                                                    <input type="file" class="form-control">
                                                    <p class="margin-top-10">**NOTE</p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="video_microteaching" class="control-label"><i>Video Microteaching</i></label>
                                                    <input type="file" class="form-control">
                                                    <p class="margin-top-10">**NOTE</p>
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

@section('javascript')
<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap-timepicker/bootstrap-timepicker.min.js')}}"></script>
<script>
    $("#jenis_kelamin").select2();
    $("#jenjang_1").select2();
    $("#mapel_1").select2();
    $("#jenjang_2").select2();
    $("#mapel_2").select2();
    $("#jenjang_3").select2();
    $("#mapel_3").select2();
</script>

@stop