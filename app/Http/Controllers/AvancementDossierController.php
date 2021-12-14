<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class AvancementDossierController extends Controller {
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {

        // $allFiles = Student::join('files', 'student.id', '=', 'files.student')->get();

        // $insc = Inscription::join('student', 'student.user_id', '=', 'inscriptions.user_id')->get();

        $insc = DB::table('inscriptions')
            ->where('user_id', '=', Auth::user()->id)
            ->get()[0];

        return view('avancementdossier')->with('insc', $insc);
    }
}
