@extends('backend.layout.base')
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            List Data Buku
        </h3>
        <div class="card-tools">
            <a href="{{ route('wp-admin.books-create') }}" class="btn-primary btn">
                Tambah Data Buku
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-stripped">
            <tr>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Author</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
            @foreach($data as $row)
            <tr>
                <td><img src="{{ asset($row->gambar) }}" height="100" alt=""></td>
                <td>{{ $row->judul }}</td>
                <td>{{ $row->author->nama }}</td>
                <td>{{ $row->deskripsi}}</td>
                <td>
                    <a href="{{ route('wp-admin.books-edit',[$row->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                    {{-- <a href="{{ route('wp-admin.books-delete',[$row->id]) }}" class="btn">Delete</a> --}}
                    <a href="javascript:;" onclick="if(confirm('Anda Yakin?')){
                        return window.location.href='{{ route('wp-admin.books-delete',[$row->id]) }}'
                    }" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="card-footer">
        {!! $data->links() !!}
    </div>
</div>

@endsection
