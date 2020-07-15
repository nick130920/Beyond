<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Groups;
use App\group_member;
use App\user;
use App\profile;


class ClassController extends Controller
{
  public function index(){
    $user = Profile::find(Auth::user()->id);
    $classes = $user->groups;
    return view('/student/class')->with(compact('classes', 'user'));
  }
  public function classes(){
    $profile = Profile::find(Auth::user()->id);
    $classes = $profile->groups;
    return view('/student/classes')->with(compact('profile', 'classes'));
  }
  public function class($id){
    $profile = Profile::find(Auth::user()->id);
    $classes = $profile->groups()->paginate(2);
    $class = Groups::find($id);
    return view('/student/class')->with(compact('profile', 'classes', 'class'));
  }
}
