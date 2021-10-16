<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});


Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {

    Route::resource('/data-admin', 'DataAdminController');

    //Menu Siswa
    Route::resource('/data-siswa', 'DataSiswa');

    //Menu Data Ortu
    Route::resource('/data-ortu', 'DataOrtuController');

    //Menu Tahun Ajaran
    Route::resource('/master-tahun-ajaran', 'MasterTahunAjaranController');

    //Menu Kelas 
    Route::resource('/master-kelas', 'MasterKelasController');
});

Route::get('/user', function () {
    return view('index');
});

Route::get('/siswa', function () {
    return view('data_siswa');
});

Route::get('/form_siswa', function () {
    return view('form_siswa');
});

Route::get('/ortu', function () {
    return view('data_ortu');
});

Route::get('/form_ortu', function () {
    return view('form_ortu');
});

Route::get('/pembayaran', function () {
    return view('create');
});

Route::get('/pembayaran-spp', function () {
    return view('opsi_pembayaran');
});

