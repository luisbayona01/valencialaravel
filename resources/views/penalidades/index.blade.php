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

                            @if ($idrol == 1 || $idrol == 2 || $idrol == 3)
                                <a href="{{ route('penalidades.panel.modulos') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Nueva Penalidad') }}
                                </a>
                            @endif

                        </div>




                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive" style="padding: 1% 1% 1% 1%">
                            <table class="table table-striped table-hover" id="penalidades">
                                <thead class="thead">
                                    <tr>
										<th style="text-align: center">Id penalidad</th>
                                        <th style="text-align: center">Tipo</th>
										<th style="text-align: center">Fecha creacion</th>
										<th style="text-align: center">Creado por</th>
										<th style="text-align: center">Observaciones creacion</th>
										<th style="text-align: center">Valor penalidad</th>
										<th style="text-align: center">Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penalidades as $penalidades)
                                        <tr>

											<td style="text-align: center; font-size: 0.9em">{{ $penalidades->idpenalidad }}</td>
                                            <td style="text-align: center; font-size: 0.9em">
                                                <?php
                                                switch ($penalidades->tipoPenalidad) {
                                                    case 1:
                                                        echo 'P-1';
                                                        break;
                                                    case 2:
                                                        echo 'P-2';
                                                        break;
                                                    case 3:
                                                        echo 'P-3';
                                                        break;
                                                    case 4:
                                                        echo 'P-4';
                                                        break;
                                                    case 5:
                                                        echo 'P-5';
                                                        break;
                                                    case 6:
                                                        echo 'p-6';
                                                        break;
                                                    case 7:
                                                        echo 'P-7';
                                                        break;
                                                    case 8:
                                                        echo 'P-8';
                                                        break;
                                                    case 9:
                                                        echo 'P-9';
                                                        break;
                                                    case 10:
                                                        echo 'P-10';
                                                        break;
                                                    case 11:
                                                        echo 'P-11';
                                                        break;
                                                    case 12:
                                                        echo 'P-12';
                                                        break;
                                                    case 13:
                                                        echo 'P-13';
                                                        break;
                                                    case 14:
                                                        echo 'P-14';
                                                        break;
                                                    case 15:
                                                        echo 'P-15';
                                                        break;
                                                    default:
                                                        echo 'No definido';
                                                }
                                                ?>
                                            </td>

											<td style="text-align: center; font-size: 0.9em">{{ $penalidades->fechaCreacion }}</td>
											<td style="text-align: center; font-size: 0.9em">{{ $penalidades->creadoPor }}</td>
											<td style="text-align: Justify; font-size: 0.9em">{{ $penalidades->obsCreacion }}</td>
											<td style="text-align: right; font-size: 0.9em">{{ $penalidades->valorPenalidad4 }}</td>
                                            <td style="text-align: center; font-size:0.7em">
                                                <span class="{{ $penalidades->estadopenalidad_Id }}" style="display: block; width: 100%; height: 100%; text-align: center;
                                                    <?php
                                                        switch ($penalidades->estadopenalidad_Id) {
                                                            case 1:
                                                                echo 'background-color: #00FF0090; color: black; !important';
                                                                echo '">Activo';
                                                                break;
                                                            case 2:
                                                                echo 'background-color: #0000ee; color: white; !important';
                                                                echo '">Aceptado';
                                                                break;
                                                            case 3:
                                                                echo 'background-color: #ff000090; color: black; !important';
                                                                echo '">Rechazado';
                                                                break;
                                                            case 4:
                                                                echo 'background-color: gray; color: white; !important';
                                                                echo '">Anulado';
                                                                break;
                                                            default:
                                                                echo '">Estado no válido';
                                                                break;
                                                        }
                                                    ?>
                                                </span>
                                            </td>


                                            <td style="text-align: center; font-size:1em">

                                                @if ($penalidades->estadopenalidad_Id == 1)
                                                    <a href="#" class="btn btn-primary btn-sm common-button" style="color:white;"><strong>Revisar</strong></a>
                                                @elseif ($penalidades->estadopenalidad_Id == 2)
                                                    <a href="#" class="btn btn-primary btn-sm common-button" style="color:white;"><strong>Imputar</strong></a>
                                                @elseif ($penalidades->estadopenalidad_Id == 3)
                                                    <a href="#" class="btn btn-primary btn-sm common-button" style="color:white;"><strong>Verificar</strong></a>
                                                @elseif ($penalidades->estadopenalidad_Id == 4)
                                                    <a href="#" class="btn btn-secondary btn-sm common-button" style="color:white;"><strong>Ver</strong></a>
                                                @endif

                                                <form action="{{ route('penalidades.destroy',$penalidades->idpenalidad) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" style="display: none; color:white;" href="{{ route('penalidades.show',$penalidades->idpenalidad) }}"><i class=""></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-warning" style="display: none; color:black" href="{{ route('penalidades.edit',$penalidades->idpenalidad) }}"><i class=""></i> {{ __('Editar') }}</a>
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
