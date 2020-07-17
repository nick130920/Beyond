@extends('layouts.app')
@section('sidebar_menu')
  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>General</h3>

      <ul class="nav side-menu">
        <li><a href="{{route('teacher')}}"><i class="fas fa-house-user"></i> Inicio </a>
        </li>
        <li><a href="#" id="editar"><i class="fas fa-edit"></i> Editar clase</a></li>
        <li><a><i class="fas fa-chalkboard-teacher"></i></i> Trabajo en clase <span class="fas fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{url('/teacher/homework')}}"> Crear tarea</a></li>
            <li><a href="{{url('/teacher/material')}}"> Crear material</a></li>
          </ul>
        </li>
        <li><a href="{{url('/teacher/students')}}"><i class="fas fa-users"></i> Estudiantes</a></li>
        <li><a href="{{url('/teacher/ratings')}}"><i class="fas fa-book-open"></i> Calificaciones</a></li>
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
              <p>{{$group->code}}</p>
              <a id="crearTema">Crear tema</a>
              @if (session('recurso'))
                <script type="text/javascript">
                window.onload = function alerta() {
                  alertify.set('notifier','position', 'top-right');
                  alertify.notify ("{{ session('recurso') }}",'success', 2, function(){});
                }
                </script>
              @endif
              @if (session('success'))
                <script type="text/javascript">
                window.onload = function alerta() {
                  alertify.set('notifier','position', 'top-right');
                  alertify.notify ("{{ session('success') }}",'success', 2, function(){});
                }
                </script>
              @endif
              @if (session('error'))
                <script type="text/javascript">
                  window.onload = function alerta() {
                    alertify.set('notifier','position', 'top-right');
                    alertify.notify ("{{ session('error') }}",'error', 2, function(){});
                  }
                </script>
              @endif
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
                  <form class="was-validated" method="post" action="{{url('/teacher/class/'.$group->id.'/novelty')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="novedadMensaje">
                      <input type="text" class="tituloTarea" name="name" placeholder="Asunto">
                      <textarea name="content" class="textarea" id="validationTextarea" placeholder="Crea tu novedad"></textarea>
                    </div>
                    <div class="btnComentarios">
                      <div class="inputFile inputInverso">
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
                      </div>
                      <div class="cancelarEnviar">
                        <span class="btn botonCancelar" id="cancelarEnviar">Cancelar</span>
                        <button type="submit" class="btn botonGuardar">Enviar</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="indicaciones" id="indicaciones">
                    <h2><i class="fas fa-comment"></i> Crea anuncios.</h2>
                    <h2><i class="fas fa-comments"></i> Responde a publicaciones de alumnos.</h2>
                </div>

                <!-- Comentarios ya hechos   -->
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
                                    <h3> {{$profile->first_name}} </h3>
                                    <span> fecha de publicación</span>
                                  </div>
                                </div>
                                <div class="comentarioCuerpo">
                                  <h4>Asunto</h4>
                                  <p>Novedad</p>
                                </div>
                              </div>
                              
                            </div>
                          </li>
                        </ul>
                      </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- popup para editar clase -->
                  <div class="overlayEditar" id="overlayEditar">
                    <div class="contenidoEditar" id="contenidoEditar">
                      <form>
                        <h1>Editar clase</h1>
                        <input type="text" name="" placeholder="Titulo">
                        <input type="text" name="" placeholder="Descripción">
                        <div class="botonesEditar">
                          <a class="btn botonCancelar" id="botonCancelar">Cancelar</a>
                          <button type="reset" class="btn botonReset">Reiniciar</button>
                          <button type="submit" class="btn botonGuardar" id="botonGuardar">Guardar</button>
                        </div>
                      </form>
                    </div>
                  </div>
    {{--  - - - - - - Popup para el tema     - - - - -  - -  --}}
                  <div class="overlayTema" id="overlayTema">
                    <div class="contenedorTema" id="contenedorTema">
                      <form>
                        <h1>Crear tema</h1>

                        <h2>Tema</h2>
                        <input type="text" name="">
                        <h2>Descripcion del tema</h2>
                        <input type="text" name="">

                        <div class="botonesTema">
                          <a class="btn botonCancelar" id="cancelarTema"> Cancelar</a>
                          <button class="btn botonGuardar">Guardar tema</button>
                        </div>
                      </form>
                    </div>
                  </div>
  </div>
  <!-- /Contenido de la pagina -->
@endsection
@section('scripts')
  <script src="{{asset('/js/clase.js')}}"></script>
@endsection
