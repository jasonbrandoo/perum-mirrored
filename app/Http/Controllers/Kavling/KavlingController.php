<?php

namespace App\Http\Controllers\Kavling;

use App\Model\Kavling;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Price;
use App\Http\Requests\StoreKavling;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class KavlingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.kavling.index-kavling');
    }

    public function data()
    {
        $kavlings = Kavling::with('price.house')->get();
        return DataTables::of($kavlings)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $prices = Price::all();
        $id = (new Kavling)->max('id') + 1;
        return view('pages.kavling.create-kavling', compact('prices', 'id'));
    }

    public function prices(Request $request)
    {
        $price = Price::find($request->id);
        return response()->json($price);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKavling $request)
    {
        //
        Kavling::create([
            'kavling_price_id' => $request->input('kavling_price_id'),
            'kavling_type' => $request->input('kavling_type'),
            'kavling_block' => $request->input('kavling_block'),
            'kavling_number' => $request->input('kavling_number'),
            'kavling_s_d' => $request->input('kavling_s_d'),
            'kavling_cluster' => $request->input('kavling_cluster'),
            'kavling_hook' => $request->input('kavling_hook'),
            'kavling_tl' => $request->input('kavling_tl'),
            'kavling_building' => $request->input('kavling_building'),
            'kavling_surface' => $request->input('kavling_surface'),
            'kavling_tl_active' => $request->input('kavling_tl_active'),
            'kavling_tl_old' => $request->input('kavling_tl_old'),
            'kavling_discount_dp' => $request->input('kavling_discount_dp'),
            'kavling_sell_status' => $request->input('kavling_sell_status'),
            'kavling_market_status' => $request->input('kavling_market_status'),
            'kavling_build_status' => $request->input('kavling_build_status'),
            'kavling_start_date' => Carbon::parse($request->input('kavling_start_date'))->format('Y-m-d H:i:s'),
            'kavling_progress' => $request->input('kavling_progress'),
            'kavling_end_date' => Carbon::parse($request->input('kavling_end_date'))->format('Y-m-d H:i:s'),
            'kavling_shgb' => $request->input('kavling_shgb'),
            'kavling_shgb_date' => Carbon::parse($request->input('kavling_shgb_date'))->format('Y-m-d H:i:s'),
            'kavling_imb' => $request->input('kavling_imb'),
            'kavling_imb_date' => Carbon::parse($request->input('kavling_imb_date'))->format('Y-m-d H:i:s'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active'
        ]);
        return redirect('kavling')->with('success', 'Successfull create Kavling');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kavling  $kavling
     * @return \Illuminate\Http\Response
     */
    public function show(Kavling $kavling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kavling  $kavling
     * @return \Illuminate\Http\Response
     */
    public function edit(Kavling $kavling)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kavling  $kavling
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kavling $kavling)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kavling  $kavling
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kavling $kavling)
    {
        //
    }
}
