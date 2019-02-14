<?php

namespace App\Http\Controllers\Kavling;

use App\Model\Kavling;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Price;
use App\Http\Requests\StoreKavling;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use App\Model\Rumah;
use Illuminate\Support\Facades\DB;
use App\Helpers\Comma;

class KavlingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.kavling.index-kavling');
    }

    /**
     * Display Datatables
     *
     * @return Datatables
     */
    public function data()
    {
        $kavlings = Kavling::with('price.house')->get();
        return DataTables::of($kavlings)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $houseType = Rumah::all();
        $prices = Price::all();
        $id = (new Kavling)->max('id') + 1;
        return view('pages.kavling.create-kavling', compact('prices', 'id', 'houseType'));
    }

    /**
     * Load Prices
     *
     * @return Prices
     */
    public function prices(Request $request)
    {
        $price = Price::find($request->id);
        return response()->json($price);
    }

    /**
     * Load Prices
     *
     * @return Type
     */
    public function type(Request $request)
    {
        $price = Rumah::find($request->id);
        return response()->json($price);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKavling $request)
    {
        //
        $kavling_start_date = Carbon::parse($request->input('kavling_start_date'))->format('Y-m-d H:i:s');
        $kavling_end_date = Carbon::parse($request->input('kavling_end_date'))->format('Y-m-d H:i:s');
        $kavling_shgb_date = Carbon::parse($request->input('kavling_shgb_date'))->format('Y-m-d H:i:s');
        $kavling_imb_date = Carbon::parse($request->input('kavling_imb_date'))->format('Y-m-d H:i:s');
        $set_kav_start = Carbon::createFromFormat('Y-m-d H:i:s', $kavling_start_date)->toDateTimeString();
        $set_kav_end = Carbon::createFromFormat('Y-m-d H:i:s', $kavling_end_date)->toDateTimeString();
        $set_kav_shgb = Carbon::createFromFormat('Y-m-d H:i:s', $kavling_shgb_date)->toDateTimeString();
        $set_kav_imb = Carbon::createFromFormat('Y-m-d H:i:s', $kavling_imb_date)->toDateTimeString();
        $number = $request->input('kavling_number');
        $multiple = $request->input('kavling_s_d');

        $data = [];

        for ($i=$number; $i <= $multiple; $i++) {
           array_push($data, [
                'kavling_price_id' => $request->input('kavling_price_id'),
                'kavling_type_id' => $request->input('kavling_type_id'),
                'kavling_block' => $request->input('kavling_block'),
                'kavling_number' => $request->input('kavling_number'),
                'kavling_s_d' => $request->input('kavling_s_d'),
                'kavling_cluster' => $request->input('kavling_cluster'),
                'kavling_hook' => $request->input('kavling_hook') == null ? 'Not Active' : 'Active',
                'kavling_tl' => $request->input('kavling_tl'),
                'kavling_building' => $request->input('kavling_building'),
                'kavling_surface' => $request->input('kavling_surface'),
                'kavling_tl_active' => $request->input('kavling_tl_active'),
                'kavling_tl_old' => $request->input('kavling_tl_old'),
                'kavling_discount_dp' => Comma::removeComma($request->input('kavling_discount_dp')),
                'kavling_sell_status' => $request->input('kavling_sell_status'),
                'kavling_market_status' => $request->input('kavling_market_status') == null ? 'Not Active' : 'Active',
                'kavling_build_status' => $request->input('kavling_build_status'),
                'kavling_start_date' => $set_kav_start,
                'kavling_progress' => $request->input('kavling_progress'),
                'kavling_end_date' => $set_kav_end,
                'kavling_shgb' => $request->input('kavling_shgb'),
                'kavling_shgb_date' => $set_kav_shgb,
                'kavling_imb' => $request->input('kavling_imb'),
                'kavling_imb_date' => $set_kav_imb,
                'active' => $request->input('active') == null ? 'Not Active' : 'Active'
            ]);  
        }

        Kavling::insert($data);
        return redirect('kavling')->with('success', 'Successfull create Kavling');
    }

    /**
     * Active / Deactive
     *
     * @return Kavling Status
     */
    public function action(Request $request, $id)
    {
        $kavling = Kavling::find($id);
        if ($request->input('active') == 'Deactive') {
            $kavling->active = 'Deactive';
            $kavling->save();
        } elseif ($request->input('active') == 'Active') {
            $kavling->active = 'Active';
            $kavling->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kavling  $kavling
     * @return \Illuminate\Http\Response
     */
    public function show(Kavling $kavling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kavling  $kavling
     * @return \Illuminate\Http\Response
     */
    public function edit(Kavling $kavling, $id)
    {
        //
        $priceId = Kavling::with('price')->find($id);
        $prices = Price::all();
        $kavling = Kavling::find($id);
        $houseTypeId = Kavling::with('house')->find($id);
        $houseType_edit = Rumah::all();
        // return $houseTypeId;
        return view('pages.kavling.create-kavling', compact('prices', 'kavling', 'houseType_edit', 'houseTypeId', 'priceId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kavling  $kavling
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kavling $kavling)
    {
        //
        $kavling::find($request->id)->update([
            'kavling_price_id' => $request->input('kavling_price_id'),
            'kavling_type_id' => $request->input('kavling_type_id'),
            'kavling_block' => $request->input('kavling_block'),
            'kavling_number' => $request->input('kavling_number'),
            'kavling_s_d' => $request->input('kavling_s_d'),
            'kavling_cluster' => $request->input('kavling_cluster'),
            'kavling_hook' => $request->input('kavling_hook') == null ? 'Not Active' : 'Active',
            'kavling_tl' => $request->input('kavling_tl'),
            'kavling_building' => $request->input('kavling_building'),
            'kavling_surface' => $request->input('kavling_surface'),
            'kavling_tl_active' => $request->input('kavling_tl_active'),
            'kavling_tl_old' => $request->input('kavling_tl_old'),
            'kavling_discount_dp' => Comma::removeComma($request->input('kavling_discount_dp')),
            'kavling_sell_status' => $request->input('kavling_sell_status'),
            'kavling_market_status' => $request->input('kavling_market_status') == null ? 'Not Active' : 'Active',
            'kavling_build_status' => $request->input('kavling_build_status'),
            'kavling_start_date' => Carbon::parse($request->input('kavling_start_date'))->format('Y-m-d H:i:s'),
            'kavling_progress' => $request->input('kavling_progress'),
            'kavling_end_date' => Carbon::parse($request->input('kavling_end_date'))->format('Y-m-d H:i:s'),
            'kavling_shgb' => $request->input('kavling_shgb'),
            'kavling_shgb_date' => Carbon::parse($request->input('kavling_shgb_date'))->format('Y-m-d H:i:s'),
            'kavling_imb' => $request->input('kavling_imb'),
            'kavling_imb_date' => Carbon::parse($request->input('kavling_imb_date'))->format('Y-m-d H:i:s'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active'
        ]);
        return redirect('kavling')->with('success', 'Successfull Update Kavling');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kavling  $kavling
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kavling $kavling)
    {
        //
    }
}
