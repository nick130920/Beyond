@extends('layouts.app')
@section('sidebar_menu')
  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>Profesor</h3>
      <ul class="nav side-menu">
        <li><a href="{{ url('/teacher') }}"><i class="fas fa-house-user"></i> Inicio</a></li>
        <li><a><i class="fas fa-chalkboard-teacher"></i></i> Trabajo en clase <span class="fas fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{url('/teacher/homework/'.$group->id)}}"> Crear tarea</a></li>
            <li><a href="{{url('/teacher/material/'.$group->id)}}"> Crear material</a></li>
          </ul>
        </li>
        <li><a href="{{url('/teacher/students/'.$group->id)}}"><i class="fas fa-users"></i> Estudiantes</a></li>
        <li><a href="{{url('/teacher/ratings/'.$group->id)}}"><i class="fas fa-book-open"></i> Calificaciones</a></li>
      </ul>


    </div>
  </div>
  <!-- /sidebar menu -->
@endsection
@section('contenido')
  <!-- Contenido -->
  <div class="right_col" role="main">
    <!-- Estudiante -->
    <div class="page-title">
      <div class="title_left">
        <h3>Beyond | Estudiantes</h3>
      </div>

      <div class="clearfix"></div>
      <div class="contentStudent">

        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Correo</th>
              <th class="eliminarTH">Eliminar</th>
            </tr>
          </thead>
            <tbody>
              @foreach ($students as $student)
              <tr>
                <td>{{$student->profiles->id}}</td>
                <td>{{$student->profiles->first_name}} {{$student->profiles->second_name}}</td>
                <td>{{$student->profiles->first_surname}} {{$student->profiles->second_surname}}</td>
                <td>{{$student->user->email}}</td>
                <td class="eliminarTD"><form action="{{url('/teacher/students/'.$student->profiles->id)}}" method="post">@csrf @method('DELETE')<button type="submit" name="button" class="miBoton botonCancelar"><i class="fas fa-trash-alt"></i></button></form></td>
              </tr>
            @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
@endsection
