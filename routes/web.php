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

Route::get('/dashboard', 'DashboardController@toDashboard')->middleware('auth')->name('dashboard');
Route::get('/barang', 'BarangController@toBarang')->name('barang');
Route::get('/aksesoris', 'AksesorisController@toAksesoris')->name('aksesoris');
Route::get('/pembelian', 'PembelianController@toPembelian')->name('pembelian');
Route::get('/hasilproduksi', 'HasilProduksiController@toHasilProduksi')->name('hasilproduksi');

Route::get('/aksesoris/add', 'AksesorisController@add')->name('aksesorisadd');
Route::post('/aksesoris/create', 'AksesorisController@create')->name('aksesoriscreate');
Route::get('/aksesoris/edit/{id}', 'AksesorisController@edit')->name('aksesorisedit');
Route::post('/aksesoris/update/{id}', 'AksesorisController@update')->name('aksesorisupdate');
Route::get('/aksesoris/delete/{id}', 'AksesorisController@delete')->name('aksesorisdelete');

Route::get('/barang/add', 'BarangController@add')->name('barangadd');
Route::post('/barang/create', 'BarangController@create')->name('barangcreate');
Route::get('/barang/edit/{id}', 'BarangController@edit')->name('barangedit');
Route::post('/barang/update/{id}', 'BarangController@update')->name('barangupdate');
Route::get('/barang/delete/{id}', 'BarangController@delete')->name('barangdelete');

Route::get('/pembelian/add', 'PembelianController@add');
Route::post('/pembelian/create', 'PembelianController@create')->name('pembeliancreate');
Route::get('/pembelian/edit/{id}', 'PembelianController@edit')->name('pembelianedit');
Route::post('/pembelian/update/{id}', 'PembelianController@update')->name('pembelianupdate');
Route::get('/pembelian/delete/{id}', 'PembelianController@delete')->name('pemebliandelete');

Route::get('/hasilproduksi/add', 'HasilProduksiController@add');
Route::post('/hasilproduksi/create', 'HasilProduksiController@create')->name('hasilproduksicreate');
Route::get('/hasilproduksi/edit/{id}', 'HasilProduksiController@edit')->name('hasilproduksiedit');
Route::post('/hasilproduksi/update/{id}', 'HasilProduksiController@update')->name('hasilproduksiupdate');
Route::get('/hasilproduksi/delete/{id}', 'HasilProduksiController@delete')->name('hasilproduksidelete');
Route::get('/hasilproduksi/detail/{id}/{idbrg}', 'HasilProduksiController@detail')->name('hasilproduksidetail');


Route::get('/orderdetail/{id}', 'OrderController@toOrderDetail')->name('orderdetail');
Route::get('/order/add', 'OrderController@add')->name('orderadd');
Route::post('/order/create', 'OrderController@create')->name('ordercreate');

Route::get('/hasilproduksi/add/{id}', 'HasilProduksiController@addFromOrder')->name('hasilproduksiadd');
Route::get('/pembelian/add/{id}/{brg}/{acc}/{no}', 'PembelianController@addFromOrder')->name('pembelianadd');

Route::get('export/{id}', 'OrderController@export')->name('export');
// Route::get('export/{id}', 'OrderController@pexport');

