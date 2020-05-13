@extends('layouts.app')

@section('title','Easy Private')
@section('main-title', 'Dashbord Guru')
@section('description', 'Ini adalah dashboard guru')
@section('blank-page', 'Dashboard')
@section('content')
<!-- start: DASHBOARD GURU -->
<div class="container-fluid container-fullw bg-white">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron" style="margin-top: 30px;">
                <h1 class="display-4">Hello, {{auth()->user()->name}} !</h1>
                <p>Email yang Anda daftarkan adalah {{auth()->user()->email}} </p>
                <hr class="my-4">
                <p class="lead">Silahkan mengisi form pendaftaran yang terdapat di menu form pendaftaran untuk melengkapi data Anda.</p>
                <!-- <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a> -->
            </div>
        </div>
    </div>
</div>
<!-- end: DASHBOARD GURU -->

@endsection