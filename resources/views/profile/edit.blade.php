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
            <!--      Formulario para cambio de datos     -->
            <div class="cambiarDatos">
              @if ($errors->any())
                <div class="col-md-12">
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              @endif
              <form class="formDatos" method="post" action="{{route('/edit/profile/update')}}">
                @csrf
                <div class="fotoDato">
                  <div class="cambiarFoto" id="cambiarFoto" onclick="document.getElementById('file').click()">
                    <input type="file" id="file" class="botonFoto" name="file">
                    <img src="{{ $profile->image ?? asset('/images/profile/user_default.png')}}" class="imagenCambio">
                  </div>
                </div>
                <div class="cambiarDato">
                  <div class="nombre">
                    <input type="text" name="first_name" placeholder="Cambiar primer nombre" value="{{$profile->first_name}}">
                    <input type="text" name="second_name" placeholder="Cambiar segundo nombre" value="{{$profile->second_name}}">
                  </div>
                  <div class="apellidos">
                    <input type="text" name="first_surname"placeholder="Cambiar primer apellido" value="{{$profile->first_surname}}">
                    <input type="text" name="second_surname" placeholder="Cambiar segundo apellido" value="{{$profile->second_surname}}">
                  </div>
                  <div class="documentacion">
                    <div class="selector">
                      <label>Tipo de documento</label>
                      <select name="id_type">
                        @if ($id_type)
                          <option value="{{$id_type->id}}" selected>{{$id_type->contraction}} - {{$id_type->name}}</option>
                        @endif
                        @foreach ($id_types as $type)
                          @if ($id_type)
                            @if ($type->id !== $id_type->id)
                              <option value="{{$type->id}}">{{$type->contraction}} - {{$type->name}}</option>
                            @endif
                            @else
                              <option value="{{$type->id}}">{{$type->contraction}} - {{$type->name}}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                    <input type="number" name="id_number" placeholder="Numero de documento"value="{{$profile->id_number}}">
                  </div>
                  <div class="ln_solid"></div>
                  <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                      <button class="btn btn-primary" type="button">Cancelar</button>
                      <button class="btn btn-primary" type="reset">Reset</button>
                      <button type="submit" onclick=" return validarClaseNueva();" class="btn btn-success">Guardar</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- /Contenido de la pagina -->
@endsection
