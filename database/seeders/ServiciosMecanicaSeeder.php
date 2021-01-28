<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiciosMecanicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servicios_mecanica')->insert([
            'nombre' => 'Llantas',
        ]);

        DB::table('servicios_mecanica')->insert([
            'nombre' => 'Banda',
        ]);

        DB::table('servicios_mecanica')->insert([
            'nombre' => 'Frenos',
        ]);

        DB::table('servicios_mecanica')->insert([
            'nombre' => 'Aceite',
        ]);

        DB::table('servicios_mecanica')->insert([
            'nombre' => 'Afinacion',
        ]);

        DB::table('servicios_mecanica')->insert([
            'nombre' => 'Amortiguadores',
        ]);

        DB::table('servicios_mecanica')->insert([
            'nombre' => 'Bateria',
        ]);
    }
}
