<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\ValidarFormularioRequest;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use App\Groups;
use App\group_member;

class ClassController extends Controller
{
  public function index(){
    $user = Profile::find(Auth::user()->id);
    $classes = $user->groups;
    return view('/teacher/class')->with(compact('classes', 'user'));
  }
  public function create(){
    $profile = Profile::find(Auth::user()->id);
    return view('/teacher/create')->with(compact('user'));
  }
  public function store(ValidarFormularioRequest $request){
   //registrar la nueva clase en la bd
   // dd($request->all());
   $class = new Groups();
   $class->name = $request->input('nameClass');
   $class->description = $request->input('descriptionClass');
   $class->code = $request->input('code');
   $class->save(); //INSERT

   $idClass = $class->id;
   $member = new Group_member;
   $member->group_id = $idClass;
   $member->profile_id	= Auth::user()->id;
   $saved = $member->save();
   //Check if Group_member got saved
   if (!$saved){
     $class->delete();
   }
   return redirect('/teacher/class');
  }
  public function edit($id)
  {
    return redirect('/teacher/class/edit');
  }

}
