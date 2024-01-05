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
                            <a href="{{ url('/partes') }}">
                            <img src=" {{ asset(url('img/Inventario.png')) }}" alt="logo" style="width:100%">
                            <h4>
                                <a class="sidebar-link" href="{{ url('/partes') }}" style="text-align: center"> Seguimiento Parte</a>
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
