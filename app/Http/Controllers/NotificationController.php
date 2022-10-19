<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Deposit;
use App\Http\Requests\StoreNotificationRequest;
use App\Http\Requests\UpdateNotificationRequest;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNotificationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNotificationRequest $request)
    {
        //
        if($request->type == 'wallet:addresses:new-payment'){

            \Log::info(json_encode($request->all()));
            $notification = new Notification();
            $notification->type = $request->type;
            $notification->notification_id = $request->data->id ;
            $notification->address = $request->data->address; 
            $notification->amount = $request->amount->amount;
            $notification->currency = $request->amount->currency;
            $notification->transaction_id = $request->transaction->id;
            $notification->transaction->resource_path = $request->transaction->resource_path;
            $notification->save();

            $deposit = Deposit::where('address',$notification->address)->first();

            $deposit->verified_amount = $notification->amount;
            $deposit->is_verified = 1 ;
            if($notification->amount == $deposit->amount){
                $deposit->is_verification_passed = 0;
            }

            $deposit->save();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNotificationRequest  $request
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNotificationRequest $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
