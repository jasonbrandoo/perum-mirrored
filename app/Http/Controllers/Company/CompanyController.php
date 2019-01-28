<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompany;
use App\Model\Company;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.company.index-company');
    }


    /**
     * Display Datables
     * 
     * @return Company
     */
    public function data()
    {
        $companies = Company::all();
        return DataTables::of($companies)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $id = (new Company)->max('id') + 1;
        return view('pages.company.create-company', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompany $request)
    {
        //
        Company::create([
            'company_name' => $request->input('company_name'),
            'company_type' => $request->input('company_type'),
            'company_address' => $request->input('company_address'),
            'company_city' => $request->input('company_city'),
            'company_province' => $request->input('company_province'),
            'company_zipcode' => $request->input('company_zipcode'),
            'company_state' => $request->input('company_state'),
            'company_phone' => $request->input('company_phone'),
            'company_fax' => $request->input('company_ext'),
            'company_fax' => $request->input('company_fax'),
            'company_email' => $request->input('company_email'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active'
        ]);

        return redirect('company')->with('success', 'Successfull create Company');
    }

    /**
     * Active / Deactive
     * 
     * @return Company Status
     */
    public function action(Request $request, $id)
    {
        $company = Company::find($id);
        if ($request->input('active') == 'Deactive') {
            $company->active = 'Deactive';
            $company->save();
        } else if ($request->input('active') == 'Active'){
            $company->active = 'Active';
            $company->save();
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company, $id)
    {
        //
        $company = Company::find($id);
        return view('pages.company.create-company', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCompany $request, Company $company)
    {
        //
        $company::find($request->id)->update([
            'company_name' => $request->input('company_name'),
            'company_type' => $request->input('company_type'),
            'company_address' => $request->input('company_address'),
            'company_city' => $request->input('company_city'),
            'company_province' => $request->input('company_province'),
            'company_zipcode' => $request->input('company_zipcode'),
            'company_state' => $request->input('company_state'),
            'company_phone' => $request->input('company_phone'),
            'company_fax' => $request->input('company_ext'),
            'company_fax' => $request->input('company_fax'),
            'company_email' => $request->input('company_email'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active'
        ]);
        return redirect('/company')->with('success', 'Successfull update Company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
