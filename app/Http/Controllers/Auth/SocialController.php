<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();

            // Check koro user already database-e ache kina
            $user = User::where('email', $socialUser->getEmail())->first();

            if (!$user) {
                // Jodi na thake, tahole notun user create hobe
                $user = User::create([
                    'name' => $socialUser->getName() ?? $socialUser->getNickname(),
                    'email' => $socialUser->getEmail(),
                    'password' => bcrypt(Str::random(16)), // Random password
                    'email_verified_at' => now(),
                ]);
            }

            Auth::login($user);

            return redirect('/dashboard'); // Login er por kothay jabe
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Something went wrong with ' . $provider . ' login.');
        }
    }
}