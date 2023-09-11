<?php

use App\Models\Chirp;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Volt\Component;
use Illuminate\Notifications\Notification;

new class extends Component
{
    public Collection $notifications;

    public function mount(): void
    {
        $this->getNotifications();
    }

    #[On('notification-created')]
    public function getNotifications(): void
    {
        $this->notifications = auth()->user()->unreadNotifications;
    }

    public function markAsRead($notification): void
    {
        $notification = auth()->user()->notifications()->find($notification['id']);

        $notification->markAsRead();

        // dd($notification);
        // auth()->user()
        //     ->unreadNotifications
        //     ->when($request->input('id'), function ($query) use ($request) {
        //         return $query->where('id', $request->input('id'));
        //     })
        //     ->markAsRead();

        $this->getNotifications();
    }
}; ?>

<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @forelse($notifications as $notification)
                <div class="p-3 sm:p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <section class="space-y-6 flex justify-between items-center">
                            {{-- <header> --}}
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    [{{ $notification->created_at->diffForHumans() }}]
                                </h2>
                        
                                <p class="mt-1 text-lg text-gray-600 dark:text-gray-300">
                                    User (<b>{{ $notification->data['owner'] }}</b>) has just chirped with (<b>{{ $notification->data['chirp']['message'] }}</b>).
                                </p>
                            {{-- </header> --}}
                        
                            <x-primary-button
                                wire:click="markAsRead({{ $notification }})"
                            >{{ __('Mark As Read') }}
                            </x-primary-button>
                        </section>
                </div>
            @empty
            <div class="p-2 sm:p-4 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <section class="space-y-3 ">
                        <h2 class="  text-gray-900 dark:text-gray-100">
                            There are no new notifications.
                        </h2>
                    </section>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>
