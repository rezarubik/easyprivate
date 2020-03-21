<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
        $this->middleware('guest')->except('logout');
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
     * Handle callback yang membawa data dari proses otentikasi pada platform google
     *
     * @return void
     */
    public function handleProviderCallback($driver)
    {
        // dd($driver);
        try {
            $user = Socialite::driver($driver)->user();
            // dd($user->email);
            $guru = 'rezarubik17@gmail.com';
            $create = User::firstOrCreate([
                'email' => $user->getEmail()
            ], [
                'socialite_name' => $driver,
                'socialite_id' => $user->getId(),
                'name' => $user->getName(),
                'avatar' => $user->getAvatar(),
                'email_verified_at' => now()
            ]);

            auth()->login($create, true);
            if ($user->email == $guru) {
                // dd($this);
                return redirect('user/mentor-dashboard');
            } else {
                return redirect($this->redirectPath());
            }
        } catch (\Exception $e) {
            return redirect()->route('login');
        }
    }
}
