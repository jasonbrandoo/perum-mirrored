<?php

namespace App\Http\Controllers\Transaction\Spk;

use App\Model\Spk;
use App\Http\Controllers\Controller;
use App\Model\SuratPesanan;
use Illuminate\Http\Request;
use \App\Http\Requests\StoreSpk;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class SpkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.transaction.spk.index-spk');
    }

    public function data()
    {
        $spk = Spk::with('surat.customer')->get();
        return DataTables::of($spk)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $id = (new Spk)->max('id') + 1;
        $sps = SuratPesanan::all();
        return view('pages.transaction.spk.create-spk', compact('sps', 'id'));
    }

    public function load_sp(Request $request)
    {
        $sp = SuratPesanan::with('customer', 'kavling.price.house')->find($request->id);
        return response()->json($sp);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpk $request)
    {
        //
        Spk::create([
            'spk_date' => Carbon::parse($request->input('spk_date'))->format('Y-m-d H:i:s'),
            'spk_price' => $request->input('spk_price'),
            'spk_sp_id' => $request->input('spk_sp_id'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active'            
        ]);
        return redirect('transaction/spk')->with('success', 'Successful create new SPK');
    }

    /**
     * Active / Deactive
     *
     * @return SPK Status
     */
    public function action(Request $request, $id)
    {
        return $id;
        $spk = Spk::find($id);
        if ($request->input('active') == 'Deactive') {
            $spk->active = 'Deactive';
            $spk->save();
        } elseif ($request->input('active') == 'Active') {
            $spk->active = 'Active';
            $spk->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Spk  $spk
     * @return \Illuminate\Http\Response
     */
    public function show(Spk $spk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Spk  $spk
     * @return \Illuminate\Http\Response
     */
    public function edit(Spk $spk, $id)
    {
        //
        $spk = Spk::with('surat.customer', 'surat.kavling.house')->find($id);
        $surat_edit = Spk::all();
        return view('pages.transaction.spk.create-spk', compact('spk', 'surat_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Spk  $spk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spk $spk)
    {
        //
        Spk::find($request->id)->update([
            'spk_date' => Carbon::parse($request->input('spk_date'))->format('Y-m-d H:i:s'),
            'spk_price' => $request->input('spk_price'),
            'spk_sp_id' => $request->input('spk_sp_id'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active'            
        ]);
        return redirect('transaction/spk')->with('success', 'Successful update new SPK');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Spk  $spk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spk $spk)
    {
        //
    }
}
