<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Socialite;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'logoutUser']);
    }

    /**
     * Handle redirect ke google.
     *
     * @return void
     */
    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    /**
     * Log the user out of the application.
     * From vendor/laravel/ui/auth-backend/AuthenticatesUsers.php
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logoutUser()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }

    /**
     * Handle callback yang membawa data dari proses otentikasi pada platform google
     *
     * @return void
     */
    public function handleProviderCallback($driver)
    {
        // dd($driver); // driver = google
        try {
            $user = Socialite::driver($driver)->user();
            $create = User::firstOrCreate([
                'email' => $user->getEmail()
            ], [
                'socialite_name' => $driver,
                'socialite_id' => $user->getId(),
                'name' => $user->getName(),
                'avatar' => $user->getAvatar(),
                'email_verified_at' => now()
            ]);
            // dd($create);
            auth()->login($create, true);
            return redirect($this->redirectPath()); // todo /home
        } catch (\Exception $e) {
            dd('gagal sign in');
            return redirect()->route('login');
        }
    }
}
