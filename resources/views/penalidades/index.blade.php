@extends('layouts.plantilla')

@section('template_title')
    Penalidades
@endsection


@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script>
$(document).ready( function () {
    $('#penalidades').DataTable();
} );
</script>

<style>
    .common-button {
    width: 90px; /* Ajusta el valor según tus necesidades */
    height: 25px; /* Ajusta el valor según tus necesidades */
    /* Agrega otros estilos si es necesario */
}

</style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                        <!-- Encabezado del Formulario de Vistas -->
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                          <div >
                            <img src="{{asset('img/icono_representativo_caratula.png')}}" class="card-img-top" style="width: 30rem;">
                        </div>

                            <div class="float-right">
                            @php
                                $idrol = Auth::user()->idrol;
                            @endphp

                            @if ($idrol == 1 || $idrol == 5)
                                <a href="{{ route('penalidades.panel.modulos') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Nueva Penalidad') }}
                                </a>
                            @endif

                        </div>




                        </div>
                    </div>

                    <div style="text-align: center;">
                        <h2><strong>Módulo Penalizaciones</strong></h2>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive" style="padding: 1% 1% 1% 1%">
                            <table class="table table-striped table-hover" id="penalidades">
                                <thead class="thead">
                                    <tr>
                                        <th style="text-align: center">Id penalidad</th>
                                        <th style="text-align: center">Tipo</th>
                                        <th style="text-align: center">Fecha creación</th>
                                        <th style="text-align: center">Creado por</th>
                                        <th style="text-align: center">Observaciones creación</th>
                                        <th style="text-align: center">Operaciones</th>
                                        <th style="text-align: center">Valor penalidad</th>
                                        <th style="text-align: center">Estado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penalidades as $penalidad)
                                    <tr>
                                        <td style="text-align: center; font-size: 0.9em">{{ $penalidad->idpenalidad }}</td>
                                        <td style="text-align: center; font-size: 0.9em">
                                            @switch($penalidad->tipoPenalidad)
                                                @case(1) P-1 @break
                                                @case(2) P-2 @break
                                                @case(3) P-3 @break
                                                @case(4) P-4 @break
                                                @case(5) P-5 @break
                                                @case(6) P-6 @break
                                                @case(7) P-7 @break
                                                @case(8) P-8 @break
                                                @case(9) P-9 @break
                                                @case(10) P-10 @break
                                                @case(11) P-11 @break
                                                @case(12) P-12 @break
                                                @case(13) P-13 @break
                                                @case(14) P-14 @break
                                                @case(15) P-15 @break
                                                @default No definido
                                            @endswitch
                                        </td>
                                        <td style="text-align: center; font-size: 0.9em">{{ $penalidad->fechaCreacion }}</td>
                                        <td style="text-align: center; font-size: 0.9em">
                                            <?php
                                            $usuario = App\Models\User::find($penalidad->creadoPor);
                                            if($usuario) {
                                                echo $usuario->codigo;
                                            } else {
                                                echo "Usuario no encontrado";
                                            }
                                            ?>
                                        </td>
                                        <td style="text-align: justify; font-size: 0.9em">{{ $penalidad->obsCreacion }}</td>
                                        <td style="text-align: right; font-size: 0.9em">{{ $penalidad->operaciones }}</td>
                                        <td style="text-align: right; font-size: 0.9em">{{ $penalidad->valorPenalidad4 }}</td>
                                        <td style="text-align: center; font-size: 0.7em">
                                            <span class="{{ $penalidad->estadopenalidad_Id }}" style="display: block; width: 100%; height: 100%; text-align: center; @switch($penalidad->estadopenalidad_Id) @case(1) background-color: #00FF0090; color: black; @break @case(2) background-color: #0000ee; color: white; @break @case(3) background-color: #ff000090; color: black; @break @case(4) background-color: gray; color: white; @break @default background-color: red; color: white; @endswitch">
                                                @switch($penalidad->estadopenalidad_Id)
                                                    @case(1) Activo @break
                                                    @case(2) Aceptado @break
                                                    @case(3) Rechazado @break
                                                    @case(4) Anulado @break
                                                    @default Estado no válido
                                                @endswitch
                                            </span>
                                        </td>


                                        <td style="text-align: center; font-size: 1em">
                                            @if ($penalidad->estadopenalidad_Id == 1)
                                                <a  href='{{ url('vistas/'. $penalidad->idpenalidad) }}' class="btn btn-primary btn-sm common-button" style="color: white;"><strong>Revisar</strong></a>
                                            @elseif ($penalidad->estadopenalidad_Id == 2)
                                                <a  href='{{ url('vistas/'. $penalidad->idpenalidad) }}' class="btn btn-primary btn-sm common-button" style="color: white;"><strong>Imputar</strong></a>
                                            @elseif ($penalidad->estadopenalidad_Id == 3)
                                                <a  href='{{ url('vistas/'. $penalidad->idpenalidad) }}' class="btn btn-primary btn-sm common-button" style="color: white;"><strong>Verificar</strong></a>
                                            @elseif ($penalidad->estadopenalidad_Id == 4)
                                                <a  href='{{ url('vistas/'. $penalidad->idpenalidad) }}' class="btn btn-secondary btn-sm common-button" style="color: white;"><strong>Ver</strong></a>
                                            @endif




                                            <form action="{{ route('penalidades.destroy',$penalidad->idpenalidad) }}" method="POST">
                                                <a class="btn btn-sm btn-primary" style="display: none; color: white;" href="{{ route('penalidades.show',$penalidad->idpenalidad) }}"><i class=""></i> {{ __('Ver') }}</a>
                                                <a class="btn btn-sm btn-warning" style="display: none; color: black" href="{{ route('penalidades.edit',$penalidad->idpenalidad) }}"><i class=""></i> {{ __('Editar') }}</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" style="display: none"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

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

            </div>
        </div>
    </div>
@endsection
