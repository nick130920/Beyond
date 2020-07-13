<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\user;
use File;

class ProfileController extends Controller
{
  public function index($id){
    $user = User::find($id);
    return view('/auth/profile')->with(compact('user'));
  }
  public function edit(Request $request,$id){
    //Guardar imagen
   $file = $request->file('photo');
   $path = public_path() . '/images/profiles';
   $fileName = uniqid() . $file->getClientOriginalName();
   $moved = $file->move($path, $fileName);
   //Crear 1 registro en la tabla product_images
   if($moved){
     $profile = User::find($id)->profile;
     $profile->id_type   = $request->input('id_type');
     $profile->id_number = $request->input('id_number');
     $profile->first_name = $request->input('first_name');
     $profile->second_name = $request->input('second_name');
     $profile->first_surname = $request->input('first_surname');
     $profile->second_surname = $request->input('second_surname');
     $profile->image = $fileName;
     $profile->save();//INSERT
   }
   return back();
  }
  public function destroy($id)  {
    $profile= Profile::find($id);
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
