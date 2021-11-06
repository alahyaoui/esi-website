<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    public function getStudentBulletin($id)
    {
        $programme = Programme::all()->where('student', '=', $id);
        return response()->json($programme);
    }
}