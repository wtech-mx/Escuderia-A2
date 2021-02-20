<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SeguroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seguros')->insert([
            'id_user' => '1',
            'current_auto' => '1',
            'seguro' => 'gnp',
            'costo' => '10',
            'costo_anual' => '1000',
        ]);

        DB::table('seguros')->insert([
            'id_user' => '1',
            'current_auto' => '2',
            'seguro' => 'gnp',
            'costo' => '10',
            'costo_anual' => '1000',
        ]);

        DB::table('seguros')->insert([
            'id_user' => '1',
            'current_auto' => '3',
            'seguro' => 'gnp',
            'costo' => '10',
            'costo_anual' => '1000',
        ]);

        DB::table('seguros')->insert([
            'id_user' => '1',
            'current_auto' => '4',
            'seguro' => 'gnp',
            'costo' => '10',
            'costo_anual' => '1000',
        ]);
    }
}
