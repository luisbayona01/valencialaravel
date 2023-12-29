<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="shortcut icon" href="{{ asset('img/icono-negro.png') }}" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Etra Valencia</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">




    <link href="{{  asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/light.css') }}" rel="stylesheet">
    <link href="{{asset('css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}"rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}"rel="stylesheet">

    <!-- Scripts -->

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('js/toastr.min.js') }}"></script>

    <script src="{{ asset('js/moment-with-locales.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <!-- Fonts -->
 <script>
$(".table").DataTable({
    responsive:true
});
 </script>


    <style>

    </style>

</head>

<body data-theme="light" >


    <div class="wrapper">
       <nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <!-- Opening div for sidebar-content -->

        <div class="sidebar-brand">
            <!-- Opening div for sidebar-brand -->

            <span class="align-middle">
                <img class="card-img-top" src="{{ asset('img/logo-blanco-bloque.png') }}" alt="Card image cap">
            </span>

        </div>
        <!-- Closing div for sidebar-brand -->

        <ul class="sidebar-nav">
            <!-- Opening div for sidebar-nav -->

            <li class="sidebar-header">

            </li>

            <a href="{{ url('/home') }}" class="sidebar-link collapsed">
                <!-- Opening div for sidebar-link -->

                <i class="fa fa-tachometer"></i> <span class="align-middle">Inicio</span>
            </a>
            <!-- Closing div for sidebar-link -->

            <!-- Administracion CRUD usuarios al sistema -->

            <a href="{{ url('/users') }}" class="sidebar-link collapsed">
                <!-- Opening div for sidebar-link -->

                <i class="fa fa-user-plus"></i> <span class="align-middle">Administración usuarios</span>
            </a>


            <!-- Nivel de Adminitracion de Perfiles de acceso al sistema -->


            <a href="{{ url('/roles') }}" class="sidebar-link collapsed">
                <!-- Opening div for sidebar-link -->
                <i class="fa fa-users"></i> <span class="align-middle">Administración perfiles</span>
            </a>


            <a href="javascript:void(0);" onclick="gestionPartes()" class="sidebar-link collapsed">
                <!-- Opening div for sidebar-link -->
                <i class="fa fa-check-square"></i> <span class="align-middle">Gestión de partes</span>
            </a>



            <li >
                <!-- Opening div for the second list item -->

                <a data-target="#NOMINA" data-toggle="collapse" class="sidebar-link collapsed">
                    <!-- Opening div for sidebar-link -->
                    <i class="fa fa-check-square"></i> <span class="align-middle">Gestion de partes </span>
                </a>
                <!-- Closing div for sidebar-link -->

                <ul id="NOMINA" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <!-- Opening div for sidebar-dropdown -->

                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('/partes') }}">creacion y seguimiento </a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="">certificado </a></li>

                </ul>
                <!-- Closing div for sidebar-dropdown -->
                <!-- onclick="gestionPartes()" style="cursor:pointer" -->

            </li>
            <!-- Closing div for the second list item -->



        </ul>
        <!-- Closing div for sidebar-nav -->

    </div>
    <!-- Closing div for sidebar-content -->

</nav>
<!-- Closing div for the navigation (nav) -->


        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>



                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">


                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                data-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                data-toggle="dropdown">
                                <img src="{{ asset('img/avatar.jpg') }}" class="avatar img-fluid rounded mr-1"
                                    alt="Charles Hall" /> <span class="text-dark">{{ Auth::user()->nombres }}
                                    {{ Auth::user()->apellidos }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('users.show',Auth::user()->id) }}"><i class="align-middle mr-1"
                                        data-feather="user"></i> Perfil</a>




                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{url('/logout')}}">Salir</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>



            <main class="content">
                <div class="container-fluid p-0">
                    @yield('content')
                </div>
            </main>

        </div>

</div>


        @yield('scripts')
</body>

</html>