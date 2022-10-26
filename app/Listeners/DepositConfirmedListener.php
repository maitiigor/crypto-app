<?php

namespace App\Listeners;

use App\Events\DepositConfirmedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\DepositConfirmedNotification;

class DepositConfirmedListener
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
     * @param  \App\Events\DepositConfirmedEvent  $event
     * @return void
     */
    public function handle(DepositConfirmedEvent $event)
    {
        //
        Notification::send($event->deposit->user, new DepositConfirmedNotification($event->deposit));
    }
}
