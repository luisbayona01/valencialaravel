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
.No_Comprobado{
background-color:#FFDEAD !important;
/* Estado 2 No_Comprobado */
}
.Aceptado{
background-color:#FFD700 !important;
/* Estado 3 Aceptado o Verificado */
}
.Certificado{
background-color:#d7f1e7 !important;
 }
.Rechazado{
background-color:#FA8072 !important;
/* Estado 3 Rechazado */
color: #ffFF ;
 }


        /* Estilo opcional para ocultar el input inicialmente */
        input[type="text"] {
            display: none;
        }
        input[type="text"], #penalidadEuro {
            display: none;
        }
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

                        </div>
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
                        <div class="form-group">
                            <label>Fecha inicio</label>
                            <input type="date" name="fechaautorizacionInicio" class="form-control" required>
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

                        </div>
                    </div>
                </form>
            </div>
        </div>


                    <div class="card-body">
                        <div class="table-responsive">
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
                                <form  id="pdfForm" action="{{ route('report') }}" method="POST" target="_blank">
                                <input type="hidden" id="fechaautorizacionInicioHidden" name="fechaautorizacionInicio">
                                <input type="hidden" id="fechaautorizacionFinHidden" name="fechaautorizacionFin">
                                <input type="hidden" id="penalidadtxt" name="penalidad">



                                    @foreach ($partes as $parte)


                                        <tr style="font-size:0.9em;">

                                            <td style="text-align: center;">{{  $parte->id }}</td> <!-- No. Parte -->
											<td style="text-align: center;font-size: 0.95em">{{ $parte->cod_localizacion }}</td> <!-- Ubicacion Novedad -->
											<td>{{ $parte->tipoparte }}</td> <!-- Tipo Parte -->
											<td style="font-size: 0.95em">{{ $parte->reportadoPor }}</td> <!-- Comunicado por -->
											<td style="text-align: center;font-size: 0.95em">{{ $parte->fechareporte }}</td> <!-- Fecha de comunicacion -->
											<td style="font-size: 0.95em">{{ $parte->obscreadorparte }}</td> <!-- Observaciones -->
											<td>{{ $parte->asignadoA }}</td> <!-- Reparado por -->
											<td style="font-size: 0.95em">{{ $parte->fechaAsignacion }}</td> <!-- Fecha reparacion -->
                                            <td style="font-size: 0.95em">{{number_format($parte->totalImp, 2, ',', '.')}} €</td><!-- Total Importes -->
											<td ><span class="{{ $parte->estadoparte }}" style="display: block; width: 100%; height: 100%; text-align: center;"> {{ $parte->estadoparte }}</span> </td> <!-- Estado -->
                                            <td style="text-align: center">
                                                <a class="btn btn-sm btn-success" href="{{ route('partes.edit',$parte->id) }}" ><i ></i> {{ __('Ver') }}</a> <!-- Accion -->
                                            </td>
                                        <td>
                                            @csrf
                                            <input type="checkbox" name="parte_ids[]" value="{{ $parte->id }}" onchange="actualizarFormulario()">
                                        </td>
                                       </tr>
                                    @endforeach
                                    </form>
                                <tr style="font-size:0.9em;">

                                            <td></td> <!-- No. Parte -->
											<td ></td> <!-- Ubicacion Novedad -->
											<td></td> <!-- Tipo Parte -->
											<td></td> <!-- Comunicado por -->
											<td></td> <!-- Fecha de comunicacion -->
											<td></td> <!-- Observaciones -->
											<td></td> <!-- Reparado por -->
											<td> <strong> Total partes  seleccionados</strong></td> <!-- Fecha reparacion -->
                                            <td class="totalpartesSEleccionados"> 0</td><!-- Total Importes -->
											<td > </td> <!-- Estado -->
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
                                    <label style="text-align:center;" >Aplicar Penalización</label>
                                </td>
                                <td style="text-align:center; width:5%">
                                    <input type="checkbox" style="text-align:right; " name="penalidadchek" value="" onchange="toggleInputVisibility()">
                                </td>
                                <td style="text-align:center;width:7%">
                                    <input style="text-align: right; width:100%" type="text" id="penalidad" value="0" placeholder="0" oninput="validateInput(this)">
                                </td>
                                <td id="penalidadEuro" style="text-align:left; width:5%"><h4>€</h4></td>
                            </tr>
                        </table>

                    </div>


                    <br>
                    <div style="text-align: letf; padding: 0px 10px 10px 10px">
                        <button type="button" onclick="goToHome()" class="btn btn-secondary" style="text-align: right;">Volver</button>
                        <button type="button" id="btnGenerarCertificacion" onclick="pdf()" class="btn btn-primary float-right" style="text-align: right;">Generar Certificación</button>

                    </div>

                <script>

                    /* Script para obligar el filtro de fechas  */

                document.addEventListener("DOMContentLoaded", function() {

                 let searchParams = new URLSearchParams(window.location.search);
                       let fechaInicio = searchParams.get('fechaautorizacionInicio') || '';
                        let fechaFin = searchParams.get('fechaautorizacionFin') || '';

    if (fechaInicio=='' || fechaFin=='' ){

        document.getElementById("btnGenerarCertificacion").disabled = true;
  //return  false
          }

            let inputFecha = document.querySelector('input[name="fechaautorizacionInicio"]');
            let  inputFechafn = document.querySelector('input[name="fechaautorizacionFin"]');
              // Desactiva el botón al cargar la página

           inputFecha.value=fechaInicio;
           inputFechafn.value=fechaFin;
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
        .catch(error => console.error('Error:', error) , $(".totalpartesSEleccionados").text(0)  );
    }
                    function goToHome() {
                        window.location.href = "{{ url('/gestorParte') }}";
                    }

                    function toggleInputVisibility() {
                        var checkbox = document.querySelector('input[name="penalidadchek"]');
                        var inputText = document.getElementById('penalidad');
                        var penalidadEuro = document.getElementById('penalidadEuro');

                        // Si el checkbox está marcado, muestra el input y el elemento con id="penalidadEuro"; de lo contrario, ocúltalos
                        if (checkbox.checked) {
                            inputText.style.display = 'block';
                            penalidadEuro.style.display = 'block';
                        } else {
                            inputText.style.display = 'none';
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

                        // Coloca los valores en los campos de tipo hidden
                        document.getElementById('fechaautorizacionInicioHidden').value = fechaInicio;
                        document.getElementById('fechaautorizacionFinHidden').value = fechaFin;
                        var checkboxes = document.getElementsByName('parte_ids[]');
                        let penalidad=$("#penalidad").val();
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
