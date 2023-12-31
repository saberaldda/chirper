<?php

namespace App\Listeners;

use App\Events\ChirpCreatedEvent;
use App\Jobs\SendChirpNotificationJob;
use App\Models\User;
use App\Notifications\NewChirpNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendChirpCreatedListener
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
    public function handle(ChirpCreatedEvent $event): void
    {
        $users = User::get();

        foreach ($users as $user) {
            dispatch(new SendChirpNotificationJob($user, $event->chirp))->delay(now()->addSeconds(5));
        }

        // foreach (User::whereNot('id', $event->chirp->user_id)->cursor() as $user) {
        //     $user->notify(new NewChirpNotification($event->chirp));
        // }
    }
}
