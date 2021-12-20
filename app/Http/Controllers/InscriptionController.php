<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class InscriptionController extends Controller {

    public function validateInscription($user_id) {

        $count_seededStudent = Student::latest()->get()->count();
        if ($count_seededStudent > 0) $count_seededStudent--;
        $matricule = ($count_seededStudent == 0) ? 1 : Student::latest()->get()[$count_seededStudent - 1]->matricule + 1;

        DB::table('inscriptions')
            ->where('user_id', '=', $user_id)
            ->update(['state' => 'V']);

        DB::table('student')
            ->where('user_id', $user_id)
            ->update(['matricule' => $matricule]);

        DB::table('users')
            ->where('id', $user_id)
            ->update(['is_student' => true, 'reinscription' => false]);

        ProgrammeController::initStudentBulletin($matricule);
    }

    public function refuseInscription($user_id, $message_refus) {
        DB::table('inscriptions')
            ->where('user_id', '=', $user_id)
            ->update(['state' => 'R', 'message_refus' => $message_refus]);

        DB::table('users')
            ->where('id', $user_id)
            ->update(['is_student' => false, 'reinscription' => true]);
    }
}
