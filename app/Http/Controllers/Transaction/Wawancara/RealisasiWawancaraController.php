<?php

namespace App\Http\Controllers\Transaction\Wawancara;

use App\Model\RealisasiWawancara;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRealisasiWawancara;
use App\Model\SuratPesanan;
use App\Model\Wawancara;
use Carbon\Carbon;

class RealisasiWawancaraController extends Controller
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
        $id = (new RealisasiWawancara)->max('id') + 1;
        $wawancaras = Wawancara::all();
        $sps = SuratPesanan::all();
        return view('pages.transaction.wawancara.create-realisasi', compact('id', 'sps', 'wawancaras'));
    }

    public function load_wawancara(Request $request)
    {
        $wawancara = Wawancara::find($request->id);
        return response()->json($wawancara);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRealisasiWawancara $request)
    {
        //
        RealisasiWawancara::create([
            'rlw_wawancara_id' => $request->input('rlw_wawancara_id'),
            'rlw_date' => Carbon::parse($request->input('rlw_date'))->format('Y-m-d H:i:s'),
            'rlw_analyst' => $request->input('rlw_analyst'),
            'rlw_note' => $request->input('rlw_note'),
            'rlw_sp_id' => $request->input('rlw_sp_id'),
            'rlw_kreditur_id' => $request->input('rlw_kreditur_id'),
            'rlw_kreditur_name' => $request->input('rlw_kreditur_name')
        ]);
        return redirect('transaction/wawancara')->with('success', 'Successfull create Realisasi Wawancara');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RealisasiWawancara  $realisasiWawancara
     * @return \Illuminate\Http\Response
     */
    public function show(RealisasiWawancara $realisasiWawancara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RealisasiWawancara  $realisasiWawancara
     * @return \Illuminate\Http\Response
     */
    public function edit(RealisasiWawancara $realisasiWawancara)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RealisasiWawancara  $realisasiWawancara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RealisasiWawancara $realisasiWawancara)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RealisasiWawancara  $realisasiWawancara
     * @return \Illuminate\Http\Response
     */
    public function destroy(RealisasiWawancara $realisasiWawancara)
    {
        //
    }
}
