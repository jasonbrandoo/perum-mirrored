<?php

namespace App\Http\Controllers\Transaction\Mou;

use App\Model\Mou;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMou;
use App\Model\Company;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;

class MouController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.transaction.mou.index-mou');
    }

    public function data()
    {
        $mou = Mou::with('companies')->get();
        return DataTables::of($mou)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $companies = Company::all();
        $id = (new Mou)->max('id') + 1;
        return view('pages.transaction.mou.create-mou', compact('companies', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMou $request)
    {
        //
        Mou::create([
            'mou_company_id' => $request->input('mou_company_id'),
            'mou_coordinator' => $request->input('mou_coordinator'),
            'mou_coordinator_position' => $request->input('mou_coordinator_position'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active',
            'mou_date' => Carbon::parse($request->input('mou_date'))->format('Y-m-d H:i:s'),
            'mou_start_date' => Carbon::parse($request->input('mou_start_date'))->format('Y-m-d H:i:s'),
            'mou_end_date' => Carbon::parse($request->input('mou_end_date'))->format('Y-m-d H:i:s'),
            'mou_commision' => $request->input('mou_commision')
        ]);

        return redirect('transaction/mou')->with('success', 'Successfull create MOU');        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mou  $mou
     * @return \Illuminate\Http\Response
     */
    public function show(Mou $mou)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mou  $mou
     * @return \Illuminate\Http\Response
     */
    public function edit(Mou $mou)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mou  $mou
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mou $mou)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mou  $mou
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mou $mou)
    {
        //
    }
}
