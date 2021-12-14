<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ProgrammeController extends Controller
{

    /**
     * Retourne le bulletin de l'étudiant.
     *
     * @param $user_id
     * @return JsonResponse
     */
    public function getStudentBulletin($user_id)
    {
        $matricule = DB::table('student')
            ->select('matricule')
            ->where('user_id', '=', $user_id)
            ->get()[0]
            ->matricule;

        $pae = DB::table('programme')
            ->join('course', 'programme.course', '=', 'course.title')
            ->select('programme.*', 'course.description as courseDesc',
                'course.credits as courseCredits', 'course.quadri as courseQuadri',
                'course.hours as courseHours')
            ->where('programme.student', '=', $matricule)
            ->get();
        return response()->json($pae);
    }
}
