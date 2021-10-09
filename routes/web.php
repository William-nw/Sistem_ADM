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
    return view('opsi_pembayaran');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
