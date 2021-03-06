@extends('layouts.app')
@section('sidebar_menu')
  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>Profesor</h3>

      <ul class="nav side-menu">
        <li><a href="{{route('teacher')}}"><i class="fas fa-house-user"></i> Inicio </a>
          <ul class="nav child_menu">
          </ul>
        </li>
        <li><a><i class="fas fa-chalkboard-teacher"></i> Mis Clases <span class="fas fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            @foreach ($classes as $class)
              <li><a href="{{url('/teacher/class/'.$class->id.'/')}}">{{$class->name}}</a></li>
            @endforeach
            {{-- {{$classes->links() }} --}}
          </ul>
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
      <div class="page-title">
        <div class="title_left">
          <h3>Beyond | Edita tu clase</h3>
        </div>
      </div>

      <div class="clearfix"></div>

            <!-- Clases de la Mañana -->

              <div class="x_content">
                <br/>
                <div class="centrarCard">
                  <div class="card">
                    <img src="{{asset('/images/img/fondopopup1.svg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{$group->name}}</h5>
                      <p class="card-text">{{$group->description}}</p>
                      <div class="botonesEditError">
                        <a href="{{url('/teacher/class/'.$class->id.'/')}}" class="btn btn-primary blanco1"><i class="fas fa-sign-in-alt"></i> Ver </a>

                        <button class="btn btn-primary" id="editar" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                        <button id="eliminar" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="fas fa-times"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <!-- Popup mensaje de confirmacion  -->
            <div class="mensajeConfirmacion" id="mensajeConfirmacion">
              <div class="contentMensaje" id="contentMensaje">
                <h1>¿Desea eliminar esta clase?</h1>
                <div class="botonesConfirmar">
                  <label class="btn btn-danger">
                    <input type="radio" id="cancelar" name="cancelar" class="join-btn" id="cancelar">No
                  </label>
                  <label class="btn btn-success">
                    <form class="" action="{{url('/teacher/class/'.$group->id)}}" method="post">
                    @csrf
                    @method('DELETE')

                      <input type="submit" id="confirmar" name="confirmar" class="join-btn" id="confirmar">Si
                    </form>
                  </label>
                </div>
              </div>
            </div>

            <!-- popup para editar clase -->
                  <div class="overlayEditar" id="overlayEditar">
                    <div class="contenidoEditar" id="contenidoEditar">
                      <form method="post" action="{{url('/teacher/class/'.$group->id.'/edit')}}">
                        @csrf
                        <h1>Editar clase</h1>
                        <input type="text" name="name" placeholder="Titulo">
                        <input type="text" name="description" placeholder="Descripción">
                        <div class="botonesEditar">
                          <a class="btn botonCancelar" id="botonCancelar">Cancelar</a>
                          <button type="reset" class="btn botonReset">Reiniciar</button>
                          <button type="submit" class="btn botonGuardar" id="botonGuardar">Guardar</button>
                        </div>
                      </form>
                    </div>
                  </div>

    </div>
  </div>
  <!-- /Contenido de la pagina -->
@endsection
@section('scripts')
  <script src="{{asset('js/eliminar.js')}}"></script>

@endsection
