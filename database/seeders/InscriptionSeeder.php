<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inscriptions')->insert([
            'user_id' => 1,
            'state' => 'V',
        ]);
        DB::table('inscriptions')->insert([
            'user_id' => 2,
            'state' => 'V',
        ]);
        DB::table('inscriptions')->insert([
            'user_id' => 3,
            'state' => 'V',
        ]);
    }
}
