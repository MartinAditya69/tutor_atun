<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Books;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminBooksController extends Controller
{
    function index(Request $request)
    {
        $data = Books::with('author')->paginate(1);
        return view('backend.books.index', [
            'judul_halaman' => 'Buku',
            'data' => $data
        ]);
    }
    function getCreate(Request $request)
    {

        return view('backend.books.create', [
            'judul_halaman' => 'Tambah Buku',
            'list_author' => Author::all()
        ]);
    }

    function postSave(Request $request)
    {

        $request->validate([
            'judul'  => 'required',
            'deskripsi' => 'required',
            'author_id' => 'required',
            'gambar' => 'required|file'
        ]);
        $upload = Storage::put('upload/books', $request->file('gambar'));
        $dataUpload = $request->only([
            'judul',
            'deskripsi',
            'author_id',
        ]);
        $dataUpload = array_merge($dataUpload, [
            'gambar'=>$upload
        ]);
        Books::create($dataUpload);

        return redirect()->route('wp-admin.books')->with([
            'success' => 'Data berhasil di simpan'
        ]);
    }

    function getEdit(Request $request, $id)
    {
        $find = Books::findOrFail($id);
        return view('backend.books.edit', [
            'judul_halaman' => 'Edit Buku',
            'data' => $find
        ]);
    }

    function postUpdate(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nama'  => 'required',
            'alamat' => 'required',
            'telpon' => 'required'
        ]);
        Books::whereId($request->id)->update($request->only([
            'nama',
            'alamat',
            'telpon'
        ]));

        return redirect()->route('wp-admin.books')->with([
            'success' => 'Data berhasil di perbarui'
        ]);
    }

    function getDelete(Request $request, $id)
    {
        Books::findOrFail($id)->delete();
        return redirect()->route('wp-admin.books')->with([
            'success' => 'Data berhasil di hapus'
        ]);
    }
}
