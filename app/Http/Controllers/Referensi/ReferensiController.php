<?php

namespace App\Http\Controllers\Referensi;

use App\Model\Referensi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReferensi;
use Yajra\DataTables\DataTables;

class ReferensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.referensi.index-referensi');
    }

    public function data()
    {
        $reference = Referensi::all();
        return DataTables::of($reference)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $id = (new Referensi)->max('id') + 1;
        return view('pages.referensi.create-referensi', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReferensi $request)
    {
        //
        Referensi::create([
            'reference_group' => $request->input('reference_group'),
            'reference_description' => $request->input('reference_description'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active'
        ]);
        return redirect('referensi')->with('success', 'Successfull create Reference');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Referensi  $referensi
     * @return \Illuminate\Http\Response
     */
    public function show(Referensi $referensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Referensi  $referensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Referensi $referensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Referensi  $referensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Referensi $referensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Referensi  $referensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Referensi $referensi)
    {
        //
    }
}
