<?php

namespace App\Http\Controllers\Transaction\Lpa;

use App\Model\LPA;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Kavling;
use App\Model\SuratPesanan;
use App\Http\Requests\StoreLpa;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class LPAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.transaction.lpa.index-lpa');
    }

    public function data()
    {
        $lpa = LPA::with('surat.customer', 'surat.kavling')->get();
        return DataTables::of($lpa)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $id = (new LPA)->max('id') + 1;
        $kavling = Kavling::all();
        $sps = SuratPesanan::all();
        return view('pages.transaction.lpa.create-lpa', compact('kavling', 'sps', 'id'));
    }

    public function load_sp(Request $request)
    {
        $sp = SuratPesanan::with('customer', 'company', 'sales')->find($request->id);
        return response()->json($sp);
    }

    public function load_kavling(Request $request)
    {
        $kav = Kavling::find($request->id);
        return response()->json($kav);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLpa $request)
    {
        //
        LPA::create([
            'lpa_date' => Carbon::parse($request->input('lpa_date'))->format('Y-m-d H:i:s'),
            'lpa_type' => $request->input('lpa_type'),
            'lpa_kavling_id' => $request->input('lpa_kavling_id'),
            'lpa_sp_id' => $request->input('lpa_sp_id'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active'
        ]);
        return redirect('transaction/lpa')->with('success', 'Successfull create LPA');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LPA  $lPA
     * @return \Illuminate\Http\Response
     */
    public function show(LPA $lPA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LPA  $lPA
     * @return \Illuminate\Http\Response
     */
    public function edit(LPA $lPA)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LPA  $lPA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LPA $lPA)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LPA  $lPA
     * @return \Illuminate\Http\Response
     */
    public function destroy(LPA $lPA)
    {
        //
    }
}
