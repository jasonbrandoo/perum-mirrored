<?php

namespace App\Http\Controllers\Customer;

use App\Model\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConsumer;
use App\Model\Referensi;
use App\Model\Sales;
use App\Model\Company;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;
use App\Helpers\Comma;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.customer.index-customer');
    }

    /**
     * Display Datatables
     * 
     * @return Customer
     */
    public function data()
    {
        $customer = Customer::with('sales_executive', 'sales_supervisor')->get();
        return DataTables::of($customer)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $id = (new Customer)->max('id') + 1;
        $references = Referensi::all();
        $sales_executives = Sales::where('sales_position', 'Sales')->get();
        $sales_supervisor = Sales::where('sales_position', 'Supervisor')->get();
        $companies = Company::where('company_type', 'customer')->get();
        return view('pages.customer.create-customer', compact('id', 'references', 'sales_executives', 'sales_supervisor', 'companies'));
    }

    /**
     * Load Company for Customer
     * 
     * @return Company
     */
    public function company(Request $request)
    {
        $company_customer = Company::find($request->id);
        return response()->json($company_customer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConsumer $request)
    {
        //
        Customer::create([
            'customer_name' => $request->input('customer_name'),
            'customer_ktp' => $request->input('customer_ktp'),
            'customer_ktp_expired' => $request->input('customer_ktp_expired'),
            'customer_ktp_address' => $request->input('customer_ktp_address'),
            'customer_city' => $request->input('customer_city'),
            'customer_zipcode' => $request->input('customer_zipcode'),
            'customer_current_address' => $request->input('customer_current_address'),
            'customer_current_city' => $request->input('customer_current_city'),
            'customer_current_zipcode' => $request->input('customer_current_zipcode'),
            'customer_telp' => $request->input('customer_telp'),
            'customer_mobile_number' => $request->input('customer_mobile_number'),
            'customer_house_status' => $request->input('customer_house_status'),
            'customer_length_of_stay' => $request->input('customer_length_of_stay'),
            'customer_birth_place' => $request->input('customer_birth_place'),
            'customer_birthdate' => Carbon::parse($request->input('kavling_start_date'))->format('Y-m-d H:i:s'),
            'customer_maternal_status' => $request->input('customer_maternal_status'),
            'customer_tanggungan' => $request->input('customer_tanggungan'),
            'customer_npwp' => $request->input('customer_npwp'),
            'customer_religion' => $request->input('customer_religion'),
            'customer_gender' => $request->input('customer_gender'),
            'customer_mother' => $request->input('customer_mother'),
            'customer_address_mail' => $request->input('customer_address_mail'),
            'mailing_address' => $request->input('mailing_address'),
            'customer_reference_id' => $request->input('customer_reference_id'),
            'customer_executive_id' => $request->input('customer_executive_id'),
            'customer_supervisor_id' => $request->input('customer_supervisor_id'),
            'customer_job_name' => $request->input('customer_job_name'),
            'customer_nip' => $request->input('customer_nip'),
            'customer_job_title' => $request->input('customer_job_title'),
            'customer_job_duration' => $request->input('customer_job_duration'),
            'customer_office_id' => $request->input('customer_office_id'),
            'customer_office_email' => $request->input('customer_office_email'),
            'customer_income' => Comma::removeComma($request->input('customer_income')),
            'customer_additional_income' => Comma::removeComma($request->input('customer_additional_income')),
            'customer_family_income' => Comma::removeComma($request->input('customer_family_income')),
            'customer_total_income' => Comma::removeComma($request->input('customer_total_income')),
            'customer_routine_expenses' => Comma::removeComma($request->input('customer_routine_expenses')),
            'customer_residual_income' => Comma::removeComma($request->input('customer_residual_income')),
            'customer_installment_ability' => Comma::removeComma($request->input('customer_installment_ability')),
        ]);
        return redirect('/customer')->with('success', 'Successfull create customer');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer, $id)
    {
        //
        $customer = Customer::with('reference', 'sales_executive', 'sales_supervisor', 'company')->find($id);
        $references = Referensi::all();
        $sales_executives = Sales::where('sales_position', 'Sales')->get();
        $sales_supervisor = Sales::where('sales_position', 'Supervisor')->get();
        $companies = Company::where('company_type', 'customer')->get();
        return view('pages.customer.create-customer', compact('customer', 'references', 'sales_executives', 'sales_supervisor', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
        $customer::find($request->id)->update([
            'customer_name' => $request->input('customer_name'),
            'customer_ktp' => $request->input('customer_ktp'),
            'customer_ktp_expired' => $request->input('customer_ktp_expired'),
            'customer_ktp_address' => $request->input('customer_ktp_address'),
            'customer_city' => $request->input('customer_city'),
            'customer_zipcode' => $request->input('customer_zipcode'),
            'customer_current_address' => $request->input('customer_current_address'),
            'customer_current_city' => $request->input('customer_current_city'),
            'customer_current_zipcode' => $request->input('customer_current_zipcode'),
            'customer_telp' => $request->input('customer_telp'),
            'customer_mobile_number' => $request->input('customer_mobile_number'),
            'customer_house_status' => $request->input('customer_house_status'),
            'customer_length_of_stay' => $request->input('customer_length_of_stay'),
            'customer_birth_place' => $request->input('customer_birth_place'),
            'customer_birthdate' => Carbon::parse($request->input('kavling_start_date'))->format('Y-m-d H:i:s'),
            'customer_maternal_status' => $request->input('customer_maternal_status'),
            'customer_tanggungan' => $request->input('customer_tanggungan'),
            'customer_npwp' => $request->input('customer_npwp'),
            'customer_religion' => $request->input('customer_religion'),
            'customer_gender' => $request->input('customer_gender'),
            'customer_mother' => $request->input('customer_mother'),
            'customer_address_mail' => $request->input('customer_address_mail'),
            'mailing_address' => $request->input('mailing_address'),
            'customer_reference_id' => $request->input('customer_reference_id'),
            'customer_executive_id' => $request->input('customer_executive_id'),
            'customer_supervisor_id' => $request->input('customer_supervisor_id'),
            'customer_job_name' => $request->input('customer_job_name'),
            'customer_nip' => $request->input('customer_nip'),
            'customer_job_title' => $request->input('customer_job_title'),
            'customer_job_duration' => $request->input('customer_job_duration'),
            'customer_office_id' => $request->input('customer_office_id'),
            'customer_office_email' => $request->input('customer_office_email'),
            'customer_income' => Comma::removeComma($request->input('customer_income')),
            'customer_additional_income' => Comma::removeComma($request->input('customer_additional_income')),
            'customer_family_income' => Comma::removeComma($request->input('customer_family_income')),
            'customer_total_income' => Comma::removeComma($request->input('customer_total_income')),
            'customer_routine_expenses' => Comma::removeComma($request->input('customer_routine_expenses')),
            'customer_residual_income' => Comma::removeComma($request->input('customer_residual_income')),
            'customer_installment_ability' => Comma::removeComma($request->input('customer_installment_ability')),
        ]);
        return redirect('/customer')->with('success', 'Successfull update customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
