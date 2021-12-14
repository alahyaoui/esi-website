<?php

namespace App\Http\Controllers;

use App\Models\Inscription;


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

    /**
     * Valide l'inscription d'un étudiant.
     *
     * @param $studentMatricule
     * @return void
     */
    public function validateInscription($studentMatricule)
    {
        Inscription::join('student', 'inscriptions.student_matricule', '=', 'student.matricule')
            ->where('student_matricule', $studentMatricule)->update(array('state' => 'V', 'message_refus' => ""));
    }

    /**
     * Refuse l'inscription d'un étudiant.
     *
     * @param $studentMatricule
     * @param $message_refus
     * @return void
     */
    public function refuseInscription($studentMatricule, $message_refus)
    {
        Inscription::join('student', 'inscriptions.student_matricule', '=', 'student.matricule')
            ->where('student_matricule', $studentMatricule)->update(array('state' => 'R', 'message_refus' => $message_refus));
    }
}
