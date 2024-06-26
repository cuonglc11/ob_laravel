<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    protected function attemptLogin(Request $request)
    {
        $nameOrEmail = $request->input('email');
        $password = $request->input('password');
        $isEmail = filter_var($nameOrEmail, FILTER_VALIDATE_EMAIL);
        $credentials = [
            $isEmail ? 'email' : 'name' => $nameOrEmail,
            'password' => $password,
        ];

        if (filter_var($nameOrEmail, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $nameOrEmail;
        } else {
            $credentials['name'] = $nameOrEmail;
        }

        return Auth::attempt($credentials, $request->filled('remember'));
    }

}
