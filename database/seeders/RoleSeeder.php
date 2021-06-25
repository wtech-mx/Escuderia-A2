<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'User']);
        $role3 = Role::create(['name' => 'Empresa']);

        Permission::create(['name' => 'index_admin.user'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'create_admin.user'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'edit_admin.user'])->assignRole($role1);

        Permission::create(['name' => 'index_admin.automovil'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'create_admin.automovil'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'edit_admin.automovil'])->assignRole($role1);

    }
}
