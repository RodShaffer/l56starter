<?php

namespace L56S\Http\Controllers\Admin\Acl\User;

use L56S\User;
use L56S\State;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Events\Registered;
use L56S\Jobs\SendEmailAccountVerification;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use L56S\Http\Controllers\Controller;
use L56S\Http\Requests\Admin\Acl\User\StoreUserRequest;
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
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('user_index')) {
            $users = User::where('id', '>', 0)->paginate(10);
            return view('admin.acl.user.index', compact('users'));
        }
        return view('admin.errors.401');

    }

    /**
     * Display a listing of Users that have a specific role.
     *
     * @param \Spatie\Permission\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function searchByRole(Role $role)
    {
        if (Gate::allows('user_index')) {
            $users = User::role($role->name)->paginate(10);
            return view('admin.acl.user.search-by-role-results', compact('users', 'role'));
        }
        return view('admin.errors.401');
    }

    /**
     * Display a listing of Users that have a specific permission.
     *
     * @param \Spatie\Permission\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function searchByPermission(Permission $permission)
    {
        if (Gate::allows('user_index')) {
            $users = $permission->users()->get();
            return view('admin.acl.user.search-by-permission-results', compact('users', 'permission'));
        }
        return view('admin.errors.401');
    }

    /**
     * Show the user details.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if (Gate::allows('user_show')) {
            $permissions = Permission::all();
            return view('admin.acl.user.show', compact('user', 'permissions'));
        }
        return view('admin.errors.401');
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('user_create')) {
            $roles = Role::all();
            $permissions = Permission::all();
            return view('admin.acl.user.create', compact('roles', 'permissions'));
        }
        return view('admin.errors.401');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  StoreUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        if (Gate::allows('user_create')) {
            $user = User::create([
                'name' => $request->input('name'),
                'gravatar' => md5(strtolower(trim($request->input('email')))),
                'email' => strtolower($request->input('email')),
                'password' => bcrypt($request->input('password')),
                'email_token' => base64_encode($request->input('email')),
                'et_created_at' => Carbon::now()
            ]);
            event(new Registered($user));
            dispatch(new SendEmailAccountVerification($user));
            $roles = $request->input('roles') ? $request->input('roles') : [];
            $user->assignRole($roles);
            flash('User successfully created!', 'success');
            return redirect()->route('admin.user.index');
        }
        return view('admin.errors.401');
    }

    /**
     * Show the form for editing User.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (Gate::allows('user_edit')) {
            $roles = Role::all();
            $permissions = Permission::all();
            $states = State::all();
            return view('admin.acl.user.edit', compact('user', 'roles', 'permissions', 'states'));
        }
        return view('admin.errors.401');
    }

    /**
     * Update User in storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        if (Gate::allows('user_edit')) {
            $messages = [

                'name.required' => 'The name field is required',
                'postal_code.regex' => 'The postal code is invalid. Valid formats xxxxx OR xxxxx-xxxx',
                'phone_number.regex' => 'The phone number is invalid. Valid phone numbers must contain the area ' .
                    'code and cannot start with the number 1, must consist of 10 digits, and be in one of the ' .
                    'following 2 formats. xxxxxxxxxx OR (xxx) xxx-xxxx'

            ];

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

            if ($validator->fails()) {
                flash('Some of the form fields contain errors. Please correct the errors and try the ' .
                    'request again.', 'danger');
                return redirect(route('admin.user.edit', $user))
                    ->withErrors($validator)
                    ->withInput();
            }

            $user->name = Input::get('name');
            $user->address_one = Input::get('address_one');
            $user->address_two = Input::get('address_two');
            $user->city = Input::get('city');

            if (Input::get('state') != null) {
                $user->state = Input::get('state');
            } else {
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

                if ($user->hasRole('user')) {

                    $user->removeRole('user');

                }

                if (!$user->hasRole('unverified')) {

                    $user->assignRole('unverified');

                }

                flash('User profile was successfully saved!', 'success');

                return redirect('/verifyemail/resend/' . $user->id);

            }

            $user->save();

            if (! $user->hasRole('admin')) {

                $roles = Input::get('roles') ? Input::get('roles') : [];
                $user->syncRoles($roles);

            }

            $permissions = Input::get('direct_permissions') ? Input::get('direct_permissions') : [];
            $user->syncPermissions($permissions);


            flash('User successfully updated!', 'success');
            return redirect()->route('admin.user.index');
        }
        return view('admin.errors.401');
    }

    /**
     * Remove User from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('user_destroy')) {
            $user = User::findOrFail($id);
            $user->delete();
            flash('User successfully deleted!', 'success');
            return redirect()->route('admin.user.index');
        }

        return view('admin.errors.401');
    }

    /**
     * Mass remove Users from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function massDestroy()
    {
        if (Gate::allows('user_destroy')) {

            if (Input::has('selected_users')) {

                foreach (Input::get('selected_users') as $user) {
                    $user = User::findOrFail($user);
                    $user->delete();
                }

            }

            flash('All selected users successfully deleted!', 'success');
            return redirect()->route('admin.user.index');
        }
        return view('admin.errors.401');
    }

}
