<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Throwable;

class SocialiteLoginController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $user_provider = Socialite::driver($provider)->user();

            $user = User::where([
                'social_login_provider' => $provider,
                'social_login_provider_code' => $user_provider->id,
                // 'email' => $user_provider->email
            ])->first();

            if (!$user) {
                $user = User::create([
                    'name' => $user_provider->name,
                    'email' => $user_provider->email,
                    // 'image' => $user_provider->email,
                    'social_login_provider' => $provider,
                    'user_type' => 'customer',
                    'social_login_provider_code' => $user_provider->id,
                    'email_verified_at' => now(),
                    'password' => Str::random(8),
                ]);
            }

            Auth::login($user);

            return redirect()->route('customer.home-page')->with('success', 'You have loged in successfully');
        } catch (Throwable $e) {

            return redirect()->route('customer.home-page')->withErrors([
                'email' => $e->getMessage()
            ]);
        }
    }
}
