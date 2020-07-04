@extends('layouts.auth')

@section('content')
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="col-12" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <h1>Recupera tu contraseña</h1>
                        <p>Por favor ingrese el correo con el que se registro</p>
                        <div class="form-group">
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo"/>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <button type="submit" class="btn btn-primary" onclick="return validarCorreo();"><i class="fas fa-paper-plane"></i>
                            Enviar
                        </button>
                    </form>
                    <div class="separador">
                        <h1>Beyond</h1>
                        <p>Todos los derechos reservados © Beyond 2020.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
