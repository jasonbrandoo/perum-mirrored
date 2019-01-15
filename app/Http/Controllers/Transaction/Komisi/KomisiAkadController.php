<?php

namespace App\Http\Controllers\Transaction\Komisi;

use App\Model\KomisiAkad;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Company;
use App\Model\SuratPesanan;
use App\Http\Requests\StoreKomisiAkad;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class KomisiAkadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.transaction.komisiakad.index-komisi-akad');
    }

    public function data()
    {
        $akad = KomisiAkad::with('surat')->get();
        return DataTables::of($akad)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $id = (new KomisiAkad)->max('id') + 1;
        $sps = SuratPesanan::all();
        $mou = Company::where('company_type', 'mou')->get();
        return view('pages.transaction.komisiakad.create-komisi-akad', compact('mou', 'sps', 'id'));
    }

    public function load_sp(Request $request)
    {
        $sp = SuratPesanan::with('kavling.price.house', 'customer')->find($request->id);
        return response()->json($sp);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKomisiAkad $request)
    {
        //
        KomisiAkad::create([
            'akad_date' => Carbon::parse($request->input('akad_date'))->format('Y-m-d H:i:s'),
            'akad_sales_commision' => $request->input('akad_sales_commision'),
            'akad_spv_commision' => $request->input('akad_spv_commision'),
            'akad_coordinator' => $request->input('akad_coordinator'),
            'akad_sp_id' => $request->input('akad_sp_id'),
            'akad_ajb_date' => Carbon::parse($request->input('akad_ajb_date'))->format('Y-m-d H:i:s'),
            'akad_company_id' => $request->input('akad_company_id'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active'
        ]);
        return redirect('transaction/komisi-akad')->with('success', 'Successfull create Komisi Akad');                
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KomisiAkad  $komisiAkad
     * @return \Illuminate\Http\Response
     */
    public function show(KomisiAkad $komisiAkad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KomisiAkad  $komisiAkad
     * @return \Illuminate\Http\Response
     */
    public function edit(KomisiAkad $komisiAkad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KomisiAkad  $komisiAkad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KomisiAkad $komisiAkad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KomisiAkad  $komisiAkad
     * @return \Illuminate\Http\Response
     */
    public function destroy(KomisiAkad $komisiAkad)
    {
        //
    }
}
