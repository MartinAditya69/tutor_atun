@extends('layout.base')
@section('content')

<div class="container">
    <br>
    <div class="text-center">
        <h1>Detail Profile</h1>
        <br>
    </div>
    <div class="d-flex justify-content-center">

            <div class="team text-center">
                <img src="{{ $data->profile }}" alt="">
                <h4 class="mb-0">{{ $data->nama }}</h4>
                <p>{{ $data->bio }}</p>
                <a href="{{ route('about-us') }}" class="btn btn-primary btn-sm">Kembali</a>
                <br><br>
            </div>
    </div>
</div>

@endsection
