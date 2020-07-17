<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\profile;
use App\groups;

class HomeworkController extends Controller
{
  public function index($id){
    $profile = Profile::find(Auth::user()->id);
    $classes = $profile->groups()->paginate(4);
    $group= Groups::find($id);
    return view('/teacher/homework')->with(compact('classes', 'profile', 'group'));
  }
}
