<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\profile;
use App\groups;
use App\theme;

class ThemesController extends Controller
{
  public function index(){
    $profile = Profile::find(Auth::user()->id);
    $classes = $profile->groups()->paginate(4);
    return view('/teacher/students')->with(compact('classes', 'profile'));
  }
  public function store($id){
    $theme = new Theme;
    $theme->name = $request->input('name');
    $theme->description = $request->input('description');
    $theme->groups = $id;
    return back();
  }
}
