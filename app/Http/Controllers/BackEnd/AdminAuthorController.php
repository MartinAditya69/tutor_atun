<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AdminAuthorController extends Controller
{
    function index(Request $request){
        $data = Author::paginate(1);
        return view('backend.author.index',[
            'judul_halaman'=>'Author',
            'data'=>$data
        ]);
    }
    function getCreate(Request $request){
        return view('backend.author.create', [
            'judul_halaman' => 'Tambah Author'
        ]);
    }

    function postSave(Request $request){
        $request->validate([
            'nama'  =>'required',
            'alamat'=>'required',
            'telpon'=>'required'
        ]);
        Author::create($request->only([
            'nama',
            'alamat',
            'telpon'
        ]));

        return redirect()->route('wp-admin.author')->with([
            'success' => 'Data berhasil di simpan'
        ]);
    }

    function getEdit(Request $request, $id){
        $find = Author::findOrFail($id);
        return view('backend.author.edit',[
            'judul_halaman'=>'Edit Author',
            'data'=>$find
        ]);
    }

    function postUpdate(Request $request){
        $request->validate([
            'id'=> 'required',
            'nama'  => 'required',
            'alamat' => 'required',
            'telpon' => 'required'
        ]);
        Author::whereId($request->id)->update($request->only([
            'nama',
            'alamat',
            'telpon'
        ]));

        return redirect()->route('wp-admin.author')->with([
            'success' => 'Data berhasil di perbarui'
        ]);
    }

    function getDelete(Request $request,$id){
        Author::findOrFail($id)->delete();
        return redirect()->route('wp-admin.author')->with([
            'success' => 'Data berhasil di hapus'
        ]);
    }
}
