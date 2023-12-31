<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex items-center justify-center">
    <h4>{{ __("Don't have an account?") }}
        <a class="underline text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
            href="{{ route('register') }}">
            {{ __('Sign Up') }}
        </a>
    </h4>
    </div>
    <br>
    <div class="flex items-center justify-center">
        <a href="{{ route('social-login', 'facebook') }}">
            <img src="https://icon-library.com/images/free-facebook-icon/free-facebook-icon-11.jpg"
                alt="Github Icon"
                width="44px"
                class="mx-auto scale-100 hover:scale-125 ease-in duration-200 mr-1">
        </a>
        <a href="{{ route('social-login', 'github') }}">
            <img src="https://icon-library.com/images/github-icon-white/github-icon-white-6.jpg"
                alt="Github Icon"
                width="50px"
                class="mx-auto scale-100 hover:scale-125 ease-in duration-200">
        </a>
        <a href="{{ route('social-login', 'google') }}">
            <img src="https://icon-library.com/images/google-crome-icon/google-crome-icon-13.jpg"
                alt="Github Icon"
                width="55px"
                class="mx-auto scale-100 hover:scale-125 ease-in duration-200">
        </a>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
