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

    Route::get('/', function () {
        return view('layouts/app');
    });

    //! Paket Laundry 
    Route::get('/paket-laundry', 'PaketLaundryController@index')->name('laundry.index');
    Route::post('/paket-laundry', 'PaketLaundryController@store')->name('laundry.store');
    Route::get('/paket-laundry/{id}', 'PaketLaundryController@show');
    Route::get('/paket-laundry/{id}/edit', 'PaketLaundryController@edit');
    Route::patch('/paket-laundry/{id}', 'PaketLaundryController@update')->name('laundry.update');
    Route::delete('paket-laundry/{id}', 'PaketLaundryController@destroy')->name('laundry.destroy');

    //! Jenis Laundry
    Route::resource('/jenis-laundry', 'JenisLaundryController');

    //! Transaksi
    Route::resource('/transaksi', 'TransaksiController');
    Route::get('transaksi-json', 'TransaksiController@transaksiJson'); 
    Route::get('/transaksi/checkout/{no_transaksi}', 'DetailTransaksiController@kasir');

    //! Detail Transaksi
    Route::resource('detail-transaksi', 'DetailTransaksiController'); 
    Route::post('checkout', 'DetailTransaksiController@detailTransaksi')->name('checkout'); 
    Route::get('checkout/{no_transaksi}', 'DetailTransaksiController@checkout');
    Route::get('checkout/cetak-nota/{no_transaksi}', 'DetailTransaksiController@cetak_nota');

    //! Laporan
    Route::resource('laporan', 'LaporanController'); 
    Route::get('laporan-json', 'LaporanController@laporan_json');
    Route::get('export-excel/{no_transaksi}', 'LaporanController@export_excel');
    Route::post('export-pdfbydate', 'LaporanController@export_pdf_date');

