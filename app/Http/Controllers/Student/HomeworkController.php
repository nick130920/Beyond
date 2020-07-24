<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\profile;
use App\groups;

class HomeworkController extends Controller
{
  public function index(){
    $profile = Profile::find(Auth::user()->id);
    $classes = $profile->groups()->paginate(4);
    return view('/student/homework')->with(compact('profile', 'classes', 'group'));
  }
}
