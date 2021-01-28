<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\User;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  /**      $permission_array = [];
        array_push($permission_array, Permission::create(['name' => 'create_user']));
        array_push($permission_array, Permission::create(['name' => 'edit_user']));
        array_push($permission_array, Permission::create(['name' => 'delete_user']));
        $ViewUser = Permission::create(['name' => 'view_user']);
        array_push($permission_array, $ViewUser);
        $superAdminRole = Role::create(['name' => 'super_admin']);
        $superAdminRole->syncPermissions($permission_array);
        $users = Role::create(['name' => 'users']);
        $users->givePermissionsTo($ViewUser);

        $superAdminRole = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ]);
        $superAdminRole->assignRole('super_admin');

        $users = User::create([
            'name' => 'admin',
            'email' => 'user@user.com',
            'password' => Hash::make('user'),
        ]);
        $users->assignRole('user');  */
    }
}
