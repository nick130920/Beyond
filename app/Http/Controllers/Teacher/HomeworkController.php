<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\profile;
use App\groups;
use App\work;

class HomeworkController extends Controller
{
  public function index($id){
    $profile = Profile::find(Auth::user()->id);
    $classes = $profile->groups()->paginate(4);
    $group= Groups::find($id);
    $themes = $group->themes;
    $evaluations = $group->evaluation_criterias;
    return view('/teacher/homework')->with(compact('classes', 'profile', 'group', 'themes', 'evaluations'));
  }
  public function store(Request $request, $id){
    $work = new Work;
    $work->title = $request->input('title');
    $work->description = $request->input('description');
    $work->evaluation_criterias = $request->input('evaluation_criterias');
    $work->themes = $request->input('themes');
    $work->finish_date = $request->input('finish_date');
    $exito = $work->save();
    if ($exito) {
      $file = $request->file('resource');
      if ($file){
        //Guardar imagen
        $resource = new Resource;
        $path = public_path().'/images/homework';
        $fileName = uniqid().$file->getClientOriginalName();
        $file->move($path, $fileName);
        $resource->url = $fileName;
        $resource->name= $request->input('nameResource');
        $resource->description = $request->input('descriptionResource');
        $resource->save();
        return redirect()->route('/teacher/class/'.$id)->with('status', 'Tarea con recurso creada con éxito');
      }
      return redirect()->route('/teacher/class/'.$id)->with('status', 'Tarea creada con éxito');
    }else {
      return redirect()->route('/teacher/class/'.$id)->with('error', 'Error tarea no creada');
    }
  }
}
