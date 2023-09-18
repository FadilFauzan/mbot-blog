<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;


class SocialAuthController extends Controller
{
    public function googleRedirect() {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback() {
        $user = Socialite::driver('google')->user();
        // dd($user);
        $this->createOrUpdateUser($user, 'google');
        return redirect()->intended('dashboard')->with('login', 'You have successfully logged in');
    }

    private function createOrUpdateUser($data, $provider) {
        try {
            $user = User::where('email', $data->getEmail())->first();
            $findUser = User::where('provider_id', $data->getId())->first();
            $uniqueUsername = User::createUniqueUsername($data->getName());

            if ($findUser) {
                Auth::login($findUser);
            } else if ($user) {
                $user->update([
                    'name' => $data->getName(),
                    'username' => $uniqueUsername,
                    'provider' => $provider,
                    'provider_id' => $data->getId(),
                    // 'avatar' => $data->getAvatar(),
                ]);
                Auth::login($user);
            } else {
                $user = User::create([
                    'name' => $data->getName(),
                    'username' => $uniqueUsername,
                    'email' => $data->getEmail(),
                    'provider' => $provider,
                    'provider_id' => $data->getId(),
                    'password' => bcrypt('password')
                ]);
                Auth::login($user);
                request()->session()->regenerate();
                // request()->session()->put('expires_at', now()->addMinutes(30));
            }

        } catch(\Throwable $e) {
            dd($e->getMessage());
            // Log::error('Error occurred: ' . $th->getMessage());
        }
    }
}