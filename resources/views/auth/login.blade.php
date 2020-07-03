@extends('layouts.auth')
@section('content')
<form class="col-12" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
        <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder=" Usuario"/>
        @error('email')
            <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
             </span>
        @enderror
    </div>
    <div class="form-group">
        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" required placeholder="Contraseña"/>
          @error('password')
              <span class="invalid-feedback" role="alert" style="padding-top: 1.25rem;">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
    </div>
    <button type="submit" onclick="validarSesion();" class="btn btn-primary" >
        <i class="fas fa-sign-in-alt"></i>
        Ingresar
    </button>

</form>
<div class="separador">
    <h1>Beyond</h1>
    <p>Todos los derechos reservados © Beyond 2020.</p>
</div>
@endsection
@section('sombra')
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
