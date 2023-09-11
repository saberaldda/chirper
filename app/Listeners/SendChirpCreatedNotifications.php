<?php

namespace App\Listeners;

use App\Events\ChirpCreated;
use App\Jobs\SendChirpNotificationJob;
use App\Models\User;
use App\Notifications\NewChirp;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendChirpCreatedNotifications
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
    public function handle(ChirpCreated $event): void
    {
        $users = User::where('id', '!=', $event->chirp->user_id)->get();

        foreach ($users as $user) {
            dispatch(new SendChirpNotificationJob($user, $event->chirp))->delay(now()->addSeconds(5));
        }

        // foreach (User::whereNot('id', $event->chirp->user_id)->cursor() as $user) {
        //     $user->notify(new NewChirp($event->chirp));
        // }
    }
}
