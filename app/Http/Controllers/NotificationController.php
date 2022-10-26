<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNotificationRequest;
use App\Http\Requests\UpdateNotificationRequest;
use App\Models\Deposit;
use App\Models\Earning;
use App\Models\Notification;
use App\Models\Referal;
use Illuminate\Http\Request;
use App\Events\DepositConfirmedEvent;

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

        return "hello";
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
    public function store(Request $request)
    {
        //
       
        if ($request->type == 'wallet:addresses:new-payment') {

            \Log::info(json_encode($request->all()));
            $request_data = $request->all();
         
         
            $notification = new Notification();
            $notification->type = $request_data['type'];
            $notification->notification_id = $request_data['data']['id'];
            $notification->address = $request_data['data']['address'];
            $notification->amount = $request_data['additional_data']['amount']['amount'];
            $notification->currency = $request_data['additional_data']['amount']['currency'];
            $notification->transaction_id = $request_data['additional_data']['transaction']['id'];
            $notification->transaction_resource_path = $request_data['additional_data']['transaction']['resource_path'];
            $notification->save();

            $deposit = Deposit::where('address', $notification->address)->first();

            //$deposit->verified_amount = $notification->amount;
            $deposit->is_verified = 1;
            /* if ($notification->amount == $deposit->amount) {
                $deposit->is_verification_passed = 0;
            } */
            $verified_first_deposit = Deposit::where('user_id', $deposit->user_id)->where('is_verified', true)->first();
            if ($deposit->user->is_refered == true && $verified_first_deposit == null) {
                
                $referal = Referal::where('refered_user_id', $deposit->user_id)->first();
               
                if ($referal != null) {
                   //return "here";
                    $earning = new Earning();

                    $amount = 0.1 * $deposit->amount;

                    $earning->user_id = $referal->referer_user_id;
                    $earning->amount = $amount;
                    $earning->referal_id = $referal->id;
                    $earning->save();
                
                    $referal->referer_user->account_balance = $referal->referer_user->account_balance + $amount;
                    $referal->referer_user->save();
                }
            }
            $deposit->save();
            DepositConfirmedEvent::dispatch($deposit);
            return json_encode(['status' => 'success']);
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
