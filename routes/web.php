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
    Route::get('/create-kuitansi', function(){
        return view('pages.transaction.kuitansi.create-kuitansi');
    });
    Route::get('/create-legal', function(){
        return view('pages.transaction.legal.create-legal');
    });
    Route::get('/create-lpa', function(){
        return view('pages.transaction.lpa.create-lpa');
    });
    Route::get('/create-mou', function(){
        return view('pages.transaction.mou.create-mou');
    });
    Route::get('/payment-method', function(){
        return view('pages.payment.payment-method');
    });
    Route::get('/pembatalan-sp', function(){
        return view('pages.transaction.pembatalansp.create-pembatalan');
    });
    Route::get('/create-price', function(){
        return view('pages.price.create-price');
    });
    Route::get('/create-referensi', function(){
        return view('pages.referensi.create-referensi');
    });
    Route::get('/create-result', function(){
        return view('pages.transaction.result.create-result');
    });
    Route::get('/create-role', function(){
        return view('pages.role.create-role');
    });
    Route::get('/create-rumah', function(){
        return view('pages.rumah.create-rumah');
    });
    Route::get('/create-sales', function(){
        return view('pages.sales.create-sales');
    });
    Route::get('/create-spk', function(){
        return view('pages.transaction.spk.create-spk');
    });
    Route::get('/create-surat', function(){
        return view('pages.transaction.surat.create-surat');
    });
    Route::get('/create-user', function(){
        return view('pages.user.create-user');
    });
    Route::get('/create-wawancara', function(){
        return view('pages.transaction.wawancara.create-wawancara');
    });
    Route::get('/data-company', function(){
        return view('pages.company.data-company');
    });
});
