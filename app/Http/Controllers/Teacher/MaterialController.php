<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\profile;
use App\groups;
use App\Material;
use App\themes;



class MaterialController extends Controller
{
  public function index($id){
    $profile = Profile::find(Auth::user()->id);
    $classes = $profile->groups()->paginate(4);
    $group= Groups::find($id);
    $themes= $group->themes;
    return view('/teacher/material')->with(compact('classes', 'profile', 'group'));
  }
  public function store($id, Request $request){
    $group= Groups::find($id);
    $material = new Material;
    $material->title = $request->input('title');
    $material->title = $request->input('description');
    $material->title = $request->input('theme');
    $exito = $material->save();

    if ($exito) {
      $file = $request->file('file');
      $path = public_path() . '/images/projects';
      $fileName = uniqid() . $file->getClientOriginalName();

      $file->move($path, $fileName);

      $projectImage = new ProjectImage();
      $projectImage->project_id = $id;
      $projectImage->user_id = auth()->user()->id;
      $projectImage->file_name = $fileName;
      $projectImage->save();
      return back();
    }

  }
}
