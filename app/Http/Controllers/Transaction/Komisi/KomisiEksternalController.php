<?php

namespace App\Http\Controllers\Transaction\Komisi;

use App\Model\KomisiEksternal;
use App\Model\SuratPesanan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Mou;
use App\Model\Company;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use App\Http\Requests\StoreKomisiEksternal;

class KomisiEksternalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.transaction.komisieksternal.index-komisi-eksternal');
    }

    public function data()
    {
        $eksternal = KomisiEksternal::with('surat', 'mou')->get();
        return DataTables::of($eksternal)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $id = (new KomisiEksternal)->max('id') + 1;
        $sps = SuratPesanan::all();
        $company_mou = Company::where('company_type', 'mou')->get();
        $mous = Mou::all();
        return view('pages.transaction.komisieksternal.create-komisi-eksternal', compact('id', 'sps', 'company_mou', 'mous'));
    }

    public function load_sp(Request $request)
    {
        $sp = SuratPesanan::with('kavling.price.house', 'customer')->find($request->id);
        return response()->json($sp);
    }

    public function load_company(Request $request)
    {
        $company = Company::find($request->id);
        return response()->json($company);
    }

    public function load_mou(Request $request)
    {
        $mou = Mou::find($request->id);
        return response()->json($mou);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKomisiEksternal $request)
    {
        //
        KomisiEksternal::create([
            'eksternal_date' => Carbon::parse($request->input('eksternal_date'))->format('Y-m-d H:i:s'),
            'eksternal_coordinator' => $request->input('eksternal_coordinator'),
            'eksternal_commision' => $request->input('eksternal_commision'),
            'eksternal_company_id' => $request->input('eksternal_company_id'),
            'eksternal_mou_id' => $request->input('eksternal_mou_id'),
            'eksternal_sp_id' => $request->input('eksternal_sp_id'),
            'eksternal_ajb_date' => Carbon::parse($request->input('eksternal_ajb_date'))->format('Y-m-d H:i:s'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active'
        ]);
        return redirect('transaction/komisi-eksternal')->with('success', 'Successfull create Komisi Eksternal');
    }

    /**
     * Active / Deactive
     * 
     * @return Komisi-Eksternal Status
     */
    public function action(Request $request, $id)
    {
        $eksternal = KomisiEksternal::find($id);
        if ($request->input('active') == 'Deactive') {
            $eksternal->active = 'Deactive';
            $eksternal->save();
        } else if ($request->input('active') == 'Active'){
            $eksternal->active = 'Active';
            $eksternal->save();
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KomisiEksternal  $komisiEksternal
     * @return \Illuminate\Http\Response
     */
    public function show(KomisiEksternal $komisiEksternal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KomisiEksternal  $komisiEksternal
     * @return \Illuminate\Http\Response
     */
    public function edit(KomisiEksternal $komisiEksternal, $id)
    {
        //
        $eksternal = KomisiEksternal::with('surat.customer', 'surat.kavling.house', 'surat.paymentMethod', 'mou', 'company')->find($id);
        $surat_edit = SuratPesanan::all();
        $company_edit = Company::where('company_type', 'mou')->get();
        $mou_edit = Mou::all();
        return view('pages.transaction.komisieksternal.create-komisi-eksternal', compact('eksternal', 'surat_edit', 'company_edit', 'mou_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KomisiEksternal  $komisiEksternal
     * @return \Illuminate\Http\Response
     */
    public function update(StoreKomisiEksternal $request, KomisiEksternal $komisiEksternal)
    {
        //
        KomisiEksternal::find($request->id)->update([
            'eksternal_date' => Carbon::parse($request->input('eksternal_date'))->format('Y-m-d H:i:s'),
            'eksternal_coordinator' => $request->input('eksternal_coordinator'),
            'eksternal_commision' => $request->input('eksternal_commision'),
            'eksternal_company_id' => $request->input('eksternal_company_id'),
            'eksternal_mou_id' => $request->input('eksternal_mou_id'),
            'eksternal_sp_id' => $request->input('eksternal_sp_id'),
            'eksternal_ajb_date' => Carbon::parse($request->input('eksternal_ajb_date'))->format('Y-m-d H:i:s'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active'
        ]);
        return redirect('transaction/komisi-eksternal')->with('success', 'Successfull Update Komisi Eksternal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KomisiEksternal  $komisiEksternal
     * @return \Illuminate\Http\Response
     */
    public function destroy(KomisiEksternal $komisiEksternal)
    {
        //
    }
}
