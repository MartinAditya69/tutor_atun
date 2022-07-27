@extends('backend.layout.base')
@section('content')


<div class="card">
    <form action="{{ route('wp-admin.books-save') }}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="card-header">
        <h3 class="card-title">
            Tambah Buku Baru
        </h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="">Judul</label>
            <input type="text" name="judul" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Author</label>
            <select name="author_id" id="" class="form-control">
                <option value="">Select Author</option>
                @foreach($list_author as $author)
                <option value="{{ $author->id }}">{{ $author->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Deskripsi</label>
            <textarea name="deskripsi" class="form-control">
            </textarea>
        </div>
    </div>
    <div class="card-footer">
        <a href="{{ route('wp-admin.books') }}" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary">
            Simpan
        </button>
    </div>
    </form>
</div>
@endsection
