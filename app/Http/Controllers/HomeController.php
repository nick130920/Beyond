<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\profile;
use App\user;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $id_user = Auth::user()->id;
      $user = User::find($id_user)->profile;

      $id_perfil = profile::where('user_id', $id_user)->get();
      if ($id_perfil->isEmpty()) {
        // code...
        $full_name = Auth::user()->name;
        $name = explode(' ',$full_name);
        $cuanto = count($name);
        $profile = new profile();
        $profile->first_name= $name[0];
        if ($cuanto>1) {
          $profile->second_name= $name[1];
        }elseif ($cuanto>2) {
          $profile->first_surname= $name[2];
        }elseif ($cuanto>3) {
          $profile->second_surname= $name[3];
        }
        $profile->user_id = $id_user;
        $profile->save();
      }
      if (auth()->user()->teacher) {
        return redirect('/teacher')->with(compact('user'));
      }else {
        return redirect('/student')->with(compact('user'));
      }

      // return view('home');
    }
}
