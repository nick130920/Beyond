@extends('layouts.app')
@section('sidebar_menu')
  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>Estudiante</h3>
      <ul class="nav side-menu">
        <li><a href="{{url('/student')}}"><i class="fas fa-house-user"></i> Inicio</a></li>
        <li><a><i class="fas fa-clipboard"></i> Trabajo en clase </a></li>
        <li><a data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Unirme a una Clase </a>
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
            <div class="imgTexto">
              <h3>Beyond | {{$class->name}}</h3>
            </div>
            <div class="contenido">
              <!-- Formulario para envio de comentarios   -->
              <div class="envios">

                <div class="enviarTitulo" id="enviarTitulo">
                  <h2>Comunícate con tu profesor aquí.</h2>
                </div>

                <div class="mensaje" id="mensaje">
                  <form >
                    @csrf
                    <div class="novedadMensaje">
                      <input type="text" class="tituloTarea" name="name" placeholder="Asunto">
                      <textarea name="content" class="textarea" id="validationTextarea" placeholder="Crea tu mensaje"></textarea>
                    </div>
                    <div class="btnComentarios">
                      <div class="cancelarEnviar">
                        <span class="btn botonCancelar" id="cancelarEnviar">Cancelar</span>
                        <button type="submit" class="btn botonGuardar">Enviar</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="contentComentarios">
              <ul>
                      <!-- Comentario 1 -->
                <li>
                  <div class="cajaComentario">
                    <div class="comentarioImg">
                      <img src="{{asset($profile->url) ?? asset('/images/profile/user_default.png')}}">
                    </div>
                    <div class="cuerpoComentario">
                      <div class="comentarioHead">
                        <div class="head1">
                          <h3> Nombre </h3>
                          <span> Fecha</span>
                        </div>
                      </div>
                      <div class="comentarioCuerpo">
                        <h4>Asunto</h4>
                        <p>Contenido</p>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>

          </div>
        </div>
      </div>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h2>Unirse a la clase</h2>
            </div>
            <div class="contentModalStudent">
            <form method="post" action="{{route('join')}}">
              @csrf
              <p>
                Pídele a tu profesor el código de la clase y, luego, ingrésalo aquí.
              </p>
              <input type="text" name="code" placeholder="Código de la clase">
              <div class="footerStudent">
                <button data-dismiss="modal" class="btn botonCancelar">Cancelar</button>
                <button type="submit" class="btn botonGuardar">Unirse</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
  <!-- mi poput -->
  <script src="{{asset('/alertify/alertify.min.js')}}"></script>
  <script src="{{asset('/js/clase.js')}}"></script>
@endsection
