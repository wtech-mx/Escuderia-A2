<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::create(['name' => 'Ver Calendario']);
        Permission::create(['name' => 'Crear Alerta']);
        Permission::create(['name' => 'Editar Alerta']);
        Permission::create(['name' => 'Eliminar Alerta']);

        Permission::create(['name' => 'Ver Usuario']);
        Permission::create(['name' => 'Crear Usuario']);
        Permission::create(['name' => 'Editar Usuario']);

        Permission::create(['name' => 'Ver Automovil']);
        Permission::create(['name' => 'Crear Automovil']);
        Permission::create(['name' => 'Edit Automovil']);

        Permission::create(['name' => 'Ver Servicios']);
        Permission::create(['name' => 'Crear Servicios']);

        Permission::create(['name' => 'Ver Tarjeta de Circulacion']);
        Permission::create(['name' => 'Editar Tarjeta de Circulacion']);

        Permission::create(['name' => 'Ver Expedientes Fisicos']);
        Permission::create(['name' => 'Agregar Expedientes Fisicos']);
        Permission::create(['name' => 'Borrar Expedientes Fisicos']);

        Permission::create(['name' => 'Ver Seguro']);
        Permission::create(['name' => 'Editar Seguro']);

        Permission::create(['name' => 'Ver Empresas']);
        Permission::create(['name' => 'Crear Empresas']);
        Permission::create(['name' => 'Editar Empresas']);

        Permission::create(['name' => 'Ver Verificacion']);
        Permission::create(['name' => 'Editar Verificacion']);

        Permission::create(['name' => 'Ver Licencia de Conducir']);
        Permission::create(['name' => 'Editar Licencia de Conducir']);

        Permission::create(['name' => 'Ver Notas']);
        Permission::create(['name' => 'Crear Notas']);
        Permission::create(['name' => 'Editar Notas']);
        Permission::create(['name' => 'Eliminar Notas']);

        Permission::create(['name' => 'Ver Cupones']);
        Permission::create(['name' => 'Crear Cupones']);
        Permission::create(['name' => 'Editar Cupones']);
        Permission::create(['name' => 'Eliminar Cupones']);
        Permission::create(['name' => 'Asignar Usuarios Cupones']);
        Permission::create(['name' => 'Cambiar Estados Cupones']);
        Permission::create(['name' => 'Check en Usuarios Cupones']);

        Permission::create(['name' => 'Crear Roles y Permisos']);
    }
}
