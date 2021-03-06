@extends('layouts.app')
@section('sidebar_menu')
  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>Estudiante</h3>
      <ul class="nav side-menu">
        <li><a href="{{route('student')}}"><i class="fas fa-house-user"></i> Inicio</a></li>
        <li><a data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Unirme a una Clase </a>
        </li>
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
      <div class="page-title">
        <div class="title_left">
          <h3>Beyond | Clases</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
              <div class="x_content">
                <div class="tarjetasEstudiante">
                  @foreach ($classes as $class)
                    <div class="card">
                      <img src="{{asset('/images/img/fondopopup1.svg')}}" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h2>{{$class->name}}</h2>
                        <p>{{ \Illuminate\Support\Str::limit($class->description, 70) }}</p>
                        <div class="botonesEditError">
                          <a href="{{url('/student/class/'.$class->id.'/')}}" class="btn botonGuardar"><i class="fas fa-sign-in-alt"></i> Clase </a>
                          <button class="btn botonCancelar">Salir</button>
                        </div>
                      </div>
                    </div>
                  @endforeach
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
  <script src="{{asset('/js/popup.js')}}"></script>
@endsection
