<?php

namespace App\Http\Controllers\Price;

use App\Model\Price;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Rumah;
use App\Http\Requests\StorePrice;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.price.index-price');
    }

    public function data()
    {
        $price = Price::with('house')->get();
        return DataTables::of($price)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $buildings = Rumah::all();
        return view('pages.price.create-price', compact('buildings'));
    }

    public function houses(Request $request)
    {
        $house = Rumah::find($request->id);
        return response()->json($house);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrice $request)
    {
        //
        Price::create([
            'price_id' => $request->input('price_id'),
            'price_house_id' => $request->input('price_house_id'),
            'price_selling' => $request->input('price_selling'),
            'price_discount' => $request->input('price_discount'),
            'price_ppn' => $request->input('price_ppn'),
            'price_adm' => $request->input('price_adm'),
            'price_netto' => $request->input('price_netto'),
            'price_max_kpr' => $request->input('price_max_kpr'),
            'price_dp' => $request->input('price_dp'),
            'price_discount_dp' => $request->input('price_discount_dp'),
            'price_booking' => $request->input('price_booking'),
            'price_surface_m2' => $request->input('price_surface_m2'),
            'price_notaris' => $request->input('price_notaris'),
            'price_5_year' => $request->input('price_5_year'),
            'price_10_year' => $request->input('price_10_year'),
            'price_15_year' => $request->input('price_15_year'),
            'price_20_year' => $request->input('price_20_year'),
            'price_start_date' => Carbon::parse($request->input('price_start_date'))->format('Y-m-d H:i:s'),
            'price_end_date' => Carbon::parse($request->input('price_end_date'))->format('Y-m-d H:i:s'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active'
        ]);
        return redirect('price')->with('success', 'Successfull create Price');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit(Price $price)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Price $price)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        //
    }
}
