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

//Route untuk menampilkan halaman Login
Route::get('/login', function () {
    return view('layout/login');
})->name('login.index');

//Route untuk login mengakses sistem product
Route::post('/loginverify', 'LoginController@VerifikasiUser')->name('LoginVerify');


//Route untuk logout
Route::get('logout', 'LoginController@logout')->name('logout');

//Route untuk Register
Route::get('/register', 'LoginController@register')->name('register');
Route::post('/register', 'LoginController@createRegister')->name('register.create');
Route::get('/register/confirm/{emailConfirmToken}', 'LoginController@confirmEmail')->name('register.confirm');


//Route untuk middleware sebelum mengakses sistem login terlebih dahulu
Route::group(['middleware' =>['pwl.middleware']], static function() {


//Route untuk menampilkan halaman dasboar
    Route::get('/dashboar', 'HomeController@home')->name('home');

//Route untuk menampilkan halaman utama
    Route::get('/', function () {
    return view('layout/main');
    });

//Route index untuk menampilkan halaman semua data products
    Route::get('/products', 'ProductController@index')->name('pr.index');
//Route untuk menampilkan halaman form tambah data produt
    Route::get('/products/form tambah', 'ProductController@FormTambah')->name('pr.FormTambah');
//Route untuk menambah data product
    Route::post('/products/add','ProductController@add')->name('pr.Add');
//Route untuk mengahapus data product
    Route::delete('/products/{id}/delete', 'ProductController@delete')->name('pr.Delete');
//Route untuk menampilkan halaman form ubah data product
    Route::get('/products/{id}/form ubah', 'ProductController@FormUbah')->name('pr.FormUbah');
//Route untuk mengubah data product
    Route::post('/product/{id}/update', 'ProductController@update')->name('pr.Update');

//Route untuk aplikasi
    Route::get('/app', 'KasirController@index')->name('kasir.index');
    Route::get('app/{noTransaksi}', 'KasirController@aplikasi')->name('kasir.app');
    Route::get('app/searchProduct/{code}', 'KasirController@searchProduct')->name('kasir.search');
    Route::post('app/insert/{noTransaksi}', 'KasirController@insertItem')->name('kasir.insert');
    Route::get('app/close/{noTransaksi}', 'KasirController@TutupTransaksi')->name('kasir.close');

//Route untuk Transaksi
    Route::get('transaksi', 'TransaksiController@index')->name('trx.index');

//Route untuk exel
    Route::get('transaksi/{trxNumber}/export/excel', 'TransaksiController@exportExcel')->name('trx.excel');

//Route untul pdf
    Route::get('transaksi/{trxNumber}/export/pdf', 'TransaksiController@exportPdf')->name('trx.pdf');


});

//Route untuk email
Route::get('test/email', 'TestingController@mail');


