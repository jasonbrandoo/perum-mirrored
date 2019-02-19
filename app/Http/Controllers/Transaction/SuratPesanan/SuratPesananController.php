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
use Carbon\Carbon;
use App\Model\Payment;
use App\Helpers\Comma;

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
        $mous = Mou::where('active', 'Active')->get();
        $sales = Sales::where('sales_position', 'Sales')->get();
        $spvs = Sales::where('sales_position', 'Supervisor')->get();
        $payments = Payment::all();
        $kavlings = Kavling::with('price.house')->get();
        $prices = Price::all();
        return view('pages.transaction.surat.create-surat', compact('customers', 'mous', 'sales', 'spvs', 'kavlings', 'companies', 'prices', 'payments'));
    }

    public function load_customer(Request $request)
    {
        $customer = Customer::find($request->id);
        return response()->json($customer);
    }

    public function load_mou(Request $request)
    {
        $mou = Mou::find($request->id);
        return response()->json($mou);
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
            'sp_date' => Carbon::parse($request->input('sp_date'))->format('Y-m-d H:i:s'),
            'sp_ppjb' => $request->input('sp_ppjb'),
            'sp_ppjb_date' => Carbon::parse($request->input('sp_ppjb_date'))->format('Y-m-d H:i:s'),
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
            'sp_price_id' => Comma::removeComma($request->input('sp_price_id')),
            'sp_price' => Comma::removeComma($request->input('sp_price')),
            'sp_price_tl' => Comma::removeComma($request->input('sp_price_tl')),
            'sp_price_list' => null,
            'sp_total_harga_jual' => Comma::removeComma($request->input('sp_total_harga_jual')),
            'sp_harga_jual_tanah' => Comma::removeComma($request->input('sp_harga_jual_tanah')),
            'sp_included_tl' => Comma::removeComma($request->input('sp_included_tl')),
            'sp_discount' => Comma::removeComma($request->input('sp_discount')),
            'sp_after_discount' => Comma::removeComma($request->input('sp_after_discount')),
            'sp_ppn_percentage' => Comma::removeComma($request->input('sp_ppn_percentage')),
            'sp_after_ppn' => Comma::removeComma($request->input('sp_after_ppn')),
            'sp_harga_tanah_bangunan' => Comma::removeComma($request->input('sp_harga_tanah_bangunan')),
            'sp_payment_method' => Comma::removeComma($request->input('sp_payment_method')),
            'sp_harga_jual_pengikatan' => Comma::removeComma($request->input('sp_harga_jual_pengikatan')),
            'sp_kpr_plan' => Comma::removeComma($request->input('sp_kpr_plan')),
            'sp_kpr_plan_percentage' => Comma::removeComma($request->input('sp_kpr_plan_percentage')),
            'sp_ajb_price' => Comma::removeComma($request->input('sp_ajb_price')),
            'sp_total' => Comma::removeComma($request->input('sp_total')),
            // 
            'sp_bill' => Comma::removeComma($request->input('sp_bill')),
            'sp_dp' => Comma::removeComma($request->input('sp_dp')),
            'sp_subsidi' => $request->input('active') == null ? 'Not Active' : 'Active',
            'sp_tanah_lebih' => Comma::removeComma($request->input('sp_tanah_lebih')),
            'sp_harga_m2' => Comma::removeComma($request->input('sp_harga_m2')),
            'sp_total_harga_tanah_lebih' => Comma::removeComma($request->input('sp_total_harga_tanah_lebih')),
            'sp_ppn' => Comma::removeComma($request->input('sp_ppn')),
            'sp_sub_total' => Comma::removeComma($request->input('sp_sub_total')),
            'sp_booking_fee' => Comma::removeComma($request->input('sp_booking_fee')),
            'sp_total_bill' => Comma::removeComma($request->input('sp_total_bill')),
            'sp_per_month_internal' => Comma::removeComma($request->input('sp_per_month_internal')),
            'sp_internal_bill' => Comma::removeComma($request->input('sp_internal_bill')),
            'sp_per_month_kreditur' => Comma::removeComma($request->input('sp_per_month_kreditur')),
            'sp_kreditur_bill' => Comma::removeComma($request->input('sp_kreditur_bill')),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active'
        ]);
        return redirect('transaction/surat-pesanan')->with('success', 'Successfull create Surat Pesanan');
    }

    /**
     * Active / Deactive
     *
     * @return SP Status
     */
    public function action(Request $request, $id)
    {
        $sp = SuratPesanan::find($id);
        if ($request->input('active') == 'Deactive') {
            $sp->active = 'Deactive';
            $sp->save();
        } elseif ($request->input('active') == 'Active') {
            $sp->active = 'Active';
            $sp->save();
        }
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
    public function edit(SuratPesanan $suratPesanan, $id)
    {
        //
        $surat = SuratPesanan::with('company', 'customer', 'sales', 'supervisor', 'kavling.house', 'mou', 'price', 'paymentMethod')->find($id);
        // return $surat;
        $customers =  Customer::all();
        $companies = Company::where('company_type', 'mou')->get();
        $mous = Mou::where('active', 'Active')->get();
        $sales = Sales::where('sales_position', 'Sales')->get();
        $spvs = Sales::where('sales_position', 'Supervisor')->get();
        $payments = Payment::all();
        $kavlings = Kavling::with('price.house')->get();
        $prices = Price::all();
        return view('pages.transaction.surat.create-surat', compact('surat', 'customers', 'mous', 'sales', 'spvs', 'kavlings', 'companies', 'prices', 'payments'));
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
        SuratPesanan::find($request->id)->update([
            'sp_prebook' => $request->input('sp_prebook'),
            'sp_no' => $request->input('sp_no'),
            'sp_date' => Carbon::parse($request->input('sp_date'))->format('Y-m-d H:i:s'),
            'sp_ppjb' => $request->input('sp_ppjb'),
            'sp_ppjb_date' => Carbon::parse($request->input('sp_ppjb_date'))->format('Y-m-d H:i:s'),
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
            'sp_price_id' => Comma::removeComma($request->input('sp_price_id')),
            'sp_price' => Comma::removeComma($request->input('sp_price')),
            'sp_price_tl' => Comma::removeComma($request->input('sp_price_tl')),
            'sp_price_list' => null,
            'sp_total_harga_jual' => Comma::removeComma($request->input('sp_total_harga_jual')),
            'sp_harga_jual_tanah' => Comma::removeComma($request->input('sp_harga_jual_tanah')),
            'sp_included_tl' => Comma::removeComma($request->input('sp_included_tl')),
            'sp_discount' => Comma::removeComma($request->input('sp_discount')),
            'sp_after_discount' => Comma::removeComma($request->input('sp_after_discount')),
            'sp_ppn_percentage' => Comma::removeComma($request->input('sp_ppn_percentage')),
            'sp_after_ppn' => Comma::removeComma($request->input('sp_after_ppn')),
            'sp_harga_tanah_bangunan' => Comma::removeComma($request->input('sp_harga_tanah_bangunan')),
            'sp_payment_method' => Comma::removeComma($request->input('sp_payment_method')),
            'sp_harga_jual_pengikatan' => Comma::removeComma($request->input('sp_harga_jual_pengikatan')),
            'sp_kpr_plan' => Comma::removeComma($request->input('sp_kpr_plan')),
            'sp_kpr_plan_percentage' => Comma::removeComma($request->input('sp_kpr_plan_percentage')),
            'sp_ajb_price' => Comma::removeComma($request->input('sp_ajb_price')),
            'sp_total' => Comma::removeComma($request->input('sp_total')),
            // 
            'sp_bill' => Comma::removeComma($request->input('sp_bill')),
            'sp_dp' => Comma::removeComma($request->input('sp_dp')),
            'sp_subsidi' => $request->input('active') == null ? 'Not Active' : 'Active',
            'sp_tanah_lebih' => Comma::removeComma($request->input('sp_tanah_lebih')),
            'sp_harga_m2' => Comma::removeComma($request->input('sp_harga_m2')),
            'sp_total_harga_tanah_lebih' => Comma::removeComma($request->input('sp_total_harga_tanah_lebih')),
            'sp_ppn' => Comma::removeComma($request->input('sp_ppn')),
            'sp_sub_total' => Comma::removeComma($request->input('sp_sub_total')),
            'sp_booking_fee' => Comma::removeComma($request->input('sp_booking_fee')),
            'sp_total_bill' => Comma::removeComma($request->input('sp_total_bill')),
            'sp_per_month_internal' => Comma::removeComma($request->input('sp_per_month_internal')),
            'sp_internal_bill' => Comma::removeComma($request->input('sp_internal_bill')),
            'sp_per_month_kreditur' => Comma::removeComma($request->input('sp_per_month_kreditur')),
            'sp_kreditur_bill' => Comma::removeComma($request->input('sp_kreditur_bill')),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active'
        ]);
        return redirect('transaction/surat-pesanan')->with('success', 'Successfull update Surat Pesanan');
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
