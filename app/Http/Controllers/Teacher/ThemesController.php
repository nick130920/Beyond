<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\profile;
use App\groups;
use App\theme;

class ThemesController extends Controller
{
  public function store($id, request $request){
    $theme = new Theme;
    $theme->name = $request->input('name');
    $theme->description = $request->input('description');
    $theme->groups = $id;
    $exito = $theme->save();
    if ($exito) {
      return back()->with('success', 'Tema creado con éxito');
    }else {
      return back()->with('error', 'Tema no creado, intente de nuevo');
    }
  }
}
