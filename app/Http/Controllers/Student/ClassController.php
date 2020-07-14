<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Groups;
use App\group_member;
use App\user;

class ClassController extends Controller
{
  public function index(){
    $user = Profile::find(Auth::user()->id);
    $classes = $user->groups;
    return view('/student/class')->with(compact('classes', 'user'));
  }
  public function store(Request $request){
    $codeClass = $request->input('code');
    $class=;
    $member = new Group_member;
    $member->group_id = $idClass;
    $member->profile_id	= Auth::user()->id;
    $saved = $member->save();
    //Check if Group_member got saved
    if (!$saved){
      $class->delete();
    }
  }
}
