<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;
use App\Models\Student;


class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

       
    public function validateInscription($studentMatricule) {
        Inscription::join('student', 'inscriptions.student_matricule', '=', 'student.matricule')
        ->where('student_matricule', $studentMatricule)->update(array('state' => 'V', 'message_refus' => ""));
    }

    public function refuseInscription($studentMatricule, $message_refus) {
        Inscription::join('student', 'inscriptions.student_matricule', '=', 'student.matricule')
        ->where('student_matricule', $studentMatricule)->update(array('state' => 'R', 'message_refus' => $message_refus));
    }
}
