<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\RolePermissions;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class RoleController extends Controller
{
    public function index_role()
    {
        $role = DB::table('roles')
            ->get();

        $role_permiso = DB::table('role_has_permissions')
            ->get();

        return view('admin.permisos.view-role', compact('role', 'role_permiso'));
    }

    public function create_role()
    {
        $role = DB::table('roles')
            ->get();

        $role_permiso = DB::table('permissions')
            ->get();

        return view('admin.permisos.create-role', compact('role', 'role_permiso'));
    }

    public function store_role(Request $request)
    {
        $validate = $this->validate($request, [
            'name' => 'required|string|max:191',
        ]);

        $role = new Role;
        $role->name = $request->get('name');
        $role->guard_name = 'web';
        $role->save();


        $permissions = $request->input('permission');
        $roles = $role->id;
        foreach($permissions as $permissions){
            $permissions_role = new RolePermissions;
            $sundaysArray = $permissions;
            $permissions_role->permission_id = $sundaysArray;
            $permissions_role->role_id = $roles;
            $permissions_role->save();
        }

        Session::flash('success', 'Se ha cread su role con exito');
        return redirect()->route('index_role.role');
    }

    public function edit_role($id)
    {
        $role = Role::findOrFail($id);

        $role_permiso = DB::table('permissions')
            ->get();

        return view('admin.permisos.edit-role', compact('role', 'role_permiso'));
    }

    public function update_role(Request $request, $id)
    {

        $user = User::findOrFail($id);

        $user->name = $request->get('name');
        $user->telefono = $request->get('telefono');
        $user->email = $request->get('email');
        $user->update();

        Session::flash('success', 'Se ha actualizado sus datos con exito');

        return redirect()->route('index_admin.user');
    }
}
