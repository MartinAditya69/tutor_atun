<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\teams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutUsController extends Controller
{
    public function index(){
        // $data = DB::table('teams')->get();
        $data = teams::all();
        return view('frontend.about-us.index',[
            'data' => $data
        ]);
    }

    public function detail(Request $request, $id){
        $team= teams::findOrFail($id);

        return view('frontend.about-us.detail',[
            'data' => $team
        ]);
    }
}
