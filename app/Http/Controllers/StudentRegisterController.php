<?php

namespace App\Http\Controllers;

use App\Models\Bloc;
use App\Models\File;
use App\Models\Section;
use App\Models\Student;
use App\Models\Inscription;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class StudentRegisterController extends Controller {
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $currentDate = Carbon::today();
        $limitDate = Carbon::create($currentDate->year . '-12-31');
        $isExpired = $limitDate < $currentDate;
        return view('studentregister')->with('isExpired', $isExpired);
    }
    
    public function store(Request $request) {
        
        $student = new Student();
        $count_seededStudent = Student::oldest()->get()->count();
        
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->bloc = $request->bloc;
        $student->section = $request->section;
        $student->user_id = Auth::user()->id;
        $student->matricule = ($count_seededStudent == 0) ? 1 : Student::oldest()->get()[$count_seededStudent-1]->matricule + 1;
        
        $student->save();

        $request->validate([
            'cess' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
            'cid' => 'required|mimes:pdf,jpg,jpeg,png|max:2048'
        ]);

        $cess_file = new File();

        if ($request->file('cess')) {
            $fileName = time() . '_' . $request->cess->getClientOriginalName();
            $filePath = $request->file('cess')->storeAs('uploads', $fileName, 'public');

            $cess_file->student = $student->id;
            $cess_file->name = time() . '_' . $request->cess->getClientOriginalName();
            $cess_file->file_path = '/storage/' . $filePath;
        }

        $cid_file = new File();

        if ($request->file('cid')) {
            $fileName = time() . '_' . $request->cid->getClientOriginalName();
            $filePath = $request->file('cid')->storeAs('uploads', $fileName, 'public');

            $cid_file->student = $student->id;
            $cid_file->name = time() . '_' . $request->cid->getClientOriginalName();
            $cid_file->file_path = '/storage/' . $filePath;
        }

        if (!$cess_file->save() || !$cid_file->save()) {
            Student::where('id', $student->id)->delete();
        }

        $new_inscription = new Inscription();
        $new_inscription->student_matricule = $student->matricule;
        $new_inscription->save();
        
        return back()->with('success', 'Inscription réussie');
    }
}
