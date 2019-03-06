<?php

namespace App\Http\Controllers\Transaction\Report;

use App\Report;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SuratPesanan;
use Yajra\DataTables\DataTables;
use App\Model\Pembatalan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use App\Model\Sales;
use App\Model\Kwitansi;
use App\Model\Kavling;

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
    public function load_penjualan(Request $request)
    {
        $penjualan = SuratPesanan::with('customer', 'sales', 'kavling', 'company', 'sales');
        if ($request->input('start_date') || $request->input('end_date')) {
            $start_date = Carbon::parse(Input::get('start_date'))->format('Y-m-d H:i:s');
            $end_date = Carbon::parse(Input::get('end_date'))->format('Y-m-d H:i:s');
            $penjualan = $penjualan->whereBetween('created_at', [$start_date, $end_date])->get();
        } else {
            $penjualan = $penjualan->with('customer', 'sales', 'kavling', 'company', 'sales')->get();
        }
        return DataTables::of($penjualan)->make(true);
    }

    /**
     * Report Penjualan
     *
     */
    public function sales()
    {
        return view('pages.transaction.report.report-sales');
    }

    /**
     * Report Penjualan Datatable
     *
     */
    public function load_sales(Request $request)
    {
        $se = Sales::with('surat')->get();
        $data = [];
        foreach ($se as $sales) {
            array_push($data, [
                'sales_name' => $sales->sales_name,
                'prices' => $sales->surat->sum('sp_price'),
                'unit' => $sales->surat->count()
            ]);
        };
        return DataTables::of($data)->make(true);
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
    public function load_pembatalan(Request $request)
    {
        $pembatalan = Pembatalan::with('surat.kavling', 'surat.customer', 'surat.sales', 'surat.company');
        if ($request->input('start_date') || $request->input('end_date')) {
            $start_date = Carbon::parse(Input::get('start_date'))->format('Y-m-d H:i:s');
            $end_date = Carbon::parse(Input::get('end_date'))->format('Y-m-d H:i:s');
            $pembatalan = $pembatalan->whereBetween('created_at', [$start_date, $end_date])->get();
        } else {
            $pembatalan = Pembatalan::with('surat.kavling', 'surat.customer', 'surat.sales', 'surat.company')->get();
        }
        return DataTables::of($pembatalan)->toJson();
    }

    /**
     * Report Penerimaan dan Pembayaran
     *
     */
    public function penerimaan()
    {
        return view('pages.transaction.report.report-penerimaan');
    }

    /**
     * Load penerimaan dan penjualan datatable
     *
     */
    public function load_penerimaan(Request $request)
    {
        $kwitansi = Kwitansi::with('surat.kavling', 'surat.customer')->get();
        if ($request->input('start_date') || $request->input('end_date')) {
            $start_date = Carbon::parse(Input::get('start_date'))->format('Y-m-d H:i:s');
            $end_date = Carbon::parse(Input::get('end_date'))->format('Y-m-d H:i:s');
            $kwitansi = $kwitansi->whereBetween('kwitansi_date', [$start_date, $end_date])->get();
        } else {
            $kwitansi = Kwitansi::with('surat.kavling', 'surat.customer')->get();
        }
        return DataTables::of($kwitansi)->make(true);
    }

    /**
     * Report Piutang Detail
     *
     */
    public function piutang_detail()
    {
        return view('pages.transaction.report.report-piutang-detail');
    }

    /**
     * Load Piutang Detail
     *
     */
    public function load_piutang_detail()
    {
        return 'ok';
    }

    /**
     * Report Piutang Summary
     *
     */
    public function piutang_summary()
    {
        return view('pages.transaction.report.report-piutang-summary');
    }

    /**
     * Load Piutang Summary
     *
     */
    public function load_piutang_summary(Request $request)
    {
        $sp = SuratPesanan::with('customer', 'kavling.house', 'sales');
        if ($request->input('start_date') || $request->input('end_date')) {
            $start_date = Carbon::parse(Input::get('start_date'))->format('Y-m-d H:i:s');
            $end_date = Carbon::parse(Input::get('end_date'))->format('Y-m-d H:i:s');
            $sp = $sp->whereBetween('sp_date', [$start_date, $end_date])->get();
        } else {
            $sp = SuratPesanan::with('customer', 'kavling.house', 'sales');
        }
        return DataTables::of($sp)->make(true);
    }

    /**
     * Report Kavling Belum Terjual
     *
     */
    public function kavling_unsold()
    {
        return view('pages.transaction.report.report-kavling-unsold');
    }

    /**
     * Load Piutang Summary
     *
     */
    public function load_kavling_unsold(Request $request)
    {
        $kavling = Kavling::where('kavling_sell_status', 'jual')->with('price', 'house');
        if ($request->input('start_date') || $request->input('end_date')) {
            $start_date = Carbon::parse(Input::get('start_date'))->format('Y-m-d H:i:s');
            $end_date = Carbon::parse(Input::get('end_date'))->format('Y-m-d H:i:s');
            $kavling = $kavling->whereBetween('created_at', [$start_date, $end_date])->get();
        } else {
            $kavling = Kavling::where('kavling_sell_status', 'jual')->with('price', 'house');
        }
        return DataTables::of($kavling)->make(true);
    }

    /**
     * Report Kavling Belum Terjual
     *
     */
    public function kavling_status()
    {
        return view('pages.transaction.report.report-kavling-status');
    }

    /**
     * Load Piutang Summary
     *
     */
    public function load_kavling_status(Request $request)
    {
        $kavling = Kavling::with('house', 'surat.customer', 'surat.sales')->has('surat');
        if ($request->input('start_date') || $request->input('end_date')) {
            $start_date = Carbon::parse(Input::get('start_date'))->format('Y-m-d H:i:s');
            $end_date = Carbon::parse(Input::get('end_date'))->format('Y-m-d H:i:s');
            foreach ($kavling as $date) {
                $kavling = $kavling->whereBetween($date->sp_date, [$start_date, $end_date])->get();
            }
        } else {
            $kavling = Kavling::with('house', 'surat.customer', 'surat.sales')->has('surat');
        }
        return DataTables::of($kavling)->make(true);
    }
}
