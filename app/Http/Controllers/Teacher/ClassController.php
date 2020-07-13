<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\ValidarFormularioRequest;
use Illuminate\Support\Facades\Auth;
use App\Groups;
use App\group_member;
use App\user;

class ClassController extends Controller
{
  public function index(){
    $user = User::find(Auth::user()->id)->profile;
    $classes = Groups::all();
    return view('/teacher/class')->with(compact('classes', 'user'));
  }
  public function create(){
    $user = User::find(Auth::user()->id)->profile;
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
   $member->save();
   return redirect('/teacher/class');
  }
  public function edit($id)
  {
    return redirect('/teacher/class/edit');
  }

}
