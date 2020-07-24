<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use App\user;
use App\id_type;
use Validator;
use File;
use Hash;

class ProfileController extends Controller
{
  public function index(){
    $user = User::find(Auth::user()->id);
    $profile = Profile::find(Auth::user()->id);
    $classes = $profile->groups()->paginate(4);
    $id_type = id_type::find($profile->id_type);
    return view('/profile/index')->with(compact('user', 'profile', 'classes', 'id_type'));
  }
  public function edit(){
    $profile = Profile::find(Auth::user()->id);
    $id_type =id_type::find($profile->id_type);
    $id_types = id_type::all();
    return view('/profile/edit')->with(compact('profile', 'id_type', 'id_types'));
  }
  public function update(Request $request){
    $profile = Profile::find(Auth::user()->id);
    $file = $request->file('photo');
    if ($file) {
      //Guardar imagen
      $path = public_path().'/images/profile';
      $fileName = uniqid().$file->getClientOriginalName();
      $file->move($path, $fileName);
      $profile->image = $fileName;
    }
    //Crear 1 registro en la tabla product_images
    $profile->id_type   = $request->input('id_type');
    $profile->id_number = $request->input('id_number');
    $profile->first_name = $request->input('first_name');
    $profile->second_name = $request->input('second_name');
    $profile->first_surname = $request->input('first_surname');
    $profile->second_surname = $request->input('second_surname');
    $profile->save();//INSERT
    return redirect()->route('profile');
  }
  public function editPassword(){
    $profile = Profile::find(Auth::user()->id);

    return view('/profile/password')->with(compact('profile'));
  }
  public function updatePassword(Request $request){
    $rules = [
      'current_password' => 'required',
      'password'  => 'required|confirmed|min:6|max:20',
    ];
    $messages = [
      'current_password.required' => 'El campo es requerido',
      'password.required'  => 'La contraseña es requerida',
      'password.confirmed'  => 'Las contraseñas no coinciden',
      'password.min'  => 'Minimo 6 caracteres',
      'password.max'  => 'Máximo 20 caracteres',
    ];
    $validator = Validator::make($request->all(), $rules, $messages);
    if ($validator->fails()){
      return redirect('/profile/password')->withErrors($validator);
    }elseif (Hash::check($request->current_password, Auth::user()->password)){
      $user = new User;
      $user->where('email', '=', Auth::user()->email)->update(['password' => Hash::make($request['password'])]);
      return redirect()->route('profile')->with('status', 'Contraseña cambiada con éxito');
    }else {

      return redirect()->route('/edit/profile/password')->with('status', 'Error!');
    }
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
