@extends('layouts.auth')

@section('content') 
<form class="col-12" method="POST" action="{{ route('password.confirm') }}">
    @csrf
    <p>Por favor confirme su contraseña para continuar</p>
    <div class="form-group">
        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-paper-plane"></i>Enviar
    </button>
</form>
<div class="separador">
    <h1>Beyond</h1>
    <p>Todos los derechos reservados © Beyond 2020.</p>
</div>
<div class="col-6 abajo">
    @if (Route::has('password.request'))
    <a href="{{ route('password.request') }}">
    {{ __('¿Olvidaste tu contraseña?') }}</a>
    @endif
</div>
@endsection