<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('section')->insert([
            'section' => 'G'
        ]);
        DB::table('section')->insert([
            'section' => 'I'
        ]);
        DB::table('section')->insert([
            'section' => 'R'
        ]);
        DB::table('section')->insert([
            'section' => 'GIR'
        ]);
    }
}