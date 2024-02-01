@extends('layouts.plantilla')

@section('content')
<script>
function gestionPartes(){
$("#container-principal").addClass('d-none');
$("#contenpartes").removeClass('d-none');
}


</script>


    <div class="container "id="container-principal">

        <div class="row justify-content-center">

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <div class="inner" bis_skin_checked="1" style="padding: 5% 0% 0% 0%">
                            <a href="{{ route('users.index') }}">
                            <img src="{{ asset(url('img/usuarios.png')) }}"  alt="logo" style="width:100%">
                            <h4>
                               <a class="sidebar-link" href="{{ route('users.index') }}" style="text-align: center">{{ \App\Models\User::count() }} Usuarios</a>
                            </h4>


                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <div class="inner" bis_skin_checked="1" style="padding: 5% 0% 0% 0%">
                            <a href="{{ url('/partes') }}">
                            <img src=" {{ asset(url('img/TransporteNotas.png')) }}" alt="logo" style="width:100%">
                            <h4>
                                <a class="sidebar-link" href="{{ url('/partes') }}" style="text-align: center">Partes Asignados</a>
                            </h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <div class="inner" bis_skin_checked="1" style="padding: 5% 0% 0% 0%">
                            <a href="{{ url('/...') }}">
                            <img src=" {{ asset(url('img/Inventario.png')) }}" alt="logo" style="width:100%">
                            <br><br><h4 style="text-align: center;">
                                Gestor de Inventario
                            </h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>

    <div class="container  d-none" id="contenpartes">



    </div>
@endsection
