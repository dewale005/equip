<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request as Requests;
use Illuminate\Support\Facades\Request;


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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm(Requests $request)
    {
        if ($request->has('ref')) {
            session(['referrer' => $request->query('ref')]);
        }

        return view('auth.register');
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:11', 'min:11', 'unique:users'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users'],
            'terms' => ['required'],
            'gender' => ['required'],
            'state' => ['required'],
            'password' => ['required', 'string', 'min:8',],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $referrer = User::wherePhoneNumber(hexdec(session()->pull('referrer')))->first();


        // $message = 'Ops, Something went wrong!!';
        // dd($referrer);
        // return User::create([
        //     'first_name' => $data['first_name'],
        //     'last_name' => $data['last_name'],
        //     'phone_number' => $data['phone_number'],
        //     'email' => $data['email'],
        //     'gender' => $data['gender'],
        //     'state' => $data['state'],
        //     'referred_by' =>  $referrer && $referrer != null ? $referrer->id : null,
        //     'password' => Hash::make($data['password']),
        // ]);

        // if ($user != null) {
        //     $message = 'Thank you for joining the whitefield foundation training. Please check your email for verification link';
        //     MailController::sendRegisteraEmail($user->email, $user->first_name, $user->last_name, $user->verification_code);
        //     return redirect()->back()->with(session()->flash('alert-success', $message));
        // }
        // return redirect()->back()->with(session()->flash('alert-danger', $message));
    }

    public function verify(Request $request)
    {
        $message = 'Invalid verification link. Please check your email to confirm.';
        $verificated_code = Request::get('code');
        $user = User::where(['verification_code' => $verificated_code])->first();

        if ($user != null) {
            $message = "$user->first_name your account has been verified successfuly you can participate in online training";
            $user->is_verified = true;
            $user->save();
            return redirect()->route('login')->with(session()->flash('alert-success', $message));
        }
        return redirect()->route('login')->with(session()->flash('alert-danger', $message));
    }
}
