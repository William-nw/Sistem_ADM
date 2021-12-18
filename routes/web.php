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

    //Menu Orang Tua
    Route::prefix('orangtua')->group(function () {

        Route::resource('/spp-siswa-ortu', 'ParentStudent\DataSppSiswaOrtuController');

    });

    // menu Admin
    Route::prefix('admin')->group(function () {
        Route::resource('/data-admin', 'DataAdminController');

        //Menu Siswa
        Route::resource('/data-siswa', 'DataSiswaController');
        Route::resource('/register-all', 'RegisterAllController');

        //Menu Data Ortu
        Route::resource('/data-ortu', 'Admin\DataOrtuController');


        //Menu Tahun Ajaran
        Route::resource('/master-tahun-ajaran', 'MasterTahunAjaranController');

        //Menu Kelas
        Route::resource('/master-kelas', 'MasterKelasController');

        //Master Buku
        Route::resource('/master-buku', 'MasterBukuController');

        //Master Baju
        Route::resource('/master-baju', 'MasterBajuController');

        //ajax
        Route::get("/getBuku/{id}", "AjaxController@getBuku");
        Route::get("/getBaju/{id}", "AjaxController@getBaju");
    });

    Route::post("test-buku", function(Request $request){
        dd($request->all());
    })->name('test.index');

});

Route::get('/uang-buku', function () {
    return view('ortu-siswa/data-pembayaran.uang-buku');
});

Route::get('/uang-baju', function () {
    return view('ortu-siswa/data-pembayaran.uang-baju');
});

Route::get('/uang-konsumsi', function () {
    return view('ortu-siswa/data-pembayaran.uang-konsumsi');
});

Route::get('/uang-pembangunan', function () {
    return view('ortu-siswa/data-pembayaran.uang-pembangunan');
});

Route::get('/test-pembayaran', function () {
    return view('ortu-siswa/test-pembayaran.test-pembayaran');
});


//laporan Pembayaran
Route::get('/lappembayaranspp', function () {
    return view('laporan-pembayaran.index');
});
Route::get('/lappembayaranperbulan', function () {
    return view('laporan-pembayaran.tanggal_pembayaran');
});
Route::get('/lappembayaranperkelas', function () {
    return view('laporan-pembayaran.laporan_spp_perkelas');
});
Route::get('/lappembayaransiswakelas', function () {
    return view('laporan-pembayaran.laporan-siswa-kelas');
});
Route::get('/lappembayaranpertahun', function () {
    return view('laporan-pembayaran.laporan_spp_tahunan');
});

//laporan pembangunan
Route::get('/lappembangunantunggakan', function () {
    return view('laporan-pembayaran.laporan_tunggakan_pembangunan');
});
Route::get('/lappembangunanperkelas', function () {
    return view('laporan-pembayaran.laporan_pembangunan_perkelas');
});
Route::get('/lappembangunanpertahun', function () {
    return view('laporan-pembayaran.laporan_pembagunan_tahunan');
});
Route::get('/laptertunggakperbulan', function () {
    return view('tertunggak.index');
});
Route::get('/laptertunggakperkelas', function () {
    return view('tertunggak.perkelas');
});
Route::get('/', function () {
    return view('');
});
Route::get('/', function () {
    return view('');
});
Route::get('/', function () {
    return view('');
});
Route::get('/', function () {
    return view('');
});
Route::get('/', function () {
    return view('');
});


// Backend Feature

Route::group(['middleware' => ['auth']], function () {

    // menu bank account
    Route::resource('akun-bank', 'AkunBankController')->only(['index', 'create', 'store']);
    Route::get('update-akun-bank', 'BankController@updateVa')->name('update-akun-bank.updateVa');

    // test payment Virtual account
    Route::resource('test-payment','PaymentController')->only(['index', 'create', 'store']);

});

