<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    function getAdmin(){
        return 'Ini menu Admin';
    }
    function getUser(){
        return 'Ini menu User';
    }
}
