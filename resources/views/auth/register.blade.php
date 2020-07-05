@extends('layouts.auth')

@section('content')
    <form class="col-12" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Nombre">

            @error('name')
                <script type="text/javascript">
                    
                    window.onload = function alerta() {
                      alertify.set('notifier','position', 'top-right');
                      alertify.notify ("Chingas a tu madre",'error', 2, function(){});
                    }

                </script>
            @enderror
        </div>
        <div class="form-group">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Contraseña">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password" placeholder="Contraseña confirmación">
        </div>
        <button type="submit" class="btn btn-primary">
            {{ __('Registrar') }}
        </button>
    </form>
    <div class="separador">
        <h1>Beyond</h1>
        <p>Todos los derechos reservados © Beyond 2020.</p>
    </div>
@endsection
