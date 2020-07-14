<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\profile;
use App\user;


class TeacherController extends Controller
{
  public function index()
  {
    $user = User::find(Auth::user()->id);
    $profile = Profile::find(Auth::user()->id);
    return view('/teacher/teacher')->with(compact('user'));
  }
}
