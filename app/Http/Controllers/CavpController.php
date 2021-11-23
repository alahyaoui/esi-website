<?php

namespace App\Http\Controllers;
use App\Models\Demande;
use Illuminate\Http\Request;

class CavpController extends Controller
{
    public function insertDemande(Request $request)
    {
        $user_id = Auth::user()->id;

        $matricule = DB::table('student')
            ->select('matricule')
            ->where('user_id', '=', $user_id)
            ->get()[0]
            ->matricule;
        $demande = new Demande();
        $demande->student_matricule = $matricule;
        $demande->last_name = $request->message;
        $demande->save();
}

}
