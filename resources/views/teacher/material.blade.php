@extends('layouts.app')
@section('sidebar_menu')
  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>Profesor</h3>
      <ul class="nav side-menu">
        {{-- <li><a><i class="fas fa-house-user"></i> Inicio</a></li> --}}
        {{-- YA ESTA EN INICIO --}}
        <li><a><i class="fas fa-plus-circle"></i> Nueva Clase <span class="fas fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{route('/create/class')}}"><i class="fas fa-plus"></i> Nueva Clase</a></li>
            {{-- <li><a href="" ><i class="fas fa-edit"></i> Editar</a></li> --}}
            {{-- <li><a href="{{route('/Teacher/class/'.$product->id.'/edit')}}"><i class="fas fa-edit"></i> Editar Clase</a></li> --}}
          </ul>
        </li>


        <li><a><i class="fas fa-chalkboard-teacher"></i></i> Mis clases <span class="fas fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            @foreach ($classes as $class)
              <li><a href="{{url('/teacher/class/'.$class->id.'/')}}">{{$class->name}}</a></li>
            @endforeach
            <li><a href="{{url('/teacher/classes/')}}"> Todas las clases</a></li>
          </ul>
          {{-- {{ $classes->links() }} --}}
        </li>
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
    <div class="row">
      <div class="input-group col-5">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Titulo</span>
        </div>
        <input type="text" name="title" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" form="my-awesome-dropzone">
      </div>
      <div class="input-group col-3">
        <select name="theme" class="form-control" form="my-awesome-dropzone">
          <option></option>
        </select>
      </div>
      <div class="input-group col-8">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Descripción</span>
        </div>
        <textarea name="description" form="my-awesome-dropzone" class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
      </div>
    </div>
    <form method="post" action="{{url('/teacher/material/'.$class->id)}}" class="dropzone"  enctype="multipart/form-data" id="my-awesome-dropzone">
      @csrf
    </form>
    <button class="btn btn-info" form="my-awesome-dropzone" type="submit" name="button"><i class="fa fa-plus" aria-hidden="true"></i> Crear</button>
  </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
  <!-- mi poput -->
  {{-- <script src="{{asset('/js/popup.js')}}"></script> --}}
@endsection
