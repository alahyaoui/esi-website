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
            'student_matricule' => 54247,
        ]);

        DB::table('inscriptions')->insert([
            'student_matricule' => 54985,
        ]);
    }
}
