@extends('backend.layout.base')
@section('content')


<div class="card">
    <form action="{{ route('wp-admin.author-save') }}" method="post">
        @csrf
    <div class="card-header">
        <h3 class="card-title">
            Tambah Author Baru
        </h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="nama" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Alamat</label>
            <input type="text" name="alamat" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Telpon</label>
            <input type="text" name="telpon" class="form-control">
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
