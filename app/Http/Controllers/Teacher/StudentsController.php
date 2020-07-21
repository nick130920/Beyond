<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\profile;
use App\groups;

class StudentsController extends Controller
{
  public function index($id){
    $profile = Profile::find(Auth::user()->id);
    $classes = $profile->groups()->paginate(10);
    $group= Groups::find($id);
    return view('/teacher/students')->with(compact('classes', 'profile', 'group'));
  }
}
