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

