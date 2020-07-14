<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\profile;
use App\user;
use App\Groups;
use App\group_member;
use Validator;
class StudentController extends Controller
{
  public function index(){
    $profile = Profile::find(Auth::user()->id);
    $classes = $profile->groups()->paginate(2);
    return view('/student/student')->with(compact('profile', 'classes'));
  }
  public function join(Request $request){
    $rules = [
      'code'  => 'required|min:6|max:6',
    ];
    $messages = [
      'code.required'  => 'El codigo es requerido',
      'password.min'  => 'Minimo 6 caracteres',
      'password.max'  => 'Máximo 6 caracteres',
    ];
    $validator = Validator::make($request->all(), $rules, $messages);
    if ($validator->fails()){
      return redirect('/student/student')->withErrors($validator);
    }else{
      $member = new Group_member;
      $id_class= groups::where('code',$request->input('code'))->first()->id;
      $member->group_id = $id_class;
      $member->profile_id	= Auth::user()->id;
      $member->save();
      return back();
    }
  }
}
