<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Controller de ce qui concerne le CRUD de la  CAVP.
 */
class CavpController extends Controller
{
    /**
     * Insère une demande à la CAVP.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
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

    /**
     * Retourne toute les demandes à la CAVP.
     *
     * @return Application|Factory|View
     */
    public function findAllDemandes()
    {
        $demandes = Demande::all();
        return view('alldemandes')->with('demandes', $demandes);
    }

    /**
     * Retourne les demandes de l'utilisateur connecté.
     *
     * @return Application|Factory|View
     */
    public function myDemandes()
    {
        $user_id = Auth::user()->id;

        $matricule = DB::table('student')
            ->select('matricule')
            ->where('user_id', '=', $user_id)
            ->get()[0]
            ->matricule;

        $demandes = DB::table('demande')
            ->where('student_matricule', '=', $matricule)
            ->get();

        return view('mydemandes')->with('demandes', $demandes);
    }

    /**
     * Change l'état d'une demande à accepté.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function accepterDemande(Request $request)
    {
        DB::table('demande')
            ->where('id', '=', $request->demande_id)
            ->update(['state' => 'A']);
        return redirect('/cavp/alldemandes');
    }

    /**
     * Change l'état d'une demande à refusé.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function refuserDemande(Request $request)
    {
        DB::table('demande')
            ->where('id', '=', $request->demande_id)
            ->update(['state' => 'R']);
        return redirect('/cavp/alldemandes');
    }
}
