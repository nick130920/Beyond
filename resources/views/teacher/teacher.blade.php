@extends('layouts.app')
@section('sidebar_menu')
  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>Profesor</h3>
      <ul class="nav side-menu">
        {{-- <li><a><i class="fas fa-house-user"></i> Inicio</a></li> --}}
        {{-- YA ESTA EN INICIO --}}
        <li><a href="{{route('/create/class')}}"><i class="fas fa-plus-circle"></i> Nueva Clase</a></li>


        <li><a href="#" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-envelope"></i> Mensaje</a></li>
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
    <!-- pop up -->
    @if (session('status'))

      <div class="overlay" id="overlay">
        <div class="popup" id="popup">
          <div class="textoPopup">
            <h1>Hola Profesor {{ $profile->first_name }}</h1>
            <h2>{{ session('status') }}</h2>
            <p></p>
          </div>
        </div>
      </div>
    @endif
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Mensaje </h5>
          </div>
          <form>
            <div class="contentModal">
              <input type="email" name="" placeholder="Para">
              <input type="text" name="" placeholder="Asunto">
              <textarea placeholder=""></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn botonCancelar" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn botonGuardar">Enviar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection
@section('scripts')
  <!-- mi poput -->
  <script src="{{asset('/js/popup.js')}}"></script>
@endsection
