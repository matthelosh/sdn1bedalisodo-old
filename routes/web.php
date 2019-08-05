<?php

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
use App\Guru;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/siswa', function() {
	return view('siswa');
});

Route::get('/profil', function(){
	return view('pages.content', ['page' => 'profile', 'title'=>'Profil Sekolah']);
});

Route::get('/guru', function(){
    $gurus = Guru::all();
    return view('pages.content', ['page' => 'guru', 'title' => 'Data Guru', 'datas' => $gurus]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/adm-guru', 'GuruController@indexAdm')->name('admguru');
Route::post('/adm-guru/import', 'GuruController@import')->name('importguru');
Route::post('/adm-guru/create', 'GuruController@create')->name('createguru');
