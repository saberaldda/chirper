<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialiteAuthController extends Controller
{
    public function index($provider)
    {
        $user = Auth::user();

        $social_token = $user->socials()->where('social_type', $provider)->first()?->social_token;

        if(!$social_token) {
            return 'there is no '. $provider .' token';
        }

        $provider_user = Socialite::driver($provider)
            ->userFromToken($social_token);

        dd($provider_user);
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();

            $user = User::firstOrCreate([
                'email'     => $socialUser->email,
            ], [
                'name'      => $socialUser->name,
                'email'     => $socialUser->email,
                'password'  => Hash::make(Str::random(10)),
            ]);

            $user->socials()->UpdateOrCreate([
                'social_type'    => $provider,
                'social_id'      => $socialUser->id,
            ], [
                'social_token'   => $socialUser->token
            ]);

            // dd($user->load('socials'), $user->socials()->first()->social_token);
    
            Auth::login($user);
    
            return redirect()->route('dashboard');

        } catch (\Throwable $th) {
            return redirect()->route('login')->withErrors($th->getMessage());
            // return dd($th->getMessage());
        }
    }
}
