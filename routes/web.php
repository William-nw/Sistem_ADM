<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
    return redirect()->route('login');
});


Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {

    Route::resource('/data-admin', 'DataAdminController');

    //Menu Siswa
    Route::resource('/data-siswa', 'DataSiswaController');
    Route::resource('/register-all', 'RegisterAllController');
    //ajax
    Route::get("/getBuku/{id}", "AjaxController@getBuku");
    Route::get("/getBaju/{id}", "AjaxController@getBaju");
    Route::post("test-buku", function(Request $request){
        dd($request->all());
    })->name('test.index');
    // Route::post("test-baju", fu

    //Menu Data Ortu
    Route::resource('/data-ortu', 'DataOrtuController');

    //Menu Tahun Ajaran
    Route::resource('/master-tahun-ajaran', 'MasterTahunAjaranController');

    //Menu Kelas
    Route::resource('/master-kelas', 'MasterKelasController');

    //Master Buku
    Route::resource('/master-buku', 'MasterBukuController');

    //Master Baju
    Route::resource('/master-baju', 'MasterBajuController');
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



// Backend Feature

Route::group(['middleware' => ['auth']], function () {

    // menu bank account
    Route::resource('akun-bank', 'AkunBankController')->only(['index', 'create', 'store']);
    Route::get('update-akun-bank', 'BankController@updateVa')->name('update-akun-bank.updateVa');

    // test payment Virtual account
    Route::resource('test-payment','PaymentController')->only(['index', 'create', 'store']);

});

