<?php

namespace L56S\Http\Controllers\Admin\Acl\Permission;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Input;
use L56S\Http\Controllers\Controller;
use L56S\Http\Requests\Admin\Acl\Permission\StorePermissionRequest;
use L56S\Http\Requests\Admin\Acl\Permission\UpdatePermissionRequest;

class PermissionController extends Controller
{
    /**
     * Create a new controller instance
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of Permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('permission_index')) {
            $permissions = Permission::paginate(10);
            return view('admin.acl.permission.index', compact('permissions'));
        }
        return view('admin.errors.401');

    }

    /**
     * Display a listing of all Permissions a specific role has.
     *
     * @param \Spatie\Permission\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function searchByRole(Role $role)
    {
        if (Gate::allows('permission_index')) {
            $permissions = $role->permissions;
            return view('admin.acl.permission.search-by-role-results', compact('permissions', 'role'));
        }
        return view('admin.errors.401');
    }

    /**
     * Show the permission details.
     *
     * @param  Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        if (Gate::allows('permission_show')) {
            return view('admin.acl.permission.show', compact('permission'));
        }
        return view('admin.errors.401');
    }

    /**
     * Show the form for creating new Permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('permission_create')) {
            return view('admin.acl.permission.create');
        }
        return view('admin.errors.401');
    }

    /**
     * Store a newly created Permission in storage.
     *
     * @param  StorePermissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionRequest $request)
    {
        if (Gate::allows('permission_create')) {
            Permission::create($request->all());
            flash('Permission successfully created!', 'success');
            return redirect()->route('admin.permission.index');
        }
        return view('admin.errors.401');
    }

    /**
     * Show the form for editing Permission.
     *
     * @param  Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        if (Gate::allows('permission_edit')) {
            return view('admin.acl.permission.edit', compact('permission'));
        }
        return view('admin.errors.401');
    }

    /**
     * Update Permission in storage.
     *
     * @param  UpdatePermissionRequest  $request
     * @param  Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        if (Gate::allows('permission_edit')) {
            $permission->update($request->all());
            flash('Permission successfully updated!', 'success');
            return redirect()->route('admin.permission.index');
        }
        return view('admin.errors.401');
    }

    /**
     * Remove Permission from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('permission_destroy')) {
            $permission = Permission::findOrFail($id);
            $permission->delete();
            flash('Permission successfully deleted!', 'success');
            return redirect()->route('admin.permission.index');
        }
        return view('admin.errors.401');
    }

    /**
     * Mass remove Permissions from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function massDestroy()
    {
        if (Gate::allows('permission_destroy')) {

            if(Input::has('selected_permissions')) {

                foreach (Input::get('selected_permissions') as $permission) {
                    $selected_permission = Permission::findOrFail($permission);
                    $selected_permission->delete();
                }

            }

            flash('All selected permissions successfully deleted!', 'success');
            return redirect()->route('admin.permission.index');
        }
        return view('admin.errors.401');
    }

}
