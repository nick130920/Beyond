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
    <div class="page-title">
      <div class="title_left">
        <h3>Beyond | Nuevo Material</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="contenedorMaterial">
    <form method="post" action="{{url('/teacher/material/'.$group->id)}}" enctype="multipart/form-data">
      @csrf
      <div class="materialContent">

        <div class="tituloMaterial">
          <span class="spanTitulo" id="basic-addon1">Titulo</span>
          <input type="text" name="title" class="inputMaterial" placeholder="" aria-label="Username" aria-describedby="basic-addon1" >
        </div>

        <div class="tituloMaterial">
            <span class="spanTitulo" id="basic-addon1">Tema</span>
          <select name="theme" class="inputMaterial" >
            @foreach ($themes as $theme)
              <option value="{{$theme->id}}">{{$theme->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="descripcionMaterial">
          <span class="descriptionM" id="basic-addon1">Descripción</span>
          <textarea name="description"  class="descriptionText"></textarea>
        </div>
      </div>
      <!-- Button trigger modal -->
      
      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Agregar recurso</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              {{-- <label for="" class="btn btn-secondary" id="nombreArchivo"></label> --}}
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Nombre </span>
                </div>
                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"name="nameResource">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Descripción</span>
                </div>
                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"name="descriptionResource">
              </div>
              <input type="file" id="file" name="resource" class="inputFileInput">
              <label for="file" class="btn botonReset" id="archivo">Archivo</label>
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn botonCancelar" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn botonGuardar" data-dismiss="modal">Guardar</button>
            </div>
          </div>
        </div>
      </div>
        {{-- Aqui --}}
        <div class="botonesMaterial">
          <button type="button" class="btn botonReset" data-toggle="modal" data-target="#exampleModalCenter">
      Agregar
        </button>
        <button class="btn botonGuardar" type="submit" name="button"><i class="fa fa-plus" aria-hidden="true"></i> Crear</button>
        </div>
        
        
    </form>
    </div>
  </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
  <!-- mi poput -->
  {{-- <script src="{{asset('/js/popup.js')}}"></script> --}}
@endsection
