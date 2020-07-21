<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Group_member;
use App\profile;
use App\groups;

class StudentsController extends Controller
{
  public function index($id){
    $profile = Profile::find(Auth::user()->id);
    $students = Group_member::all()->where('group_id', $id)->sortBy('id');
    $classes = $profile->groups()->paginate(10);
    $group= Groups::find($id);
    return view('/teacher/students')->with(compact('classes', 'profile', 'students'));
  }
  public function destroy($id){
    $student = Group_member::all()->where('profile_id', $id)->first();
    $student->delete();
    return back();
  }
}
