<?php

namespace App\Listeners;

use App\Events\WithdrawalPaidEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\WithdrawalPayedNotification;

class WithdrawalPaidListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\WithdrawalPaidEvent  $event
     * @return void
     */
    public function handle(WithdrawalPaidEvent $event)
    {
        //
        //dd($event->payment->withdrawal);
        Notification::send($event->payment->withdrawal->user, new WithdrawalPayedNotification($event->payment));
    }
}
