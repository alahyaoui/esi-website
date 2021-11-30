<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $demande->message = $request->message_cavp;
        $demande->save();

        return view('cavpSuccess');
    }

    public function myDemandes()
    {
        // TODO: Get Demandes
        $user_id = Auth::user()->id;

        $matricule = DB::table('student')
            ->select('matricule')
            ->where('user_id', '=', $user_id)
            ->get()[0]
            ->matricule;

        $demandes = DB::table('demande')
            ->where('student_matricule', '=', $matricule)
            ->get();

        // TODO: Link view my demandes
        //return response()->json($demandes);
        return view('mydemandes')->with('demandes', $demandes);
    }

}
