@extends('layouts.app')
@section('sidebar_menu')
  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>Perfil</h3>
      <ul class="nav side-menu">
        @if (auth()->user()->teacher)
          <li><a href="{{route('teacher')}}"><i class="fas fa-house-user"></i>Inicio</a></li>
          @else
          <li><a href="{{route('student')}}"><i class="fas fa-house-user"></i>Inicio</a></li>
        @endif
        <li><a><i class="fas fa-cogs"></i> Ajustes <span class="fas fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{route('profile')}}"><i class="fas fa-user"></i> Información personal</a></li>
            <li><a href="{{route('/edit/profile')}}"><i class="fas fa-user-edit"></i> Editar usuario</a></li>
            <li><a href="{{route('password')}}"><i class="fas fa-shield-alt"></i> Seguridad</a></li>
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
            <div class="x_title">
              <h2>Cambiar contraseña</h2>

              <div class="clearfix"></div>

              <div class="x_content">
                <br/>
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  <div class="formulario">

                    <div class="form-group">
                      <input type="password" id="nombreClase" class="form-control " placeholder="Contaseña actual">
                    </div>
                    <div class="form-group">
                      <input type="password" id="descripcionClase" class="form-control " placeholder="Contraseña nueva">
                    </div>
                    <div class="form-group">
                      <input type="password" id="password" class="form-control" placeholder="Confirmar contraseña"/>
                    </div>

                  </div>



                  <div class="ln_solid"></div>
                  <div class="btnPassword">
                    <button class="btn btn-primary" type="button">Cancel</button>
                    <button class="btn btn-primary" type="reset">Reset</button>
                    <button type="submit" onclick=" return validarClaseNueva();" class="btn btn-success">Submit</button>
                  </div>

                </form>
              </div>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- /Contenido de la pagina -->

@endsection
