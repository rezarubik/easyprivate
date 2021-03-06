@extends('layouts.app')

@section('title', 'Pendaftaran Calon Guru')
@section('css')
<link href="{{asset('vendor/bootstrap-fileinput/jasny-bootstrap.min.css')}}" rel="stylesheet" media="screen">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
@stop
@section('main-title', 'Pendaftaran Profil Guru')
@section('description', 'Form Pendaftaran Profil Guru')
@section('blank-page', 'Pendaftaran Profil Guru')
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
    <form action="/user-profile" method="post" enctype="multipart/form-data">
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
                        @if(count($jadwalAvailable) > 0)
                        <li>
                            <a data-toggle="tab" href="#jadwal-available">
                                Jadwal Available
                            </a>
                        </li>
                        @endif
                    </ul>
                    <div class="tab-content">
                        <!-- // todo Data Diri -->
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
                                                        <input type="text" name="birthday" placeholder="Pilih Tanggal Lahir Anda" class="form-control @error('birthday') symbol required @enderror" readonly @if(isset($pendaftaranGuru->user->tanggal_lahir)) value=" {{$pendaftaranGuru->user->tanggal_lahir}} " @else value="" @endif />
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
                                                    <label class="control-label" for="jenis_kelamin">Jenis Kelamin</label>
                                                    <select id="jenis_kelamin" name="gender" class=" form-control" required>
                                                        <option selected>Pilih Jenis Kelamin</option>
                                                        <option value="laki-laki" <?php
                                                                                    if (isset($pendaftaranGuru->user->jenis_kelamin)) {
                                                                                        if ($pendaftaranGuru->user->jenis_kelamin == 'laki-laki') {
                                                                                            echo 'selected';
                                                                                        }
                                                                                    }
                                                                                    ?>>Laki-Laki</option>
                                                        <option value="perempuan" <?php
                                                                                    if (isset($pendaftaranGuru->user->jenis_kelamin)) {
                                                                                        if ($pendaftaranGuru->user->jenis_kelamin == 'perempuan') {
                                                                                            echo 'selected';
                                                                                        }
                                                                                    }
                                                                                    ?>>Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="no_hp">Nomor <i>Handphone</i> yang dapat dihubungi </label>
                                                    <input type="text" name="handphone_number" class="form-control @error('handphone_number') symbol required @enderror " placeholder="Contoh: 089501011011" @if(isset($pendaftaranGuru->user->no_handphone)) value="{{$pendaftaranGuru->user->no_handphone}}" @else value="" @endif />
                                                    @error('handphone_number')
                                                    <div class="help-block"> {{$message}} </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="universitas">Asal Universitas</label>
                                                    <input type="text" name="universitas" class="form-control @error('universitas') symbol required @enderror " placeholder="Contoh: Universitas Indonesia" @if(isset($pendaftaranGuru->user->universitas)) value=" {{$pendaftaranGuru->user->universitas}} " @else value="" @endif />
                                                    @error('universitas')
                                                    <div class="help-block"> {{$message}} </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="avatar" class="control-label">Foto Profil</label>
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail">
                                                            @if(auth()->user()->avatar)
                                                            <img src="{{URL::asset('assets/avatars/')}}/{{ auth()->user()->avatar }}" alt="pilih avatar Anda">
                                                            @endif
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                        <div class="user-edit-image-buttons">
                                                            <span class="btn btn-azure btn-file"><span class="fileinput-new"><i class="fa fa-picture"></i> Select image</span><span class="fileinput-exists"><i class="fa fa-picture"></i> Change</span>
                                                                <input type="file" name="foto_profile" accept="image/*" @if(isset($pendaftaranGuru)) value="{{$pendaftaranGuru->user->avatar}}" @else value="" @endif />
                                                            </span>
                                                            <a href="#" class="btn fileinput-exists btn-red" data-dismiss="fileinput">
                                                                <i class="fa fa-times"></i> Remove
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // todo Alamat -->
                        <div id="alamat" class="tab-pane fade in">
                            <div class="row padding-20">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h5 class="over-title margin-bottom-15">Alamat Lengkap</h5>
                                            <input style="width: 100%;" type="text" class="form-control" placeholder="Masukkan alamat lengkap rumah Anda disini" id="address" name="alamat_lengkap" @if(isset($pendaftaranGuru->user->alamat->alamat_lengkap)) value=" {{$pendaftaranGuru->user->alamat->alamat_lengkap}} " @endif />
                                        </div>
                                    </div>
                                    <div class="row margin-top-30">
                                        <div class="col-sm-12">
                                            <h5 class="over-title margin-bottom-15">Temukan daerah disekitar rumah Anda</h5>
                                            <div class="geocoder">
                                                <div id="geocoder"></div>
                                            </div>
                                            <div id="map" style="height:250px; position:relative; top:0px; left:0px; right:0px; bottom:0px; "></div>
                                            <input type="hidden" id="lat" name="lat" placeholder="Your lat.." @if(isset($pendaftaranGuru->user->alamat->latitude)) value=" {{$pendaftaranGuru->user->alamat->latitude}} " @else value="" @endif>
                                            <input type="hidden" id="lng" name="lng" placeholder="Your lng.." @if(isset($pendaftaranGuru->user->alamat->longitude)) value="{{$pendaftaranGuru->user->alamat->longitude}}" @else value="" @endif />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // todo Jadwal Available -->
                        <div id="jadwal-available" class="tab-pane fade in">
                            <div class="row padding-20">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5 class="over-title margin-bottom-15">
                                                        <span>Pilihan Ketersediaan Jadwal Mengajar</span>
                                                    </h5>
                                                    <p>
                                                        Pilih ketersediaan jadwal Anda pada hari dan jam yang tersedia.
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- Jadwal Available -->
                                            <div class="row">
                                                @foreach($jadwalAvailable as $key=>$ja)
                                                <div class="form-group col-md-12">
                                                    <div class="panel-heading">
                                                        <h5 class="panel-title">{{$key}}</h5>
                                                    </div>
                                                    <div class="panel-body">
                                                        @foreach($ja as $perDay)
                                                        <div class="checkbox clip-check check-primary checkbox-inline">
                                                            <input type="checkbox" id="hari_{{$perDay->id_jadwal_available}}" name="hari[]" value="{{$perDay->id_jadwal_available}}" <?php
                                                                                                                                                                                        if ($perDay->available != 0) {
                                                                                                                                                                                            echo 'checked';
                                                                                                                                                                                        }
                                                                                                                                                                                        ?>>
                                                            <label for="hari_{{$perDay->id_jadwal_available}}">
                                                                {{$perDay->start}} - {{$perDay->end}}
                                                            </label>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endforeach
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
<!-- end mapbox -->
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