@extends('layouts.app')

@section('title', 'Pendaftaran Calon Guru')
@section('css')
<link href="{{asset('vendor/bootstrap-fileinput/jasny-bootstrap.min.css')}}" rel="stylesheet" media="screen">
@stop
@section('main-title', 'Pendaftaran Guru')
@section('description', 'Form Pendaftaran Guru')
@section('blank-page', 'Pendaftaran Guru')
@section('content')
<div class="container-fluid container-fullw bg-white">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <!-- //todo start: form -->
    <form action="/user" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-md-12">
                <div class="text-right">
                    <p>
                        <button type="submit" class="btn btn-wide btn-primary"><i class="fa fa-floppy-o"></i> Simpan
                        </button>
                        <a class="btn btn-wide btn-default" href="{{url('home')}}"><i class="fa fa-remove"></i> Batal</a>
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
                                Data Akademik
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
                                                    <label class="control-label" for="nilai_ipk">Nilai IPK <span class="@error('ipk_score') symbol required @enderror"></span></label>
                                                    <input type="text" name="ipk_score" class="form-control " placeholder="Contoh: 4.0" step="0.01" placeholder="Pilih Tanggal Lahir Anda" class="form-control @error('ipk_score') symbol required @enderror" value="<?php
                                                                                                                                                                                                                                                                        if (isset($pendaftaranGuru)) {
                                                                                                                                                                                                                                                                            echo $pendaftaranGuru->nilai_ipk;
                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                        ?>" />
                                                    @error('ipk_score')
                                                    <div class="help-block"> {{$message}} </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="pengalaman_mengajar">Pengalaman Mengajar <b>(bulan)</b> <span class="@error('teach_experience') symbol required @enderror"></span>
                                                    </label>
                                                    <input type="text" name="teach_experience" class="form-control placeholder=" Contoh: 12" value="<?php
                                                                                                                                                    if (isset($pendaftaranGuru)) {
                                                                                                                                                        echo $pendaftaranGuru->pengalaman_mengajar;
                                                                                                                                                    }
                                                                                                                                                    ?>" />
                                                    @error('teach_experience')
                                                    <div class="help-block"> {{$message}} </div>
                                                    @enderror
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
                                                    <label class="control-label" for="jenjang_1">Jenjang 1 <span class="@error('jenjang_1') symbol required  @enderror"></span> </label>
                                                    <select name="jenjang_1" id="jenjang_1" class="form-control dynamic" style="width:100%;" data-dependent="mapel_1">
                                                        <option value="" selected>Pilih Jenjang</option>
                                                        @foreach($jenjang as $j)
                                                        <option value="{{$j->id_jenjang}}" <?php
                                                                                            if (isset($guruMapel[0])) {
                                                                                                if ($guruMapel[0]->mataPelajaran->id_jenjang == $j->id_jenjang) {
                                                                                                    echo 'selected';
                                                                                                }
                                                                                            }
                                                                                            ?>>{{$j->nama_jenjang}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('jenjang_1')
                                                    <div class="help-block"> {{$message}} </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="mapel_1">Mata Pelajaran 1</label>
                                                    <select name="mapel_1" id="mapel_1" class="form-control @error('mapel_1') symbol required  @enderror" style="width:100%;">
                                                        <option value="" selected>Pilih Mata Pelajaran</option>
                                                        @if(isset($mapel1))
                                                        @foreach($mapel1 as $mp1)
                                                        <option value="{{$mp1->id_mapel}}" <?php
                                                                                            if (isset($guruMapel[0])) {
                                                                                                if ($guruMapel[0]->mataPelajaran->id_mapel == $mp1->id_mapel) {
                                                                                                    echo 'selected';
                                                                                                }
                                                                                            }
                                                                                            ?>> {{$mp1->nama_mapel}} </option>
                                                        @endforeach
                                                        @endif
                                                        @error('mapel_1')
                                                        <div class="help-block"> {{$message}} </div>
                                                        @enderror
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="jenjang_2">Jenjang 2</label>
                                                    <select name="jenjang_2" id="jenjang_2" class="form-control dynamic" style="width:100%;" data-dependent="mapel_2">
                                                        <option value="" selected>Pilih Jenjang</option>
                                                        @foreach($jenjang as $j)
                                                        <option value="{{$j->id_jenjang}}" <?php
                                                                                            if (isset($guruMapel[1])) {
                                                                                                if ($guruMapel[1]->mataPelajaran->id_jenjang == $j->id_jenjang) {
                                                                                                    echo 'selected';
                                                                                                }
                                                                                            }
                                                                                            ?>>{{$j->nama_jenjang}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="mapel_2">Mata Pelajaran 2</label>
                                                    <select name="mapel_2" id="mapel_2" class="form-control" style="width:100%;">
                                                        <option value="" selected>Pilih Mata Pelajaran</option>
                                                        @if(isset($mapel2))
                                                        @foreach($mapel2 as $mp2)
                                                        <option value="{{$mp2->id_mapel}}" <?php
                                                                                            if (isset($guruMapel[1])) {
                                                                                                if ($guruMapel[1]->mataPelajaran->id_mapel == $mp2->id_mapel) {
                                                                                                    echo 'selected';
                                                                                                }
                                                                                            }
                                                                                            ?>> {{$mp2->nama_mapel}} </option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="jenjang_3">Jenjang 3</label>
                                                    <select name="jenjang_3" id="jenjang_3" class="form-control dynamic" style="width:100%;" data-dependent="mapel_3">
                                                        <option value="" selected>Pilih Jenjang</option>
                                                        @foreach($jenjang as $j)
                                                        <option value="{{$j->id_jenjang}}" <?php
                                                                                            if (isset($guruMapel[2])) {
                                                                                                if ($guruMapel[2]->mataPelajaran->id_jenjang == $j->id_jenjang) {
                                                                                                    echo 'selected';
                                                                                                }
                                                                                            }
                                                                                            ?>>{{$j->nama_jenjang}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="mapel_3">Mata Pelajaran 3</label>
                                                    <select name="mapel_3" id="mapel_3" class="form-control" style="width:100%;">
                                                        <option value="" selected>Pilih Mata Pelajaran</option>
                                                        @if(isset($mapel3))
                                                        @foreach($mapel3 as $mp3)
                                                        <option value="{{$mp3->id_mapel}}" <?php
                                                                                            if (isset($guruMapel[2])) {
                                                                                                if ($guruMapel[2]->mataPelajaran->id_mapel == $mp3->id_mapel) {
                                                                                                    echo 'selected';
                                                                                                }
                                                                                            }
                                                                                            ?>> {{$mp3->nama_mapel}} </option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="jenjang_4">Jenjang 4</label>
                                                    <select name="jenjang_4" id="jenjang_4" class="form-control dynamic" style="width:100%;" data-dependent="mapel_4">
                                                        <option value="" selected>Pilih Jenjang</option>
                                                        @foreach($jenjang as $j)
                                                        <option value="{{$j->id_jenjang}}" <?php
                                                                                            if (isset($guruMapel[3])) {
                                                                                                if ($guruMapel[3]->mataPelajaran->id_jenjang == $j->id_jenjang) {
                                                                                                    echo 'selected';
                                                                                                }
                                                                                            }
                                                                                            ?>>{{$j->nama_jenjang}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="mapel_4">Mata Pelajaran 4</label>
                                                    <select name="mapel_4" id="mapel_4" class="form-control" style="width:100%;">
                                                        <option value="" selected>Pilih Mata Pelajaran</option>
                                                        @if(isset($mapel4))
                                                        @foreach($mapel4 as $mp4)
                                                        <option value="{{$mp4->id_mapel}}" <?php
                                                                                            if (isset($guruMapel[3])) {
                                                                                                if ($guruMapel[3]->mataPelajaran->id_mapel == $mp4->id_mapel) {
                                                                                                    echo 'selected';
                                                                                                }
                                                                                            }
                                                                                            ?>> {{$mp4->nama_mapel}} </option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="jenjang_5">Jenjang 5</label>
                                                    <select name="jenjang_5" id="jenjang_5" class="form-control dynamic" style="width:100%;" data-dependent="mapel_5">
                                                        <option value="" selected>Pilih Jenjang</option>
                                                        @foreach($jenjang as $j)
                                                        <option value="{{$j->id_jenjang}}" <?php
                                                                                            if (isset($guruMapel[4])) {
                                                                                                if ($guruMapel[4]->mataPelajaran->id_jenjang == $j->id_jenjang) {
                                                                                                    echo 'selected';
                                                                                                }
                                                                                            }
                                                                                            ?>>{{$j->nama_jenjang}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="mapel_5">Mata Pelajaran 5</label>
                                                    <select name="mapel_5" id="mapel_5" class="form-control" style="width:100%;">
                                                        <option value="" selected>Pilih Mata Pelajaran</option>
                                                        @if(isset($mapel5))
                                                        @foreach($mapel5 as $mp5)
                                                        <option value="{{$mp5->id_mapel}}" <?php
                                                                                            if (isset($guruMapel[4])) {
                                                                                                if ($guruMapel[4]->mataPelajaran->id_mapel == $mp5->id_mapel) {
                                                                                                    echo 'selected';
                                                                                                }
                                                                                            }
                                                                                            ?>> {{$mp5->nama_mapel}} </option>
                                                        @endforeach
                                                        @endif
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
                                                    <input type="file" name="file_cv" class="form-control @error('file_cv') symbol required @enderror" accept="application/pdf">
                                                    <p class="margin-top-10">**NOTE</p>
                                                    @if(isset($pendaftaranGuru->dir_cv))
                                                    <a href="{{asset('assets/cv_guru/' . $pendaftaranGuru->dir_cv)}}" class="btn-sm btn-primary btn-o">
                                                        Lihat CV
                                                    </a>
                                                    @endif
                                                    @error('file_cv')
                                                    <div class="help-block"> {{$message}} </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="video_microteaching" class="control-label"><i>Video Microteaching</i></label>
                                                    <input name="file_microteaching" type="file" class="form-control @error('file_microteaching') symbol required @enderror" accept="video/mp4">
                                                    <p class="margin-top-10">**NOTE</p>
                                                    @if(isset($pendaftaranGuru->dir_video))
                                                    <button type="button" class="btn-sm btn-primary btn-o" data-toggle="modal" data-target="#videoMicroteaching{{$pendaftaranGuru->id_pendaftaran}}">
                                                        Lihat Video
                                                    </button>
                                                    @endif
                                                    @error('file_microteaching')
                                                    <div class="help-block"> {{$message}} </div>
                                                    @enderror
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
    <!-- Modal Menampilkan Video Microteaching -->
    @if(isset($pendaftaranGuru->dir_video))
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="modal fade" id="videoMicroteaching{{$pendaftaranGuru->id_pendaftaran}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <input type="hidden" name="id_pendaftaran" value='{{$pendaftaranGuru->id_pendaftaran}}'>
                                <h4 class="modal-title" id="myModalLabel">Video yang telah Anda upload</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="text-center form-group col-md-12">
                                        <video width="320" height="240" controls>
                                            <source src="{{URL::asset('/assets/video_microteaching/')}}/{{$pendaftaranGuru->dir_video}}" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- /Modal Menampilkan Video Microteaching -->
</div>
<!-- //todo end: tabs -->

@endsection

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
<!-- <script src="{{asset('assets/js/form-validation.js')}}"></script> -->
<script>
    jQuery(document).ready(function() {
        // Main.init();
        // FormValidator.init();
    });
</script>
<!-- end validation -->
<script>
    $("#jenis_kelamin").select2();
    $("#jenjang_1").select2();
    $("#mapel_1").select2();
    $("#jenjang_2").select2();
    $("#mapel_2").select2();
    $("#jenjang_3").select2();
    $("#mapel_3").select2();
    $("#jenjang_4").select2();
    $("#mapel_4").select2();
    $("#jenjang_5").select2();
    $("#mapel_5").select2();
</script>
<script>
    $(document).ready(function() {
        //Buat nge-get <select> yang class-nya dynamic
        $('.dynamic').change(function() {

            //Memeriksa apakah option yang dipilih punya value atau gak
            if ($(this).val() != '') {
                //Mengambil id dari <select> jenjang
                var select = $(this).attr("id");

                //Mengambil value yang dipilih dari <select> jenjang
                var value = $(this).val();

                //Ini pokoknya harus, gue gak tahu banget buat apa
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    //Get data mapelnya
                    url: "{{ route('getMapelperJenjang') }}",
                    method: "POST",
                    data: {
                        select: select,
                        value: value,
                        _token: _token,
                        dependent: dependent
                    },
                    success: function(mapels) {
                        $('#' + dependent).empty(); // untuk nge empty
                        console.log(mapels);
                        $('#' + dependent).append('<option value="" selected>' + 'Pilih Mata Pelajaran' + '</option>');
                        $.each(mapels, function(index, mapel) {
                            // console.log(mapels[index]);
                            $('#' + dependent).append('<option value="' + index + '">' + mapel + '</option>');
                        })
                    }
                })
            }
        });
    });
</script>

@endsection