<?php

namespace App\Http\Controllers\Transaction\Legal;

use App\Model\Legal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SuratPesanan;
use App\Http\Requests\StoreLegal;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class LegalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.transaction.legal.index-legal');
    }

    public function data()
    {
        $legal = Legal::with('surat')->get();
        return DataTables::of($legal)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $id = (new Legal)->max('id') + 1;
        $sps = SuratPesanan::with('customer', 'kavling')->get();
        return view('pages.transaction.legal.create-legal', compact('id', 'sps'));
    }

    public function load_sp(Request $request)
    {
        $sp = SuratPesanan::with('company', 'sales', 'kavling')->find($request->id);
        return response()->json($sp);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLegal $request)
    {
        //
        Legal::create([
            'legal_date' => Carbon::parse($request->input('legal_date'))->format('Y-m-d H:i:s'),
            'legal_shgb_parent' => $request->input('legal_shgb_parent'),
            'legal_shgb_parent_date' => Carbon::parse($request->input('legal_shgb_parent_date'))->format('Y-m-d H:i:s'),
            'legal_shgb_fraction' => $request->input('legal_shgb_fraction'),
            'legal_shgb_fraction_date' => Carbon::parse($request->input('legal_shgb_fraction_date'))->format('Y-m-d H:i:s'),
            'legal_name' => $request->input('legal_name'),
            'legal_name_date' => Carbon::parse($request->input('legal_name_date'))->format('Y-m-d H:i:s'),
            'legal_shm' => $request->input('legal_shm'),
            'legal_shm_date' => Carbon::parse($request->input('legal_shm_date'))->format('Y-m-d H:i:s'),
            'legal_imb' => $request->input('legal_imb'),
            'legal_imb_date' => Carbon::parse($request->input('legal_imb_date'))->format('Y-m-d H:i:s'),
            'legal_nop_pbb' => $request->input('legal_nop_pbb'),
            'legal_nop_pbb_date' => Carbon::parse($request->input('legal_nop_pbb_date'))->format('Y-m-d H:i:s'),
            'legal_sp_id' => $request->input('legal_sp_id'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active'
        ]);
        return redirect('transaction/legal')->with('success', 'Successfull create Legal');
    }

    /**
     * Active / Deactive
     * 
     * @return Legal Status
     */
    public function action(Request $request, $id)
    {
        $legal = Legal::find($id);
        if ($request->input('active') == 'Deactive') {
            $legal->active = 'Deactive';
            $legal->save();
        } else if ($request->input('active') == 'Active'){
            $legal->active = 'Active';
            $legal->save();
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Legal  $legal
     * @return \Illuminate\Http\Response
     */
    public function show(Legal $legal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Legal  $legal
     * @return \Illuminate\Http\Response
     */
    public function edit(Legal $legal, $id)
    {
        //
        $legal = Legal::with('surat.company', 'surat.sales', 'surat.kavling', 'surat.customer')->find($id);
        $surat_edit = SuratPesanan::with('customer', 'kavling')->get();
        return view('pages.transaction.legal.create-legal', compact('legal', 'surat_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Legal  $legal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Legal $legal)
    {
        //
        Legal::find($request->id)->update([
            'legal_date' => Carbon::parse($request->input('legal_date'))->format('Y-m-d H:i:s'),
            'legal_shgb_parent' => $request->input('legal_shgb_parent'),
            'legal_shgb_parent_date' => Carbon::parse($request->input('legal_shgb_parent_date'))->format('Y-m-d H:i:s'),
            'legal_shgb_fraction' => $request->input('legal_shgb_fraction'),
            'legal_shgb_fraction_date' => Carbon::parse($request->input('legal_shgb_fraction_date'))->format('Y-m-d H:i:s'),
            'legal_name' => $request->input('legal_name'),
            'legal_name_date' => Carbon::parse($request->input('legal_name_date'))->format('Y-m-d H:i:s'),
            'legal_shm' => $request->input('legal_shm'),
            'legal_shm_date' => Carbon::parse($request->input('legal_shm_date'))->format('Y-m-d H:i:s'),
            'legal_imb' => $request->input('legal_imb'),
            'legal_imb_date' => Carbon::parse($request->input('legal_imb_date'))->format('Y-m-d H:i:s'),
            'legal_nop_pbb' => $request->input('legal_nop_pbb'),
            'legal_nop_pbb_date' => Carbon::parse($request->input('legal_nop_pbb_date'))->format('Y-m-d H:i:s'),
            'legal_sp_id' => $request->input('legal_sp_id'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active'
        ]);
        return redirect('transaction/legal')->with('success', 'Successfull update Legal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Legal  $legal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Legal $legal)
    {
        //
    }
}
