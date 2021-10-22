<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CourseSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = Course::all();
        if ($courses != null) {
            foreach ($courses as $course) {
                $rand = rand(0, 2);
                DB::table('course_section')->insert([
                    'course' => $course->title,
                    'section' => $rand == 1 ? 'G' : ($rand == 0 ? 'R' : 'I'),
                ]);
            }
        }
    }
}