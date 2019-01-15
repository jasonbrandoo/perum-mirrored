<?php

namespace App\Http\Controllers\Transaction\Berkas;
use App\Model\Berkas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SuratPesanan;
use App\Model\Customer;
use Yajra\DataTables\DataTables;
use App\Http\Requests\StoreBerkas;
use Carbon\Carbon;

class BerkasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.transaction.berkas.index-berkas');
    }

    public function data()
    {
        $sp = Berkas::with('surat.customer')->get();
        return DataTables::of($sp)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $customer = Customer::all();
        $id = (new Berkas)->max('id') + 1;
        $sps = SuratPesanan::all();
        return view('pages.transaction.berkas.create-berkas', compact('sps', 'id', 'customer'));
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
    public function store(StoreBerkas $request)
    {
        //
        Berkas::create([
            'berkas_date' => Carbon::parse($request->input('berkas_date'))->format('Y-m-d H:i:s'),
            'berkas_giver' => $request->input('berkas_giver'),
            'berkas_reciever' => $request->input('berkas_reciever'),
            'berkas_note' => $request->input('berkas_note'),
            'berkas_sp_id' => $request->input('berkas_sp_id'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active'
        ]);
        return redirect('transaction/berkas')->with('success', 'Successfull create Berkas');        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Berkas  $berkas
     * @return \Illuminate\Http\Response
     */
    public function show(Berkas $berkas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Berkas  $berkas
     * @return \Illuminate\Http\Response
     */
    public function edit(Berkas $berkas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Berkas  $berkas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berkas $berkas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Berkas  $berkas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berkas $berkas)
    {
        //
    }
}
