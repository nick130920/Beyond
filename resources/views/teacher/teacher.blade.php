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
            <li><a href="{{route('class')}}"><i class="fas fa-plus"></i> Nueva Clase</a></li>
            {{-- <li><a href="{{route('/Teacher/class/'.$product->id.'/edit')}}"><i class="fas fa-edit"></i> Editar Clase</a></li> --}}
          </ul>
        </li>


        <li><a><i class="fas fa-chalkboard-teacher"></i></i> Mis clases <span class="fas fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="#">Mañana</a></li>
            <li><a href="#">Tarde</a></li>
            <li><a href="#">Sabatino</a></li>
          </ul>
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
    <div>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      <br>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </div>
    <!-- pop up -->
    <div class="overlay" id="overlay">
      <div class="popup" id="popup">
        <a class="btn-cerrar" id="btn-cerrar"><i class="fas fa-times"></i></a>
        <div class="textoPopup">
          <h1>Hola Profesor {{ Auth::user()->name }}</h1>
          <h2>Beyond te la bienvenida</h2>
          <p></p>
        </div>
        <div class="separador1">
          <input type="checkbox" class="formCheck" name="forget">
          <label class="checkForm">No volver a mostrar</label>
          <a class="btn-next" id="btn-next" href="">
            <i class="fas fa-chevron-right"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
  <!-- mi poput -->
  <script src="{{asset('/js/popup.js')}}"></script>
@endsection
