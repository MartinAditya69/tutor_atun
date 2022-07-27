<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\CmsUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    function getLogin(Request $request){
        if(session()->has('admin')){
            return redirect()->route('wp-admin.dashboardAdmin');
        }
        return view('backend.login.index');
    }

    function postLogin(Request $request){
        $request->validate([
            'email'=>'required|email|exists:cms_users,email',
            'password'=>'required'
        ]);
        $cmsUser = CmsUsers::whereEmail($request->email)->first();

        if(Hash::check($request->password, $cmsUser->pasword)){
            session()->put('admin', $cmsUser);
            return redirect()->route('wp-admin.dashboardAdmin');
        } else {
            return redirect()->back()->with([
                'error'=>'Password Anda Salah'
            ])->withInput();
        }
    }
}
