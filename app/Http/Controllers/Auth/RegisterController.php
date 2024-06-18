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
            $refUser = User::where('name', $data['ref'])->first();
            if (!$refUser) {
                return redirect()->back()->withErrors(['ref' => 'The user does not exist.'])->withInput();
            }
        }

        $validator = $this->validator($data);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = $this->create($data);
        $this->guard()->login($user);

        return redirect($this->redirectPath());
    }
    protected function create(array $data)
    {
        if($data['ref']) {
            $user = User::where('name' ,$data['ref'])->first();
                if($user != null) {
                    return User::create([
                        'name' => strtolower(str_replace(' ' ,'' , removeVietnameseAccents($data['name']))),
                        'email' => $data['email'],
                        'password' => Hash::make($data['password']),
                        'parent_id' => $user->id,
                        'line_tree' => $user->line_tree.$user->id.',',
                        'level' => $user->level + 1

                    ]);
                }
        }
        return User::create([
            'name' => strtolower(str_replace(' ' ,'' , removeVietnameseAccents($data['name']))),
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
function removeVietnameseAccents($str) {
    $accents = array(
        'a' => ['á', 'à', 'ả', 'ã', 'ạ', 'ă', 'ắ', 'ằ', 'ẳ', 'ẵ', 'ặ', 'â', 'ấ', 'ầ', 'ẩ', 'ẫ', 'ậ'],
        'A' => ['Á', 'À', 'Ả', 'Ã', 'Ạ', 'Ă', 'Ắ', 'Ằ', 'Ẳ', 'Ẵ', 'Ặ', 'Â', 'Ấ', 'Ầ', 'Ẩ', 'Ẫ', 'Ậ'],
        'e' => ['é', 'è', 'ẻ', 'ẽ', 'ẹ', 'ê', 'ế', 'ề', 'ể', 'ễ', 'ệ'],
        'E' => ['É', 'È', 'Ẻ', 'Ẽ', 'Ẹ', 'Ê', 'Ế', 'Ề', 'Ể', 'Ễ', 'Ệ'],
        'i' => ['í', 'ì', 'ỉ', 'ĩ', 'ị'],
        'I' => ['Í', 'Ì', 'Ỉ', 'Ĩ', 'Ị'],
        'o' => ['ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ố', 'ồ', 'ổ', 'ỗ', 'ộ', 'ơ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ'],
        'O' => ['Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ố', 'Ồ', 'Ổ', 'Ỗ', 'Ộ', 'Ơ', 'Ớ', 'Ờ', 'Ở', 'Ỡ', 'Ợ'],
        'u' => ['ú', 'ù', 'ủ', 'ũ', 'ụ', 'ư', 'ứ', 'ừ', 'ử', 'ữ', 'ự'],
        'U' => ['Ú', 'Ù', 'Ủ', 'Ũ', 'Ụ', 'Ư', 'Ứ', 'Ừ', 'Ử', 'Ữ', 'Ự'],
        'y' => ['ý', 'ỳ', 'ỷ', 'ỹ', 'ỵ'],
        'Y' => ['Ý', 'Ỳ', 'Ỷ', 'Ỹ', 'Ỵ'],
        'd' => ['đ'],
        'D' => ['Đ']
    );

    foreach ($accents as $nonAccent => $accentedChars) {
        $str = str_replace($accentedChars, $nonAccent, $str);
    }

    return $str;
}
