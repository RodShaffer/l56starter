<?php

namespace L56S\Http\Controllers\Admin\Acl\Role;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Input;
use L56S\Http\Controllers\Controller;
use L56S\Http\Requests\Admin\Acl\Role\StoreRoleRequest;
use L56S\Http\Requests\Admin\Acl\Role\UpdateRoleRequest;

/**
 * Class RolesController
 * @package CGBG\Http\Controllers\Admin\Acl\Role
 */
class RoleController extends Controller
{
    /**
     * Create a new controller instance
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::allows('role_index'))
        {
            $roles = Role::where('id', '>', 0)->paginate(10);
            return view('admin.acl.role.index', compact('roles'));
        }
        return view('admin.errors.401');
    }

    /**
     * Display a listing of all Roles a specific permission is assigned to.
     *
     * @param \Spatie\Permission\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function searchByPermission(Permission $permission)
    {
        if (Gate::allows('role_index')) {
            $roles = $permission->roles;
            return view('admin.acl.role.search-by-permission-results', compact('roles', 'permission'));
        }
        return view('admin.errors.401');
    }

    /**
     * Show the Role details.
     *
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        if(Gate::allows('role_show'))
        {
            return view('admin.acl.role.show', compact('role'));
        }
        return view('admin.errors.401');
    }

    /**
     * Show the form for creating new Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::allows('role_create'))
        {
            $permissions = Permission::all();
            return view('admin.acl.role.create', compact('permissions'));
        }
        return view('admin.errors.401');
    }

    /**
     * Store a newly created Role.
     *
     * @param  StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        if(Gate::allows('role_create'))
        {
            $role = Role::create($request->except('permissions'));
            $permissions = $request->input('permissions') ? $request->input('permissions') : [];
            $role->givePermissionTo($permissions);
            flash('Role successfully created!', 'success');
            return redirect()->route('admin.role.index');
        }
        return view('admin.errors.401');
    }

    /**
     * Show the form for editing Role.
     *
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        if(Gate::allows('role_edit'))
        {
            $permissions = Permission::all();
            return view('admin.acl.role.edit', compact('role', 'permissions'));
        }
        return view('admin.errors.401');
    }

    /**
     * Update Role in storage.
     *
     * @param  UpdateRoleRequest  $request
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        if(Gate::allows('role_edit'))
        {
            $role->update($request->except('permissions'));
            $permissions = $request->input('permissions') ? $request->input('permissions') : [];
            $role->syncPermissions($permissions);
            flash('Role successfully updated!', 'success');
            return redirect()->route('admin.role.index');
        }
        return view('admin.errors.401');
    }

    /**
     * Remove Role from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('role_destroy')) {
            $role = Role::findOrFail($id);
            $role->delete();
            flash('Role successfully deleted!', 'success');
            return redirect()->route('admin.role.index');
        }
        return view('admin.errors.401');
    }

    /**
     * Mass remove Roles from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function massDestroy()
    {
        if (Gate::allows('role_destroy')) {

            if(Input::has('selected_roles')) {

                foreach (Input::get('selected_roles') as $role) {
                    $selected_role = Role::findOrFail($role);
                    $selected_role->delete();
                }

            }

            flash('All selected roles successfully deleted!', 'success');
            return redirect()->route('admin.role.index');
        }
        return view('admin.errors.401');
    }

}
