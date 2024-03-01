<!-- FORM DEL FRONT EDIT -->

@extends('layouts.plantilla')

@section('template_title')
    Parte
@endsection



@section('content')
 <style>

.Activo {
background-color: #00FF0050 !important;
/* Estado 1 Activo */
}
.Revisar{
background-color:#ff000020 !important;
/* Estado 2 Revisar */
}
.Finalizado{
background-color:#FFD70060 !important;
/* Estado 3 Finalizado */
}
.Comprobado{
background-color:#ED912170 !important;
/* Estado 4 Comprobado */
 }
 .Validado{
 background-color:#ED912170 !important;
/* Estado 5 Comprobado */
 }
 .Certificado{
background-color:#00a2d360 !important;
/* Estado 6 Certificado */
 }
 .Rechazado{
background-color:#ff000090 !important;
/* Estado 7 Rechazado */
 }
.Anulado{
background-color:#84857d !important;
/* Estado 8 Anulado */
color: #ffFF ;
 }

 .common-button {
    width: 90px; /* Ajusta el valor según tus necesidades */
    height: 25px; /* Ajusta el valor según tus necesidades */
}

@php
    $totalPartes = count($partes);
@endphp


</style>
    <div class="container-fluid" >
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                          <div >
                            <img src="{{asset('img/icono_representativo_caratula.png')}}" class="card-img-top" style="width: 30rem;">
                        </div>
                            <!--
                            <span id="card_title">
                                {{ __('Parte') }}
                            </span>
                            -->

                            <div class="float-right">
                            @php
                                $idrol = Auth::user()->idrol;
                            @endphp

                            @if ($idrol == 1 || $idrol == 2 || $idrol == 3)
                                <a href="{{ route('partes.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                    {{ __('Nuevo parte') }}
                                </a>
                            @endif
                        </div>




                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive" style="padding: 1% 1% 1% 1%">
                            <table class="table table-striped" id="table-parte" >
                                <thead class="thead">
                                    <tr style="text-align: center;">
                                        <th>No parte</th>
										<th>Ubicación novedad</th>
										<th>Tipo parte</th>
										<th>Comunicado por</th>
										<th>Fecha Comunicación</th>
										<th style="text-align: center;">Observaciones</th>
										<th>Reparado por</th>
										<th style="text-align: center;">Fecha Reparacion</th>
                                        <th>Total importe</th>
								        <th>Estado</th>
                                        <th>Acción</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($partes as $parte)
                                        <tr style="font-size:0.9em;">
                                            <td style="text-align: center;">{{  $parte->id }}</td> <!-- No. Parte -->
											<td style="text-align: center;">{{ $parte->cod_localizacion }}</td> <!-- Ubicacion Novedad -->
											<td>{{ $parte->tipoparte }}</td>
											<td style="text-align: center;">{{ $parte->reportadoPor}}</td> <!-- Comunicado por -->
											<td style="text-align: center;">{{ $parte->fechareporte }}</td> <!-- Fecha de comunicacion -->
											<td>{{ $parte->obscreadorparte }}</td> <!-- Observaciones -->
											<td style="text-align: center;">{{ $parte->asignadoA }}</td> <!-- Reparado por -->
											<td>{{ $parte->fechaAsignacion }}</td> <!-- Fecha reparacion -->
                                            <td>{{ number_format($parte->totalImp, 2, ',', '.') }} €</td>

											<td style="text-align: center;">
                                                <span class="{{ $parte->estadoparte }}" style="display: block; width: 100%; height: 100%; text-align: center;">
                                                    {{ $parte->estadoparte }}
                                                </span>
                                            </td> <!-- Estado -->
                                            <td style="text-align: center">
                                                <!-- Lógica para ocultar los botones -->
                                                @if ($parte->estadoparte === 'Activo')
                                                    <!-- Mostrar solo el botón Revisar -->
                                                    <a class="btn btn-sm btn-info common-button" href="{{ route('partes.edit', $parte->id) }}">
                                                        <i></i> {{ __('Gestionar') }}
                                                    </a>
                                                @elseif ($parte->estadoparte === 'Revisar')
                                                    <!-- Mostrar solo el botón Finalizar -->
                                                    <a class="btn btn-sm btn-info common-button" href="{{ route('partes.edit', $parte->id) }}">
                                                        <i></i> {{ __('Ver') }}
                                                    </a>
                                                @elseif ($parte->estadoparte === 'Revisar')
                                                    <!-- Mostrar solo el botón Comprobar -->
                                                    <a class="btn btn-sm btn-info common-button" href="{{ route('partes.edit', $parte->id) }}">
                                                        <i></i> {{ __('Ver') }}
                                                    </a>
                                                @elseif ($parte->estadoparte === 'Finalizado')
                                                    <!-- Mostrar solo el botón Comprobar -->
                                                    <a class="btn btn-sm btn-info common-button" href="{{ route('partes.edit', $parte->id) }}">
                                                        <i></i> {{ __('Ver') }}
                                                    </a>
                                                @elseif ($parte->estadoparte === 'Comprobado')
                                                    <!-- Mostrar solo el botón Comprobar -->
                                                    <a class="btn btn-sm btn-info common-button" href="{{ route('partes.edit', $parte->id) }}">
                                                        <i></i> {{ __('Ver') }}
                                                    </a>
                                                @else
                                                    <!-- Mostrar ambos botones Finalizar y Comprobar -->
                                                    <a class="btn btn-sm btn-info common-button" href="{{ route('partes.edit', $parte->id) }}">
                                                        <i></i> {{ __('Ver') }}
                                                    </a>

                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    <!-- Script para Ordenar Lista por Numero de Parte -->
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function () {
                                            // Obtener la tabla
                                            var table = document.getElementById("table-parte");

                                            // Obtener las filas de la tabla excluyendo la primera (encabezado)
                                            var rows = Array.from(table.getElementsByTagName("tr")).slice(1);

                                            // Ordenar las filas según el valor en la primera celda (No. Parte)
                                            rows.sort(function (a, b) {
                                                var aValue = parseInt(a.cells[0].textContent);
                                                var bValue = parseInt(b.cells[0].textContent);
                                                return aValue - bValue;
                                            });

                                            // Eliminar las filas existentes de la tabla
                                            rows.forEach(function (row) {
                                                table.tBodies[0].appendChild(row);
                                            });
                                        });
                                    </script>
                                    <!-- Script para Ordenar Lista por Numero de Parte -->

                                </tbody>
                            </table>

                        </div>
                    </div>




                    <script>
                        $(document).ready(function () {
                            // Itera sobre cada fila de la tabla
                            $("#table-parte tbody tr").each(function () {
                                // Obtén el valor del elemento con el id "totalImportes" en la vista actual
                                var totalImportesValue = $("#totalImportes").text().trim();

                                // Asigna el valor al elemento con el id "totalimporte" en la misma fila
                                $(this).find("#totalimporte").text(totalImportesValue);
                            });
                        });
                    </script>

                    <div style="text-align: right; padding: 0px 10px 10px 10px">
                        <button type="button" onclick="goToHome()" class="btn btn-secondary" style="text-align: right;">Volver</button>
                    </div>
                    <script>
                        function goToHome() {
                            window.location.href = "{{ url('/gestorParte') }}";
                        }
                    </script>
                </div>

            </div>
        </div>
    </div>
@endsection
