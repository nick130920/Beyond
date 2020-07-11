<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Beyond') }}</title>
    <link rel="icon" type="image/svg" href="{{asset('images/img/logoRedondo.svg')}}">

    <!-- mis Estilos -->
    <link rel="stylesheet" type="text/css" href="{{asset('/css/miStyle.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">
    <!-- Bootstrap -->
    <link href="{{asset('/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">

</head>
<body>
  <div class="encabezado">
    <div class="navBar">
      <h1>Beyond</h1>
      <nav>
        <ul>
          <!-- Authentication Links -->
          @guest
            @if (Route::has('register'))
              <li>
                <a href="{{ route('register') }}">{{ __('Registro') }}</a>
              </li>
            @endif
            <li>
              <a href="{{ route('login') }}">{{ __('Inicia Sesión') }}</a>
            </li>
          @else
            <li>
              <a href="{{ route('home') }}">{{ __('Home') }}</a>
            </li>
            <li>
                <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Cerrar sesión') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
          @endguest
        </ul>
      </nav>
    </div>

    <div class="subEncabezado">
      <div class="imagen">
        <img src="{{asset('/images/img/logoRedondo.svg')}}">
      </div>
      <div class="texto">
        <h1>Beyond</h1>
        <p>Ofrecemos la mejor herramienta educativa para su institución</p>
        <a href="#"><i class="fas fa-phone-alt"></i> Contáctanos</a>
      </div>

    </div>
  </div>

  <div class="Cuerpo">
    <h1>Como ingresar a la plataforma</h1>

    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{asset('/images/img/fondo1.svg')}}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{asset('/images/img/fondo1.svg')}}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{asset('/images/img/fondo1.svg')}}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
      <div class="Botones">
          <ul><a href="#">Saber más</a></ul>
      </div>

  </div>
</div>
  <div class="footer">
    <p>Todos los derechos reservados © Beyond 2020.</p>
  </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>
