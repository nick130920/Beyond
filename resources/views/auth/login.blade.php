@extends('layouts.auth')
@section('content')
  <div class="model-content">
    <div class="col-12 user-img">
      <img src="{{ asset('/images/img/logoRedondo.svg') }}">
    </div>
    <form class="col-12" method="POST" action="{{ route('login') }}">
      @csrf
      <div class="form-group">
        <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Usuario"/>
          @error('email')
            <script>
            window.onload = function alerta() {
              alertify.set('notifier','position', 'top-right');
              alertify.notify ("{{ $message }} ",'error', 2, function(){});
            }
            </script>
          @enderror
      </div>
      <div class="form-group">
        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="Contraseña"/>
          @error('password')
            <script type="text/javascript">
            window.onload = function alerta() {
              alertify.set('notifier','position', 'top-right');
              alertify.notify ("{{ $message }}",'error', 2, function(){});
            }
            </script>
          @enderror
      </div>
      <button type="submit" class="btn btn-primary" onclick="return validarSesion();" >
        <i class="fas fa-sign-in-alt"></i>
        Ingresar
      </button>
    </form>
    <div class="separador">
      <h1>Beyond</h1>
      <p>Todos los derechos reservados © Beyond 2020.</p>
    </div>
  </div>
  <div class="sombra">
    <div class="col-6 abajo">
      <input type="checkbox" class="form-check-input" name="remember"id="remember" {{ old('remember') ? 'checked' : '' }}>
      <label class="form_check">Recordar contraseña</label>
    </div>
    <div class="col-6 abajo">
      @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}">
          {{ __('¿Olvidaste tu contraseña?') }}
        </a>
      @endif
    </div>
  </div>
@endsection
