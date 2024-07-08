<?php

use Illuminate\Support\Facades\Route;

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

Route::get("login", "Auth\LoginController@showLoginForm");
Route::post("login", "Auth\LoginController@login")->name("login");


Route::middleware(['auth'])->group(function () {
    Route::get("home", function() {
        return redirect("slideshow");
    });
    //logout
    Route::post("logout", "Auth\LoginController@logout")->name("logout");
    //profil
    Route::get('profil', "profilC@index");
    Route::post('profil/ubahnama', "profilC@ubahnama")->name("ubah.nama");
    Route::post('profil/ubahpassword', "profilC@ubahpassword")->name("ubah.password");
    Route::post('profil/ubahgambar', "profilC@ubahgambar")->name("ubah.gambar");


    //Slideshow
    Route::resource('slideshow', 'slideshowC');

    //Tanaman Herbal
    Route::resource('tanamanherbal', 'tanamanherbalC');
    //cetak
    Route::get('cetak/tanamanherbal', 'tanamanherbalC@cetak')->name("cetak.tanamanherbal");

});

Route::get('/', 'slideshowC@monitor');
