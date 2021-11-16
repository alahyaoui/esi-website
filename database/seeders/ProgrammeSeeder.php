<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProgrammeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $courses = DB::select('select * from course_section where section like \'G%\'');
        if ($courses != null) {
            foreach ($courses as $course) {
                $rand = rand(0, 1);
                DB::table('programme')->insert([
                    'student' => 54247,
                    'course' => $course->course,
                    'is_validated' => $rand == 1,
                    'cote' => $rand == 1 ? rand(0, 20) : 0
                ]);
            }
        }
    }
}