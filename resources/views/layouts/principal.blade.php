<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema Compras-Ventas con Laravel y Vue Js- webtraining-it.com">
    <meta name="keyword" content="Sistema Compras-Ventas con Laravel y Vue Js">
    <title>{{ env('app_name') }}</title>
    <!-- css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- icons -->
    <script src="https://kit.fontawesome.com/2edbb78237.js" crossorigin="anonymous"></script>
</head>

<body class="app sidebar-fixed aside-menu-fixed aside-menu-hidden">

    <div id="app">
        <div class="app-body">
            <!-- sidebar menu-->
            @include('layouts.sidebar')
            <!-- fin del sidebar menu -->

            <!-- Contenido Principal -->
            @yield('contenido')
            <!-- /Fin del contenido principal -->
        </div>
    </div>


    <footer class="app-footer">
        <span class="ml-auto"><a href="http://www.twitter.com/SamBarFu" target="_blank">&copy; SamSoft 2020</a></span>
    </footer>

    <!-- libraries and plugins necesary -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- components vue.js -->
    <script src="{{ asset('js/appVue.js') }}"></script>

    {{-- scripts --}}
</body>

</html>
