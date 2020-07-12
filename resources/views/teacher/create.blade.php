@extends('layouts.app')
@section('links')
  <!-- sweetAlert 2-->
  <link rel="stylesheet" type="text/css" href="{{asset('/sweetAlert/dist/sweetalert2.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/alertify/css/themes/semantic.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/alertify/css/alertify.min.css')}}">
@endsection
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
            <li><a href="#">Mañana</a></li>
            <li><a href="#">Tarde</a></li>
            <li><a href="#">Sabatino</a></li>
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
          <h3>Beyond | Nueva clase</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Crea tu clase</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fas fa-chevron-down"></i></a>
                </li>
              </ul>

              <div class="clearfix"></div>

              <div class="x_content">
                <br/>
                <form id="demo-form2" method="post" action="{{route('/class/store')}}" data-parsley-validate class="form-horizontal form-label-left">
                  @csrf

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align"  for="first-name">Nombre de la clase <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="text" id="nameClass" class="form-control @error('nameClass') is-invalid @enderror" name="nameClass" value="{{ old('nameClass') }}">
                        @error('nameClass')
                          <script type="text/javascript">
                            window.onload = function alerta() {
                              alertify.set('notifier','position', 'top-right');
                              alertify.notify ("{{ $message}}",'error', 2, function(){});
                            }
                          </script>
                        @enderror
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Descripción de la clase <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="text" id="descripcionClase" class="form-control ">
                    </div>
                  </div>
                  <div class="ln_solid"></div>
                  <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                      <a id="blanco" class="btn btn-primary" type="button">Cancel</a>
                      <button class="btn btn-primary" type="reset">Reset</button>
                      <button type="submit" onclick=" return validarClaseNueva();" class="btn btn-success">Submit</button>
                    </div>
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
