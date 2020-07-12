<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\ValidarFormularioRequest;
use Illuminate\Support\Facades\Auth;
use App\Groups;
use App\group_member;

class ClassController extends Controller
{
  public function index(){
    return view('/teacher/class');
  }
  public function create(){
    return view('/teacher/create');
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

}
