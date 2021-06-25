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
            'email' => 'correo2@correo.com',
            'password' => Hash::make('123456789'),
        ])->assignRole('Admin');

        User::insert([
            'name' => 'Jose',
            'email' => 'usuario2@correo.com',
            'password' => Hash::make('123456789'),
        ]);

        User::insert([
            'name' => 'pablo',
            'email' => 'correo2@correo.com',
            'password' => Hash::make('123456789'),
        ]);

    }
}
