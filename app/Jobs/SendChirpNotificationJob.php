<?php

namespace App\Jobs;

use App\Models\Chirp;
use App\Models\User;
use App\Notifications\NewChirp;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendChirpNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $chirp;

    /**
     * Create a new job instance.
     */
    public function __construct(User $user, Chirp $chirp)
    {
        $this->user = $user;
        $this->chirp = $chirp;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->user->notify(new NewChirp($this->chirp));
    }
}
