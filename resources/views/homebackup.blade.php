<!-- //! Master untuk admin -->
@extends('layouts.master')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Easy Private</div>

            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                You are logged in, {{auth()->user()->name}}!
                <p>Youre email is {{auth()->user()->email}} </p>
            </div>
        </div>
    </div>
</div>
@endsection