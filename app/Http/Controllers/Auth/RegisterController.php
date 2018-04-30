<?php

namespace L56S\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use L56S\User;
use L56S\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use L56S\Jobs\SendEmailAccountVerification;
use L56S\Jobs\ResendEmailAccountVerification;
use Carbon\Carbon;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['verify', 'resend']]);
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
            'name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \CGBG\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'gravatar' => md5( strtolower( trim( $data['email'] ) ) ),
            'email' => strtolower( trim($data['email']) ),
            'password' => bcrypt($data['password']),
            'email_token' => base64_encode($data['email']),
            'et_created_at' => Carbon::now(),
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        dispatch(new SendEmailAccountVerification($user));
        $user->assignRole('unverified');

        return view('auth.registration.confirmation');
    }

    /**
     * Verifiy a registration token.
     *
     * @param $token
     * @return \Illuminate\Http\Response
     */
    public function verify($token)
    {
        $user = User::where('email_token',$token)->first();

        if ($user != null) {

            $date_now = Carbon::now();

            $et_token_time = Carbon::parse($user->et_created_at)->addDays(3);

            if ($et_token_time->gt($date_now)) {

                $user->verified = 1;
                $user->email_token = null;
                $user->et_created_at = null;
                $user->gravatar = md5( strtolower( trim( $user->email ) ) );

                if ($user->save()) {

                    if($user->hasRole('unverified')) {

                        $user->removeRole('unverified');

                    }

                    if(! $user->hasRole('user')) {

                        $user->assignRole('user');

                    }

                    return view('member.verify.account.confirmation', ['user' => $user]);

                }

            } else {

                $user->email_token = null;
                $user->et_created_at = null;
                return view('member.verify.account.token-expired', ['user' => $user]);

            }

        }

        // Token is invalid
        return view('member.verify.account.token-invalid');

    }

    /**
     * Resend a registration request.
     *
     * @param $id user's id
     * @return \Illuminate\Http\Response
     */
    public function resend($id)
    {
        if (Auth::guest()) {

            return view('errors.401');

        }else {

            if ( Auth::user() && (Auth::user()->hasRole('admin') || Auth::user()->id == $id) ) {

                $user = User::findOrFail($id);

                if ($user->verified) {

                    return view('member.verify.account.already-verified');

                }else {

                    $user->email_token = base64_encode($user->email);
                    $user->et_created_at = Carbon::now();
                    $user->gravatar = null;

                    $user->saveOrFail();

                    if($user->hasRole('user')) {

                        $user->removeRole('user');

                    }

                    if(! $user->hasRole('unverified')) {

                        $user->assignRole('unverified');

                    }

                    dispatch(new ResendEmailAccountVerification($user));

                    return view('member.verify.account.resend-verification');

                }

            }else {

                return view('errors.401');

            }

        }
    }

}
