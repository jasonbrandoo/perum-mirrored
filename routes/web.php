<?php

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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* TEST ROUTE */

Route::prefix('test')->group(function(){
    Route::get('/create-company', function(){
        return view('pages.company.create-company');
    });
    Route::get('/create-ajb', function(){
        return view('pages.transaction.ajb.create-ajb');
    });
    Route::get('/create-berkas', function(){
        return view('pages.transaction.berkas.create-berkas');
    });
    Route::get('/create-customer', function(){
        return view('pages.customer.create-customer');
    });
    Route::get('/create-komisi-akad', function(){
        return view('pages.transaction.komisiakad.create-komisi-akad');
    });
    Route::get('/create-komisi-eksternal', function(){
        return view('pages.transaction.komisieksternal.create-komisi-eksternal');
    });
});
