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
Route::get('/adm-rombel/showdata', 'RombelController@showData')->name('showdatarombel');
Route::get('/adm-rombel/get-members', 'SiswaController@getMembers')->name('getmembers');
Route::get('/adm-rombel/get-nonmembers', 'SiswaController@getNonMembers')->name('getnonmembers');
Route::get('/adm-rombel/cari', 'RombelController@cari')->name('carirombel');
Route::put('/adm-rombel/pindah-siswa', 'SiswaController@pindahRombel')->name('pindahrombel');
Route::put('/adm-rombel/keluarkan-siswa', 'SiswaController@keluarkanSiswa')->name('keluarkansiswa');
Route::put('/adm-rombel/masukkan-siswa', 'SiswaController@masukkanSiswa')->name('masukkanSiswa');
// Siswa
Route::get('/adm-siswa', 'SiswaController@indexAdm')->name('adminsiswa');
Route::get('/adm-siswa/showdata', 'SiswaController@showData')->name('showdatasiswa');
Route::post('/adm-siswa/create', 'SiswaController@create')->name('createsiswa');
// oRTU
Route::post('/adm-ortu/add-ortu', 'OrtuController@create')->name('createortu');
Route::put('/adm-ortu/edit-ortu', 'OrtuController@update')->name('updateortu');
// General Settings
    // Tapel
Route::get('/adm-tapel', 'TapelController@indexAdm')->name('admintapel');

    // Semester
Route::get('/adm-semester', 'SemesterController@indexAdm')->name('adminsemester');

    // Tingkat / Kelas
Route::get('/adm-tingkat', 'TingkatController@indexAdm')->name('admintingkat');
    // Users
Route::get('/adm-users', 'UserController@index')->name('adminusers');
Route::post('/adm-users/import', 'UserController@import')->name('importusers');

    // Route guru
Route::get('/guru/nilai', 'NilaiController@index')->name('indexNilai');
