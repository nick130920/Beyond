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
    $classes = $profile->groups()->paginate(6);
    return view('/teacher/classes')->with(compact('classes', 'profile'));
  }
  public function class($id){
    $profile = Profile::find(Auth::user()->id);
    $group= Groups::find($id);
    $classes = $profile->groups()->paginate(4);
    $news = News::all()->where('groups_id', $group->id)->last();
    return view('/teacher/class')->with(compact('group','profile','classes', 'news'));
  }
  public function create(){
    $profile = Profile::find(Auth::user()->id);
    $classes = $profile->groups()->paginate(4);
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
   return redirect()->route('/teacher/classes');
  }
  public function update(Request $request, $id){
    $group= Groups::find($id);
    if ($request->input('name')) {
      $group->name = $request->input('name');
    }
    if ($request->input('description')) {
      $group->description = $request->input('description');
    }
    if ($request->input('name') || $request->input('description')) {
      $group->save();
    }
    return back();

  }
  public function edit($id){
    $profile = Profile::find(Auth::user()->id);
    $group= Groups::find($id);
    $classes = $profile->groups()->paginate(2);
    return view('/teacher/edit')->with(compact('group','profile', 'classes'));
  }
  public function destroy($id){
    $group = Groups::find($id);
    $group->delete();
    return redirect()->route('/teacher/classes');
  }
  //////////////////NOVEDAD////////////////////
  public function novelty(Request $request, $id){
    $novelty = new News();
    $novelty->name = $request->input('name');
    $novelty->content = $request->input('content');
    $novelty->groups_id = $id;
    $novelty->publication_date= Carbon::now()->toDateTimeString();
    $exito = $novelty->save(); //INSERT
    if ($exito) {
      $file = $request->file('resource');
      if ($file) {
        $resource = new Resource;
        //Guardar imagen
        $path = public_path().'/images/novedad';
        $fileName = uniqid().$file->getClientOriginalName();
        $file->move($path, $fileName);
        $resource->url = $fileName;
        $resource->name= $request->input('nameResource');
        $resource->description = $request->input('descriptionResource');
        $resource->save();
        return back()->with('recurso', 'Novedad con recurso creado con éxito');
      }
      return back()->with('success', 'Novedad creada con éxito');
    }else {
      return back()->with('error', 'Novedad no creada');
    }
  }
  public function noveltyIndex(){
    return view('/teacher/novelty');
  }
}
