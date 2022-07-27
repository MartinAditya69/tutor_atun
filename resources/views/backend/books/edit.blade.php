@extends('backend.layout.base')
@section('content')


<div class="card">
    <form action="{{ route('wp-admin.author-update') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $data->id }}">
    <div class="card-header">
        <h3 class="card-title">
            Edit Author
        </h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $data->nama }}">
        </div>
        <div class="form-group">
            <label for="">Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ $data->alamat }}">
        </div>
        <div class="form-group">
            <label for="">Telpon</label>
            <input type="text" name="telpon" class="form-control" value="{{ $data->telpon }}">
        </div>
    </div>
    <div class="card-footer">
        <a href="{{ route('wp-admin.author') }}" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary">
            Simpan
        </button>
    </div>
    </form>
</div>
@endsection
