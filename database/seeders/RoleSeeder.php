<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    private $roleList = [
        'Admin',
        'Editor',
        'User'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::all();

        // Create Admin role
        $role = Role::updateOrCreate([
            'name' => $this->roleList[0],
        ]);
        $role->syncPermissions($permissions);

         // Create Editor role
        $role = Role::updateOrCreate([
            'name' => $this->roleList[1],
        ]);
        $editorPermissions = ['role-list', 'user-list'];
        $role->syncPermissions($editorPermissions);

         // Create User role
        $role = Role::updateOrCreate([
            'name' => $this->roleList[2],
        ]);

        $userPermissions = ['role-list', 'user-list'];
        $role->syncPermissions($userPermissions);
    }
}
