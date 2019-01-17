<?php

namespace App\Http\Controllers\Transaction\Wawancara;

use App\Model\Keputusan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\RealisasiWawancara;
use App\Model\SuratPesanan;

class KeputusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $id = (new Keputusan)->max('id') + 1;
        $rlw = RealisasiWawancara::all();
        $sps = SuratPesanan::all();
        return view('pages.transaction.wawancara.create-keputusan', compact('id', 'rlw', 'sps'));
    }

    public function load_realisasi(Request $request)
    {
        $rlw_id = RealisasiWawancara::find($request->id);
        return response()->json($rlw_id);
    }

    public function load_sp(Request $request)
    {
        $sp = SuratPesanan::with('customer', 'kavling', 'sales')->find($request->id);
        return response()->json($sp);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\StoreKeputusan $request)
    {
        //
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Keputusan  $keputusan
     * @return \Illuminate\Http\Response
     */
    public function show(Keputusan $keputusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Keputusan  $keputusan
     * @return \Illuminate\Http\Response
     */
    public function edit(Keputusan $keputusan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Keputusan  $keputusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keputusan $keputusan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Keputusan  $keputusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keputusan $keputusan)
    {
        //
    }
}
