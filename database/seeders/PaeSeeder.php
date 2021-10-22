<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $courses = DB::select('select * from course_section where section = ?', ['G']);
        if ($courses != null) {
            foreach ($courses as $course) {
                DB::table('pae')->insert([
                    'student' => 54247,
                    'course' => $course->course,
                    'is_validated' => rand(0, 1) == 1,
                ]);
            }
        }
    }
}