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
use App\Model\Cicilan;
use App\Model\KomisiAkad;
use App\Model\KomisiEksternal;
use App\Model\Kwitansi;
use App\Model\Berkas;
use App\Model\Wawancara;
use App\Model\LPA;
use App\Model\Ajb;
use App\Model\Legal;
use App\Model\Spk;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use App\Model\BiayaLain;

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

    public function akad($id)
    {
        $akad = KomisiAkad::with('surat')->where('akad_sp_id', $id);
        return DataTables::of($akad)->make();
    }

    public function eksternal($id)
    {
        $eksternal = KomisiEksternal::with('surat', 'mou')->where('eksternal_sp_id', $id);
        return DataTables::of($eksternal)->make();
    }

    public function kuitansi($id)
    {
        $kuitnasi = Kwitansi::with('surat.customer', 'payment')->where('kwitansi_sp_id', $id);
        return DataTables::of($kuitnasi)->make();
    }

    public function berkas($id)
    {
        $berkas = Berkas::with('surat.customer', 'user')->where('berkas_sp_id', $id);
        return DataTables::of($berkas)->make();
    }

    public function wawancara($id)
    {
        $wawancara = Wawancara::with('surat.customer', 'realisasi')->where('wawancara_sp_id', $id);
        return DataTables::of($wawancara)->make();
    }

    public function lpa($id)
    {
        $lpa = LPA::with('surat.customer', 'surat.kavling')->where('lpa_sp_id', $id);
        return DataTables::of($lpa)->make();
    }

    public function ajb($id)
    {
        $ajb = Ajb::with('surat')->where('ajb_sp_id', $id);
        return DataTables::of($ajb)->make();
    }

    public function legal($id)
    {
        $legal = Legal::with('surat')->where('legal_sp_id', $id);
        return DataTables::of($legal)->make();
    }

    public function spk($id)
    {
        $spk = Spk::with('surat.customer')->where('spk_sp_id', $id);
        return DataTables::of($spk)->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $id = (new SuratPesanan)->max('id') + 1;
        $customers =  Customer::all();
        $companies = Company::where('company_type', 'mou')->get();
        $mous = Mou::where('active', 'Active')->get();
        $sales = Sales::where('sales_position', 'Sales')->get();
        $spvs = Sales::where('sales_position', 'Supervisor')->get();
        $payments = Payment::where('payment_type', 'Surat Pesanan')->get();
        $kavlings = Kavling::with('price.house')->get();
        $prices = Price::all();
        return view('pages.transaction.surat.create-surat', compact('customers', 'mous', 'sales', 'spvs', 'kavlings', 'companies', 'prices', 'payments', 'id'));
    }

    public function load_customer(Request $request)
    {
        $customer = Customer::with('sales_executive', 'sales_supervisor', 'company')->find($request->id);
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

    public function cicilan($id)
    {
        $cicilan = Cicilan::with('surat')->where('cicilan_sp_id', $id);
        return DataTables::of($cicilan)->make();
    }

    public function developer($id)
    {
        $developer = BiayaLain::with('cicilan')->where('sp_id', $id)->where('biaya_lain_diperhitungkan', 'Developer');
        return DataTables::of($developer)->make();
    }

    public function contractor($id)
    {
        $contractor = BiayaLain::with('cicilan')->where('sp_id', $id)->where('biaya_lain_diperhitungkan', 'Contractor');
        return DataTables::of($contractor)->make();
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
            'sp_per_month_contractor' => Comma::removeComma($request->input('sp_per_month_contractor')),
            'sp_contractor_bill' => Comma::removeComma($request->input('sp_contractor_bill')),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active'
        ]);

        $data = [];
        $cicilan = Comma::removeComma($request->sp_per_month_internal);
        $booking_fee = Comma::removeComma($request->sp_booking_fee);
        $customer_id = $request->sp_customer_id;
        $piutang = round($booking_fee / $cicilan);
        for ($i=1; $i <= $cicilan; $i++) {
            array_push($data, [
                'no' => $i,
                'cicilan_sp_id' => (new SuratPesanan)->max('id'),
                'customer_id' => $customer_id,
                'description' => 'cicilan '.$i,
                'piutang' => $piutang,
                'created_at' => Carbon::now()
            ]);
        }
        
        Cicilan::insert($data);
        
        $biaya_lain = [];
        for ($i=1; $i < count($request->sp_description); $i++) { 
            array_push($biaya_lain, [
                'no' => $i,
                'sp_id' => (new SuratPesanan)->max('id'),
                'sp_description' => $request->input('sp_description')[$i],
                'sp_description_nominal' => Comma::removeComma($request->input('sp_description_nominal')[$i]),
                'biaya_lain_status' => $request->input('sp_biaya_lain_status')[$i],
                'biaya_lain_diperhitungkan' => $request->input('sp_biaya_lain_diperhitungkan')[$i],
                'created_at' => Carbon::now()
            ]);
        }
        BiayaLain::insert($biaya_lain);
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
        $customers =  Customer::all();
        $companies = Company::where('company_type', 'mou')->get();
        $mous = Mou::where('active', 'Active')->get();
        $sales = Sales::where('sales_position', 'Sales')->get();
        $spvs = Sales::where('sales_position', 'Supervisor')->get();
        $payments = Payment::where('payment_type', 'Surat Pesanan')->get();
        $kavlings = Kavling::with('price.house')->get();
        $prices = Price::all();
        $cicilanBelumLunas = Cicilan::where('cicilan_sp_id', $id)->whereNull('deleted_at')->get()->pluck('piutang');
        $totalBelumLunas = $cicilanBelumLunas->sum();
        $cicilanLunas = Cicilan::where('cicilan_sp_id', $id)->whereNotNull('deleted_at')->get()->pluck('piutang');
        $totalLunas = $cicilanLunas->sum();
        return view('pages.transaction.surat.create-surat', compact('surat', 'customers', 'mous', 'sales', 'spvs', 'kavlings', 'companies', 'prices', 'payments', 'totalBelumLunas', 'totalLunas'));
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
            'sp_per_month_contractor' => Comma::removeComma($request->input('sp_per_month_contractor')),
            'sp_contractor_bill' => Comma::removeComma($request->input('sp_contractor_bill')),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active'
        ]);

        $data = [];
        $cicilan = Comma::removeComma($request->sp_per_month_internal);
        $booking_fee = Comma::removeComma($request->sp_booking_fee);
        $customer_id = $request->sp_customer_id;
        $piutang = round($booking_fee / $cicilan);
        for ($i=1; $i <= $cicilan; $i++) {
            array_push($data, [
                'no' => $i,
                'cicilan_sp_id' => $request->id,
                'customer_id' => $customer_id,
                'description' => 'cicilan '.$i,
                'piutang' => $piutang,
                'updated_at' => Carbon::now()
            ]);
        }
        
        Cicilan::whereIn('cicilan_sp_id', [$request->id])->delete();
        Cicilan::insert($data);

        $biaya_lain = [];
        for ($i=1; $i < count($request->sp_description); $i++) { 
            array_push($biaya_lain, [
                'no' => $i,
                'sp_id' => $request->id,
                'sp_description' => $request->input('sp_description')[$i],
                'sp_description_nominal' => Comma::removeComma($request->input('sp_description_nominal')[$i]),
                'biaya_lain_status' => $request->input('sp_biaya_lain_status')[$i],
                'biaya_lain_diperhitungkan' => $request->input('sp_biaya_lain_diperhitungkan')[$i],
                'updated_at' => Carbon::now()
            ]);
        }
        BiayaLain::whereIn('sp_id', [$request->id])->delete();
        BiayaLain::insert($biaya_lain);
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

    /**
     * Generate PDF
     *
     */
    public function generatePdfBank($id)
    {
        // return view('pages.transaction.surat.pdf-surat');
        $surat = SuratPesanan::with('company', 'customer.company', 'sales', 'supervisor', 'kavling.house', 'mou', 'price', 'paymentMethod')->find($id);
        $cicilan = Cicilan::with('surat')->where('cicilan_sp_id', $id)->get();
        $data = [
            'surat' => $surat,
            'cicilan' => $cicilan
        ];
        return PDF::loadView('pages.transaction.surat.pdf-surat', $data)->inline();
    }

    public function generatePdfDeveloper($id)
    {
        // return view('pages.transaction.surat.pdf-surat');
        $surat = SuratPesanan::with('company', 'customer.company', 'sales', 'supervisor', 'kavling.house', 'mou', 'price', 'paymentMethod')->find($id);
        $cicilan = Cicilan::with('surat')->where('cicilan_sp_id', $id)->get();
        $biayaLain = BiayaLain::where('sp_id', $id)->sum('sp_description_nominal');
        $data = [
            'surat' => $surat,
            'cicilan' => $cicilan,
            'biayaLain' => $biayaLain
        ];
        return PDF::loadView('pages.transaction.surat.pdf-surat', $data)->inline();
    }

    public function generateKuitansi($id)
    {
        // return view('pages.transaction.surat.pdf-kuitansi');
        $surat = SuratPesanan::with('company', 'customer.company', 'sales', 'supervisor', 'kavling.house', 'mou', 'price', 'paymentMethod')->find($id);
        $kuitansi = Kwitansi::with('surat.kavling.house')->where('kwitansi_sp_id', $id)->orderBy('created_at', 'desc')->first();
        $data = [
            'kuitansi' => $kuitansi,
        ];
        // return $data;
        return PDF::loadView('pages.transaction.surat.pdf-kuitansi', $data)->inline();
    }

    public function internalKuitansi($id)
    {
        $internal = Cicilan::with('surat.kavling.house', 'surat.customer')->where('id', $id)->first();
        $data = [
            'internal' => $internal,
        ];
        // return $data;
        return PDF::loadView('pages.transaction.surat.pdf-kuitansi', $data)->inline();
    }

    public function developerKuitansi($id)
    {
        $developer = BiayaLain::with('cicilan.kavling.house', 'cicilan.customer')->where('sp_id', $id)->first();
        $data = [
            'developer' => $developer,
        ];
        // return $developer;
        return PDF::loadView('pages.transaction.surat.pdf-kuitansi', $data)->inline();
    }

    public function contractorKuitansi($id)
    {
        $contractor = BiayaLain::with('cicilan.kavling.house', 'cicilan.customer')->where('sp_id', $id)->first();
        $data = [
            'contractor' => $contractor,
        ];
        // return $data;
        return PDF::loadView('pages.transaction.surat.pdf-kuitansi', $data)->inline();
    }

    public function cicilanSp($id)
    {
        $cicilan = Cicilan::find($id);
        return view('pages.transaction.surat.edit-cicilan', compact('cicilan'));
    }

    public function updateCicilanSp(Request $request, $id)
    {
        Cicilan::find($id)->update([
            'description' => $request->input('description'),
            'piutang' => Comma::removeComma($request->input('piutang'))
        ]);
        return redirect('transaction/surat-pesanan/'.$request->sp_id.'/edit')->with('success', 'Successfull update Cicilan Surat Pesanan');
    }

    public function addCicilanSp(Request $request, $id)
    {
        $cicilan = Cicilan::with('surat.customer')->where('cicilan_sp_id', $id)->first();
        $customer_id = $cicilan->surat->customer->id;
        return view('pages.transaction.surat.add-cicilan', compact('customer_id', 'id'));
    }
    
    public function updateAddCicilanSp(Request $request, $id)
    {
        $no = Cicilan::where('cicilan_sp_id', $id)->max('no') + 1;
        $data = [];
        for ($i=0; $i < count($request->data); $i++) { 
            array_push($data, [
                'no' => $i + $no,
                'cicilan_sp_id' => $id,
                'customer_id' => $request->cust_id,
                'description' => $request->data[$i]['description'],
                'piutang' => Comma::removeComma($request->data[$i]['piutang']),
                'created_at' => Carbon::now()
            ]);
        }
        Cicilan::insert($data);
    }
}
