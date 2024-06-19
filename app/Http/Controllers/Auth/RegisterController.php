<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';
    protected $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255',  'regex:/^[a-zA-Z]+$/' ,'unique:users'] ,
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function register(Request $request)
    {
        $data = $request->all();

        if (isset($data['ref']) && !empty($data['ref'])) {
            $refUser = User::where('name', $data['ref'])->where('status', 1)->first();
            if (!$refUser) {
                return redirect()->back()->withErrors(['ref' => 'The user does not exist.'])->withInput();
            }
            $this->user = $refUser;
        }

        $validator = $this->validator($data);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = $this->create($data);
        // $this->guard()->login($user);

        return redirect('/login')->with('success', 'Registration successful. Please login.');

    }
    protected function create(array $data)
    {
        if($data['ref']) {
                if($this->user != null) {
                    return User::create([
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'password' => Hash::make($data['password']),
                        'parent_id' => $this->user->id,
                        'line_tree' => $this->user->line_tree.$this->user->id.',',
                        'level' => $this->user->level + 1

                    ]);
                }
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    protected function guard()
    {
        return auth()->guard();
    }

    protected function redirectTo()
    {
        return '/login';
    }
}
