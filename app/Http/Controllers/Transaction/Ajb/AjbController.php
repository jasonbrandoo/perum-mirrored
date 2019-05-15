<?php

namespace App\Http\Controllers\Transaction\Ajb;

use App\Model\Ajb;
use App\Model\SuratPesanan;
use App\Model\RealizationAjb;
use App\Model\DisbursementAjb;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAjb;
use App\Http\Requests\StoreRealization;
use App\Http\Requests\StoreDisbursement;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use App\Helpers\Comma;
use App\Model\Keputusan;

class AjbController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
    return view('pages.transaction.ajb.index-ajb');
  }

  public function data()
  {
    $ajb = Ajb::with('surat')->get();
    return DataTables::of($ajb)->toJson();
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
    $id = (new Ajb)->max('id') + 1;
    $sps = Keputusan::with('realisasi.wawancara.surat.customer', 'realisasi.wawancara.surat.kavling')->whereHas('realisasi', function ($q) {
      $q->where('result_status', 'accept');
    })->get();
    return view('pages.transaction.ajb.create-ajb', compact('sps', 'id'));
  }

  public function realization()
  {
    $id = (new RealizationAjb)->max('id') + 1;
    $ajbs = Ajb::all();
    return view('pages.transaction.ajb.realization-ajb', compact('ajbs', 'id'));
  }

  public function disbursement()
  {
    $realizations = RealizationAjb::all();
    return view('pages.transaction.ajb.disbursement-ajb', compact('realizations'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreAJb $request)
  {
    //
    Ajb::create([
      'ajb_date' => Carbon::parse($request->input('ajb_date'))->format('Y-m-d H:i:s'),
      'ajb_price_1' => Comma::removeComma($request->input('ajb_price_1')),
      'ajb_price_2' => Comma::removeComma($request->input('ajb_price_2')),
      'ajb_lt' => $request->input('ajb_lt'),
      'ajb_tl' => $request->input('ajb_tl'),
      'ajb_notaris' => $request->input('ajb_notaris'),
      'ajb_description' => $request->input('ajb_description'),
      'ajb_sp_id' => $request->input('ajb_sp_id'),
      'ajb_shgb' => $request->input('ajb_shgb'),
      'ajb_shgb_date' => Carbon::parse($request->input('ajb_shgb_date'))->format('Y-m-d H:i:s'),
      'ajb_imb' => $request->input('ajb_imb'),
      'ajb_imb_date' => Carbon::parse($request->input('ajb_imb_date'))->format('Y-m-d H:i:s'),
      'ajb_sp3k' => $request->input('ajb_sp3k'),
      'ajb_sp3k_date' => Carbon::parse($request->input('ajb_sp3k_date'))->format('Y-m-d H:i:s'),
    ]);
    return redirect('transaction/ajb')->with('success', 'Success');
  }

  public function storeRealization(StoreRealization $request)
  {
    RealizationAjb::create([
      'realization_ajb_id' => $request->input('realization_ajb_id'),
      'realization_max_kpr' => $request->input('realization_max_kpr'),
      'realization_money_hold' => $request->input('realization_money_hold'),
      'realization_imb' => $request->input('realization_imb'),
      'realization_stf' => $request->input('realization_stf'),
      'realization_listrik' => $request->input('realization_listrik'),
      'realization_bestek' => $request->input('realization_bestek'),
      'realization_prjb' => $request->input('realization_prjb'),
      'realization_prbj_2' => $request->input('realization_prbj_2'),
      'realization_stf_1' => $request->input('realization_stf'),
      'realization_stf_date_1' => Carbon::parse($request->input('realization_stf_date_1'))->format('Y-m-d H:i:s'),
      'realization_stf_2' => $request->input('realization_stf_2'),
      'realization_stf_2_date' => Carbon::parse($request->input('realization_stf_2_date'))->format('Y-m-d H:i:s'),
      'realization_kredit' => $request->input('realization_kredit'),
      'realization_application' => $request->input('realization_application'),
      'realization_npwp' => $request->input('realization_npwp'),
      'realization_nop' => $request->input('realization_nop'),
    ]);
    return redirect('transaction/ajb')->with('success', 'Success');
  }

  public function storeDisbursement(StoreDisbursement $request)
  {
    DisbursementAjb::create([
      'disbursement_realization_id' => $request->input('disbursement_realization_id'),
      'disbursement_realization_date' => Carbon::parse($request->input('disbursement_realization_date'))->format('Y-m-d H:i:s')
    ]);
    return redirect('transaction/ajb')->with('success', 'Success');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Ajb  $ajb
   * @return \Illuminate\Http\Response
   */
  public function show(Ajb $ajb)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Ajb  $ajb
   * @return \Illuminate\Http\Response
   */
  public function edit(Ajb $ajb, $id)
  {
    //
    $ajb = AJB::with('surat.kavling.house', 'surat.sales', 'surat.customer')->find($id);
    $sps_edit = SuratPesanan::with('customer', 'kavling')->get();
    return view('pages.transaction.ajb.create-ajb', compact('ajb', 'sps_edit'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Ajb  $ajb
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Ajb $ajb, $id)
  {
    //
    // return $request;
    Ajb::find($id)->update([
      'ajb_date' => Carbon::parse($request->input('ajb_date'))->format('Y-m-d H:i:s'),
      'ajb_price_1' => Comma::removeComma($request->input('ajb_price_1')),
      'ajb_price_2' => Comma::removeComma($request->input('ajb_price_2')),
      'ajb_lt' => $request->input('ajb_lt'),
      'ajb_tl' => $request->input('ajb_tl'),
      'ajb_notaris' => $request->input('ajb_notaris'),
      'ajb_description' => $request->input('ajb_description'),
      'ajb_sp_id' => $request->input('ajb_sp_id'),
      'ajb_shgb' => $request->input('ajb_shgb'),
      'ajb_shgb_date' => Carbon::parse($request->input('ajb_shgb_date'))->format('Y-m-d H:i:s'),
      'ajb_imb' => $request->input('ajb_imb'),
      'ajb_imb_date' => Carbon::parse($request->input('ajb_imb_date'))->format('Y-m-d H:i:s'),
      'ajb_sp3k' => $request->input('ajb_sp3k'),
      'ajb_sp3k_date' => Carbon::parse($request->input('ajb_sp3k_date'))->format('Y-m-d H:i:s'),
    ]);
    return redirect('ajb')->with('success', 'Successfull udate ajb');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Ajb  $ajb
   * @return \Illuminate\Http\Response
   */
  public function destroy(Ajb $ajb)
  {
    //
  }
}
