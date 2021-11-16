<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Course::factory()->count(50)->create();
        Course::truncate();
        CourseSeeder::seedDB();
        CourseSeeder::seedSection('G');
        CourseSeeder::seedSection('I');
        CourseSeeder::seedSection('R');
        CourseSeeder::seedSection('RI');
    }
    private static function seedSection($section)
    {
        $csv = array_map('str_getcsv', file(resource_path('data\\' . $section . '.csv')));

        foreach ($csv as $value) {
            $quadri = (int)$value[0][1];
            DB::table('course')->insert([
                'title' => $value[1],
                'description' => $value[2],
                'quadri' => $quadri,
                'credits' => (int) $value[3],
                'hours' => (int)$value[4],
                'bloc' => $quadri % 2 == 0 ? $quadri / 2 : (($quadri + 1) / 2)
            ]);
            if ($section == 'RI') {
                DB::table('course_section')->insert([
                    'course' => $value[1],
                    'section' => 'R',
                ]);
                DB::table('course_section')->insert([
                    'course' => $value[1],
                    'section' => 'I',
                ]);
            } else {
                DB::table('course_section')->insert([
                    'course' => $value[1],
                    'section' => $section,
                ]);
            }
        }
    }
    private static function seedDB()
    {
        $csv = array_map('str_getcsv', file(resource_path('data\\commun.csv')));

        foreach ($csv as $value) {
            $quadri = (int)$value[0][1];
            DB::table('course')->insert([
                'title' => $value[1],
                'description' => $value[2],
                'quadri' => $quadri,
                'credits' => (int)$value[3],
                'hours' => (int)$value[4],
                'bloc' => $quadri % 2 == 0 ? $quadri / 2 : (($quadri + 1) / 2)
            ]);
            DB::table('course_section')->insert([
                'course' => $value[1],
                'section' => "GIR",
            ]);
        }
    }
}