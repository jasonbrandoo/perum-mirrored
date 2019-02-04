<?php

namespace App\Http\Controllers\Payment;

use App\Model\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePayment;
use Yajra\DataTables\DataTables;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.payment.payment-index');
    }

    /**
     * Display Datatables
     * 
     * @return DataTables
     */
    public function data()
    {
        $payment = Payment::all();
        return DataTables::of($payment)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $id= 1;
        return view('pages.payment.payment-method', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePayment $request)
    {
        //
        $payment_method = new Payment;
        $payment_method->payment_method = $request->input('payment_method');
        $payment_method->active = $request->input('active') == null ? 'Not Active' : 'Active';
        $payment_method->save();
        return redirect('payment')->with('success', 'Successfull create new payment method');
    }

    /**
     * Active / Deactive
     * 
     * @return Kavling Status
     */
    public function action(Request $request, $id)
    {
        $payment = Payment::find($id);
        if ($request->input('active') == 'Deactive') {
            $payment->active = 'Deactive';
            $payment->save();
        } else if ($request->input('active') == 'Active'){
            $payment->active = 'Active';
            $payment->save();
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment, $id)
    {
        //
        $payment = Payment::find($id);
        return view('pages.payment.payment-method', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(StorePayment $request, Payment $payment)
    {
        //
        $payment::find($request->id)->update([
            'payment_method' => $request->input('payment_method'),
            'payment_type' => $request->input('payment_type'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active'
        ]);
        return redirect('payment')->with('success', 'Successfull Update payment method');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
