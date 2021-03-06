<?php

namespace App\Http\Controllers\Transaction\Lpa;

use App\Model\LPA;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Kavling;
use App\Model\SuratPesanan;
use App\Http\Requests\StoreLpa;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use App\Model\Keputusan;

class LPAController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
    return view('pages.transaction.lpa.index-lpa');
  }

  public function data()
  {
    $lpa = LPA::with('surat.customer', 'surat.kavling')->get();
    return DataTables::of($lpa)->toJson();
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
    $id = (new LPA)->max('id') + 1;
    $kavling = Kavling::all();
    $sps = Keputusan::with('realisasi.wawancara.surat')->whereHas('realisasi', function ($q) {
      $q->where('result_status', 'accept');
    })->get();
    return view('pages.transaction.lpa.create-lpa', compact('kavling', 'sps', 'id'));
  }

  public function load_sp(Request $request)
  {
    $sp = SuratPesanan::with('customer', 'company', 'sales', 'kavling.house')->find($request->id);
    return response()->json($sp);
  }

  public function load_kavling(Request $request)
  {
    $kav = Kavling::find($request->id);
    return response()->json($kav);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreLpa $request)
  {
    //
    LPA::create([
      'lpa_date' => Carbon::parse($request->input('lpa_date'))->format('Y-m-d H:i:s'),
      'lpa_type' => $request->input('lpa_type'),
      'lpa_sp_id' => $request->input('lpa_sp_id'),
      'active' => $request->input('active') == null ? 'Not Active' : 'Active'
    ]);
    return redirect('transaction/lpa')->with('success', 'Successfull create LPA');
  }

  /**
   * Active / Deactive
   *
   * @return LPA Status
   */
  public function action(Request $request, $id)
  {
    $lpa = LPA::find($id);
    if ($request->input('active') == 'Deactive') {
      $lpa->active = 'Deactive';
      $lpa->save();
    } else if ($request->input('active') == 'Active') {
      $lpa->active = 'Active';
      $lpa->save();
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\LPA  $lPA
   * @return \Illuminate\Http\Response
   */
  public function show(LPA $lPA)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\LPA  $lPA
   * @return \Illuminate\Http\Response
   */
  public function edit(LPA $lPA, $id)
  {
    //
    $lpa = LPA::with('surat.company', 'surat.sales', 'surat.kavling.house', 'surat.customer')->find($id);
    $surat_edit = SuratPesanan::with('customer', 'kavling')->get();
    return view('pages.transaction.lpa.create-lpa', compact('lpa', 'surat_edit'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\LPA  $lPA
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, LPA $lPA)
  {
    //
    LPA::find($request->id)->update([
      'lpa_date' => Carbon::parse($request->input('lpa_date'))->format('Y-m-d H:i:s'),
      'lpa_type' => $request->input('lpa_type'),
      'lpa_sp_id' => $request->input('lpa_sp_id'),
      'active' => $request->input('active') == null ? 'Not Active' : 'Active'
    ]);
    return redirect('transaction/lpa')->with('success', 'Successfull update LPA');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\LPA  $lPA
   * @return \Illuminate\Http\Response
   */
  public function destroy(LPA $lPA)
  {
    //
  }
}
