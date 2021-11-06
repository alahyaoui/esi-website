<?php

namespace App\Http\Controllers;

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

    function store(Request $request) {
        $this->validate($request, [
            'select_file' => 'required|mimes:jpeg,jpg,png,pdf|max:2048'
        ]);
        return back()->with('success', 'Image Uploaded Successfully');
    }
}
