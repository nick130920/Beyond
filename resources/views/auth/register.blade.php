@extends('layouts.auth')
@section('links')
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">
@endsection
@section('content')
  <form class="col-12" method="POST" action="{{ route('register') }}">
    @csrf
    <div id="ocultar">
      <div class="model-content">
        <div class="col-12 user-img">
          <img src="{{ asset('/images/img/logoRedondo.svg') }}">
        </div>
        <div class="form-group">
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Usuario">
            @error('name')
              <script type="text/javascript">
                window.onload = function alerta() {
                  alertify.set('notifier','position', 'top-right');
                  alertify.notify ("{{ $message}}",'error', 2, function(){});
                }
              </script>
            @enderror
        </div>
        <div class="form-group">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email">
            @error('email')
                <script type="text/javascript">

                    window.onload = function alerta() {
                      alertify.set('notifier','position', 'top-right');
                      alertify.notify ("{{ $message}}",'error', 2, function(){});
                    }

                </script>
            @enderror
        </div>
        <div class="form-group">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Contraseña">
            @error('password')
              <script type="text/javascript">

              window.onload = function alerta() {
                alertify.set('notifier','position', 'top-right');
                alertify.notify ("{{ $message}}",'error', 2, function(){});
              }

              </script>
            @enderror
        </div>
        <div class="form-group">
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password" placeholder="Contraseña confirmación">
        </div>
        <button type="button" onclick="return validarRegistro();" class="btn btn-primary">
          {{ __('Siguiente') }}
        </button>
        <div class="separador">
          <h1>Beyond</h1>
          <p>¿Ya tienes una cuenta? <a href="{{url('login')}}">Inicia sesión</a></p>
          <p>Todos los derechos reservados © Beyond 2020.</p>
        </div>
      </div>
    </div>
    <div id="visible" style="display:none;">
      <div class="registro2">
          <h1>¿Quien eres?</h1>
          <div class="tarjetas">
            <div class="rol">
              <div class="rol1">
                <ul>
                  <li>
                    <button name="teacher" class="borrar" type="submit" value=1>
                    <img src="{{asset('/images/img/profesor.svg')}}" class="card-img-top" alt="...">
                    </button>
                  </li>
                </ul>
              </div>
            </div>
            <div class="rol">
              <div class="rol1">
                <ul>
                  <li>
                    <button name="teacher" class="borrar" type="submit" value=0>
                    <img src="{{asset('/images/img/estudiante.svg')}}" class="card-img-top" alt="...">
                    </button>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          </div>
      </div>
    </form>
@endsection
