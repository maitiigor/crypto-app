@component('mail::message')
New Contact Message

@component('mail::panel')
<b>Subject: </b> {{$contact->subject}}<br>
<b>From: </b> {{$contact->name}} {{$contact->email}}<br>
<b>Mesage:</b> {{$contact->message}}
@endcomponent
