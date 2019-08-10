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
// Mapel
Route::post('/adm-mapel/import', 'MapelController@import')->name('importmapel');
Route::get('/adm-mapel', 'MapelController@indexAdm')->name('admmapel');
// Ekskul
Route::get('/adm-ekskul', 'EkskulController@indexAdm')->name('admekskul');
Route::post('/adm-ekskul/import', 'EkskulController@import')->name('importekskul');
// KOmpetensi Inti
Route::get('/adm-ki', 'KiController@indexAdm')->name('adminki');
Route::post('/adm-ki/import', 'KiController@import')->name('importki');

// Kompetensi Dasar
Route::get('/adm-kd', 'KdController@indexAdm')->name('adminkd');
Route::get('/adm-kd/showdata', 'KdController@showData')->name('showdatakd');
Route::post('/adm-kd/import', 'KdController@import')->name('importkd');
// Rombel
Route::get('/adm-rombel', 'RombelController@indexAdm')->name('adminrombel');
Route::post('adm-rombel/import', 'RombelController@import')->name('importrombel');
// Siswa
Route::get('/adm-siswa', 'SiswaController@indexAdm')->name('adminsiswa');
Route::get('/adm-siswa/showdata', 'SiswaController@showData')->name('showdatasiswa');
Route::post('/adm-siswa/create', 'SiswaController@create')->name('createsiswa');
// General Settings
    // Tapel
Route::get('/adm-tapel', 'TapelController@indexAdm')->name('admintapel');

    // Semester
Route::get('/adm-semester', 'SemesterController@indexAdm')->name('adminsemester');

    // Tingkat / Kelas
Route::get('/adm-tingkat', 'TingkatController@indexAdm')->name('admintingkat');
