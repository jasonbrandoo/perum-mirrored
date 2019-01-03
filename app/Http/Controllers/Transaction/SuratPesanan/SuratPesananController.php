<?php

namespace App\Http\Controllers\Transaction\SuratPesanan;

use App\SuratPesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuratPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.transaction.surat.index-surat');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.transaction.surat.create-surat');
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
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SuratPesanan  $suratPesanan
     * @return \Illuminate\Http\Response
     */
    public function show(SuratPesanan $suratPesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SuratPesanan  $suratPesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratPesanan $suratPesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SuratPesanan  $suratPesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuratPesanan $suratPesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SuratPesanan  $suratPesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuratPesanan $suratPesanan)
    {
        //
    }
}
