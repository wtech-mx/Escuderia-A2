<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Juan',
            'email' => 'correo@correo.com',
            'role' => '0',
            'password' => Hash::make('123456789'),
        ]);

        DB::table('users')->insert([
            'name' => 'pablo',
            'email' => 'correo2@correo.com',
            'role' => '1',
            'password' => Hash::make('123456789'),
        ]);
    }
}
