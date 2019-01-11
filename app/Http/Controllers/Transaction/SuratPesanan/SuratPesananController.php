<?php

namespace App\Http\Controllers\Transaction\SuratPesanan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Customer;
use App\Model\Mou;
use App\Model\Sales;
use App\Model\Kavling;
use App\Model\Company;
use App\Model\Price;
use App\Model\SuratPesanan;
use App\Http\Requests\StoreSuratPesanan;
use Yajra\DataTables\DataTables;

class SuratPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.transaction.surat.index-surat');
    }

    /**
     * Show datatables
     */
    public function data()
    {
        $sp = SuratPesanan::with('customer', 'sales', 'kavling')->get();
        return DataTables::of($sp)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $customers =  Customer::all();
        $companies = Company::where('company_type', 'mou')->get();
        $mous = Mou::where('mou_active', 'Active')->get();
        $sales = Sales::where('sales_position', 'Sales')->get();
        $spvs = Sales::where('sales_position', 'Supervisor')->get();
        $kavlings = Kavling::with('price.house')->get();
        $prices = Price::all();
        return view('pages.transaction.surat.create-surat', compact('customers', 'mous', 'sales', 'spvs', 'kavlings', 'companies', 'prices'));
    }

    public function load_customer(Request $request)
    {
        $customer = Customer::find($request->id);
        return response()->json($customer);
    }

    public function load_company(Request $request)
    {
        $company = Company::find($request->id);
        return response()->json($company);
    }

    public function load_sales(Request $request)
    {
        $sales = Sales::find($request->id);
        return response()->json($sales);
    }

    public function load_kavling(Request $request)
    {
        $kav = Kavling::with('price.house')->find($request->id);
        return response()->json($kav);
    }

    public function load_price(Request $request)
    {
        $price = Price::find($request->id);
        return response()->json($price);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSuratPesanan $request)
    {
        //
        // return $request;
        SuratPesanan::create([
            'sp_prebook' => $request->input('sp_prebook'),
            'sp_no' => $request->input('sp_no'),
            'sp_date' => $request->input('sp_date'),
            'sp_ppjb' => $request->input('sp_ppjb'),
            'sp_ppjb_date' => $request->input('sp_ppjb_date'),
            'sp_customer_id' => $request->input('sp_customer_id'),
            'sp_company_id' => $request->input('sp_company_id'),
            'sp_mou_id' => $request->input('sp_mou_id'),
            'sp_koordinator' => $request->input('sp_koordinator'),
            'sp_se_id' => $request->input('sp_se_id'),
            'sp_spv_id' => $request->input('sp_spv_id'),
            'sp_kavling_id' => $request->input('sp_kavling_id'),
            'sp_house_type' => $request->input('sp_house_type'),
            'sp_house_block' => $request->input('sp_house_block'),
            'sp_house_no' => $request->input('sp_house_no'),
            'sp_house_cluster' => $request->input('sp_house_cluster'),
            'sp_house_building' => $request->input('sp_house_building'),
            'sp_house_surface' => $request->input('sp_house_surface'),
            'sp_tl' => $request->input('sp_tl'),
            'sp_tt' => $request->input('sp_tt'),
            // 
            'sp_price_id' => $request->input('sp_price_id'),
            'sp_price' => $request->input('sp_price'),
            'sp_price_tl' => $request->input('sp_price_tl'),
            'sp_price_list' => $request->input('sp_price_list'),
            'sp_total_harga_jual' => $request->input('sp_total_harga_jual'),
            'sp_harga_jual_tanah' => $request->input('sp_harga_jual_tanah'),
            'sp_included_tl' => $request->input('sp_included_tl'),
            'sp_discount' => $request->input('sp_discount'),
            'sp_after_discount' => $request->input('sp_after_discount'),
            'sp_ppn_percentage' => $request->input('sp_ppn_percentage'),
            'sp_after_ppn' => $request->input('sp_after_ppn'),
            'sp_harga_tanah_bangunan' => $request->input('sp_harga_tanah_bangunan'),
            'sp_payment_method' => $request->input('sp_payment_method'),
            'sp_harga_jual_pengikatan' => $request->input('sp_harga_jual_pengikatan'),
            'sp_kpr_plan' => $request->input('sp_kpr_plan'),
            'sp_ajb_price' => $request->input('sp_ajb_price'),
            'sp_total' => $request->input('sp_total'),
            // 
            'sp_bill' => $request->input('sp_bill'),
            'sp_dp' => $request->input('sp_dp'),
            'sp_subsidi' => $request->input('sp_subsidi'),
            'sp_tanah_lebih' => $request->input('sp_tanah_lebih'),
            'sp_harga_m2' => $request->input('sp_harga_m2'),
            'sp_total_harga_tanah_lebih' => $request->input('sp_total_harga_tanah_lebih'),
            'sp_ppn' => $request->input('sp_ppn'),
            'sp_sub_total' => $request->input('sp_sub_total'),
            'sp_total_bill' => $request->input('sp_total_bill'),
            'sp_per_month_internal' => $request->input('sp_per_month_internal'),
            'sp_internal_bill' => $request->input('sp_internal_bill'),
            'sp_per_month_kreditur' => $request->input('sp_per_month_kreditur'),
            'sp_kreditur_bill' => $request->input('sp_kreditur_bill'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active'
        ]);
        return redirect('transaction/surat-pesanan')->with('success', 'Successfull create Surat Pesanan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SuratPesanan  $suratPesanan
     * @return \Illuminate\Http\Response
     */
    public function show(SuratPesanan $suratPesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SuratPesanan  $suratPesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratPesanan $suratPesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SuratPesanan  $suratPesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuratPesanan $suratPesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SuratPesanan  $suratPesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuratPesanan $suratPesanan)
    {
        //
    }
}
