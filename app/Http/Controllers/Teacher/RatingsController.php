<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\profile;
use App\groups;
use App\evaluation_criteria;

class RatingsController extends Controller
{
  public function index($id){
    $profile = Profile::find(Auth::user()->id);
    $classes = $profile->groups()->paginate(4);
    return view('/teacher/ratings')->with(compact('classes', 'profile'));
  }
  public function store(Request $request, $id){
    $evaluation = new evaluation_criteria;
    $evaluation->name = $request->input('name');
    $evaluation->description = $request->input('description');
    $porcentaje = $request->input('percentage');
    if ($porcentaje==100) {
      $evaluation->percentage = number_format($porcentaje, 1);
    }else {
      $evaluation->percentage = number_format($porcentaje, 2);
    }
    $evaluation->groups_id = $id;
    $evaluation->save();
    return back();
  }
}
