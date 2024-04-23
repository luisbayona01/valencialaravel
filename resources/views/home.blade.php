@extends('layouts.plantilla')

@section('content')
<script>
function gestionPartes(){
$("#container-principal").addClass('d-none');
$("#contenpartes").removeClass('d-none');
}


</script>

 @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
    <div class="container "id="container-principal">

        <div class="row justify-content-center">
            @if (  Auth::user()->idrol==1 || Auth::user()->idrol==3 )

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <div class="inner" bis_skin_checked="1" style="padding: 5% 0% 0% 0%" id="usser">
                            <a href="{{ route('users.index') }}">
                            <img src="{{ asset(url('img/usuarios.png')) }}"  alt="logo" style="width:100%">
                            <h4>
                               <a class="sidebar-link" href="{{ route('users.index') }}" style="text-align: center">Gestión Usuarios</a>
                            </h4>


                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <div class="inner" bis_skin_checked="1" style="padding: 5% 0% 0% 0%" id="partesasignados">
                            <a href="{{ url('/partes') }}">
                            <img src=" {{ asset(url('img/TransporteNotas.png')) }}" alt="logo" style="width:100%">
                            <h4>
                                <a class="sidebar-link" href="{{ url('/partes') }}" style="text-align: center">Gestión Partes</a>
                            </h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            @if (  Auth::user()->idrol==1 || Auth::user()->idrol==5 )
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <div class="inner" bis_skin_checked="1" style="padding: 5% 0% 0% 0%" id="gestorPenalidades" name="gestorPenalidades">
                            <a href="{{ url('/penalidades') }}">
                            <img src=" {{ asset(url('img/crearPenalidad.png')) }}" alt="logo" style="width:100%">
                            <h4>
                                <a class="sidebar-link" href="{{ url('/penalidades') }}" style="text-align: center">Gestión Penalizaciones</a>
                            </h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif



            @if (  Auth::user()->idrol==1 || Auth::user()->idrol==3 )

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <div class="inner" bis_skin_checked="1" style="padding: 5% 0% 0% 0%" id="gestorCertificaciones" name="gestorCertificaciones">
                            <a href="{{ url('/generarparte') }}">
                            <img src=" {{ asset(url('img/CertificadoPartes.png')) }}" alt="logo" style="width:100%">
                            <h4>
                                <a class="sidebar-link" href="{{ url('/generarparte') }}" style="text-align: center">Gestión Certificaciones</a>
                            </h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if (  Auth::user()->idrol==1 || Auth::user()->idrol==3 )
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <div class="inner" bis_skin_checked="1" style="padding: 5% 0% 0% 0%" id="gestorinventario">
                            <a href="{{ url('/gestorInventario') }}">
                            <img src=" {{ asset(url('img/Configuracion1.png')) }}" alt="logo" style="width:100%">
                            <h4>
                                <a class="sidebar-link" href="{{ url('/gestorInventario') }}" style="text-align: center">Gestión Configuraciones</a>
                            </h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>

    </div>

    <div class="container  d-none" id="contenpartes">



    </div>
@endsection
