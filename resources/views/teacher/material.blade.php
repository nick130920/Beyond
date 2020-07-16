@extends('layouts.app')
@section('sidebar_menu')
  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>Profesor</h3>
      <ul class="nav side-menu">
        <li><a href="{{ url('/teacher') }}"><i class="fas fa-house-user"></i> Inicio</a></li>
        {{-- YA ESTA EN INICIO --}}
        <li><a><i class="fas fa-chalkboard-teacher"></i></i> Trabajo en clase <span class="fas fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{url('/teacher/homework')}}"> Crear tarea</a></li>
            <li><a href="{{url('/teacher/material')}}"> Crear material</a></li>
          </ul>
        </li>
        <li><a href="{{url('/teacher/students')}}"><i class="fas fa-users"></i> Estudiantes</a></li>
        <li><a href="{{url('/teacher/ratings')}}"><i class="fas fa-book-open"></i> Calificaciones</a></li>
      </ul>


    </div>
  </div>
  <!-- /sidebar menu -->
@endsection
@section('contenido')
  <!-- Contenido -->
  <div class="right_col" role="main">
    <div class="page-title">
      <div class="title_left">
        <h3>Beyond | Nuevo Material</h3>
      </div>
    </div>
    <div class="clearfix"></div>

    <form method="post" action="{{route('/class/store')}}" class="dropzone" id="my-awesome-dropzone">
      <input type="text" id="title" class="form-control" name="title">
      <input type="text" id="description" class="form-control" name="description">


    </form>
  </div>
@endsection
@section('scripts')
  <!-- mi poput -->
  {{-- <script src="{{asset('/js/popup.js')}}"></script> --}}
@endsection
