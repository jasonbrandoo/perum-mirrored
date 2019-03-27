<?php

namespace App\Http\Controllers\Transaction\Kwitansi;

use App\Model\Kwitansi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SuratPesanan;
use App\Http\Requests\StoreKwitansi;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use App\Model\Payment;
use App\Helpers\Comma;
use Barryvdh\Snappy\Facades\SnappyPdf;

class KwitansiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.transaction.kuitansi.index-kwitansi');
    }

    public function data()
    {
        $kwitansi = Kwitansi::with('surat.customer', 'payment')->get();
        return DataTables::of($kwitansi)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $id = (new Kwitansi)->max('id') + 1;
        $surats = SuratPesanan::all();
        $payments = Payment::where('payment_type', 'Kuitansi')->get();
        return view('pages.transaction.kuitansi.create-kuitansi', compact('surats', 'id', 'payments'));
    }

    public function load_sp(Request $request)
    {
        $sp = SuratPesanan::with('kavling.house')->find($request->id);
        return response()->json($sp);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKwitansi $request)
    {
        //
        Kwitansi::create([
            'kwitansi_date' => Carbon::parse($request->input('kwitansi_date'))->format('Y-m-d H:i:s'),
            'kwitansi_sp_id' => $request->input('kwitansi_sp_id'),
            'kwitansi_faktur' => $request->input('kwitansi_faktur'),
            'kwitansi_reciever' => $request->input('kwitansi_reciever'),
            'kwitansi_staff_name' => $request->input('kwitansi_staff_name'),
            'kwitansi_terbilang' => $request->input('kwitansi_terbilang'),
            'kwitansi_for_pay' => $request->input('kwitansi_for_pay'),
            'kwitansi_jumlah' => Comma::removeComma($request->input('kwitansi_jumlah')),
            'kwitansi_payment_method_id' => $request->input('kwitansi_payment_method_id'),
            'kwitansi_transfer_date' => Carbon::parse($request->input('kwitansi_transfer_date'))->format('Y-m-d H:i:s'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active'
        ]);
        return redirect('transaction/kwitansi')->with('success', 'Successfull create Kwitansi');
    }

    /**
     * Active / Deactive
     * 
     * @return Kwitansi Status
     */
    public function action(Request $request, $id)
    {
        $kwitansi = Kwitansi::find($id);
        if ($request->input('active') == 'Deactive') {
            $kwitansi->active = 'Deactive';
            $kwitansi->save();
        } else if ($request->input('active') == 'Active'){
            $kwitansi->active = 'Active';
            $kwitansi->save();
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kwitansi  $kwitansi
     * @return \Illuminate\Http\Response
     */
    public function show(Kwitansi $kwitansi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kwitansi  $kwitansi
     * @return \Illuminate\Http\Response
     */
    public function edit(Kwitansi $kwitansi, $id)
    {
        //MATA BERAT BENER KAMPRET
        //KAYA DI CANTOLIN MONYET
        $kwitansi = Kwitansi::with('surat.kavling.house', 'payment')->find($id);
        $payment_edit = Payment::where('payment_type', 'Kuitansi')->get();
        $surat_edit = SuratPesanan::all();
        return view('pages.transaction.kuitansi.create-kuitansi', compact('kwitansi', 'surat_edit', 'payment_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kwitansi  $kwitansi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kwitansi $kwitansi)
    {
        //
        Kwitansi::find($request->id)->update([
            'kwitansi_date' => Carbon::parse($request->input('kwitansi_date'))->format('Y-m-d H:i:s'),
            'kwitansi_sp_id' => $request->input('kwitansi_sp_id'),
            'kwitansi_faktur' => $request->input('kwitansi_faktur'),
            'kwitandi_reciever' => $request->input('kwitansi_reciever'),
            'kwitansi_staff_name' => $request->input('kwitansi_staff_name'),
            'kwitansi_terbilang' => $request->input('kwitansi_terbilang'),
            'kwitansi_for_pay' => $request->input('kwitansi_for_pay'),
            'kwitansi_jumlah' => $request->input('kwitansi_jumlah'),
            'kwitansi_payment_method' => $request->input('kwitansi_payment_method'),
            'kwitansi_transfer_date' => Carbon::parse($request->input('kwitansi_transfer_date'))->format('Y-m-d H:i:s'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active'
        ]);
        return redirect('transaction/kwitansi')->with('success', 'Successfull update Kwitansi');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kwitansi  $kwitansi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kwitansi $kwitansi)
    {
        //
    }

    /**
     * Generate PDF for Kuitansi
     * 
     */
    public function generatePdf($id)
    {
        $kuitansi = Kwitansi::where('id', $id)->first();
        $data = [
            'kuitansi' => $kuitansi
        ];
        return SnappyPdf::loadView('pages.transaction.kuitansi.pdf-kwitansi', $data)->inline();
    }
}
