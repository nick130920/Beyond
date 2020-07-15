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
            {{-- <li><a href="{{route('/class/{id}/edit')}}"> Editar Clase</a></li> --}}
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
          <h3>Beyond | Clases</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="infoClase">
        <div class="clasesPerfil">
          @foreach ($classes as $class)
            <div class="cardMio">
              <a href="{{url('/teacher/class/'.$class->id.'/')}}">
                <img src="{{asset('/images/img/fondopopup1.svg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h2>{{$class->name}}</h2>
                  <p>{{$class->description}}</p>
                </div>
              </a>
            </div>
          @endforeach
          {{ $classes->links() }}

        </div>
      </div>
    </div>
  </div>

  <!-- /Contenido de la pagina -->

@endsection