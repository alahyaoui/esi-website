<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProgrammeController extends Controller
{

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


    public function test()
    {

        $p = [
            [
                "acronyme" => "DEV1",
                "libelle" => "developpement 2",
                "ects" => 3,
                "heures" => 25,
                "Quadrimestre" => 1,
                "bloc" => 1,
                "is_validate" => True

            ],
            [
                "acronyme" => "WEBG2",
                "libelle" => "Web developpement 2",
                "ects" => 3,
                "heures" => 25,
                "Quadrimestre" => 2,
                "bloc" => 1,
                "is_validate" => True

            ],
            [
                "acronyme" => "DEV3",
                "libelle" => "developpement 3",
                "ects" => 3,
                "heures" => 25,
                "Quadrimestre" => 3,
                "bloc" => 2,
                "is_validate" => True

            ],
            [
                "acronyme" => "WEBG4",
                "libelle" => "Web developpement 4",
                "ects" => 3,
                "heures" => 25,
                "Quadrimestre" => 4,
                "bloc" => 2,
                "is_validate" => True

            ],

            [
                "acronyme" => "WEBG5",
                "libelle" => "Web developpement 5",
                "ects" => 3,
                "heures" => 25,
                "Quadrimestre" => 5,
                "bloc" => 3,
                "is_validate" => False
            ],
            [
                "acronyme" => "ETE6",
                "libelle" => "Stage",
                "ects" => 3,
                "heures" => 25,
                "Quadrimestre" => 6,
                "bloc" => 3,
                "is_validate" => False
            ],


        ];

        echo json_encode($p);
    }
}
