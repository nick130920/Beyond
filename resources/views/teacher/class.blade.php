@extends('layouts.app')
@section('links')
  <!-- sweetAlert 2-->
  <link rel="stylesheet" type="text/css" href="{{asset('/sweetAlert/dist/sweetalert2.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/alertify/css/themes/semantic.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/alertify/css/alertify.min.css')}}">
@endsection
@section('sidebar_menu')
  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>General</h3>

      <ul class="nav side-menu">
        <li><a href="{{route('teacher')}}"><i class="fas fa-house-user"></i> Inicio </a>
          <ul class="nav child_menu">
          </ul>
        </li>
        <li><a><i class="fas fa-plus-circle"></i> Nueva Clase <span class="fas fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{route('/create/class')}}"> Crear Clase</a></li>
            <li><a href="{{route('class')}}"> Editar Clase</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <!-- /sidebar menu -->
@endsection
@section('contenido')
  <!-- Contenido de la pagina -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Beyond | Clases</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        @foreach ($classes as $class)
          <div class="col-md-4 col-sm-4 ">
            <h2>{{$class->name}}</h2>
            <p>{{$class->description}}</p>
          </div>
        @endforeach
      </div>

    </div>
  </div>
  <!-- /Contenido de la pagina -->

@endsection
