<!-- FORM DEL FRONT EDIT -->

@extends('layouts.plantilla')

@section('template_title')
    generarparte
@endsection

@section('content')
    <style>
        .Activo {
            background-color: #00FF00 !important;
            /* Estado 1 Activo */
        }

        .No_Comprobado {
            background-color: #FFDEAD !important;
            /* Estado 2 No_Comprobado */
        }

        .Aceptado {
            background-color: #FFD700 !important;
            /* Estado 3 Aceptado o Verificado */
        }

        .Certificado {
            background-color: #d7f1e7 !important;
        }

        .Rechazado {
            background-color: #FA8072 !important;
            /* Estado 3 Rechazado */
            color: #ffFF;
        }


        /* Estilo opcional para ocultar el input inicialmente */
        input[type="text"] {
            display: none;
        }

        input[type="text"],
        #penalidadEuro {
            display: none;
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                        <div>
                            <img src="{{asset('img/icono_representativo_caratula.png')}}" class="card-img-top" style="width: 30rem;">
                        </div>


                        </div>
                    </div>

                    <div style="text-align: right; padding:0% 3% 0% 0%">
                        <h2><strong>Módulo Certificación de Partes</strong></h2>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="container mt-5">
                        <div class="row justify-content-center">

                            <form action="{{ route('generarparte') }}" method="GET">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group" style="padding: 0% 1% 0% 2%">
                                            <label >Fecha inicio</label>
                                            <input type="date" name="fechaautorizacionInicio" class="form-control"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Fecha fin</label>
                                            <input type="date" name="fechaautorizacionFin" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-info">Buscar</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group" style="padding: 0% 2% 0% 1%">
                                            <label>Fecha Carga Lista Conservación</label>
                                            <select name="fecha-informe" class="form-control" required>
                                                <option value="">seleccione</option>
                                                @foreach ($resultado as $fechacorrectivo)
                                                    <option value="{{ $fechacorrectivo->Mes . '-' . $fechacorrectivo->Ano }}">
                                                        {{ $fechacorrectivo->Mes . '-' . $fechacorrectivo->Ano }} </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="table-responsive" style="padding: 1% 1% 1% 1%">
                            <table class="table table-striped" id="table-parte" >
                                <thead class="thead">
                                    <tr style="text-align: center;">
                                        <th style="font-size: 0.95em">No parte</th>
                                        <th style="font-size: 0.95em">Ubicación novedad</th>
                                        <th style="font-size: 0.95em">Tipo parte</th>
                                        <th style="font-size: 0.95em">Comunicado por</th>
                                        <th style="font-size: 0.95em">Fecha Comunicación</th>
                                        <th style="text-align: center;font-size: 0.95em">Observaciones</th>
                                        <th style="font-size: 0.95em">Reparado por</th>
                                        <th style="text-align: center;">Fecha Reparacion</th>
                                        <th style="font-size: 1.1em">Total importe</th>
                                        <th style="font-size: 0.95em">Estado</th>
                                        <th style="font-size: 0.95em">Acción</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form id="pdfForm" action="{{ route('report') }}" method="POST" target="_blank">
                                        <input type="hidden" id="fechaautorizacionInicioHidden"
                                            name="fechaautorizacionInicio">
                                        <input type="hidden" id="fechaautorizacionFinHidden" name="fechaautorizacionFin">
                                        <input type="hidden" id="penalidadtxt" name="penalidad">
                                        <input type="hidden" id="fechacorrectivo" name="fechacorrectivo">



                                        @foreach ($partes as $parte)
                                            <tr style="font-size:0.9em;">

                                                <td style="text-align: center;">{{ $parte->id }}</td> <!-- No. Parte -->
                                                <td style="text-align: center;font-size: 0.95em">
                                                    {{ $parte->cod_localizacion }}</td> <!-- Ubicacion Novedad -->
                                                <td>{{ $parte->tipoparte }}</td> <!-- Tipo Parte -->
                                                <td style="font-size: 0.95em">{{ $parte->reportadoPor }}</td>
                                                <!-- Comunicado por -->
                                                <td style="text-align: center;font-size: 0.95em">{{ $parte->fechareporte }}
                                                </td> <!-- Fecha de comunicacion -->
                                                <td style="font-size: 0.95em">{{ $parte->obscreadorparte }}</td>
                                                <!-- Observaciones -->
                                                <td>{{ $parte->asignadoA }}</td> <!-- Reparado por -->
                                                <td style="font-size: 0.95em">{{ $parte->fechaAsignacion }}</td>
                                                <!-- Fecha reparacion -->
                                                <td style="font-size: 0.95em">
                                                    {{ number_format($parte->totalImp, 2, ',', '.') }} €</td>
                                                <!-- Total Importes -->
                                                <td><span class="{{ $parte->estadoparte }}"
                                                        style="display: block; width: 100%; height: 100%; text-align: center;">
                                                        {{ $parte->estadoparte }}</span> </td> <!-- Estado -->
                                                <td style="text-align: center">
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('partes.edit', $parte->id) }}"><i></i>
                                                        {{ __('Ver') }}</a> <!-- Accion -->
                                                </td>
                                                <td>
                                                    @csrf
                                                    <input type="checkbox" name="parte_ids[]" value="{{ $parte->id }}"
                                                        onchange="actualizarFormulario()">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </form>
                                    <tr style="font-size:0.9em;">

                                        <td></td> <!-- No. Parte -->
                                        <td></td> <!-- Ubicacion Novedad -->
                                        <td></td> <!-- Tipo Parte -->
                                        <td></td> <!-- Comunicado por -->
                                        <td></td> <!-- Fecha de comunicacion -->
                                        <td></td> <!-- Observaciones -->
                                        <td></td> <!-- Reparado por -->
                                        <td> <strong> Total partes seleccionados</strong></td> <!-- Fecha reparacion -->
                                        <td class="totalpartesSEleccionados"> 0</td><!-- Total Importes -->
                                        <td> </td> <!-- Estado -->
                                        <td style="text-align: center">
                                        </td>
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <div>
                        <table style="width: 100%">
                            <tr class="float-center">
                                <td style="text-align:right; width:80%">
                                    <label style="text-align:center;">Aplicar Penalización</label>
                                </td>
                                <td style="text-align:center; width:5%">
                                    <input type="checkbox" style="text-align:right; " name="penalidadchek" value=""
                                        onchange="toggleInputVisibility()">
                                </td>

                            </tr>
                        </table>

                        <!-- AREA GENERAL DE LA TABLA APLICABLE DE LAS PENALIZACIONES -->

                        <div class="card-body">
                            <div class="table-responsive" style="padding: 1% 1% 1% 1%">
                                <table class="table table-striped table-hover" style="display: none" id="penalidadtabla">
                                    <thead class="thead">
                                        <tr>
                                            <th style="text-align: center">Id penalidad</th>
                                            <th style="text-align: center">Tipo</th>
                                            <th style="text-align: center">Fecha creación</th>
                                            <th style="text-align: center">Creado por</th>
                                            <th style="text-align: center">Observaciones creación</th>
                                            <th style="text-align: center">Valor penalidad</th>
                                            <th style="text-align: center">Estado</th>
                                            <th style="font-size: 0.95em">Acción</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <form id="pdfForm" action="{{ route('report') }}" method="POST" target="_blank">
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
                                            <td class="valorPenalidad4" style="text-align: right; font-size: 0.8em">{{ $penalidad->valorPenalidad4}} €</td>

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
                                                    <a href="#" class="btn btn-primary btn-sm common-button" style="color: white;"><strong>Revisar</strong></a>
                                                @elseif ($penalidad->estadopenalidad_Id == 2)
                                                    <a href="#" class="btn btn-primary btn-sm common-button" style="color: white;"><strong>Imputar</strong></a>
                                                @elseif ($penalidad->estadopenalidad_Id == 3)
                                                    <a href="#" class="btn btn-primary btn-sm common-button" style="color: white;"><strong>Verificar</strong></a>
                                                @elseif ($penalidad->estadopenalidad_Id == 4)
                                                    <a href="#" class="btn btn-secondary btn-sm common-button" style="color: white;"><strong>Ver</strong></a>
                                                @endif
                                                <form action="{{ route('penalidades.destroy',$penalidad->idpenalidad) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" style="display: none; color: white;" href="{{ route('penalidades.show',$penalidad->idpenalidad) }}"><i class=""></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-warning" style="display: none; color: black" href="{{ route('penalidades.edit',$penalidad->idpenalidad) }}"><i class=""></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" style="display: none"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                            <td>
                                                @csrf
                                                <input type="checkbox" name="penalidad_ids[]" id="penalidad_ids penalidad" value="{{ $penalidad->valorPenalidad4 }}"
                                                    onchange="actualizarFormulario2()">
                                            </td>
                                        </tr>
                                        @endforeach
                                    </form>
                                        <tr style="font-size:0.9em;">

                                            <td></td> <!-- No. Parte -->
                                            <td colspan="2" style="text-align:center">
                                                <input style="text-align: right; width:100%; display:block" type="text" id="penalidad"
                                                    value="0" placeholder="0" oninput="validateInput(this)">
                                            </td>
                                            <td></td> <!-- Comunicado por -->
                                            <td></td> <!-- Fecha de comunicacion -->
                                            <td></td> <!-- Observaciones -->
                                            <!--<td></td> <!-- Reparado por -->
                                            <td> <strong> Total Penalizaciones Seleccionados</strong></td> <!-- Fecha reparacion -->
                                            <td colspan="3" class="totalpenalizacionSelect" id="totalPenalizacionSeleccionada" style="width: 10%"> 0</td><!-- Total Importes -->
                                            <!--<td> </td> <!-- Estado -->
                                            <td style="text-align: center">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>

                    <!-- AREA GENERAL DE LA TABLA APLICABLE DE LAS PENALIZACIONES -->

                    <br>
                    <div style="text-align: letf; padding: 0px 10px 10px 10px">
                        <button type="button" onclick="goToHome()" class="btn btn-secondary"
                            style="text-align: right;">Volver</button>
                        <button type="button" id="btnGenerarCertificacion" onclick="pdf()"
                            class="btn btn-primary float-right" style="text-align: right;">Generar Certificación</button>

                    </div>

                    <script>
                        /* Script para obligar el filtro de fechas  */

                        document.addEventListener("DOMContentLoaded", function() {

                            let searchParams = new URLSearchParams(window.location.search);
                            let fechaInicio = searchParams.get('fechaautorizacionInicio') || '';
                            let fechaFin = searchParams.get('fechaautorizacionFin') || '';
                            let fechainforme= searchParams.get('fecha-informe')||'';
                            if (fechaInicio == '' || fechaFin == '') {

                                document.getElementById("btnGenerarCertificacion").disabled = true;
                                //return  false
                            }

                            let inputFecha = document.querySelector('input[name="fechaautorizacionInicio"]');
                            let inputFechafn = document.querySelector('input[name="fechaautorizacionFin"]');
                            let inputfechacorrectivo = document.querySelector('select[name="fecha-informe"]');
                            // Desactiva el botón al cargar la página
                               console.log('aaa',fechainforme);
                            inputFecha.value = fechaInicio;
                            inputFechafn.value = fechaFin;
                           inputfechacorrectivo.value=fechainforme;
                        });


                        /* Script para obligar el filtro de fechas  */



                        function actualizarFormulario() {
                            // Crear un objeto FormData
                            var formData = new FormData();

                            // Obtener todos los checkboxes seleccionados
                            var checkboxes = document.querySelectorAll('input[name="parte_ids[]"]:checked');

                            // Agregar los IDs al objeto FormData
                            checkboxes.forEach(function(checkbox) {
                                formData.append('parte_ids[]', checkbox.value);
                            });

                            // Agregar el token CSRF al objeto FormData
                            var csrfToken = document.querySelector('input[name="_token"]').value;
                            formData.append('_token', csrfToken);


                            fetch('/totalchecks', {
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.json())
                                .then(data => {

                                    var totalPartes = data.totalPartes.total;


                                    var totalFormateado = parseFloat(totalPartes).toLocaleString(undefined, {
                                        minimumFractionDigits: 2,
                                        maximumFractionDigits: 2
                                    });

                                    console.log(data); // Manejar la respuesta del controlador si es necesario
                                    $(".totalpartesSEleccionados").text(totalFormateado + '€')

                                })
                                .catch(error => console.error('Error:', error), $(".totalpartesSEleccionados").text(0));
                        }

                        function actualizarFormulario2() {
        var totalPenalidades = 0;

        // Obtener todos los checkboxes seleccionados
        var checkboxes = document.querySelectorAll('input[name="penalidad_ids[]"]:checked');

        // Iterar sobre cada checkbox seleccionado
        checkboxes.forEach(function(checkbox) {
            // Obtener la fila padre del checkbox (tr)
            var row = checkbox.closest('tr');

            // Obtener el valor de la columna valorPenalidad4 y reemplazar la coma por un punto para manejar correctamente el valor
            var valorPenalidad4 = parseFloat(row.querySelector('.valorPenalidad4').textContent.replace(',', '.'));

            // Sumar al total
            totalPenalidades += valorPenalidad4;
        });

        // Convertir el total a string y separar la parte entera de la decimal
        var totalString = totalPenalidades.toFixed(2);
        var partes = totalString.split('.');

        // Formatear la parte entera con puntos como separador de miles
        var parteEnteraFormateada = partes[0].replace(/\B(?=(\d{3})+(?!\d))/g, '');

        // Unir la parte entera formateada con la parte decimal y añadir la coma de los centavos
        var totalFormateado = parteEnteraFormateada + ',' + partes[1];

        // Mostrar el total de penalidades seleccionadas en el td correspondiente
        document.getElementById('totalPenalizacionSeleccionada').textContent = totalFormateado + ' €';

        // Replicar el valor formateado en el input "penalidad"
        document.getElementById('penalidad').value = totalFormateado;
    }

                        function goToHome() {
                            window.location.href = "{{ url('/gestorParte') }}";
                        }

                        function toggleInputVisibility() {
                            var checkbox = document.querySelector('input[name="penalidadchek"]');
                            var tablaval = document.getElementById('penalidadtabla');
                            var penalidadEuro = document.getElementById('penalidadEuro');

                            // Si el checkbox está marcado, muestra el input y el elemento con id="penalidadEuro"; de lo contrario, ocúltalos
                            if (checkbox.checked) {
                                tablaval.style.display = 'block';
                                penalidadEuro.style.display = 'block';
                            } else {
                                tablaval.style.display = 'none';
                                penalidadEuro.style.display = 'none';
                            }
                        }

                        function validateInput(input) {
                            // Permite solo números, comas y puntos en el input
                            input.value = input.value.replace(/[^0-9,]/g, '');
                        }


                        function pdf() {

                            //window.open("{{ url('/pdf') }}", "_blank");

                            var searchParams = new URLSearchParams(window.location.search);
                            var fechaInicio = searchParams.get('fechaautorizacionInicio') || '';
                            var fechaFin = searchParams.get('fechaautorizacionFin') || '';
                            var fechainforme=searchParams.get('fecha-informe')||'';
                            // Coloca los valores en los campos de tipo hidden
                            document.getElementById('fechaautorizacionInicioHidden').value = fechaInicio;
                            document.getElementById('fechaautorizacionFinHidden').value = fechaFin;
                            document.getElementById('fechacorrectivo').value=fechainforme
                            var checkboxes = document.getElementsByName('parte_ids[]');
                            let penalidad = $("#penalidad").val();
                            console.log('aaawwww',document.getElementById('fechacorrectivo').value)
                            $("#penalidadtxt").val(penalidad)
                            for (var i = 0; i < checkboxes.length; i++) {
                                if (checkboxes[i].checked) {


                                    document.getElementById('pdfForm').submit();
                                    //reload();
                                    location.reload();
                                    return true;
                                }
                            }

                            alert('Por favor, selecciona al menos un parte antes de realizar la acción.');
                            return false;
                        }
                    </script>
                </div>

            </div>
        </div>
    </div>
@endsection
