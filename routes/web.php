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
    return redirect()->intended('login');
});

Auth::routes();

Route::get('/home', 'DashboardController@toDashboard')->name('home');

Route::get('/dashboard', 'DashboardController@toDashboard')->middleware('auth');
Route::get('/barang', 'BarangController@toBarang');
Route::get('/aksesoris', 'AksesorisController@toAksesoris');
Route::get('/pembelian', 'PembelianController@toPembelian');
Route::get('/hasilproduksi', 'HasilProduksiController@toHasilProduksi');

Route::get('/aksesoris/add', 'AksesorisController@add');
Route::post('/aksesoris/create', 'AksesorisController@create');
Route::get('/aksesoris/edit/{id}', 'AksesorisController@edit');
Route::post('/aksesoris/update/{id}', 'AksesorisController@update');
Route::get('/aksesoris/delete/{id}', 'AksesorisController@delete');

Route::get('/barang/add', 'BarangController@add');
Route::post('/barang/create', 'BarangController@create');
Route::get('/barang/edit/{id}', 'BarangController@edit');
Route::post('/barang/update/{id}', 'BarangController@update');
Route::get('/barang/delete/{id}', 'BarangController@delete');

Route::get('/pembelian/add', 'PembelianController@add');
Route::post('/pembelian/create', 'PembelianController@create');
Route::get('/pembelian/edit/{id}', 'PembelianController@edit');
Route::post('/pembelian/update/{id}', 'PembelianController@update');
Route::get('/pembelian/delete/{id}', 'PembelianController@delete');

Route::get('/hasilproduksi/add', 'HasilProduksiController@add');
Route::post('/hasilproduksi/create', 'HasilProduksiController@create');
Route::get('/hasilproduksi/edit/{id}', 'HasilProduksiController@edit');
Route::post('/hasilproduksi/update/{id}', 'HasilProduksiController@update');
Route::get('/hasilproduksi/delete/{id}', 'HasilProduksiController@delete');
Route::get('/hasilproduksi/detail/{id}/{idbrg}', 'HasilProduksiController@detail');


Route::get('/orderdetail/{id}', 'OrderController@toOrderDetail');
Route::get('/order/add', 'OrderController@add');
Route::post('/order/create', 'OrderController@create');

Route::get('/hasilproduksi/add/{id}', 'HasilProduksiController@addFromOrder');
Route::get('/pembelian/add/{id}/{brg}/{acc}/{no}', 'PembelianController@addFromOrder');

Route::get('export/{id}', 'OrderController@export');
// Route::get('export/{id}', 'OrderController@pexport');

Route::get('/home', 'HomeController@index')->name('home');
