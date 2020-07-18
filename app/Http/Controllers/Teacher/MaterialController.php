<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\profile;
use App\groups;
use App\Material;
use App\themes;
use App\resource;
use App\Resources_has_materials;



class MaterialController extends Controller
{
  public function index($id){
    $profile = Profile::find(Auth::user()->id);
    $classes = $profile->groups()->paginate(4);
    $group= Groups::find($id);
    $themes= $group->themes;
    return view('/teacher/material')->with(compact('classes', 'themes', 'profile', 'group'));
  }
  public function store($id, Request $request){
    $group= Groups::find($id);
    $material = new Material;
    $material->title = $request->input('title');
    $material->description = $request->input('description');
    $material->themes = $request->input('theme');
    $exito = $material->save();

    if ($exito) {
      $file = $request->file('resource');
      if ($file){
        //Guardar imagen
        $resource = new Resource;
        $path = public_path().'/images/materials';
        $fileName = uniqid().$file->getClientOriginalName();
        $file->move($path, $fileName);
        $resource->url = $fileName;
        $resource->name= $request->input('nameResource');
        $resource->description = $request->input('descriptionResource');
        $great = $resource->save();
        if ($great) {
          $registro = new Resources_has_materials;
          $registro->resources = $resource->id;
          $registro->materials = $material->id;
          $yes = $registro->save();
          if ($yes) {
            return redirect('/teacher/class/'.$id)->with('status', 'Marerial con recurso creada con éxito');
          }
        }
      }
      return redirect('/teacher/class/'.$id)->with('status', 'Marerial creada con éxito');
    }else {
      return redirect('/teacher/class/'.$id)->with('error', 'Error tarea no creada');
    }

  }
}
