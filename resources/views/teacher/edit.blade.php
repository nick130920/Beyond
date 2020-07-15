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
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">

            <!-- Clases de la Mañana -->
            <div class="x_title">
              <div class="x_content">
                <br/>
                <div class="centrarCard">
                  <div class="card">
                    <img src="{{asset('/images/img/fondopopup1.svg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Titulo de la clase</h5>
                      <p class="card-text">Descripcion de la clase</p>
                      <div class="botonesEditError">
                        <a href="{{url('/teacher/class/'.$class->id.'/')}}" class="btn btn-primary blanco1"><i class="fas fa-sign-in-alt"></i> Ver </a>

                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                        <button id="eliminar" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="fas fa-times"></i></button>
                      </div>
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
                    <input type="radio" id="confirmar" name="confirmar" class="join-btn" id="confirmar">Si
                  </label>
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
  <script src="{{asset('js/eliminar.js')}}"></script>

@endsection
