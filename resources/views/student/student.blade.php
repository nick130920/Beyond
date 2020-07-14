@extends('layouts.app')
@section('sidebar_menu')
  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>Estudiante</h3>
      <ul class="nav side-menu">
        <li><a><i class="fas fa-house-user"></i> Inicio</a></li>
        <li><a id="botonOverlay2"><i class="fas fa-plus"></i> Unirme a una Clase </a>
        </li>
        <li><a><i class="fas fa-chalkboard-teacher"></i></i> Clases <span class="fas fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            @foreach ($classes as $class)
              <li><a href="#">{{$class->name}}</a></li>
            @endforeach
            <li><a href="{{route('/student/classes')}}">Ver todas las clases</a></li>
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
    <div class="">
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="contenidoClase">
            <div class="novedadInexistente">
              <h2>
                No hay novedades existentes.
              </h2>
            </div>
            <div class="novedadExistente">
              <div class="imagenNovedad">
                <img src="{{asset('/images/img/fondo1.svg')}}">
              </div>
              <div class="contenidoNovedad">
                <div class="textoNovedad">
                  <h1>Titulo</h1>
                  <p>Contenido</p>
                </div>
                <div class="botonesNovedad">
                  <a href="#"><i class="fas fa-share"></i></a>
                  <button href="#"><i class="fas fa-times"></i></button>
                </div>
              </div>
            </div>
            <div class="ln_solid"></div>
          </div>
        </div>
      </div>
      @if (session('status'))
      <div class="overlay" id="overlay">
        <div class="popup" id="popup">
          <div class="textoPopup">
            <h1>Hola Jhon Doe</h1>
            <h2>{{ session('status') }}</h2>
            <p></p>
          </div>
        </div>
      </div>
    @endif
      <div class="overlay2" id="overlay2">
        <div class="popup2" id="popup2">
          <div class="texto2">
            <form method="post" action="{{route('join')}}">
              @csrf
              <h2>Unirse a la clase</h2>
              <p>
                Pídele a tu profesor el código de la clase y, luego, ingrésalo aquí.
              </p>
              <input type="text" name="code" placeholder="Código de la clase" required>
              <a id="cancelarOverlay2" class="btn boton1">Cancelar</a>
              <button type="submit" class="btn boton2">Unirse</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
  <!-- mi poput -->
  <script src="{{asset('/js/popup.js')}}"></script>
@endsection
