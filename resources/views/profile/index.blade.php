@extends('layouts.app')
@section('sidebar_menu')
  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>Perfil</h3>
      <ul class="nav side-menu">
        @if (auth()->user()->teacher)
          <li><a href="{{route('teacher')}}"><i class="fas fa-house-user"></i> Inicio</a></li>
          @else
          <li><a href="{{route('student')}}"><i class="fas fa-house-user"></i> Inicio</a></li>
        @endif
        <li><a><i class="fas fa-cogs"></i> Ajustes <span class="fas fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{route('profile')}}"><i class="fas fa-user"></i> Información personal</a></li>
            <li><a href="{{route('/edit/profile')}}"><i class="fas fa-user-edit"></i> Editar usuario</a></li>
            <li><a href="{{route('/edit/profile/password')}}"><i class="fas fa-shield-alt"></i> Seguridad</a></li>
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
          <h3>Beyond | Perfil</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
            @endif
            <!-- Contenido Perfil -->
            <div class="perfil">

              <div class="infoPerfil">
                <div class="imgPerfil" >
                  <a href="{{route('/edit/profile')}}"><img src="{{asset($profile->url) ?? asset('/images/profile/user_default.png')}}" alt=""></a>
                </div>
                {{-- <h2>Perfil</h2> --}}
                <h2><!-- Nombre --> {{$user->name}}</h2>

                <h2>
                  @if ($profile->id_type && $profile->id_number)
                    {{$id_type->contraction}} {{ $profile->id_number }}
                  @else
                    ID: Vacio
                  @endif</h2>
                <h2>{{ $user->email ?? "Email: Vacio"}}</h2>
                <a href="{{route('/edit/profile')}}" class="enlaceA"> Editar perfil</a>
              </div>

              <div class="infoClase">
                <div class="titulo"> <h1 style="font-weight: 900;">Ultimas clases</h1></div>
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
        </div>
      </div>

    </div>
  </div>
  <!-- /Contenido de la pagina -->

@endsection
