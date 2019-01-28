<?php

namespace App\Http\Controllers\Rumah;

use App\Model\Rumah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRumah;
use Yajra\DataTables\DataTables;

class RumahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.rumah.index-rumah');
    }

    /**
     * Display DataTables
     * 
     * @return DataTables
     */
    public function data()
    {
        $rumah = Rumah::all();
        return DataTables::of($rumah)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $id = (new Rumah)->max('id') + 1;
        return view('pages.rumah.create-rumah', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRumah $request)
    {
        //
        Rumah::create([
            'rumah_type_name' => $request->input('rumah_type_name'),
            'surface_area_m2' => $request->input('surface_area'),
            'building_area_m2' => $request->input('building_area'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active'
        ]);
        return redirect('rumah')->with('success', 'Successfull create Rumah');
    }

    /**
     * Active / Deactive
     * 
     * @return Rumah Status
     */
    public function action(Request $request, $id)
    {
        $rumah = Rumah::find($id);
        if ($request->input('active') == 'Deactive') {
            $rumah->active = 'Deactive';
            $rumah->save();
        } else if ($request->input('active') == 'Active'){
            $rumah->active = 'Active';
            $rumah->save();
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function show(Rumah $rumah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function edit(Rumah $rumah, $id)
    {
        //
        $rumah = Rumah::find($id);
        return view('pages.rumah.create-rumah', compact('rumah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRumah $request, Rumah $rumah)
    {
        //
        $rumah::find($request->id)->update([
            'rumah_type_name' => $request->input('rumah_type_name'),
            'surface_area_m2' => $request->input('surface_area'),
            'building_area_m2' => $request->input('building_area'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active'
        ]);
        return redirect('rumah')->with('success', 'Successfull Update Rumah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rumah $rumah)
    {
        //
    }
}
