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
        $csv = array_map('str_getcsv', file(resource_path('data\\cours.csv')));
        Course::truncate();
        foreach ($csv as $value) {
            $quadri = (int)$value[0][1];
            DB::table('course')->insert([
                'title' => $value[1],
                'description' => $value[2],
                'quadri' => $quadri,
                'credits' => (int) $value[3],
                'bloc' => $quadri % 2 == 0 ? $quadri / 2 : (($quadri + 1) / 2)
            ]);
        }
    }
}