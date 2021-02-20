<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AutomovilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('automovil')->insert([
            'id_user' => '1',
            'id_marca' => '1',
            'submarca' => 'Lorem',
            'tipo' => 'Ipsum',
            'subtipo' => 'simply',
            'año' => '2020',
            'numero_serie' => '162359',
            'color' => '#FFFF',
            'placas' => 'PLACAS20',
            'kilometraje' => '1000',
        ]);

        DB::table('automovil')->insert([
            'id_user' => '1',
            'id_marca' => '2',
            'submarca' => 'Lorem2',
            'tipo' => 'Ipsum2',
            'subtipo' => 'simply2',
            'año' => '2020',
            'numero_serie' => '162359',
            'color' => '#FFFF',
            'placas' => 'PLACAS20',
            'kilometraje' => '2000',
        ]);

         DB::table('automovil')->insert([
            'id_user' => '2',
            'id_marca' => '3',
            'submarca' => 'Lorem3',
            'tipo' => 'Ipsum3',
            'subtipo' => 'simply3',
            'año' => '2021',
            'numero_serie' => '162359',
            'color' => '#FFFF',
            'placas' => 'PLACAS21',
            'kilometraje' => '3000',
        ]);

        DB::table('automovil')->insert([
            'id_user' => '2',
            'id_marca' => '1',
            'submarca' => 'Lorem4',
            'tipo' => 'Ipsum4',
            'subtipo' => 'simply3',
            'año' => '2021',
            'numero_serie' => '162359',
            'color' => '#FFFF',
            'placas' => 'PLACAS21',
            'kilometraje' => '4000',
        ]);
    }
}
