@extends('layouts.app')
@section('sidebar_menu')
  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>Profesor</h3>
      <ul class="nav side-menu">
<<<<<<< HEAD
        <li><a><i class="fas fa-plus-circle"></i> Nueva Clase <span class="fas fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{url('/teacher/homework/'.$group->id)}}"> Crear tarea</a></li>
            <li><a href="{{url('/teacher/material/'.$group->id)}}"> Crear material</a></li>
          </ul>
        </li>
        <li><a href="{{url('/teacher/students/'.$group->id)}}"><i class="fas fa-users"></i> Estudiantes</a></li>
        <li><a href="{{url('/teacher/ratings/'.$group->id)}}"><i class="fas fa-book-open"></i> Calificaciones</a></li>
        <li><a><i class="fas fa-chalkboard-teacher"></i> Mis clases <span class="fas fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            @foreach ($classes as $class)
              <li><a href="{{url('/teacher/class/'.$class->id.'/')}}">{{$class->name}}</a></li>
            @endforeach
            <li><a href="{{url('/teacher/classes/')}}"> Todas las clases</a></li>
          </ul>
        </li>
=======
        <li><a href="{{ url('/teacher') }}"><i class="fas fa-house-user"></i> Inicio</a></li>
        <li><a href="#"><i class="fas fa-chalkboard"></i> Clase</a></li>
        <li><a><i class="fas fa-chalkboard-teacher"></i></i> Trabajo en clase <span class="fas fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="#"> Crear tarea</a></li>
            <li><a href="#"> Crear material</a></li>
          </ul>
        </li>
        <li><a href="#"><i class="fas fa-users"></i> Estudiantes</a></li>
>>>>>>> b127184c0043922041dd6575b2a4688b9b239405
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
        <h3>Beyond | Calificaciones </h3>
      </div>
<div class="clearfix"></div>
    <div class="contentRatings">
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              @foreach ($evaluations as $evaluation)
                <th>{{$evaluation->name}} {{ $evaluation->percentage}}%</th>
              @endforeach
            </tr>
          </thead>
            <tbody>
              @foreach ($students as $student)
                @if ($student->profile_id !== $profile->id)
                  <tr>
                    <td>{{$student->profiles->id}}</td>
                    <td>{{$student->user->name}}</td>
                    <td>{{$sumatory ?? 'g lou'}}</td>
                    <td>0</td>
                    <td>0</td>
                  </tr>
                @endif
            @endforeach
            </tbody>
        </table>
      </div>
      </div>
  </div>
@endsection
@section('scripts')
  <!-- mi poput -->
  <script src="{{asset('/js/popup.js')}}"></script>
@endsection
