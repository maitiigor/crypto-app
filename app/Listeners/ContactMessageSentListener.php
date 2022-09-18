<?php

namespace App\Listeners;

use App\Events\ContactMessageSentEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ContactCreatedNotification;

class ContactMessageSentListener
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
     * @param  \App\Events\ContactMessageSentEvent  $event
     * @return void
     */
    public function handle(ContactMessageSentEvent $event)
    {
        //

        Notification::send($event->contact, new ContactCreatedNotification($event->contact)); 
    }
}
