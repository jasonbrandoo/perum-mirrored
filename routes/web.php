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

// Route::get('/', function () {
//     return view('pages.company.index-company');
// });

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/', function(){
    return view('home');
})->middleware('auth');
Route::get('/home', 'HomeController@index')->middleware('auth');

/**
 * Company Route
 */

Route::group([
    'prefix' => 'company',
    'middleware' => 'auth',
], function () {
    Route::get('/', 'Company\CompanyController@index')->name('company.index');
    Route::get('/create', 'Company\CompanyController@create')->name('company.create');
    Route::get('/{id}/edit', 'Company\CompanyController@edit')->name('company.edit');
    Route::patch('/{id}/action', 'Company\CompanyController@action')->name('company.action');
    Route::patch('/update', 'Company\CompanyController@update')->name('company.update');
    Route::post('/store', 'Company\CompanyController@store')->name('company.store');
    Route::get('/data', 'Company\CompanyController@data')->name('company.data');
});

/**
 * Customer Route
 */

Route::group([
    'prefix' => 'customer',
    'middleware' => 'auth',
], function () {
    Route::get('/', 'Customer\CustomerController@index')->name('customer.index');
    Route::get('/create', 'Customer\CustomerController@create')->name('customer.create');
    Route::get('/{id}/edit', 'Customer\CustomerController@edit')->name('customer.edit');
    Route::patch('/update', 'Customer\CustomerController@update')->name('customer.update');
    Route::post('/store', 'Customer\CustomerController@store')->name('customer.store');
    Route::get('/data', 'Customer\CustomerController@data')->name('customer.data');
    Route::get('/company_customer', 'Customer\CustomerController@company')->name('customer.company');
});

/**
 * Kavling Route
 */

Route::group([
    'prefix' => 'kavling',
    'middleware' => 'auth',
], function () {
    Route::get('/', 'Kavling\KavlingController@index')->name('kavling.index');
    Route::get('/create', 'Kavling\KavlingController@create')->name('kavling.create');
    Route::get('/{id}/edit', 'Kavling\KavlingController@edit')->name('kavling.edit');
    Route::patch('/{id}/action', 'Kavling\KavlingController@action')->name('kavling.action');
    Route::patch('/update', 'Kavling\KavlingController@update')->name('kavling.update');
    Route::post('/store', 'Kavling\KavlingController@store')->name('kavling.store');
    Route::get('/data', 'Kavling\KavlingController@data')->name('kavling.data');
    Route::get('/prices', 'Kavling\KavlingController@prices')->name('kavling.prices');
    Route::get('/type', 'Kavling\KavlingController@type')->name('kavling.type');
});

/**
 * Payment Method Route
 */

Route::group([
    'prefix' => 'payment',
    'middleware' => 'auth',
], function () {
    Route::get('/', 'Payment\PaymentController@index')->name('payment.index');
    Route::get('/create', 'Payment\PaymentController@create')->name('payment.create');
    Route::get('/{id}/edit', 'Payment\PaymentController@edit')->name('payment.edit');
    Route::patch('/{id}/action', 'Payment\PaymentController@action')->name('payment.action');
    Route::patch('/update', 'Payment\PaymentController@update')->name('payment.update');
    Route::post('/store', 'Payment\PaymentController@store')->name('payment.store');
    Route::get('/data', 'Payment\PaymentController@data')->name('payment.data');
});

/**
 * Payment Method Route
 */

Route::group([
    'prefix' => 'price',
    'middleware' => 'auth',
], function () {
    Route::get('/', 'Price\PriceController@index')->name('price.index');
    Route::get('/create', 'Price\PriceController@create')->name('price.create');
    Route::get('/{id}/edit', 'Price\PriceController@edit')->name('price.edit');
    Route::patch('/{id}/action', 'Price\PriceController@action')->name('price.action');
    Route::patch('/update', 'Price\PriceController@update')->name('price.update');
    Route::post('/store', 'Price\PriceController@store')->name('price.store');
    Route::get('/data', 'Price\PriceController@data')->name('price.data');
    Route::get('/houses', 'Price\PriceController@houses')->name('price.houses');
});

/**
 * Payment Method Route
 */

Route::group([
    'prefix' => 'referensi',
    'middleware' => 'auth',
], function () {
    Route::get('/', 'Referensi\ReferensiController@index')->name('referensi.index');
    Route::get('/create', 'Referensi\ReferensiController@create')->name('referensi.create');
    Route::get('/{id}/edit', 'Referensi\ReferensiController@edit')->name('referensi.edit');
    Route::patch('/{id}/action', 'Referensi\ReferensiController@action')->name('referensi.action');
    Route::patch('/update', 'Referensi\ReferensiController@update')->name('referensi.update');
    Route::post('/store', 'Referensi\ReferensiController@store')->name('referensi.store');
    Route::get('/data', 'Referensi\ReferensiController@data')->name('referensi.data');
});

/**
 * Transaction Route
 */

Route::group([
    'prefix' => 'transaction',
    'middleware' => 'auth',
], function () {

    /**
     * AJB
     */
    Route::prefix('ajb')->group(function () {
        Route::get('/', 'Transaction\Ajb\AjbController@index')->name('transaction.ajb.index');
        Route::get('/create', 'Transaction\Ajb\AjbController@create')->name('transaction.ajb.create');
        Route::get('/realization', 'Transaction\Ajb\AjbController@realization')->name('transaction.ajb.realization');
        Route::get('/disbursement', 'Transaction\Ajb\AjbController@disbursement')->name('transaction.ajb.disbursement');
        Route::post('/store', 'Transaction\Ajb\AjbController@store')->name('transaction.ajb.store');
        Route::post('/store-realization', 'Transaction\Ajb\AjbController@storeRealization')->name('transaction.ajb.store-realization');
        Route::post('/store-disbursement', 'Transaction\Ajb\AjbController@storeDisbursement')->name('transaction.ajb.store-disbursement');
        Route::get('/data', 'Transaction\Ajb\AjbController@data')->name('transaction.ajb.data');
        Route::get('/load_sp', 'Transaction\Ajb\AjbController@load_sp')->name('transaction.ajb.load_sp');
    });

    /**
     * Legal
     */
    Route::prefix('legal')->group(function () {
        Route::get('/', 'Transaction\Legal\LegalController@index')->name('transaction.legal.index');
        Route::get('/create', 'Transaction\Legal\LegalController@create')->name('transaction.legal.create');
        Route::post('/store', 'Transaction\Legal\LegalController@store')->name('transaction.legal.store');
        Route::get('/data', 'Transaction\Legal\LegalController@data')->name('transaction.legal.data');
        Route::get('/load_sp', 'Transaction\Legal\LegalController@load_sp')->name('transaction.legal.load_sp');
    });

    /**
     * LPA
     */
    Route::prefix('lpa')->group(function () {
        Route::get('/', 'Transaction\Lpa\LPAController@index')->name('transaction.lpa.index');
        Route::get('/create', 'Transaction\Lpa\LPAController@create')->name('transaction.lpa.create');
        Route::post('/store', 'Transaction\Lpa\LPAController@store')->name('transaction.lpa.store');
        Route::get('/data', 'Transaction\Lpa\LPAController@data')->name('transaction.lpa.data');
        Route::get('/load_sp', 'Transaction\Lpa\LPAController@load_sp')->name('transaction.lpa.load_sp');
        Route::get('/load_kavling', 'Transaction\Lpa\LPAController@load_kavling')->name('transaction.lpa.load_kavling');
    });

    /**
     * Komisi Akad
     */
    Route::prefix('komisi-akad')->group(function () {
        Route::get('/', 'Transaction\Komisi\KomisiAkadController@index')->name('transaction.komisi-akad.index');
        Route::get('/create', 'Transaction\Komisi\KomisiAkadController@create')->name('transaction.komisi-akad.create');
        Route::post('/store', 'Transaction\Komisi\KomisiAkadController@store')->name('transaction.komisi-akad.store');
        Route::get('/data', 'Transaction\Komisi\KomisiAkadController@data')->name('transaction.komisi-akad.data');
        Route::get('/load_sp', 'Transaction\Komisi\KomisiAkadController@load_sp')->name('transaction.komisi-akad.load_sp');
    });

    /**
     * Komisi Eksternal
     */
    Route::prefix('komisi-eksternal')->group(function () {
        Route::get('/', 'Transaction\Komisi\KomisiEksternalController@index')->name('transaction.komisi-eksternal.index');
        Route::get('/create', 'Transaction\Komisi\KomisiEksternalController@create')->name('transaction.komisi-eksternal.create');
        Route::post('/store', 'Transaction\Komisi\KomisiEksternalController@store')->name('transaction.komisi-eksternal.store');
        Route::get('/data', 'Transaction\Komisi\KomisiEksternalController@data')->name('transaction.komisi-eksternal.data');
        Route::get('/load_sp', 'Transaction\Komisi\KomisiEksternalController@load_sp')->name('transaction.komisi-eksternal.load_sp');
        Route::get('/load_company', 'Transaction\Komisi\KomisiEksternalController@load_company')->name('transaction.komisi-eksternal.load_company');
        Route::get('/load_mou', 'Transaction\Komisi\KomisiEksternalController@load_mou')->name('transaction.komisi-eksternal.load_mou');

    });

    /**
     * Berkas
     */
    Route::prefix('berkas')->group(function () {
        Route::get('/', 'Transaction\Berkas\BerkasController@index')->name('transaction.berkas.index');
        Route::get('/create', 'Transaction\Berkas\BerkasController@create')->name('transaction.berkas.create');
        Route::post('/store', 'Transaction\Berkas\BerkasController@store')->name('transaction.berkas.store');
        Route::get('/data', 'Transaction\Berkas\BerkasController@data')->name('transaction.berkas.data');
        Route::get('/load_sp', 'Transaction\Berkas\BerkasController@load_sp')->name('transaction.berkas.load_sp');
    });

    /**
     * Kwitansti
     */
    Route::prefix('kwitansi')->group(function () {
        Route::get('/', 'Transaction\Kwitansi\KwitansiController@index')->name('transaction.kwitansi.index');
        Route::get('/create', 'Transaction\Kwitansi\KwitansiController@create')->name('transaction.kwitansi.create');
        Route::post('/store', 'Transaction\Kwitansi\KwitansiController@store')->name('transaction.kwitansi.store');
        Route::get('/data', 'Transaction\Kwitansi\KwitansiController@data')->name('transaction.kwitansi.data');
        Route::get('/load_sp', 'Transaction\Kwitansi\KwitansiController@load_sp')->name('transaction.kwitansi.load_sp');
    });

    /**
     * Pembatalan
     */
    Route::prefix('pembatalan')->group(function () {
        Route::get('/', 'Transaction\Pembatalan\PembatalanController@index')->name('transaction.pembatalan.index');
        Route::get('/create', 'Transaction\Pembatalan\PembatalanController@create')->name('transaction.pembatalan.create');
        Route::post('/store', 'Transaction\Pembatalan\PembatalanController@store')->name('transaction.pembatalan.store');
        Route::get('/data', 'Transaction\Pembatalan\PembatalanController@data')->name('transaction.pembatalan.data');
        Route::get('/load_sp', 'Transaction\Pembatalan\PembatalanController@load_sp')->name('transaction.pembatalan.load_sp');
    });

    /**
     * Surat Pesanan
     */
    Route::prefix('surat-pesanan')->group(function () {
        Route::get('/', 'Transaction\SuratPesanan\SuratPesananController@index')->name('transaction.surat-pesanan.index');
        Route::get('/create', 'Transaction\SuratPesanan\SuratPesananController@create')->name('transaction.surat-pesanan.create');
        Route::get('/{id}/edit', 'Transaction\SuratPesanan\SuratPesananController@edit')->name('transaction.surat-pesanan.edit');
        Route::patch('/update', 'Transaction\SuratPesanan\SuratPesananController@update')->name('transaction.surat-pesanan.update');
        Route::post('/store', 'Transaction\SuratPesanan\SuratPesananController@store')->name('transaction.surat-pesanan.store');
        Route::get('/data', 'Transaction\SuratPesanan\SuratPesananController@data')->name('transaction.surat-pesanan.data');
        Route::get('/load_customer', 'Transaction\SuratPesanan\SuratPesananController@load_customer')->name('transaction.surat-pesanan.load_customer');
        Route::get('/load_company', 'Transaction\SuratPesanan\SuratPesananController@load_company')->name('transaction.surat-pesanan.load_company');
        Route::get('/load_sales', 'Transaction\SuratPesanan\SuratPesananController@load_sales')->name('transaction.surat-pesanan.load_sales');
        Route::get('/load_kavling', 'Transaction\SuratPesanan\SuratPesananController@load_kavling')->name('transaction.surat-pesanan.load_kavling');
        Route::get('/load_price', 'Transaction\SuratPesanan\SuratPesananController@load_price')->name('transaction.surat-pesanan.load_price');
        Route::get('/load_mou', 'Transaction\SuratPesanan\SuratPesananController@load_mou')->name('transaction.surat-pesanan.load_mou');
    });

    /**
     * MOU
     */
    Route::prefix('mou')->group(function () {
        Route::get('/', 'Transaction\Mou\MouController@index')->name('transaction.mou.index');
        Route::get('/create', 'Transaction\Mou\MouController@create')->name('transaction.mou.create');
        Route::get('/{id}/edit', 'Transaction\Mou\MouController@edit')->name('transaction.mou.edit');
        Route::patch('/update', 'Transaction\Mou\MouController@update')->name('transaction.mou.update');
        Route::patch('/{id}/action', 'Transaction\Mou\MouController@action')->name('transaction.mou.action');
        Route::post('/store', 'Transaction\Mou\MouController@store')->name('transaction.mou.store');
        Route::get('/data', 'Transaction\Mou\MouController@data')->name('transaction.mou.data');
    });

    /**
     * SPK
     */
    Route::prefix('spk')->group(function () {
        Route::get('/', 'Transaction\Spk\SpkController@index')->name('transaction.spk.index');
        Route::get('/create', 'Transaction\Spk\SpkController@create')->name('transaction.spk.create');
        Route::post('/store', 'Transaction\Spk\SpkController@store')->name('transaction.spk.store');
        Route::get('/data', 'Transaction\Spk\SpkController@data')->name('transaction.spk.data');
        Route::get('/load_sp', 'Transaction\Spk\SpkController@load_sp')->name('transaction.spk.load_sp');
    });

    /**
     * Wawancara
     */
    Route::prefix('wawancara')->group(function () {
        Route::get('/', 'Transaction\Wawancara\WawancaraController@index')->name('transaction.wawancara.index');
        Route::get('/create', 'Transaction\Wawancara\WawancaraController@create')->name('transaction.wawancara.create');
        Route::post('/store', 'Transaction\Wawancara\WawancaraController@store')->name('transaction.wawancara.store');
        Route::get('/data', 'Transaction\Wawancara\WawancaraController@data')->name('transaction.wawancara.data');
        Route::get('/load_sp', 'Transaction\Wawancara\WawancaraController@load_sp')->name('transaction.wawancara.load_sp');
    });

    /**
     * Realisasi Wawancara
     */
    Route::prefix('realisasi-wawancara')->group(function () {
        Route::get('/', 'Transaction\Wawancara\RealisasiWawancaraController@index')->name('transaction.realisasi.index');
        Route::get('/create', 'Transaction\Wawancara\RealisasiWawancaraController@create')->name('transaction.realisasi.create');
        Route::post('/store', 'Transaction\Wawancara\RealisasiWawancaraController@store')->name('transaction.realisasi.store');
        Route::get('/data', 'Transaction\Wawancara\RealisasiWawancaraController@data')->name('transaction.realisasi.data');
        Route::get('/load_wawancara', 'Transaction\Wawancara\RealisasiWawancaraController@load_wawancara')->name('transaction.realisasi.load_wawancara');
    });

    /**
     * Keputusan Wawancara
     */
    Route::prefix('keputusan-wawancara')->group(function () {
        Route::get('/', 'Transaction\Wawancara\KeputusanController@index')->name('transaction.keputusan.index');
        Route::get('/create', 'Transaction\Wawancara\KeputusanController@create')->name('transaction.keputusan.create');
        Route::post('/store', 'Transaction\Wawancara\KeputusanController@store')->name('transaction.keputusan.store');
        Route::get('/data', 'Transaction\Wawancara\KeputusanController@data')->name('transaction.keputusan.data');
        Route::get('/load_realisasi', 'Transaction\Wawancara\KeputusanController@load_realisasi')->name('transaction.keputusan.load_realisasi');
        Route::get('/load_sp', 'Transaction\Wawancara\KeputusanController@load_sp')->name('transaction.keputusan.load_sp');
    });
});

/**
 * Role Route
 */
Route::group([
    'prefix' => 'role',
    'middleware' => 'auth',
], function () {
    Route::get('/', 'Role\RoleController@index')->name('role.index');
    Route::get('/create', 'Role\RoleController@create')->name('role.create');
    Route::get('/{id}/edit', 'Role\RoleController@edit')->name('role.edit');
    Route::patch('/{id}/action', 'Role\RoleController@action')->name('role.action');
    Route::patch('/update', 'Role\RoleController@update')->name('role.update');
    Route::post('/store', 'Role\RoleController@store')->name('role.store');
    Route::get('/data', 'Role\RoleController@data')->name('role.data');
});

/**
 * Rumah Route
 */
Route::group([
    'prefix' => 'rumah',
    'middleware' => 'auth',
], function () {
    Route::get('/', 'Rumah\RumahController@index')->name('rumah.index');
    Route::get('/create', 'Rumah\RumahController@create')->name('rumah.create');
    Route::get('/{id}/edit', 'Rumah\RumahController@edit')->name('rumah.edit');
    Route::patch('/{id}/action', 'Rumah\RumahController@action')->name('rumah.action');
    Route::patch('/update', 'Rumah\RumahController@update')->name('rumah.update');
    Route::post('/store', 'Rumah\RumahController@store')->name('rumah.store');
    Route::get('/data', 'Rumah\RumahController@data')->name('rumah.data');
});

/**
 * Sales Route
 */
Route::group([
    'prefix' => 'sales',
    'middleware' => 'auth',
], function () {
    Route::get('/', 'Sales\SalesController@index')->name('sales.index');
    Route::get('/create', 'Sales\SalesController@create')->name('sales.create');
    Route::get('/{id}/edit', 'Sales\SalesController@edit')->name('sales.edit');
    Route::patch('/{id}/action', 'Sales\SalesController@action')->name('sales.action');
    Route::patch('/update', 'Sales\SalesController@update')->name('sales.update');
    Route::post('/store', 'Sales\SalesController@store')->name('sales.store');
    Route::get('/data', 'Sales\SalesController@data')->name('sales.data');
});

/**
 * User Route
 */
Route::group([
    'prefix' => 'users',
    'middleware' => 'auth',
], function () {
    Route::get('/', 'Users\UsersController@index')->name('users.index');
    Route::get('/create', 'Users\UsersController@create')->name('users.create');
    Route::get('/{id}/edit', 'Users\UsersController@edit')->name('users.edit');
    Route::patch('/{id}/action', 'Users\UsersController@action')->name('users.action');
    Route::patch('/update', 'Users\UsersController@update')->name('users.update');
    Route::post('/store', 'Users\UsersController@store')->name('users.store');
    Route::get('/data', 'Users\UsersController@data')->name('users.data');
});

/* TEST ROUTE */

Route::prefix('test')->group(function () {
    Route::get('/create-company', function () {
        return view('pages.company.create-company');
    });
    Route::get('/create-ajb', function () {
        return view('pages.transaction.ajb.create-ajb');
    });
    Route::get('/create-berkas', function () {
        return view('pages.transaction.berkas.create-berkas');
    });
    Route::get('/create-customer', function () {
        return view('pages.customer.create-customer');
    });
    Route::get('/create-komisi-akad', function () {
        return view('pages.transaction.komisiakad.create-komisi-akad');
    });
    Route::get('/create-komisi-eksternal', function () {
        return view('pages.transaction.komisieksternal.create-komisi-eksternal');
    });
    Route::get('/create-kuitansi', function () {
        return view('pages.transaction.kuitansi.create-kuitansi');
    });
    Route::get('/create-legal', function () {
        return view('pages.transaction.legal.create-legal');
    });
    Route::get('/create-lpa', function () {
        return view('pages.transaction.lpa.create-lpa');
    });
    Route::get('/create-mou', function () {
        return view('pages.transaction.mou.create-mou');
    });
    Route::get('/payment-method', function () {
        return view('pages.payment.payment-method');
    });
    Route::get('/pembatalan-sp', function () {
        return view('pages.transaction.pembatalansp.create-pembatalan');
    });
    Route::get('/create-price', function () {
        return view('pages.price.create-price');
    });
    Route::get('/create-referensi', function () {
        return view('pages.referensi.create-referensi');
    });
    Route::get('/create-result', function () {
        return view('pages.transaction.result.create-result');
    });
    Route::get('/create-role', function () {
        return view('pages.role.create-role');
    });
    Route::get('/create-rumah', function () {
        return view('pages.rumah.create-rumah');
    });
    Route::get('/create-sales', function () {
        return view('pages.sales.create-sales');
    });
    Route::get('/create-spk', function () {
        return view('pages.transaction.spk.create-spk');
    });
    Route::get('/create-surat', function () {
        return view('pages.transaction.surat.create-surat');
    });
    Route::get('/create-user', function () {
        return view('pages.user.create-user');
    });
    Route::get('/create-wawancara', function () {
        return view('pages.transaction.wawancara.create-wawancara');
    });
    Route::get('/data-company', function () {
        return view('pages.company.data-company');
    });
});
