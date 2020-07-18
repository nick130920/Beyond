<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('auth.name', 'Beyond') }}</title>

        <!-- Fuentes -->

        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css2?family=Vollkorn&display=swap" rel="stylesheet">
        @yield('links')

        <!-- mis Estilos -->
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/login.css') }}">

        <!-- Alertas -->
        <link rel="stylesheet" type="text/css" href="{{ asset('/alertify/css/alertify.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/alertify/css/themes/semantic.min.css') }}">

        <!-- Bootstrap -->
        <link href="{{ asset('/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">
        <script type="text/javascript">
        $(document).ready(function() {
          $("form").keypress(function(e) {
            if (e.which == 13) {
              return false;
            }
          });
        });
        </script>
    </head>
    <body >
        <div class="body">
        <div class="contenTodo text-center">
            <div class="col-ms-8 main-section">
                    @yield('content')
            </div>
        </div>
    </div>
        <script type="text/javascript" src="{{ asset('/js/validar.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/alertify/alertify.min.js') }}"></script>
    </body>
</html>
