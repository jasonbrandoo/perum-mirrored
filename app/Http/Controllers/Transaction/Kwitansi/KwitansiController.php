<?php

namespace App\Http\Controllers\Transaction\Kwitansi;

use App\Model\Kwitansi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.transaction.kuitansi.create-kuitansi');
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
        //
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
