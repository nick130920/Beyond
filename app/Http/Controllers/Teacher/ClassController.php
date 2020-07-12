<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClassController extends Controller
{
  public function index(){
    return view('/teacher/class');
  }
  public function create(){
    return view('/teacher/create');
  }

}
