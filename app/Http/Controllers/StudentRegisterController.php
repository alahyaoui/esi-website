<?php

namespace App\Http\Controllers;

use App\Models\Bloc;
use App\Models\File;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentRegisterController extends Controller {


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('studentregister');
    }

    public function store(Request $request) {
        
        $student = new Student();
        
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->bloc = $request->bloc;
        $student->section = $request->section;
        
        $student->save();

        $request->validate([
            'cess' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
            'cid' => 'required|mimes:pdf,jpg,jpeg,png|max:2048'
        ]);

        $cess_file = new File();

        if ($request->file('cess')) {
            $fileName = time() . '_' . $request->cess->getClientOriginalName();
            $filePath = $request->file('cess')->storeAs('uploads', $fileName, 'public');

            $cess_file->student = $student->matricule;
            $cess_file->name = time() . '_' . $request->cess->getClientOriginalName();
            $cess_file->file_path = '/storage/' . $filePath;
        }

        $cid_file = new File();

        if ($request->file('cid')) {
            $fileName = time() . '_' . $request->cid->getClientOriginalName();
            $filePath = $request->file('cid')->storeAs('uploads', $fileName, 'public');

            $cid_file->student = $student->matricule;
            $cid_file->name = time() . '_' . $request->cid->getClientOriginalName();
            $cid_file->file_path = '/storage/' . $filePath;
        }

        if (!$cess_file->save() || !$cid_file->save()) {
            Student::where('matricule', $student->matricule)->delete();
        }

        return back()->with('success', 'Inscription réussie');
    }
}
