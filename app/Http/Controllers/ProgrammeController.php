<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Business\PAE;

class ProgrammeController extends Controller
{

    private $user_id;

    public function __construct()
    {
        $this->user_id = 0;
    }


    //When student is created

    /**
     * Construit un bulletin initiale pour les primo-inscris
     */
    public static function initStudentBulletin($student_matricule)
    {
        $section = DB::table('student')
            ->select('section')
            ->where('matricule', '=', $student_matricule)
            ->get()[0]->section;


        $courses = DB::table('course_section')
            ->select('course')
            ->where('section', '=', $section)
            ->orWhere('section', '=', 'GIR')
            ->get();

        for ($i = 0; $i < sizeof($courses); $i++) {
            $course_title = $courses[$i]->course;
            $bloc = ProgrammeController::getBloc($course_title);
            $is_accessible = $bloc == 1;

            DB::table('programme')
                ->insert([
                    'student' => $student_matricule,
                    'course' => $course_title,
                    'cote' => 0,
                    'is_accessible' => $is_accessible,
                ]);
        }
    }

    /**
     * Retourne le numéro du bloc du cours
     */
    private static function getBloc($course_title)
    {
        return DB::table('course')
            ->select('bloc')
            ->where('title', '=', $course_title)
            ->get()[0]->bloc;
    }


    //Each year

    /**
     * Construit le bulletin d'un étudiant
     */
    private static function updateStudentBulletin($matricule)
    {
        $pae = new PAE();
        $courses_graph = $pae->get_graph();


        $courses = DB::table('programme')
            ->select('course', 'is_accessible', 'is_validated')
            ->where('student', '=', $matricule)
            ->get();

        foreach ($courses as $course) {
            $title = $course->course;
            $is_validated = $course->is_validated;

            if ($is_validated) {
                DB::table('programme')
                    ->where('course', '=', $title)
                    ->update(['is_accessible' => false]);
            } else {
                //Current course
                $is_accessible = false;

                //Prerequis
                $prerequis = $courses_graph[$pae->getCourseByTitle($title)]->getPrerequis();
                $is_accessible = ProgrammeController::isAllPrerequisValidated($matricule, $prerequis);

                //Corequis
                if ($is_accessible == true) {
                    $corequis = $courses_graph[$pae->getCourseByTitle($title)]->getCorequis();
                    $is_accessible = ProgrammeController::isAllCorequisAccessible($matricule, $corequis);
                }

                //Update Course
                if ($is_accessible == true) {
                    DB::table('programme')
                        ->where('student', '=', $matricule)
                        ->where('course', '=', $title)
                        ->update(['is_accessible' => true]);
                }
            }
        }
    }

    /**
     * Vérifie la validité d'un cours
     */
    private static function isValidated($student_matricule, $course_title)
    {
        return DB::table('programme')
            ->select('is_validated')
            ->where('student', '=', $student_matricule)
            ->where('course', '=', $course_title)
            ->get()[0]->is_validated;
    }

    /**
     * Vérifie l'accessibilité d'un cours
     */
    private static function isAccessible($student_matricule, $course_title)
    {
        return DB::table('programme')
            ->select('is_accessible')
            ->where('student', '=', $student_matricule)
            ->where('course', '=', $course_title)
            ->get()[0]->is_accessible;
    }

    /**
     * Vérifie si tout les prérequis sont validés
     */
    private static function isAllPrerequisValidated($student_matricule, $prerequis)
    {
        foreach ($prerequis as $prerequi) {
            if (ProgrammeController::isValidated($student_matricule, $prerequi->getTitle())) {
                return false;
            }
        }
        return true;
    }

    /**
     * Vérifie si tout les corequis sont accessible
     */
    private static function isAllCorequisAccessible($student_matricule, $corequis)
    {
        foreach ($corequis as $corequi) {
            if (ProgrammeController::isAccessible($student_matricule, $corequi->getTitle())) {
                return false;
            }
        }
        return true;
    }

    /**
     * Donne le programme d'un étudiant au format JSON
     */
    public function getStudentBulletin($user_id)
    {
        $this->user_id = $user_id;
        $matricule = DB::table('student')
            ->select('matricule')
            ->where('user_id', '=', $user_id)
            ->get()[0]
            ->matricule;

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

    public function getStudentPAE($user_id)
    {
        $this->user_id = $user_id;
        $matricule = DB::table('student')
            ->select('matricule')
            ->where('user_id', '=', $user_id)
            ->get()[0]
            ->matricule;

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
            ->where('programme.is_accessible', '=', true)
            ->get();
        return response()->json($programme);
    }
}
