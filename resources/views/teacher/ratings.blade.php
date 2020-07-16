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
    <!-- prueba 1 -->
    <h1>CALIFICACIONES</h1>
  </div>
@endsection
@section('scripts')
  <!-- mi poput -->
  <script src="{{asset('/js/popup.js')}}"></script>
@endsection
