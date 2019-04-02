<?php

namespace App\Http\Controllers\Sales;

use App\Model\Sales;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSales;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.sales.index-sales');
    }

    /**
     * Display DataTables
     * 
     * @return DataTables
     */
    public function data()
    {
        $sales = Sales::all();
        return DataTables::of($sales)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $id = (new Sales)->max('id') + 1;
        $supervisor = Sales::where('sales_position', 'Supervisor')->get();
        return view('pages.sales.create-sales', compact('id', 'supervisor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSales $request)
    {
        //
        Sales::create([
            'sales_name' => $request->input('sales_name'),
            'sales_mobile_number' => $request->input('sales_mobile_number'),
            'sales_number' => $request->input('sales_number'),
            'sales_no_ktp' => $request->input('sales_no_ktp'),
            'sales_address' => $request->input('sales_address'),
            'sales_city' => $request->input('sales_city'),
            'sales_province' => $request->input('sales_province'),
            'sales_zipcode' => $request->input('sales_zipcode'),
            'sales_position' => $request->input('sales_position'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active',
            'sales_void' => $request->input('sales_void') == null ? 'Not Void' : 'Void',
            'sales_komisi' => $request->input('sales_komisi'),
            'sales_target' => $request->input('sales_target'),
            'sales_spv' => $request->input('sales_spv'),
            'sales_in' => Carbon::parse($request->input('sales_in'))->format('Y-m-d H:i:s'),
            'sales_out' => Carbon::parse($request->input('sales_out'))->format('Y-m-d H:i:s')
        ]);
        return redirect('sales')->with('success', 'Successfull create Sales');
    }

    /**
     * Active / Deactive
     * 
     * @return Sales Status
     */
    public function action(Request $request, $id)
    {
        $sales = Sales::find($id);
        if ($request->input('active') == 'Deactive') {
            $sales->active = 'Deactive';
            $sales->save();
        } else if ($request->input('active') == 'Active'){
            $sales->active = 'Active';
            $sales->save();
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(Sales $sales, $id)
    {
        //
        $sales = Sales::with('spv', 'surat')->find($id);
        // $spv_edit = Sales::with('spv')->first();
        $supervisor_edit = Sales::where('sales_position', 'Supervisor')->get();
        return view('pages.sales.create-sales', compact('sales', 'spv_edit', 'supervisor_edit'));
    }

    /**
     * show surat pesanan
     *
     * load sales with surat pesanan
     **/
    public function suratPesanan($id)
    {
        $sales = Sales::with('surat.customer', 'surat.kavling')->find($id);
        return DataTables::of($sales->surat)->toJson();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSales $request, Sales $sales)
    {
        //
        $sales::find($request->id)->update([
            'sales_name' => $request->input('sales_name'),
            'sales_mobile_number' => $request->input('sales_mobile_number'),
            'sales_number' => $request->input('sales_number'),
            'sales_no_ktp' => $request->input('sales_no_ktp'),
            'sales_address' => $request->input('sales_address'),
            'sales_city' => $request->input('sales_city'),
            'sales_province' => $request->input('sales_province'),
            'sales_zipcode' => $request->input('sales_zipcode'),
            'sales_position' => $request->input('sales_position'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active',
            'sales_void' => $request->input('sales_void') == null ? 'Not Void' : 'Void',
            'sales_komisi' => $request->input('sales_komisi'),
            'sales_target' => $request->input('sales_target'),
            'sales_spv' => $request->input('sales_spv'),
            'sales_in' => Carbon::parse($request->input('sales_in'))->format('Y-m-d H:i:s'),
            'sales_out' => Carbon::parse($request->input('sales_out'))->format('Y-m-d H:i:s')
        ]);
        return redirect('/sales')->with('success', 'Successfull Update Sales');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales $sales)
    {
        //
    }
}
