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
    public function githubRedirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubCallback()
    {
        try {
            $user = Socialite::driver('github')->user();

            $gitUser = User::updateOrCreate([
                'github_id' => $user->name,
            ], [
                'name'      => $user->name,
                'email'     => $user->email,
                'password'  => Hash::make(Str::random(10)),
            ]);
    
            Auth::login($gitUser);
    
            return redirect()->route('dashboard');

        } catch (\Throwable $th) {
            return redirect()->route('dashboard');
        }
    }
}
