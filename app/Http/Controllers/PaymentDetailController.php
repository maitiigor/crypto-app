<?php

namespace App\Http\Controllers;

use App\Models\PaymentDetail;
use App\Http\Requests\StorePaymentDetailRequest;
use App\Http\Requests\UpdatePaymentDetailRequest;
use App\DataTables\PaymentDetailDataTable;

class PaymentDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PaymentDetailDataTable $paymentDetailDataTable)
    {
        //
        $paymentDetails = PaymentDetail::all();

       return $paymentDetailDataTable->render('pages.payment_details.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.payment_details.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePaymentDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentDetailRequest $request)
    {
        //
        $paymentDetail = PaymentDetail::create($request->all());
        Session::flash('success',"Payment Details Data saved successfully");
       return redirect()->route('payment_details.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentDetail  $paymentDetail
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentDetail $paymentDetail)
    {
        //
        return view('pages.payment_details.show',compact('paymentDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentDetail  $paymentDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentDetail $paymentDetail)
    {
        //
        return view('pages.payment_details.edit',compact('paymentDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaymentDetailRequest  $request
     * @param  \App\Models\PaymentDetail  $paymentDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentDetailRequest $request, PaymentDetail $paymentDetail)
    {
        //
        $paymentDetail->fill($request->all());
        $paymentDetail->save();
        Session::flash('success',"Payment Details Data updated successfully");
       
        return redirect(route('payment_details.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentDetail  $paymentDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentDetail $paymentDetail)
    {
        //
        $paymentDetail->delete();
        Session::flash('success',"Payment Details Data deleted successfully");
        return redirect(route('payment_details.index'));
    }
}
