<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\evaluation_criteria;
use App\Group_member;
use App\delivery;
use App\profile;
use App\groups;

class RatingsController extends Controller
{
  public function index($id){
    $profile = Profile::find(Auth::user()->id);
    $classes = $profile->groups()->paginate(4);
    $evaluations = evaluation_criteria::all()->where('groups_id', $id)->sortBy('id');
    $students = Group_member::all()->where('group_id', $id)->sortBy('id');
    $group= Groups::find($id);
    $id_cry = $evaluations->pluck('id');
    $count = $id_cry->count();
    $sumatory = 0;
    foreach ($students as $student) {
      $notes = Delivery::all()->where('profile_id', $student->profile_id);
      for ($i=0; $i < $count; $i++) {
        foreach ($notes as $note) {
          if ($note->work->evaluation_criterias === $id_cry[$i]) {
            $sumatory += $note->score;
          }
        }
        // return $sumatory;
        // return $student->id;
      }
    }
    return view('/teacher/ratings')->with(compact('classes', 'profile', 'evaluations', 'students', 'group', 'sumatory'));
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
