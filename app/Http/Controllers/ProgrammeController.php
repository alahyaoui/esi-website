<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Business\PAE;

class ProgrammeController extends Controller
{

    //When student is created
    public function initStudentBulletin($student_matricule)
    {
        $section = DB::table('student')
            ->select('section')
            ->where('matricule', '=', $student_matricule)
            ->get()[0];


        $courses = DB::table('course_section')
            ->select('course')
            ->where('section', '=', $section)
            ->get();

        for ($i = 0; $i < sizeof($courses); $i++) {
            $is_accessible = false;
            if ($this->getBloc($courses[$i]) == 1) {
                $is_accessible = true;
            }

            DB::table('programme')
                ->insert([
                    'student' => $student_matricule,
                    'course' => $courses,
                    'cote' => 0,
                    'is_accessible' => $is_accessible,
                ]);
        }
    }

    private function getBloc($course_title)
    {
        return DB::table('course')->select('bloc')->where('title', '=', $course_title)->get()[0];
    }


    //Each year
    private function updateStudentBulletin($matricule)
    {
        $pae = new PAE();
        $courses_graph = $pae->get_graph();


        $courses =  DB::table('programme')
            ->select('course, is_accessible, is_validated')
            ->where('student', '=', $matricule)
            ->get();

        foreach ($courses as $course) {
            $title = $course["course"];
            $is_validated = $course["is_validated"];

            if ($is_validated) {
                DB::table('programme')
                    ->where('course', '=', $title)
                    ->update(['is_accessible' => false]);
            } else {
                //Current course
                $is_accessible = true;

                //Prerequis
                $prerequis = $courses_graph[$title]->getPrerequis();
                $is_accessible = $this->isAllPrerequisValidated($prerequis);


                //Corequis
                if ($is_accessible) {
                    $corequis = $courses_graph[$title]->getCorequis();
                    $is_accessible = $this->isAllCorequisAccessible($prerequis);
                }

                //Update Course
                if ($is_accessible) {
                    DB::table('programme')
                        ->where('student', '=', $matricule)
                        ->where('course', '=', $title)
                        ->update(['is_accessible' => true]);
                }
            }
        }
    }

    private function isValidated($course_title)
    {
        return DB::table('course')->select('is_validated')->where('title', '=', $course_title)->get()[0];
    }

    private function isAccessible($course_title)
    {
        return DB::table('course')->select('is_accessible')->where('title', '=', $course_title)->get()[0];
    }

    private function isAllPrerequisValidated($prerequis)
    {
        $are_all_validated = true;
        foreach ($prerequis as $prerequi) {
            if (!$this->isValidated($prerequi)) {
                $are_all_validated = false;
            }
        }
        return $are_all_validated;
    }

    private function isAllCorequisAccessible($corequis)
    {
        $are_all_accessible = true;
        foreach ($corequis as $corequi) {
            if (!$this->isAccessible($corequi)) {
                $are_all_accessible = false;
            }
        }
        return $are_all_accessible;
    }


    public function getStudentBulletin($user_id)
    {
        $matricule = DB::table('student')
            ->select('matricule')
            ->where('user_id', '=', $user_id)
            ->get()[0]
            ->matricule;

        //On ne devrait pas faie ça ici mais plutot dans l'import des bulletins par le secretariat.
        $this->updateStudentBulletin($matricule);

        $programme = DB::table('programme')
            ->join('course', 'programme.course', '=', 'course.title')
            ->select(
                'programme.*',
                'course.description as courseDesc',
                'course.credits as courseCredits',
                'course.quadri as courseQuadri',
                'course.hours as courseHours'
            )
            ->where('programme.student', '=', $matricule)
            ->get();
        return response()->json($programme);
    }
}