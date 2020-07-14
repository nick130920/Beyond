@extends('layouts.app')
@section('sidebar_menu')
  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>General</h3>

      <ul class="nav side-menu">
        <li><a href="{{route('teacher')}}"><i class="fas fa-house-user"></i> Inicio </a>
          <ul class="nav child_menu">
          </ul>
        </li>
        <li><a><i class="fas fa-plus-circle"></i> Nueva Clase <span class="fas fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{route('/create/class')}}"> Crear Clase</a></li>
            <li><a href="{{url('/class'.'/'.$group->id.'/edit')}}"> Editar Clase</a></li>
          </ul>
        </li>
        <li><a><i class="fas fa-chalkboard-teacher"></i></i> Mis clases <span class="fas fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            @foreach ($classes as $class)
              <li><a href="{{url('/teacher/class/'.$class->id.'/')}}">{{$class->name}}</a></li>
            @endforeach
          </ul>
          {{ $classes->links() }}
        </li>
      </ul>
    </div>
  </div>
  <!-- /sidebar menu -->
@endsection
@section('contenido')
  <!-- Contenido de la pagina -->
  <div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="contenidoClase">
            <div class="imgTexto">
              <h3>Beyond | {{$group->name}}</h3>
              <h6>{{$group->description}}</h6>
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
                  <form class="was-validated" method="post" action="{{url('/teacher/class/'.$group->id.'/novelty')}}">
                    @csrf
                    <div class="mb-3">
                      <input type="text" name="name" value="">
                      <textarea name="content" class="form-control is-invalid" id="validationTextarea" placeholder="Crea tu novedad"></textarea>
                    </div>
                    <div class="btnComentarios">
                      <div class="inputFile inputInverso">
                        <label for="" class="btn btn-secondary" id="nombreArchivo"></label>
                        <input type="file" id="file" name="resource" class="inputFileInput">
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
    </div>
  </div>
  <!-- /Contenido de la pagina -->
@endsection
@section('scripts')
  <script src="{{asset('/js/clase.js')}}"></script>
@endsection
