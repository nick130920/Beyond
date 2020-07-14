<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\profile;
use App\user;

class StudentController extends Controller
{
  public function index()
  {
    $user = User::find(Auth::user()->id)->profile;
    return view('/student/student')->with(compact('user'));
  }
}
