@extends('backend.layout.base')
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            List Data Author
        </h3>
        <div class="card-tools">
            <a href="{{ route('wp-admin.author-create') }}" class="btn-primary btn">
                Tambah Data Author
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-stripped">
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telpon</th>
                <th>Aksi</th>
            </tr>
            @foreach($data as $row)
            <tr>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->alamat }}</td>
                <td>{{ $row->telpon }}</td>
                <td>
                    <a href="{{ route('wp-admin.author-edit',[$row->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                    {{-- <a href="{{ route('wp-admin.author-delete',[$row->id]) }}" class="btn">Delete</a> --}}
                    <a href="javascript:;" onclick="if(confirm('Anda Yakin?')){
                        return window.location.href='{{ route('wp-admin.author-delete',[$row->id]) }}'
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
