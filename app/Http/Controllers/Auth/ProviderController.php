<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    public function callback($provider)
    {
        try {

            $socialuser = Socialite::driver($provider)->user();
            if (User::where('email', $socialuser->email)->first()->provider != $provider) {
                return redirect('/login')->withErrors(['email' => 'Email uses another provider. Please login with ' . User::where('email', $socialuser->email)->first()->provider . ' instead.']);
            }
            
            $name = $socialuser->name;
            if($name == null){
                $name = $socialuser->nickname;
            } 
            if($name == null){
                $name = $socialuser->username;
            }
            if($name == null){
                $name = explode('@', $socialuser->email)[0];
            }
            $user = User::updateOrCreate([
                'provider_id' => $socialuser->id,
                'provider' => $provider
            ], [
                'name' => $name,
                'email' => $socialuser->email,
                'provider_token' => $socialuser->token,
            ]);
            Auth::login($user);

            if (!$user->hasVerifiedEmail()) {
                $user->markEmailAsVerified();
            }

            return redirect('/dashboard');
        } catch (\Exception $e) {
            // log error on console
            return redirect('/login'); 
        }



    }
}
