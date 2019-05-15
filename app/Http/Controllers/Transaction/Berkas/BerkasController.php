<?php

namespace App\Http\Controllers\Transaction\Berkas;

use App\Model\Berkas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SuratPesanan;
use App\Model\Customer;
use Yajra\DataTables\DataTables;
use App\Http\Requests\StoreBerkas;
use Carbon\Carbon;

class BerkasController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
    return view('pages.transaction.berkas.index-berkas');
  }

  public function data()
  {
    $sp = Berkas::with('surat.customer', 'user')->get();
    return DataTables::of($sp)->toJson();
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
    $id = (new Berkas)->max('id') + 1;
    $sps = SuratPesanan::with('customer', 'kavling')->doesntHave('cicilan')->get();
    $customer = Customer::all();
    return view('pages.transaction.berkas.create-berkas', compact('sps', 'id', 'customer'));
  }

  public function load_sp(Request $request)
  {
    $sp = SuratPesanan::with('kavling.price.house', 'customer', 'sales', 'paymentMethod')->find($request->id);
    return response()->json($sp);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreBerkas $request)
  {
    //
    Berkas::create([
      'berkas_date' => Carbon::parse($request->input('berkas_date'))->format('Y-m-d H:i:s'),
      'berkas_giver' => $request->input('berkas_giver'),
      'berkas_reciever_id' => $request->input('berkas_reciever_id'),
      'berkas_note' => $request->input('berkas_note'),
      'berkas_sp_id' => $request->input('berkas_sp_id'),
      'active' => $request->input('active') == null ? 'Not Active' : 'Active'
    ]);
    return redirect('transaction/berkas')->with('success', 'Successfull create Berkas');
  }

  /**
   * Active / Deactive
   *
   * @return Berkas Status
   */
  public function action(Request $request, $id)
  {
    $berkas = Berkas::find($id);
    if ($request->input('active') == 'Deactive') {
      $berkas->active = 'Deactive';
      $berkas->save();
    } else if ($request->input('active') == 'Active') {
      $berkas->active = 'Active';
      $berkas->save();
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Berkas  $berkas
   * @return \Illuminate\Http\Response
   */
  public function show(Berkas $berkas)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Berkas  $berkas
   * @return \Illuminate\Http\Response
   */
  public function edit(Berkas $berkas, $id)
  {
    //
    $berkas = Berkas::with('surat.customer', 'surat.sales', 'surat.kavling.house', 'surat.paymentMethod', 'user', 'customer')->find($id);
    $customer_edit = Customer::all();
    $surat_edit = SuratPesanan::with('customer', 'kavling')->get();
    return view('pages.transaction.berkas.create-berkas', compact('berkas', 'customer_edit', 'surat_edit'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Berkas  $berkas
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Berkas $berkas)
  {
    //
    Berkas::find($request->id)->update([
      'berkas_date' => Carbon::parse($request->input('berkas_date'))->format('Y-m-d H:i:s'),
      'berkas_giver' => $request->input('berkas_giver'),
      'berkas_reciever_id' => $request->input('berkas_reciever_id'),
      'berkas_note' => $request->input('berkas_note'),
      'berkas_sp_id' => $request->input('berkas_sp_id'),
      'active' => $request->input('active') == null ? 'Not Active' : 'Active'
    ]);
    return redirect('transaction/berkas')->with('success', 'Successfull update Berkas');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Berkas  $berkas
   * @return \Illuminate\Http\Response
   */
  public function destroy(Berkas $berkas)
  {
    //
  }
}
