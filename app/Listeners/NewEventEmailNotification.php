<?php

namespace App\Listeners;

use App\Events\EventCreated;
use App\Jobs\EventNotificationJob;
use App\Mail\EventNotification;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NewEventEmailNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(EventCreated $event): void
    {
        $eventArr = $event->event->toArray();
        $user = User::find($eventArr['user_id']);
        Mail::to($user)->send(new EventNotification($eventArr));
    }
}
