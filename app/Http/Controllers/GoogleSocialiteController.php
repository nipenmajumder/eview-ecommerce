<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Exception;
use Socialite;

class GoogleSocialiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('social_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);

                return redirect('/dashboard');

            } else {
                $newUser = User::create([
                    'name'        => $user->name,
                    'email'       => $user->email,
                    'social_id'   => $user->id,
                    'social_type' => 'google',
                    'is_verified' => 1,
                    'password'    => encrypt('my-google'),
                ]);

                Auth::login($newUser);

                return redirect('/dashboard');
            }

        } catch (Exception $e) {
            dd('problem');
        }
    }
}
