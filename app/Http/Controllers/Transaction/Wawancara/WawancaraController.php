<?php

namespace App\Http\Controllers\Transaction\Wawancara;

use App\Model\Wawancara;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SuratPesanan;
use App\Http\Requests\StoreWawancara;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class WawancaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.transaction.wawancara.index-wawancara');
    }

    public function data()
    {
        $wawancara = Wawancara::with('surat.customer', 'realisasi')->get();
        return DataTables::of($wawancara)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $id = (new Wawancara)->max('id') + 1;
        $sps = SuratPesanan::all();
        return view('pages.transaction.wawancara.create-wawancara', compact('sps', 'id'));
    }

    public function load_sp(Request $request)
    {
        $sp = SuratPesanan::with('sales', 'customer', 'kavling.price.house')->find($request->id);
        return response()->json($sp);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWawancara $request)
    {
        //
        Wawancara::create([
            'wawancara_date' => Carbon::parse($request->input('wawancara_date'))->format('Y-m-d H:i:s'),
            'wawancara_price' => $request->input('wawancara_price'),
            'wawancara_kpr' => $request->input('wawancara_kpr'),
            'wawancara_note' => $request->input('wawancara_note'),
            'wawancara_analyst' => $request->input('wawancara_analyst'),
            'wawancara_status' => $request->input('wawancara_status'),
            'wawancara_sp_id' => $request->input('wawancara_sp_id'),
            'wawancara_kreditur_id' => $request->input('wawancara_kreditur_id'),
            'wawancara_kreditur_name' => $request->input('wawancara_kreditur_name')
        ]);
        return redirect('transaction/wawancara')->with('success', 'Successfull create Wawancara');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wawancara  $wawancara
     * @return \Illuminate\Http\Response
     */
    public function show(Wawancara $wawancara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wawancara  $wawancara
     * @return \Illuminate\Http\Response
     */
    public function edit(Wawancara $wawancara)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wawancara  $wawancara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wawancara $wawancara)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wawancara  $wawancara
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wawancara $wawancara)
    {
        //
    }
}
