<?php

use App\Helpers\DateHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FrontEnd\MenuController;
use App\Http\Controllers\FrontEnd\LoginController;
use App\Http\Controllers\FrontEnd\AboutUsController;
use App\Http\Controllers\FrontEnd\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // $tanggal = DateHelper::dateFormatIndonesia('d-m-Y');
    // $halo = functionAtun();
    // dd($halo, $tanggal);
    App::setlocale(session('bahasa'));
    return view('welcome');
});

// Route::get('profile/{nama}/{alamat}/{hobi}', function ($nama, $alamat, $hobi) {
//     return view('profile', [
//         'nama' => $nama,
//         'alamat' => $alamat,
//         'hobi' => $hobi
//     ]);
// });

//contoh route group 1

Route::group([
    'middleware' => ['web'],
    'prefix' => 'admin',
    'controller' => \App\Http\Controllers\PostController::class
], function(){
    Route::get('profile', function () {
        return view('profile', [
            'nama' => 'Atun',
            'alamat' => 'Kos',
            'hobi' => 'Makan'
        ]);
    })->name('profile');

    Route::get('berita/{judul}', function ($judul) {
        return view('berita.berita', [
            'judul' => $judul
        ]);
    });

    Route::get('post', 'getPost');

    Route::view('home', 'frontend.home')->name('home');

    Route::get('about-us', [AboutUsController::class, 'index'])->name('about-us');


    Route::view('profile', 'frontend.profile')->name('profile');

    Route::get('about-us/detail/{id}', [AboutUsController::class, 'detail'])->name('detail');

});

Route::controller(LoginController::class)->group(function(){
    Route::get('login', 'index')->name('login');
    Route::post('login', 'postLogin')->name('postLogin');
    Route::get('logout', 'getLogout')->name('logout');
});


Route::middleware('frontend')->group(function(){
    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
    });
    Route::controller(MenuController::class)->group(function () {
        Route::get('admin', 'getAdmin')->name('menuAdmin')->middleware('role:admin');
        Route::get('user', 'getUser')->name('menuUser')->middleware('role:admin|user');
    });
});

Route::get('set-session', function(Request $request){
    $namaSesi = $request->name;
    $nilaiSesi = $request->value;

    session()->put($namaSesi, $nilaiSesi);
    return 'Session berhasil di Set';
});

Route::get('get-session', function(Request $request){
    $namaSesi = $request->name;
    return session($namaSesi);
});
