<?php

namespace App\Listeners;

use App\Events\ContactMessageSentEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ContactCreatedNotification;
use App\Models\User;

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
        $user = User::where('email','admin@app.com')->first();
        if($user != null){
            Notification::send($user, new ContactCreatedNotification($event->contact));
        }
         
    }
}
