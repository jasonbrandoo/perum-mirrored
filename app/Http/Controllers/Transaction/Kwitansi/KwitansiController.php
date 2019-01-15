<?php

namespace App\Http\Controllers\Transaction\Kwitansi;

use App\Model\Kwitansi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SuratPesanan;
use App\Http\Requests\StoreKwitansi;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class KwitansiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.transaction.kuitansi.index-kwitansi');
    }

    public function data()
    {
        $kwitansi = Kwitansi::with('surat.customer')->get();
        return DataTables::of($kwitansi)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $id = (new Kwitansi)->max('id') + 1;
        $surats = SuratPesanan::all();
        return view('pages.transaction.kuitansi.create-kuitansi', compact('surats', 'id'));
    }

    public function load_sp(Request $request)
    {
        $sp = SuratPesanan::with('kavling.price.house')->find($request->id);
        return response()->json($sp);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKwitansi $request)
    {
        //
        Kwitansi::create([
            'kwitansi_date' => Carbon::parse($request->input('kwitansi_date'))->format('Y-m-d H:i:s'),
            'kwitansi_sp_id' => $request->input('kwitansi_sp_id'),
            'kwitansi_faktur' => $request->input('kwitansi_faktur'),
            'kwitandi_staff_id' => $request->input('kwitansi_staff_id'),
            'kwitansi_staff_name' => $request->input('kwitansi_staff_name'),
            'kwitansi_terbilang' => $request->input('kwitansi_terbilang'),
            'kwitansi_for_pay' => $request->input('kwitansi_for_pay'),
            'kwitansi_jumlah' => $request->input('kwitansi_jumlah'),
            'kwitansi_payment_method' => $request->input('kwitansi_payment_method'),
            'kwitansi_transfer_date' => Carbon::parse($request->input('kwitansi_transfer_date'))->format('Y-m-d H:i:s'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active'
        ]);
        return redirect('transaction/kwitansi')->with('success', 'Successfull create Kwitansi');        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kwitansi  $kwitansi
     * @return \Illuminate\Http\Response
     */
    public function show(Kwitansi $kwitansi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kwitansi  $kwitansi
     * @return \Illuminate\Http\Response
     */
    public function edit(Kwitansi $kwitansi)
    {
        //MATA BERAT BENER KAMPRET
        //KAYA DI CANTOLIN MONYET
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kwitansi  $kwitansi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kwitansi $kwitansi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kwitansi  $kwitansi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kwitansi $kwitansi)
    {
        //
    }
}
