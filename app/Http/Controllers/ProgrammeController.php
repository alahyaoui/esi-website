<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{

    public function getStudentBulletin($matricule)
    {
        // TODO: join libelle, ects, heures ON course
        $pae = Programme::all()->where("student", "=", $matricule);
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
