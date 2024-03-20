@extends('layouts.plantilla')

@section('content')
<script>
function gestionVistasPartes(){
$("#container-principal").addClass('d-none');
$("#contenpartes").removeClass('d-none');
}
</script>


    <div class="container "id="container-principal">
        <div class="row justify-content-center">

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <div class="inner" bis_skin_checked="1">
                            <a href="{{ url('roles') }}">@csrf
                            <img src=" {{ asset(url('img/Perfiles.png')) }}" alt="logo" style="width:100%">
                            <h4>
                                <h4 class="sidebar-link" style="text-align: center">Gestión de Perfiles</h4>
                            </h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <div class="inner" bis_skin_checked="1">
                            <a href="{{ url('configPortada') }}" target="_blank">@csrf
                            <img src=" {{ asset(url('img/Portada.png')) }}" alt="logo" style="width:100%">
                            <h4>
                                <h4 class="sidebar-link" style="text-align: center">Configuracion de Portada</h4>
                            </h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4" style="display: none">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <div class="inner" bis_skin_checked="1">
                            <a href="{{ route('partes.create') }}">
                            <img src="{{ asset(url('img/CrearPartes.png')) }}"  alt="logo" style="width:100%">
                            <h4>
                               <a class="sidebar-link" href="{{ route('partes.create') }}" style="text-align: center">Creacion de partes</a>
                            </h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <div class="inner" bis_skin_checked="1">
                            <a href="{{ url('/informecorrectivos') }}">
                            <img src=" {{ asset(url('img/listaConservacion2.png')) }}" alt="logo" style="width:100%">
                            <h4>
                                <h4 class="sidebar-link" style="text-align: center">Lista de Conservación</h4>
                            </h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <div class="inner" bis_skin_checked="1">

                            <a href="{{ url('/listaPrecios') }}">

                            <img src=" {{ asset(url('img/ListadePrecios2.png')) }}" alt="logo" style="width:100%">
                            <h4 style="text-align: center;">
                                <h4 class="sidebar-link" style="text-align: center">Lista de Precios</h4>
                            </h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div style="text-align: right; padding: 0px 10px 10px 10px">
            <button type="button" onclick="goToHome()" class="btn btn-secondary" style="text-align: right;">Volver</button>
        </div>
        <script>
            function goToHome() {
                window.location.href = "{{ url('/home') }}";
            }
        </script>

    </div>

    <div class="container  d-none" id="contenpartes">



    </div>
@endsection
