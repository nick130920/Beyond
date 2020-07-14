<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ValidarFormularioRequest;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use App\Groups;
use App\group_member;
use App\resource;
use App\resource_has_news;
use Carbon\Carbon;
use App\news;


class ClassController extends Controller
{
  public function index(){
    $profile = Profile::find(Auth::user()->id);
    $classes = $profile->groups;
    return view('/teacher/classes')->with(compact('classes', 'profile'));
  }
  public function create(){
    $profile = Profile::find(Auth::user()->id);
    $classes = $profile->groups()->paginate(2);
    return view('/teacher/create')->with(compact('profile', 'classes'));
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
   return view('/teacher/class');
  }
  public function edit($id){
    $profile = Profile::find(Auth::user()->id);
    $group= Groups::find($id);
    $classes = $profile->groups()->paginate(2);
    return view('/teacher/edit')->with(compact('group','profile', 'classes'));
  }
  public function class($id){
    $profile = Profile::find(Auth::user()->id);
    $group= Groups::find($id);
    $classes = $profile->groups()->paginate(2);
    return view('/teacher/class')->with(compact('group','profile','classes'));
  }
  //////////////////NOVEDAD////////////////////
  public function novelty(Request $request, $id){
    $novelty = new News();
    $novelty->name = $request->input('name');
    $novelty->content = $request->input('content');
    $novelty->groups = $id;
    $novelty->publication_date= Carbon::now()->toDateTimeString();
    $novelty->save(); //INSERT

    // $idClass = $class->id;
    // $member = new Group_member;
    // $member->group_id = $idClass;
    // $member->profile_id	= Auth::user()->id;
    // $saved = $member->save();
    // //Check if Group_member got saved
    // if (!$saved){
    //   $class->delete();
    // }
    return back();

  }

}
