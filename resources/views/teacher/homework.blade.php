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
    <!-- Tarea -->
    <div class="page-title">
      <div class="title_left">
        <h3>Beyond | Nueva tarea</h3>
      </div>

      <div class="contenidoTarea">
        <div class="formularioTarea">
          <form>
            <div class="tareaTitulo">
                <label><i class="fas fa-clipboard"></i> Titulo</label>
                <input type="text" class="titulo" name="">
            </div>
            <div class="tareaContenido">
                <label><i class="fas fa-stream"></i> Instrucciones</label>
                <textarea type="text" class="titulo" name=""></textarea>
            </div>
            <div class="botonesTarea">
              <div class="fechaLimite">
                <input type="file" multiple class="fechaLimiteInput" id="agregarTarea" name="">
                <a class="botonReset" onclick="document.getElementById('agregarTarea').click()"> Agregar documento</a>
                <a for="datepicker" class="labelFecha"><i class="fas fa-calendar-alt"></i> Fecha limite: </a>
                <input type="text" id="fecha" class="inputFecha" name="">
              </div>

              <div class="botonesUno">
                <a  class="btn botonCancelar" name="">Cancelar</a>
                <button class="btn botonGuardar">Publicar</button>
              </div>
              
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
@endsection
@section('scripts')
  <!-- mi poput -->
  <script src="{{asset('/js/tarea.js')}}"></script>
  <script>
    
  </script>
@endsection
