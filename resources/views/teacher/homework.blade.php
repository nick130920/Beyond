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
            <li><a href="{{url('/teacher/homework/'.$group->id)}}"> Crear tarea</a></li>
            <li><a href="{{url('/teacher/material')}}"> Crear material</a></li>
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
    <!-- Tarea -->
    <div class="page-title">
      <div class="title_left">
        <h3>Beyond | Nueva tarea</h3>
      </div>

      <div class="contenidoTarea">
        <div class="formularioTarea">
          <form enctype="multipart/form-data" method="post" action="{{url('/teacher/homework/'.$group->id)}}">
            @csrf
            <div class="tarea1">
              <div class="tareaTitulo">
                <label><i class="fas fa-clipboard"></i> Titulo</label>
                <input type="text" class="titulo" name="title">
              </div>
              <div class="tareaContenido">
                <label><i class="fas fa-stream"></i> Instrucciones</label>
                <textarea type="text" class="titulo" name="description"></textarea>
              </div>
            </div>
            
            <div class="botonesTarea">
              <div class="fechaLimite">
                <!-- Button trigger modal -->
                <button type="button" class="btn botonReset" data-toggle="modal" data-target="#exampleModalCenter">
                  Agregar
                </button>
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

                <a for="datepicker" class="labelFecha"><i class="fas fa-calendar-alt"></i> Fecha limite: </a>
                <input type="text" id="fecha" class="inputFecha" name="finish_date">
              </div>
              <select title="theme" name="themes">
                @foreach ($themes as $theme)
                  <option value="{{$theme->id}}">{{$theme->name}}</option>
                @endforeach
              </select>
              <select class="botonReset" title="theme" name="evaluation_criterias">
                @foreach ($evaluations as $evaluation)
                  <option value="{{$evaluation->id}}">{{$evaluation->name}}</option>
                @endforeach
              </select>

              <div class="botonesUno">
                <a href="{{url('teacher/class/'.$group->id)}}" class="btn botonCancelar" name="">Cancelar</a>
                <button type="submit" class="btn botonGuardar">Publicar</button>
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
