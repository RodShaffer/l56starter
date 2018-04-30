<?php

namespace L56S\Http\Controllers\Admin\Dashboard;

use L56S\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use L56S\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller {

    /**
     * Create a new controller instance
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user() && Auth::user()->hasRole(['admin', 'editor']))
        {
            $user_count = User::all()->count();
            $role_count = Role::all()->count();
            $permission_count = Permission::all()->count();

            return view('admin.dashboard.index', compact('user_count', 'role_count', 'permission_count'));

        }

        return view('admin.errors.401');

    }

}