<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bloc')->insert([
            'bloc' => 1
        ]);
        DB::table('bloc')->insert([
            'bloc' => 2
        ]);
        DB::table('bloc')->insert([
            'bloc' => 3
        ]);
    }
}