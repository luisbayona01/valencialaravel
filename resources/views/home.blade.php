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
                        <div class="inner" bis_skin_checked="1">
                            <img src="{{ asset(url('img/PartesVal.png')) }}" alt="logo" style="width:100%">
                            <h4 onclick="gestionPartes()"style="cursor:pointer">
                                Gestor de Partes
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <div class="inner" bis_skin_checked="1">
                            <img src=" {{ asset(url('img/Inventario.png')) }}" alt="logo" style="width:100%">
                            <h4>
                                Gestor de Inventario
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <div class="inner" bis_skin_checked="1">
                            <img src="{{ asset(url('img/Documento.png')) }}" alt="logo" style="width:100%">
                            <h4>
                                Documentos de Certificación
                            </h4>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container  d-none" id="contenpartes">

        <div class="row justify-content-center">

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <div class="inner" bis_skin_checked="1">
                            <img src="{{ asset(url('img/CrearPartes.png')) }}" alt="logo" style="width:100%">
                            <h4>
                               <a class="sidebar-link" href="{{ route('partes.create') }}">Creacion de partes</a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <div class="inner" bis_skin_checked="1">
                            <img src=" {{ asset(url('img/Inventario.png')) }}" alt="logo" style="width:100%">
                            <h4>

  <a class="sidebar-link" href="{{ url('/partes') }}"> Seguimiento Parte</a>

                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <div class="inner" bis_skin_checked="1">
                            <img src="{{ asset(url('img/CertificadoPartes.png')) }}" alt="logo" style="width:100%">
                            <h4>
                               Certificado de Partes
                            </h4>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
