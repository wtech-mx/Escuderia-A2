<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Juan',
            'email' => 'usuario@correo.com',
            'password' => Hash::make('123456789'),
        ]);

        User::insert([
            'name' => 'Jose',
            'email' => 'empresa@correo.com',
            'role' => 2,
            'empresa' => 1,
            'password' => Hash::make('123456789'),
        ]);

        User::insert([
            'name' => 'pablo',
            'email' => 'correo2@correo.com',
            'role' => 1,
            'password' => Hash::make('123456789'),
        ]);

    }
}
