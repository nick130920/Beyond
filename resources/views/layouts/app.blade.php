<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('/images/img/logoRedondo.svg')}}" type="image/svg" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Beyond') }}</title>

    <!-- Scripts -->
    <link href="{{asset('bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">
    @yield('links')
    <!-- sweetAlert 2-->
    <link rel="stylesheet" type="text/css" href="{{asset('/sweetAlert/dist/sweetalert2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/alertify/css/themes/semantic.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/alertify/css/alertify.min.css')}}">
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('/css/custom.min.css')}}">
</head>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a class="site_title" href="{{ url('/') }}">
              <i><img src="{{asset('/images/img/logoRedondo.svg')}}"></i>
              <span>{{ config('app.name', 'Beyond') }}</span>
            </a>
          </div>
          <div class="clearfix"></div>
          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="{{asset($profile->url) ?? asset('/images/profile/user_default.png')}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Bienvenido</span>
              <h2>{{ $profile->first_name }}</h2>
            </div>
          </div>
          <!-- /menu profile quick info -->
          <br/>
          @yield('sidebar_menu')
        </div>
      </div>
      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset($profile->url) ?? asset('/images/profile/user_default.png')}}" alt="">
                    {{ $profile->first_name }}
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="{{route('profile')}}">Perfil</a>
                    <a class="dropdown-item"  href="javascript:;">Aiuda</a>
                    <a class="dropdown-item"  href="{{ route('logout') }}" onclick="event.preventDefault();                    document.getElementById('logout-form').submit();">
                      <i class="fa fa-sign-out pull-right"></i>{{ __('Cerrar sesión')}}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  </div>
                </li>
                <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-envelope"></i>
                    <span class="badge bg-green">1</span>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="{{asset($profile->url) ?? asset('/images/profile/user_default.png')}}" alt="Profile Image" /></span>
                        <span>
                          <span>{{ $profile->first_name }}</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
        </div>
      </div>
      <!-- /top navigation -->
      @yield('contenido')
    </div>
  </div>
  <!-- jQuery -->
  <script src="{{asset('/jquery/dist/jquery.min.js')}}"></script>
  <!-- Bootstrap -->
  <script src="{{asset('/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <!-- Custom Theme Scripts -->
  <script src="{{asset('/js/custom.min.js')}}"></script>
  @yield('scripts')
  <script src="{{asset('/js/validar.js')}}"></script>
  <script src="{{asset('/alertify/alertify.min.js')}}"></script>
  <script src="{{asset('/sweetAlert/dist/sweetalert2.min.js')}}"></script>
</body>
</html>
