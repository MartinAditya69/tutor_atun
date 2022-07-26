<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index(Request $request){
        return view('frontend.login.index');
    }
    function postLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $dataLogin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($dataLogin)){
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with([
                'error' => 'Email atau Password Salah',
                'message' => 'Sukses'
            ]);
        }
    }

    function getLogout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }
}
