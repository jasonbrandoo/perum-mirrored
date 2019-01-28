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

    /**
     * Display Datatables
     * 
     * @return DataTables
     */
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
     * Active / Deactive
     * 
     * @return Referensi Status
     */
    public function action(Request $request, $id)
    {
        $reference = Referensi::find($id);
        if ($request->input('active') == 'Deactive') {
            $reference->active = 'Deactive';
            $reference->save();
        } else if ($request->input('active') == 'Active'){
            $reference->active = 'Active';
            $reference->save();
        } 
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
    public function edit(Referensi $referensi, $id)
    {
        //
        $reference = Referensi::find($id);
        return view('pages.referensi.create-referensi', compact('reference'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Referensi  $referensi
     * @return \Illuminate\Http\Response
     */
    public function update(StoreReferensi $request, Referensi $referensi)
    {
        //
        $referensi::find($request->id)->update([
            'reference_group' => $request->input('reference_group'),
            'reference_description' => $request->input('reference_description'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active'
        ]);
        return redirect('referensi')->with('success', 'Successfull Update Reference');        
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
