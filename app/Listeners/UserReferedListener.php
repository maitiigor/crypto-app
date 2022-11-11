<?php

namespace App\Listeners;

use App\Events\UserReferedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserReferedNotification;

class UserReferedListener
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
     * @param  \App\Events\UserReferedEvent  $event
     * @return void
     */
    public function handle(UserReferedEvent $event)
    {
        //
        Notification::send($event->referal->referer_user, new UserReferedNotification($event->referal));
    }
}
