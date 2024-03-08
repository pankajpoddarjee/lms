<?php

namespace App\Http\Controllers\StudentPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class StudentController extends Controller
{
    public function dashboard(){
        if(Auth::user()->role == 'admin'){
            return redirect()->route('admin.dashboard');
        }elseif(Auth::user()->role == 'teacher'){
            return redirect()->route('teacher.dashboard');
        }
        return view('dashboard');
    }
}
