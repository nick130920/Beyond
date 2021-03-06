@extends('layouts.auth')

@section('content')
  <div class="model-content">
    <div class="col-12 user-img">
      <img src="{{ asset('/images/img/logoRedondo.svg') }}">
    </div>
    @if (session('status'))
      <script type="text/javascript">
        window.onload = function alerta() {
          alertify.set('notifier','position', 'top-right');
          alertify.notify ("{{ session('status') }}",'success anchar', 3, function(){});
        }
      </script>
    @endif
    <form class="col-12" method="POST" action="{{ route('password.email') }}">
      @csrf
      <h1>Recupera tu contraseña</h1>
      <p>Por favor ingrese el correo con el que se registro</p>
      <div class="form-group">
        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Correo"/>
          @error('email')
            <script type="text/javascript">
            window.onload = function alerta() {
              alertify.set('notifier','position', 'top-right');
              alertify.notify ("El correo es obligatorio",'error', 2, function(){});
            }
            </script>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i>
          Enviar
        </button>
      </form>
      <div class="separador">
        <h1>Beyond</h1>
        <p>Todos los derechos reservados © Beyond 2020.</p>
      </div>
  </div>
@endsection
