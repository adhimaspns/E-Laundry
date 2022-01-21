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
    Route::get('/paket-laundry/{kategori}', 'PaketLaundryController@listKategori');

