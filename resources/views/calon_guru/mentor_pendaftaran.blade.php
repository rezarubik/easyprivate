@extends('layouts.app')

@section('title', 'Pendaftaran Calon Guru')
@section('css')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- <link rel="stylesheet" href="{{url('/assets/css/leaflet.css')}}" /> -->
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
    <form action="/user" method="post">
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
                                                    <input type="email" name="email" class="form-control" disabled="disabled" placeholder="Email Anda: {{auth()->user()->email}}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="nama_lengkap">Nama Lengkap</label>
                                                    <input type="text" name="full_name" class="form-control" disabled="disabled" placeholder="Nama Anda: {{auth()->user()->name}}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="birthday">Tanggal Lahir <span class="symbol required"></span></label>
                                                    <p class="input-group input-append datepicker date">
                                                        <input type="text" name="birthday" value="<?php
                                                                                                    if (isset($users)) {
                                                                                                        echo $users->tanggal_lahir;
                                                                                                    }
                                                                                                    ?>" placeholder="Pilih Tanggal Lahir Anda" class="form-control @error('birthday') symbol required @enderror" />
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-default">
                                                                <i class="glyphicon glyphicon-calendar"></i>
                                                            </button> </span>
                                                        @error('birthday')
                                                        <div class="text-danger text-large"> {{$message}} </div>
                                                        @enderror
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="nilai_ipk">Nilai IPK</label>
                                                    <input type="number" name="ipk_score" class="form-control  @error('ipk_score') symbol required @enderror" placeholder="Contoh: 4.0" step="0.01" min="0" max="4">
                                                    @error('ipk_score')
                                                    <div class="help-block"> {{$message}} </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="pengalaman_mengajar">Pengalaman Mengajar (tahun)
                                                    </label>
                                                    <input type="number" name="teach_experience" class="form-control  @error('teach_experience') symbol required @enderror" placeholder="Contoh: 4" min="0">
                                                    @error('teach_experience')
                                                    <div class="help-block"> {{$message}} </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="jenis_kelamin">Jenis Kelamin</label>
                                                    <select id="jenis_kelamin" name="gender" class=" form-control">
                                                        <option value="" selected>Piilih Jenis Kelamin</option>
                                                        <option value="laki-laki">Laki-Laki</option>
                                                        <option value="perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="no_hp">Nomor <i>Handphone</i> yang dapat dihubungi </label>
                                                    <input type="text" name="handphone_number" class="form-control @error('handphone_number') symbol required @enderror " placeholder="Contoh: 089501011011">
                                                    @error('handphone_number')
                                                    <div class="help-block"> {{$message}} </div>
                                                    @enderror
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
                                        <div class="col-sm-12">
                                            <h5 class="over-title margin-bottom-15">Alamat Lengkap</h5>
                                            <input style="width: 100%;" type="text" class="form-control" placeholder="Masukkan alamat lengkap rumah Anda disini" id="address" name="alamat_lengkap">
                                        </div>
                                    </div>
                                    <div class="row margin-top-30">
                                        <div class="col-sm-12">
                                            <h5 class="over-title margin-bottom-15">Temukan daerah disekitar rumah Anda</h5>
                                            <div class="geocoder">
                                                <div id="geocoder"></div>
                                            </div>
                                            <div id="map" style="height:250px; position:relative; top:0px; left:0px; right:0px; bottom:0px; "></div>
                                            <input type="hidden" id="lat" name="lat" placeholder="Your lat..">
                                            <input type="hidden" id="lng" name="lng" placeholder="Your lng..">
                                        </div>
                                        <!-- <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label" for="">Latitude</label>
                                                <input type="hidden" id="lat" name="lat" placeholder="Your lat..">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="">Longitude</label>
                                                <input type="hidden" id="lng" name="lng" placeholder="Your lng..">
                                            </div>
                                        </div> -->
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
                                                    <select name="jenjang_1" id="jenjang_1" class="form-control dynamic" style="width:100%;" data-dependent="mapel_1">
                                                        <option value="" selected>Pilih Jenjang</option>
                                                        @foreach($jenjang as $j)
                                                        <option value="{{$j->id_jenjang}}">{{$j->nama_jenjang}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="mapel_1">Mata Pelajaran 1</label>
                                                    <select name="mapel_1" id="mapel_1" class="form-control" style="width:100%;">
                                                        <option value="" selected>Pilih Mata Pelajaran</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="jenjang_2">Jenjang 2</label>
                                                    <select name="jenjang_2" id="jenjang_2" class="form-control dynamic" style="width:100%;" data-dependent="mapel_2">
                                                        <option value="" selected>Pilih Jenjang</option>
                                                        @foreach($jenjang as $j)
                                                        <option value="{{$j->id_jenjang}}">{{$j->nama_jenjang}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="mapel_2">Mata Pelajaran 2</label>
                                                    <select name="mapel_2" id="mapel_2" class="form-control" style="width:100%;">
                                                        <option value="" selected>Pilih Mata Pelajaran</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="jenjang_3">Jenjang 3</label>
                                                    <select name="jenjang_3" id="jenjang_3" class="form-control dynamic" style="width:100%;" data-dependent="mapel_3">
                                                        <option value="" selected>Pilih Jenjang</option>
                                                        @foreach($jenjang as $j)
                                                        <option value="{{$j->id_jenjang}}">{{$j->nama_jenjang}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="mapel_3">Mata Pelajaran 3</label>
                                                    <select name="mapel_3" id="mapel_3" class="form-control" style="width:100%;">
                                                        <option value="" selected>Pilih Mata Pelajaran</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="jenjang_4">Jenjang 4</label>
                                                    <select name="jenjang_4" id="jenjang_4" class="form-control dynamic" style="width:100%;" data-dependent="mapel_4">
                                                        <option value="" selected>Pilih Jenjang</option>
                                                        @foreach($jenjang as $j)
                                                        <option value="{{$j->id_jenjang}}">{{$j->nama_jenjang}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="mapel_4">Mata Pelajaran 4</label>
                                                    <select name="mapel_4" id="mapel_4" class="form-control" style="width:100%;">
                                                        <option value="" selected>Pilih Mata Pelajaran</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="jenjang_5">Jenjang 5</label>
                                                    <select name="jenjang_5" id="jenjang_5" class="form-control dynamic" style="width:100%;" data-dependent="mapel_5">
                                                        <option value="" selected>Pilih Jenjang</option>
                                                        @foreach($jenjang as $j)
                                                        <option value="{{$j->id_jenjang}}">{{$j->nama_jenjang}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="mapel_5">Mata Pelajaran 5</label>
                                                    <select name="mapel_5" id="mapel_5" class="form-control" style="width:100%;">
                                                        <option value="" selected>Pilih Mata Pelajaran</option>
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
                                                    <input type="file" name="file_cv" class="form-control @error('file_cv') symbol required @enderror">
                                                    <p class="margin-top-10">**NOTE</p>
                                                    @error('file_cv')
                                                    <div class="help-block"> {{$message}} </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="video_microteaching" class="control-label"><i>Video Microteaching</i></label>
                                                    <input type="file" name="file_microteaching" class="form-control @error('file_microteaching') symbol required @enderror">
                                                    <p class="margin-top-10">**NOTE</p>
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
</div>
<!-- //todo end: tabs -->

@endsection

@section('javascript')
<!-- mapbox -->
<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.js'></script>
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.css' rel='stylesheet' />

<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
<script src="{{asset('assets/js/leaflet.js')}}"></script>
<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />
<script>
    var user_location = [106.816666, -6.200000];
    mapboxgl.accessToken = 'pk.eyJ1IjoicmV6YXJ1YmlrIiwiYSI6ImNrOHd2YWUxZDB1aGgzaW83aG5yODI3ejUifQ.-52Xu5WVXif31PzIBWBnQA';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v9',
        center: user_location,
        zoom: 10
    });
    //  geocoder here
    var geocoder = new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        // limit results to Australia
        //country: 'IN',
    });

    var marker;
    const geolocate = new mapboxgl.GeolocateControl({
        positionOptions: {
            enableHighAccuracy: true
        },
        trackUserLocation: true
    });

    // After the map style has loaded on the page, add a source layer and default
    // styling for a single point.
    map.on('load', function() {
        geolocate.trigger();
        // addMarker(user_location, 'load'); //for marker
        // Listen for the `result` event from the MapboxGeocoder that is triggered when a user
        // makes a selection and add a symbol that matches the result.
        geocoder.on('result', function(ev) {
            // alert("aaaaa");
            console.log(ev.result.center);

        });
    });

    // Add geolocate control to the map. Current Location
    map.addControl(
        geolocate
        // new mapboxgl.GeolocateControl({
        //     positionOptions: {
        //         enableHighAccuracy: true
        //     },
        //     trackUserLocation: true
        // })
    );
    geolocate.on('geolocate', function() {
        //Get the updated user location, this returns a javascript object.
        var loc = geolocate._lastKnownPosition;
        //Your work here - Get coordinates like so
        var lat = loc.coords.latitude;
        var lng = loc.coords.longitude;
        var latlng = [lng, lat];
        addMarker(latlng, 'click');
    });
    map.on('click', function(e) {
        addMarker(e.lngLat, 'click');
        //console.log(e.lngLat.lat);
    });

    function addMarker(ltlng, event) {
        if (marker != null) {
            console.log('marker tidak sama dengan null cuy!');
            marker.remove();
        }
        console.log('Mapnya udah ditekan coy!');
        user_location = ltlng;
        // if (event === 'click') {}
        marker = new mapboxgl.Marker({
                draggable: true,
                color: "#d02922"
            })
            .setLngLat(user_location)
            .addTo(map)
            .on('dragend', onDragEnd);
        document.getElementById("lat").value = marker.getLngLat().lat;
        document.getElementById("lng").value = marker.getLngLat().lng;
    }

    function onDragEnd() {
        var lngLat = marker.getLngLat();
        document.getElementById("lat").value = lngLat.lat;
        document.getElementById("lng").value = lngLat.lng;
        console.log('lng: ' + lngLat.lng + '<br />lat: ' + lngLat.lat);
    }
    document.getElementById('geocoder').appendChild(geocoder.onAdd(map));
</script>
<!-- mapbox -->
<script src="{{asset('vendor/maskedinput/jquery.maskedinput.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
<script src="{{asset('vendor/autosize/autosize.min.js')}}"></script>
<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<script src="{{asset('vendor/selectFx/classie.js')}}"></script>
<script src="{{asset('vendor/selectFx/selectFx.js')}}"></script>
<!-- <script src="{{asset('assets/js/form-elements.js')}}"></script> -->
<script src="{{asset('vendor/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap-timepicker/bootstrap-timepicker.min.js')}}"></script>
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
                    success: function(result) {
                        $('#' + dependent).html(result);
                    }
                })
            }
        });
    });
    // $('#jenjang_1').change(function() {
    //     $('#mapel_1').selectedIndex = "0";
    // });

    // $('#jenjang_2').change(function() {
    //     $('#mapel_2').val('');
    // });

    // $('#jenjang_3').change(function() {
    //     $('#mapel_3').val('');
    // });
</script>

@endsection