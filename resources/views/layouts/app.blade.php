<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Activities</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .footer {
          position: fixed;
          left: 0;
          bottom: 0;
          width: 100%;
          background-color: red;
          color: white;
          text-align: center;
        }
        </style>
</head>
<body class="">
    <div id="app">
        <nav class="navbar navbar-expand-md bg-primary navbar-dark shadow">
            <div class="container">
                <a class="navbar-brand text-dark" href="{{ url('/') }}">
                    <h1 style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Activities</h1>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                              <li class="nav-item">
                                <a class="nav-link" href="{{ route('act.index') }}">Activities</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="{{ route('todo.index') }}">Todos</a>
                              </li>
                    </ul>

                    <!-- Right Side Of Navbar -->

                </div>

            </div>
        </nav>

        <div class="mb-3">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
        <div>
            <div class="footer bg-primary">
                <p>&copy iqbal hambali</p>
              </div>
        </div>
    </body>
    <!-- Footer -->

</html>
