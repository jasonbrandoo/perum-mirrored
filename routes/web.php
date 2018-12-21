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
});
