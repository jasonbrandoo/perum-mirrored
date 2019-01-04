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

/**
 * Consumer Route
 */

 Route::prefix('customer')->group(function(){
    Route::get('/', 'Customer\CustomerController@index')->name('customer.index');
    Route::get('/create', 'Customer\CustomerController@create')->name('customer.create');
    Route::post('/store', 'Customer\CustomerController@store')->name('customer.store');
    Route::get('/data', 'Customer\CustomerController@data')->name('customer.data');
 });

/**
 * Transaction Route
 */

Route::prefix('transaction')->group(function(){
    Route::prefix('surat-pesanan')->group(function(){
        Route::get('/', 'Transaction\SuratPesanan\SuratPesananController@index')->name('transaction.surat-pesanan.index');
        Route::get('/create', 'Transaction\SuratPesanan\SuratPesananController@create')->name('transaction.surat-pesanan.create');
        Route::post('/store', 'Transaction\SuratPesanan\SuratPesananController@store')->name('transaction.surat-pesanan.store');
    });
});

/**
 * Role Route
 */

 Route::prefix('role')->group(function(){
    Route::get('/', 'Role\RoleController@index')->name('role.index');
    Route::get('/create', 'Role\RoleController@create')->name('role.create');
    Route::post('/store', 'Role\RoleController@store')->name('role.store');
    Route::get('/data', 'Role\RoleController@data')->name('role.data');
 });

 /**
  * Sales Route
  */

  Route::prefix('sales')->group(function(){
    Route::get('/', 'Sales\SalesController@index')->name('sales.index');
    Route::get('/create', 'Sales\SalesController@create')->name('sales.create');
    Route::post('/store', 'Sales\SalesController@store')->name('sales.store');
    Route::get('/data', 'Sales\SalesController@data')->name('sales.data');
 });

/**
 * User Route
 */

Route::prefix('users')->group(function(){
    Route::get('/', 'Users\UsersController@index')->name('users.index');  
    Route::get('/create', 'Users\UsersController@create')->name('users.create');
    Route::post('/store', 'Users\UsersController@store')->name('users.store');
    Route::get('/data', 'Users\UsersController@data')->name('users.data');    
});

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
