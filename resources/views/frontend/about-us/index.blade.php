@extends('layout.base')
@section('content')

<div class="container">
    <br>
    <div class="text-center">
        <h1>MEET <small> our </small> TEAM</h1>
        <br>
    </div>
    <div class="row">
        @foreach($data as $team)
        <div class="col-sm-3 mb-4">
            <div class="team text-center">
                <img src="{{ $team->profile }}" alt="">
                <h4 class="mb-0">{{ $team->nama }}</h4>
                <p>{{ $team->bio }}</p>
                <a href="{{ route('detail', [$team->id]) }}" class="btn btn-primary btn-sm">Detail</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
