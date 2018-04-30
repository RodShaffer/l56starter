<?php

namespace L56S\Http\Controllers\Member;

use L56S\Http\Controllers\Controller;
use L56S\User;
use L56S\State;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class UserController extends Controller
{

    /**
     * Create a new controller instance
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return Response
     */
    public function show(User $user)
    {
        if ( Auth::user() && (Auth::user()->hasRole('admin') || Auth::user()->id == $user->id) ) {

            if (Gate::allows('user_show') || Auth::user()->id == $user->id) {

                return view('member.show', compact('user'));

            }

        }

        return view('errors.401');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return Response
     */
    public function edit(User $user)
    {
        if ( Auth::user() && (Auth::user()->hasRole('admin') || Auth::user()->id == $user->id) ) {

            if (Gate::allows('user_edit') || Auth::user()->id == $user->id) {

                $states = State::all();

                return view('member.edit', compact('user', 'states'));

            }

        }

        return view('errors.401');
    }

    /**
     * Update the specified resource.
     *
     * @param  User $user
     * @return Response
     */
    public function update(User $user)
    {
        if ( Auth::user() && (Auth::user()->hasRole('admin') || Auth::user()->id == $user->id) ) {

            if (Gate::allows('user_edit') || Auth::user()->id == $user->id) {

                $messages = [

                    'name.required' => 'The name field is required',
                    'postal_code.regex' => 'The postal code is invalid. Valid formats xxxxx OR xxxxx-xxxx',
                    'phone_number.regex' => 'The phone number is invalid. Valid phone numbers must contain the area ' .
                        'code and cannot start with the number 1, must consist of 10 digits, and be in one of the ' .
                        'following 2 formats. xxxxxxxxxx OR (xxx) xxx-xxxx'

                ];

                if (Input::get('email') != null && $user->email != Input::get('email')) {

                    $validator = Validator::make(Input::all(), [

                        'name' => 'required|string',
                        'address_one' => 'nullable|string|max:40',
                        'address_two' => 'nullable|string|max:40',
                        'city' => 'nullable|string|max:30',
                        'state' => 'required|string|size:2',
                        'postal_code' => 'nullable|regex:/^([0-9]{5})(-[0-9]{4})?$/',
                        'phone_number' => array('nullable', 'regex:/^(\([2-9]{1}[0-9]{2}\)[\s{1}]([0-9]{3})[-]([0-9]{4}))|^([2-9]{1})([0-9]{2})([0-9]{3})([0-9]{4})$/'),
                        'phone_ext' => 'nullable|regex:/^[0-9]{1,5}$/',
                        'email' => 'required|string|email|max:255|unique:users'

                    ], $messages);

                }else {

                    $validator = Validator::make(Input::all(), [

                        'name' => 'required|string',
                        'address_one' => 'nullable|string|max:40',
                        'address_two' => 'nullable|string|max:40',
                        'city' => 'nullable|string|max:30',
                        'state' => 'required|string|size:2',
                        'postal_code' => 'nullable|regex:/^([0-9]{5})(-[0-9]{4})?$/',
                        'phone_number' => array('nullable', 'regex:/^(\([2-9]{1}[0-9]{2}\)[\s{1}]([0-9]{3})[-]([0-9]{4}))|^([2-9]{1})([0-9]{2})([0-9]{3})([0-9]{4})$/'),
                        'phone_ext' => 'nullable|regex:/^[0-9]{1,5}$/',

                    ], $messages);

                }

                if ($validator->fails()) {
                    flash('Some of the form fields contain errors. Please correct the errors and try the ' .
                        'request again.', 'danger');
                    return redirect(route('user.edit', $user))
                        ->withErrors($validator)
                        ->withInput();

                }

                $user->name = Input::get('name');
                $user->address_one = Input::get('address_one');
                $user->address_two = Input::get('address_two');
                $user->city = Input::get('city');

                if (Input::get('state') != null) {
                    $user->state = Input::get('state');
                }else {
                    $user->state = 'SS';
                }

                $user->postal_code = Input::get('postal_code');
                $user->phone_number = format_phone(Input::get('phone_number'));
                $user->phone_ext = Input::get('phone_ext');

                if (Input::get('email') != null && Input::get('email') != $user->email) {

                    $user->email = Input::get('email');
                    $user->verified = 0;
                    $user->email_token = base64_encode(Input::get('email'));
                    $user->et_created_at = Carbon::now();
                    $user->gravatar = null;

                    $user->save();

                    if($user->hasRole('user')) {

                        $user->removeRole('user');

                    }

                    if(! $user->hasRole('unverified')) {

                        $user->assignRole('unverified');

                    }

                    flash('User profile was successfully saved!', 'success');

                    return redirect('/verifyemail/resend/' . $user->id);

                }else {

                    $user->save();

                    flash('User profile was successfully saved!', 'success');

                    return view('member.show', compact('user'));

                }

            }

        }

        return view('errors.401');
    }

}