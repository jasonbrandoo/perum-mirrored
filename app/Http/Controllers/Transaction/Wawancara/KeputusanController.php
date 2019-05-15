<?php

namespace App\Http\Controllers\Transaction\Wawancara;

use App\Model\Keputusan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\RealisasiWawancara;
use App\Model\SuratPesanan;
use Illuminate\Support\Carbon;

class KeputusanController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
    $id = (new Keputusan)->max('id') + 1;
    $rlw = RealisasiWawancara::all();
    $sps = SuratPesanan::with('customer', 'kavling', 'wawancara.realisasi')->get();
    return view('pages.transaction.wawancara.create-keputusan', compact('id', 'rlw', 'sps'));
  }

  public function load_realisasi(Request $request)
  {
    $rlw_id = RealisasiWawancara::find($request->id);
    return response()->json($rlw_id);
  }

  public function load_sp(Request $request)
  {
    $sp = RealisasiWawancara::with('wawancara.surat.customer', 'wawancara.surat.sales', 'wawancara.surat.kavling')->find($request->id);
    return response()->json($sp);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(\App\Http\Requests\StoreKeputusan $request)
  {
    //
    Keputusan::create([
      'result_realization_id' => $request->input('result_realization_id'),
      'result_wawancara_date' => Carbon::parse($request->input('result_wawancara_date'))->format('Y-m-d H:i:s'),
      'result_status' => $request->input('result_status'),
      'result_banding' => $request->input('result_banding'),
      'result_reason' => $request->input('result_reason'),
      'result_date' => Carbon::parse($request->input('result_date'))->format('Y-m-d H:i:s'),
      'result_expired_date' => Carbon::parse($request->input('result_expired_date'))->format('Y-m-d H:i:s'),
      'result_sp_id' => $request->input('result_sp_id'),
      'result_kpr_approve' => $request->input('result_kpr_approve'),
      'result_dp_plus' => $request->input('result_dp_plus'),
      'result_waktu_bunga' => $request->input('result_waktu_bunga'),
      'result_angsuran_bulan' => $request->input('result_angsuran_bulan'),
      'result_account' => $request->input('result_account'),
      'result_angsuran_first_month' => $request->input('result_angsuran_first_month'),
      'result_provisi' => $request->input('result_provisi'),
      'result_bi_notaris' => $request->input('result_bi_notaris'),
      'result_bi_apht' => $request->input('result_bi_apht'),
      'result_appraiser' => $request->input('result_appraiser'),
      'result_premi_kebakaran' => $request->input('result_premi_kebakaran'),
      'result_premi_jiwa' => $request->input('result_premi_jiwa'),
      'result_tabungan_diblokir' => $request->input('result_tabungan_diblokir'),
      'result_bi_administrasi' => $request->input('result_bi_administrasi'),
      'result_sub_total' => $request->input('result_sub_total'),
      'result_grand_total' => $request->input('result_grand_total'),
      'result_note' => $request->input('result_note')
    ]);
    return redirect('transaction/wawancara')->with('success', 'Successfull create Keputusan Wawancara');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Keputusan  $keputusan
   * @return \Illuminate\Http\Response
   */
  public function show(Keputusan $keputusan)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Keputusan  $keputusan
   * @return \Illuminate\Http\Response
   */
  public function edit(Keputusan $keputusan)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Keputusan  $keputusan
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Keputusan $keputusan)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Keputusan  $keputusan
   * @return \Illuminate\Http\Response
   */
  public function destroy(Keputusan $keputusan)
  {
    //
  }
}
