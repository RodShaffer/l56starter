<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        $role_admin = Role::create(['name' => 'admin']);
        $role_user = Role::create(['name' => 'user']);
        $role_unverified = Role::create(['name' => 'unverified']);

        // Roles
        $permission = Permission::create(['name' => 'role_index']);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'role_show']);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'role_create']);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'role_edit']);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'role_destroy']);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'role_assign']);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'role_revoke']);
        $role_admin->givePermissionTo($permission);

        // Permissions
        $permission = Permission::create(['name' => 'permission_index']);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'permission_show']);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'permission_create']);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'permission_edit']);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'permission_destroy']);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'permission_assign']);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'permission_revoke']);
        $role_admin->givePermissionTo($permission);

        // Users
        $permission = Permission::create(['name' => 'user_index']);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'user_show']);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'user_create']);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'user_edit']);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'user_destroy']);
        $role_admin->givePermissionTo($permission);

    }
}