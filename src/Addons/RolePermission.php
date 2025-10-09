<?php

namespace SmartCode\TurboKit\Addons;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermission
{
    /**
     * Create a role if it does not exist
     */
    public static function createRole(string $roleName)
    {
        return Role::firstOrCreate(['name' => $roleName]);
    }

    /**
     * Create a permission if it does not exist
     */
    public static function createPermission(string $permissionName)
    {
        return Permission::firstOrCreate(['name' => $permissionName]);
    }

    /**
     * Assign a permission to a role
     */
    public static function assignPermissionToRole(string $roleName, string $permissionName)
    {
        $role = Role::firstOrCreate(['name' => $roleName]);
        $permission = Permission::firstOrCreate(['name' => $permissionName]);
        $role->givePermissionTo($permission);
    }

    /**
     * Assign a role to a user
     */
    public static function assignRoleToUser($user, string $roleName)
    {
        $role = Role::firstOrCreate(['name' => $roleName]);
        $user->assignRole($role);
    }
}
 
