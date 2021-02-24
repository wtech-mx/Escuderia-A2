<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MarcaProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrays = range(0,10);
        foreach ($arrays as $valor) {
	        DB::table('marca_product')->insert([
	             'nombre' => Str::random(10),
	        ]);
        }

    }
}
