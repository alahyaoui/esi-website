<?php

namespace Database\Seeders;

use App\Models\Section;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SectionSeeder::class,
            BlocSeeder::class,
            UserSeeder::class,
            StudentSeeder::class,
            CourseSeeder::class,
            ProgrammeSeeder::class,
            InscriptionSeeder::class
        ]);
    }
}