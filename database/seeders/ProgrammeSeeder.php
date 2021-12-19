<?php

namespace Database\Seeders;

use App\Http\Controllers\ProgrammeController;
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
        ProgrammeController::initStudentBulletin("12345");
        ProgrammeController::importStudentsBulletin("studentsBulletin");
    }
}
