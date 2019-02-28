<?php

namespace App\Http\Controllers\Transaction\Report;

use App\Report;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SuratPesanan;
use Yajra\DataTables\DataTables;
use App\Model\Pembatalan;

class ReportController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }

    /**
     * Report Penjualan
     * 
     */
    public function penjualan()
    {
        return view('pages.transaction.report.report-penjualan');
    }

    /**
     * Report Penjualan Datatable
     * 
     */
    public function load_penjualan()
    {
        $penjualan = SuratPesanan::with('customer', 'sales', 'kavling', 'company', 'sales')->get();
        return DataTables::of($penjualan)->toJson();
    }

    /**
     * Report Pembatalan
     * 
     */
    public function pembatalan()
    {
        return view('pages.transaction.report.report-pembatalan');
    }

    /**
     * Report pembatalan datatable
     * 
     */
    public function load_pembatalan()
    {
        $pembatalan = Pembatalan::with('surat.kavling', 'surat.customer', 'surat.sales', 'surat.company')->get();
        return DataTables::of($pembatalan)->toJson();
    }
}
