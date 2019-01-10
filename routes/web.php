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
 * Company Route
 */

Route::prefix('company')->group(function(){
    Route::get('/', 'Company\CompanyController@index')->name('company.index');
    Route::get('/create', 'Company\CompanyController@create')->name('company.create');
    Route::post('/store', 'Company\CompanyController@store')->name('company.store');
    Route::get('/data', 'Company\CompanyController@data')->name('company.data');
 });

/**
 * Customer Route
 */

 Route::prefix('customer')->group(function(){
    Route::get('/', 'Customer\CustomerController@index')->name('customer.index');
    Route::get('/create', 'Customer\CustomerController@create')->name('customer.create');
    Route::post('/store', 'Customer\CustomerController@store')->name('customer.store');
    Route::get('/data', 'Customer\CustomerController@data')->name('customer.data');
    Route::get('/company_customer', 'Customer\CustomerController@company')->name('customer.company');
 });

 /**
 * Kavling Route
 */

Route::prefix('kavling')->group(function(){
    Route::get('/', 'Kavling\KavlingController@index')->name('kavling.index');
    Route::get('/create', 'Kavling\KavlingController@create')->name('kavling.create');
    Route::post('/store', 'Kavling\KavlingController@store')->name('kavling.store');
    Route::get('/data', 'Kavling\KavlingController@data')->name('kavling.data');
    Route::get('/prices', 'Kavling\KavlingController@prices')->name('kavling.prices');
 });

/**
 * Payment Method Route
 */

Route::prefix('payment')->group(function(){
    Route::get('/', 'Payment\PaymentController@index')->name('payment.index');
    Route::get('/create', 'Payment\PaymentController@create')->name('payment.create');
    Route::post('/store', 'Payment\PaymentController@store')->name('payment.store');
    Route::get('/data', 'Payment\PaymentController@data')->name('payment.data');
 });

 /**
 * Payment Method Route
 */

Route::prefix('price')->group(function(){
    Route::get('/', 'Price\PriceController@index')->name('price.index');
    Route::get('/create', 'Price\PriceController@create')->name('price.create');
    Route::post('/store', 'Price\PriceController@store')->name('price.store');
    Route::get('/data', 'Price\PriceController@data')->name('price.data');
    Route::get('/houses', 'Price\PriceController@houses')->name('price.houses');
 });

 /**
 * Payment Method Route
 */

Route::prefix('referensi')->group(function(){
    Route::get('/', 'Referensi\ReferensiController@index')->name('referensi.index');
    Route::get('/create', 'Referensi\ReferensiController@create')->name('referensi.create');
    Route::post('/store', 'Referensi\ReferensiController@store')->name('referensi.store');
    Route::get('/data', 'Referensi\ReferensiController@data')->name('referensi.data');
 });

/**
 * Transaction Route
 */

Route::prefix('transaction')->group(function(){
    Route::prefix('surat-pesanan')->group(function(){
        Route::get('/', 'Transaction\SuratPesanan\SuratPesananController@index')->name('transaction.surat-pesanan.index');
        Route::get('/create', 'Transaction\SuratPesanan\SuratPesananController@create')->name('transaction.surat-pesanan.create');
        Route::post('/store', 'Transaction\SuratPesanan\SuratPesananController@store')->name('transaction.surat-pesanan.store');
        Route::get('/load_customer', 'Transaction\SuratPesanan\SuratPesananController@load_customer')->name('transaction.surat-pesanan.load_customer');
        Route::get('/load_company', 'Transaction\SuratPesanan\SuratPesananController@load_company')->name('transaction.surat-pesanan.load_company');
        Route::get('/load_sales', 'Transaction\SuratPesanan\SuratPesananController@load_sales')->name('transaction.surat-pesanan.load_sales');
        Route::get('/load_kavling', 'Transaction\SuratPesanan\SuratPesananController@load_kavling')->name('transaction.surat-pesanan.load_kavling');
        Route::get('/load_price', 'Transaction\SuratPesanan\SuratPesananController@load_price')->name('transaction.surat-pesanan.load_price');
    });
    Route::prefix('mou')->group(function(){
        Route::get('/', 'Transaction\Mou\MouController@index')->name('transaction.mou.index');
        Route::get('/create', 'Transaction\Mou\MouController@create')->name('transaction.mou.create');
        Route::post('/store', 'Transaction\Mou\MouController@store')->name('transaction.mou.store');
        Route::get('/data', 'Transaction\Mou\MouController@data')->name('transaction.mou.data');
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
 * Rumah Route
 */

Route::prefix('rumah')->group(function(){
    Route::get('/', 'Rumah\RumahController@index')->name('rumah.index');
    Route::get('/create', 'Rumah\RumahController@create')->name('rumah.create');
    Route::post('/store', 'Rumah\RumahController@store')->name('rumah.store');
    Route::get('/data', 'Rumah\RumahController@data')->name('rumah.data');
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
