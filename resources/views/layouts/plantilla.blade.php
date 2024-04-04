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




    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/light.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}"rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}"rel="stylesheet">

    <!-- Scripts -->

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <script src="{{ asset('js/moment-with-locales.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <!-- Fonts -->
    <script>
        $(".table").DataTable({
            responsive: true
        });
    </script>


    <style>
        .custom-width {
            width: 300px;
        }
    </style>

</head>

<body data-theme="light">


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
                    @if (Auth::user()->idrol == 1 || Auth::user()->idrol == 3)
                        <a href="{{ url('/users') }}" class="sidebar-link collapsed">
                            <!-- Opening div for sidebar-link -->

                            <i class="fa fa-user-plus"></i> <span class="align-middle">Gestión Usuarios</span>
                        </a>
                    @endif

                    <!-- Nivel de Adminitracion de Perfiles de acceso al sistema -->

                    @if (Auth::user()->idrol == 1 || Auth::user()->idrol == 3)
                        <a href="{{ url('/roles') }}" class="sidebar-link collapsed" style="display: none">
                            <!-- Opening div for sidebar-link -->
                            <i class="fa fa-users" style="display: none"></i> <span class="align-middle">Gestión
                                Perfiles</span>
                        </a>
                    @endif


                    <a href="{{ url('/partes') }}" onclick="gestionPartes()" class="sidebar-link collapsed">
                        <!-- Opening div for sidebar-link -->
                        <i class="fa fa-check-square"></i> <span class="align-middle">Gestión Partes</span>
                    </a>

                    <a href="{{ url('/penalidades') }}" onclick="gestionPartes()" class="sidebar-link collapsed">
                        <!-- Opening div for sidebar-link -->
                        <i class="fa fa-gavel"></i> <span class="align-middle">Gestión Penalizaciones</span>
                    </a>

                    <a href="{{ url('/generarparte') }}" onclick="gestionPartes()" class="sidebar-link collapsed">
                        <!-- Opening div for sidebar-link -->
                        <i class="fa fa-usd" aria-hidden="true"></i><span class="align-middle">Gestión
                            Certificaciones</span>
                    </a>



                    <a href="{{ url('/gestorInventario') }}" onclick="gestionPartes()" class="sidebar-link collapsed">
                        <!-- Opening div for sidebar-link -->
                        <i class="fa  fa-cogs"></i> <span class="align-middle">Gestión Configuración</span>
                    </a>

                    <a href="{{ url('/informecorrectivos') }}" class="sidebar-link collapsed" style="display: none">
                        <!-- Opening div for sidebar-link -->
                        <i class="fa fa-file-text-o"></i> <span class="align-middle"> Cargar lista de
                            Conservacion</span>
                    </a>




                    <!-- <li > -->
                    <!-- Opening div for the second list item -->

                    <!--     <a data-target="#NOMINA" data-toggle="collapse" class="sidebar-link collapsed"> -->
                    <!-- Opening div for sidebar-link -->
                    <!--  <i class="fa fa-check-square"></i> <span class="align-middle">Gestion de partes2 </span> -->
                    <!--  </a> -->
                    <!-- Closing div for sidebar-link -->

                    <!--    <ul id="NOMINA" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar"> -->
                    <!-- Opening div for sidebar-dropdown -->

                    <!--      <li class="sidebar-item"><a class="sidebar-link" href="{{ url('/partes') }}">creacion y seguimiento </a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="">certificado </a></li> -->

                    <!--  </ul> -->
                    <!-- Closing div for sidebar-dropdown -->
                    <!-- onclick="gestionPartes()" style="cursor:pointer" -->

                    <!--    </li> -->
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
                                <!-- Linea para vista de Usuarios diferente a Administradores -->
                                <a class="dropdown-item" href="{{ route('users.show', Auth::user()->id) }}"><i
                                        class="align-middle mr-1" data-feather="user"></i> Perfil</a>

                                <!-- Linea para el Cambio de contraseña Usuarios diferente a Administradores -->
                                <a href="#" class="dropdown-item" data-toggle="modal"
                                    data-target="#perfilModal">
                                    <i class="align-middle mr-1" data-feather="user"></i> Cambiar Contraseña
                                </a>

                                <!-- Linea para Salida de Actividad en Aplicación -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ url('/logout') }}">Salir</a>
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


    <div class="modal fade" id="perfilModal" tabindex="-1" role="dialog" aria-labelledby="perfilModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="perfilModalLabel">Cambiar Contraseña</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- formulario de edición de contraseña -->
                    <div class="box box-info padding-1" style="padding: 0% 5% 5% 5%">
                        <div class="box-body">
                            <form method="POST"
                                action="{{url('/cambiarcontrasena')}}"
                                role="form" enctype="multipart/form-data" id=""
                                class="needs-validation" novalidate>
                                @csrf
                                <div class="form-group">
                                    {{ Form::label('Contraseña') }}
                                  <input type="hidden"name="id" value="{{Auth::user()->id}}" >
                                    {{ Form::text('password', null, ['id' => 'password', 'class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Contraseña', 'required' => 'required']) }}
                                    <div class="invalid-feedback"> La contraseña es obligatoria </div>
                                </div>
                        </div>
                        <div class="box-footer mt20">
                            <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                            <button style="text-align: right;" type="button" class="btn btn-danger"
                                data-dismiss="modal">
                                Cancelar
                            </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#perfilModal').on('shown.bs.modal', function() {
                $('#password').val(''); // Limpia el campo de contraseña
            });
        });
    </script>




    @yield('scripts')
</body>

</html>
