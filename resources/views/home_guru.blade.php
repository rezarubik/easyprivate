<!-- //! app untuk guru -->
@extends('layouts.app')

@section('content')
<!-- start: DASHBOARD TITLE -->
<section id="page-title" class="padding-top-15 padding-bottom-15">
    <div class="row">
        <div class="col-sm-7">
            <h1 class="mainTitle">Form Pendaftaran Guru</h1>
            <span class="mainDescription">Home </span>
        </div>

    </div>
</section>
<!-- end: DASHBOARD TITLE -->
<div class="container-fluid container-fullw bg-white">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron" style="margin-top: 30px;">
                <h1 class="display-4">Hello, {{auth()->user()->name}} !</h1>
                <p>Email yang Anda daftarkan adalah {{auth()->user()->email}} </p>
                <hr class="my-4">
                <p class="lead">Silahkan mengisi form pendaftaran yang terdapat di menu form pendaftaran untuk proses seleksi.</p>
                <!-- <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a> -->
            </div>
        </div>
    </div>
</div>

@endsection