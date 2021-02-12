<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class MarcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marca')->insert([
            'nombre' => 'Audi',
        ]);

        DB::table('marca')->insert([
            'nombre' => 'BMW',
        ]);

        DB::table('marca')->insert([
            'nombre' => 'Ferrari',
        ]);
    }
}
