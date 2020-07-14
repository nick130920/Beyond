@extends('layouts.app')
@section('sidebar_menu')
  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>Estudiante</h3>
      <ul class="nav side-menu">
        <li><a href="indexEstudiante.html"><i class="fas fa-house-user"></i> Inicio</a></li>
        <li><a><i class="fas fa-clipboard"></i> Trabajo en clase </a>
        </li>
        <li><a id="botonOverlay2"><i class="fas fa-plus"></i> Unirme a una Clase </a>
        </li>
        <li><a><i class="fas fa-chalkboard-teacher"></i></i> Clases <span class="fas fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            @foreach ($classes as $class)
              <li><a href="#">{{$class->name}}</a></li>
            @endforeach
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
            <div class="imgTexto">
              <h3>Beyond | Titulo de la clase</h3>
            </div>
            <div class="contenido">
              <div class="pendientes">
                <h2>Próximas</h2>
                <p>Todavia no tienes tareas por revisar</p>
                <a href="">Ver todo</a>
              </div>
              <!-- Formulario para envio de comentarios   -->
              <div class="envios">

                <div class="enviarTitulo" id="enviarTitulo">
                  <h2>Comunícate con tu clase aquí</h2>
                </div>

                <div class="mensaje" id="mensaje">
                  <form class="was-validated">
                    <div class="mb-3">
                      <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Crea tu novedad"></textarea>
                    </div>
                    <div class="btnComentarios">
                      <div class="inputFile inputInverso">
                        <label for="" class="btn btn-secondary" id="nombreArchivo"></label>
                        <input type="file" id="file" class="inputFileInput">
                        <label for="file" class="btn btn-primary" id="archivo">Agregar</label>
                      </div>
                      <div class="cancelarEnviar">
                        <span class="btn btn-danger" id="cancelarEnviar">Cancelar</span>
                        <button type="submit" class="btn btn-success">Enviar</button>
                      </div>
                    </div>
                  </form>
                </div>


                <div class="indicaciones" id="indicaciones">
                    <h2><i class="fas fa-comment"></i> Crea anuncios.</h2>
                    <h2><i class="fas fa-comments"></i> Responde a publicaciones de alumnos.</h2>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
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
  <script src="{{asset('/alertify/alertify.min.js')}}"></script>
  <script src="{{asset('/js/clase.js')}}"></script>
@endsection
