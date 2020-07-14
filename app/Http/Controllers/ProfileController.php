<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use App\user;
use App\id_type;
use File;

class ProfileController extends Controller
{
  public function index(){
    $user = User::find(Auth::user()->id);
    $profile = Profile::find(Auth::user()->id);
    $classes = $profile->groups;
    return view('/profile/index')->with(compact('user', 'profile', 'classes'));
  }
  public function edit(){
    $profile = Profile::find(Auth::user()->id);
    $id_type =id_type::find($profile->id_type);
    $id_types = id_type::all();
    return view('/profile/edit')->with(compact('profile', 'id_type', 'id_types'));
  }
  public function update(Request $request){
    $file = $request->file('photo');
    if ($file) {
      //Guardar imagen
      $path = public_path() . '/images/profiles';
      $fileName = uniqid() . $file->getClientOriginalName();
      $file->move($path, $fileName);
      $profile->image = $fileName;
    }
    //Crear 1 registro en la tabla product_images
    $profile = Profile::find(Auth::user()->id);
    $profile->id_type   = $request->input('id_type');
    $profile->id_number = $request->input('id_number');
    $profile->first_name = $request->input('first_name');
    $profile->second_name = $request->input('second_name');
    $profile->first_surname = $request->input('first_surname');
    $profile->second_surname = $request->input('second_surname');
    $profile->save();//INSERT
    return back();
  }
  public function destroy()  {
    $profile= Profile::find(Auth::user()->id);
    if (substr($profile->image,0,4)=== "http") {
      $deleted = true;
    }else {
      $fullPath = public_path().'/images/profile/'.$profile->image;
      $deleted = File::delete($fullPath);
    }
    if ($deleted) {
      $profile->delete();
    }
    return back();
  }
}
