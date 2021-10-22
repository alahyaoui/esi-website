<?php

namespace App\Http\Controllers;

use App\Models\Pae;
use Illuminate\Http\Request;

class PaeController extends Controller
{
    public function getStudentBulletin($id)
    {
        $pae = Pae::all()->where('student', '=', $id);
        return response()->json($pae);
    }
}