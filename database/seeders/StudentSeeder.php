<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student')->insert([
            'matricule' => 54247,
            'first_name' => "Zakaria",
            'last_name' => "Bendaimi",
            'bloc' => 3,
            'section' => "G",
            'user_id' => 1
        ]);
        DB::table('student')->insert([
            'matricule' => 54895,
            'first_name' => "Ayoub",
            'last_name' => "Lahyaoui",
            'bloc' => 3,
            'section' => "G",
            'user_id' => 2
        ]);
        DB::table('student')->insert([
            'matricule' => 12345,
            'first_name' => "New",
            'last_name' => "Student",
            'bloc' => 1,
            'section' => "G",
            'user_id' => 3
        ]);
    }
}
