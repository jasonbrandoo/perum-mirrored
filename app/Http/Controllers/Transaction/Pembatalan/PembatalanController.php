<?php

namespace App\Http\Controllers\Transaction\Pembatalan;

use App\Model\Pembatalan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePembatalan;
use App\Model\SuratPesanan;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;
use App\User;
use App\Helpers\Comma;

class PembatalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.transaction.pembatalansp.index-pembatalan');
    }

    public function data()
    {
        $psp = Pembatalan::with('surat.customer', 'surat.customer')->get();
        return DataTables::of($psp)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $id = (new Pembatalan)->max('id') + 1;
        $sps = SuratPesanan::all();
        $users = User::all();
        return view('pages.transaction.pembatalansp.create-pembatalan', compact('id', 'sps', 'users'));
    }

    public function load_sp(Request $request)
    {
        $sp = SuratPesanan::with('customer', 'sales', 'kavling.price.house')->find($request->id);
        return response()->json($sp);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePembatalan $request)
    {
        //
        // return $request;
        Pembatalan::create([
            'cancel_date' => Carbon::parse($request->input('cancel_date'))->format('Y-m-d H:i:s'),
            'cancel_group' => $request->input('cancel_group'),
            'cancel_reason' => $request->input('cancel_reason'),
            'cancel_refund' => $request->input('cancel_refund'),
            'cancel_tambahan' => $request->input('cancel_tambahan'),
            'cancel_status' => $request->input('cancel_status'),
            'cancel_sp_id' => $request->input('cancel_sp_id'),
            'cancel_consumen_bill' => $request->input('cancel_consumen_bill'),
            'cancel_total_bill' => $request->input('cancel_total_bill'),
            'cancel_make_by' => $request->input('cancel_make_by'),
            'cancel_approve_by' => $request->input('cancel_approve_by')
        ]);
        return redirect('transaction/pembatalan')->with('success', 'Successfull create Pembatalan SP');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pembatalan  $pembatalan
     * @return \Illuminate\Http\Response
     */
    public function show(Pembatalan $pembatalan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pembatalan  $pembatalan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembatalan $pembatalan, $id)
    {
        //
        $pembatalan = Pembatalan::with('surat.customer', 'surat.kavling.house', 'surat.supervisor', 'makeBy', 'approveBy')->find($id);
        $surat_edit = SuratPesanan::all();
        $user_edit = User::all();
        return view('pages.transaction.pembatalansp.create-pembatalan', compact('pembatalan', 'surat_edit', 'user_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pembatalan  $pembatalan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembatalan $pembatalan)
    {
        //
        Pembatalan::find($request->id)->update([
            'cancel_date' => Carbon::parse($request->input('cancel_date'))->format('Y-m-d H:i:s'),
            'cancel_group' => $request->input('cancel_group'),
            'cancel_reason' => $request->input('cancel_reason'),
            'cancel_refund' => Comma::removeComma($request->input('cancel_refund')),
            'cancel_tambahan' => $request->input('cancel_tambahan'),
            'cancel_status' => $request->input('cancel_status'),
            'cancel_sp_id' => $request->input('cancel_sp_id'),
            'cancel_consumen_bill' => Comma::removeComma($request->input('cancel_consumen_bill')),
            'cancel_total_bill' => Comma::removeComma($request->input('cancel_total_bill')),
            'cancel_make_by' => $request->input('cancel_make_by'),
            'cancel_approve_by' => $request->input('cancel_approve_by')
        ]);
        return redirect('transaction/pembatalan')->with('success', 'Successfull update Pembatalan SP');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pembatalan  $pembatalan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembatalan $pembatalan)
    {
        //
    }
}
