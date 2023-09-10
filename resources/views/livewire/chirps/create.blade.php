<?php

use Livewire\Attributes\Rule;
use Livewire\Volt\Component;

new class extends Component 
{
    #[Rule('required|string|max:255')]
    public string $message = ''; 

    public function store(): void
    {
        $validated = $this->validate();

        auth()->user()->chirps()->create($validated);

        $this->message = '';

        $this->dispatch('chirp-created'); 
    } 

}; ?>

<div>
    <form wire:submit="store"> 
        <textarea
            wire:model="message"
            placeholder="{{ __('What\'s on your mind?') }}"
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-gray-900 text-gray-100"
        ></textarea>

        <x-input-error :messages="$errors->get('message')" class="mt-2" />
        <x-primary-button class="mt-4">{{ __('Chirp') }}</x-primary-button>
    </form> 
</div>
