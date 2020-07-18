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
    <!-- Icons -->
    <script src="https://kit.fontawesome.com/2edbb78237.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/simple-line-icons.min.css') }}" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/my_style.css') }}" rel="stylesheet">
</head>

<body class="app sidebar-fixed aside-menu-fixed aside-menu-hidden">

    <div class="app-body">

        <!-- sidebar menu-->
        <div class="sidebar">
            <nav class="sidebar-nav">
                <li class="head-menu nav-item">
                    <a class="navbar-brand text-light" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <a href="#"><i class="fas fa-columns fa-lg"></i></a>
                </li>
                <ul class="nav">
                    <li class="nav-title">
                        Menú
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-list"></i> Categorías</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-tasks"></i> Productos</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-shopping-cart"></i> Compras</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-users"></i> Proveedores</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-suitcase"></i> Ventas</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-users"></i> Clientes</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-user"></i> Usuarios</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-list"></i> Roles</a>
                    </li>
                </ul>
            </nav>
            <button class="sidebar-minimizer brand-minimizer" type="button" disabled></button>
        </div>
        <!-- fin del sidebar menu -->

        <!-- Contenido Principal -->
        @yield('contenido')
        <!-- /Fin del contenido principal -->

    </div>


    <footer class="app-footer">
        <span class="ml-auto"><a href="http://www.twitter.com/SamBarFu" target="_blank">&copy; SamSoft 2020</a></span>
    </footer>

    <!-- Bootstrap and necessary plugins -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/pace.min.js"></script>
    <!-- Plugins and scripts required by all views -->
    <script src="js/Chart.min.js"></script>
    <!-- GenesisUI main scripts -->
    <script src="js/template.js"></script>

    {{-- scripts --}}
</body>

</html>
