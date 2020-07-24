@extends('layouts.app')
@section('sidebar_menu')
  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>Estudiante</h3>
      <ul class="nav side-menu">
        <li><a href="{{url('/student')}}"><i class="fas fa-house-user"></i> Inicio</a></li>
        <li><a><i class="fas fa-clipboard"></i> Tareas </a></li>{{-- 
        <li><a href="#" data-toggle="modal" data-target="#modalMessege"><i class="fas fa-envelope"></i> Mensaje</a></li> --}}
        <li><a data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Unirme a una Clase </a></li>
        <li><a><i class="fas fa-chalkboard-teacher"></i></i> Clases <span class="fas fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            @foreach ($classes as $class)
              <li><a href="{{url('/student/class/'.$class->id.'/')}}">{{$class->name}}</a></li>
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
                          <a href=""><i class="fas fa-share"></i></a>
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
            <div class="ln_solid"></div>
          </div>
        </div>
      </div>
      @if (session('status'))
      <div class="overlay" id="overlay">
        <div class="popup" id="popup">
          <div class="textoPopup">
            <h1>Hola {{$profile->name}}</h1>
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

  {{-- <div class="modal fade" id="modalMessege" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Mensaje </h5>
          </div>
          <form>
            <div class="contentModal">
              <label>Clase:</label>
              <select>
                <option>Holis:3</option>
              </select>
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
    </div> --}}
@endsection
@section('scripts')
  <!-- mi poput -->
  <script src="{{asset('/js/popup.js')}}"></script>
@endsection
