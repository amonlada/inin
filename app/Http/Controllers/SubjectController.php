<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function subject(){
        
        return view('subject');
    }

    public function editsubject(){
        
        return view('editsubject');
    }
}

