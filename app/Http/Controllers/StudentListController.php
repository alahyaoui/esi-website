<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\File;
use App\Models\Inscription;

use function GuzzleHttp\Promise\all;

class StudentListController extends Controller {
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {

        $allStudents = Student::all();

        $allFiles = Student::join('files', 'student.id', '=', 'files.student')->get();

        $allInscriptions = Inscription::all();

        return view('studentlist', compact('allStudents', 'allFiles', 'allInscriptions'));
    }

}
