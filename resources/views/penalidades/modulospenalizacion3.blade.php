@extends('layouts.plantilla')

@section('content')
<script>
function crearPenalidades(){
$("#container-principal").addClass('d-none');
$("#contenpartes").removeClass('d-none');
}

</script>

<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 8px;
        text-align: left;
        position: relative; /* Necesario para el posicionamiento del efecto de sombra */
    }

    th {
        background-color: #f2f2f2;
    }

    /* Agregar el efecto de sombra */
    th:after, td:after {
        content: '';
        position: absolute;
        bottom: -3px; /* Controla la distancia entre el borde inferior y la sombra */
        left: 0;
        width: 100%;
        height: 3px; /* Controla la altura de la sombra */
        background: linear-gradient(to bottom, rgba(0,0,0,0.1) 0%,rgba(0,0,0,0) 100%);
    }
</style>




    <div class="container "id="container-principal">

        <div class="row justify-content-center">


        <div class=".col-12 .col-sm-6 .col-md-8">
            <div class="card" style="width: 100%;">

                <div class="card-body" style="padding: 1% 1% 1% 1%">
                    <div class="box box-info padding-1">
                        <div class="box-body">

                            <body class="antialiased">

                                <!-- IMAGEN ENCABEZADO DE LA HOJA DE CALCULO PENALIZACION -->
                                <div class="card-header">
                                    <div>
                                        <img src="{{ asset('img/icono_representativo_caratula.png') }}" class="card-img-top" style="width: 30rem;">
                                    </div><br>
                                    <span class="card-title" style="color: black">{{ __('') }}U.3.- PENALIDAD POR DEMORA EN LA REPARACIÓN DE AVERÍAS O POR
                                        REPETICIÓN DE ÉSTAS, TANTO EN PERÍODO DE GARANTÍA COMO DE
                                        CONSERVACIÓN</span>
                                </div><!-- IMAGEN ENCABEZADO DE LA HOJA DE CALCULO PENALIZACION -->

                                <script>
                                    // Función para validar los campos antes de enviar el formulario
                                    function validarCampos() {
                                        // Obtener los valores de los campos
                                        var FValue = document.getElementById('F').value;
                                        var TexponenteValue = document.getElementById('Texponente2').value;
                                        var CValue = document.getElementById('C').value;
                                        var S3Value = document.getElementById('S3').value;

                                        // Verificar si algún campo está vacío
                                        if (FValue.trim() === '' || TexponenteValue.trim() === '' ||CValue.trim() === '' || S3Value.trim() === '') {
                                            alert('Por favor complete todos los campos antes de guardar.');
                                            return false; // Evitar enviar el formulario
                                        }

                                        return true; // Permitir enviar el formulario si todos los campos están completos
                                    }
                                </script>

                            <form action="{{url('/regpenalizacion4')}}" method="POST" role="form" onsubmit="return validarCampos()" >
                                    @csrf
                                <!-- Seccion del Encabezado del Formulario -->

                                <!-- Seccion Operativo del Formulario -->
                                <div>
                                    <table class="" border="1" width="95%" style="margin: auto; " >
                                        <tbody>
                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif

                                            <tr>
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:45%"> <strong>Valor del coste diario de la conservación del elemento averiado </strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 €" id="costeDiarioConservacion" name="costeDiarioConservacion" oninput="validateInput3(this);"> </td>
                                                <td style="width:5%"> * </td>
                                                <td style="text-align:left; font-size:  1em; border:none; "><strong>Valor establecido (Min 10 €) </strong><br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 €" id="valorMinimoestablecido" name="valorMinimoestablecido" oninput="validateInput3(this);" >
                                                </td>
                                            </tr>

                                            <tr>
                                                <td  style="text-align:justify;font-size: 1em; border:none;"> <strong>F </strong><br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="Solo Lectura" id="F" name="F" oninput="validateInput3(this);" readonly required></td>
                                                <td></td>

                                            </tr>

                                            <br><br>

                                           <!-- INICIO SEGUNDA FILA DE OPERACIONES T -->
                                           <tr>
                                            <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:30%"> <strong>tiempo tardado en detección de la incidencia o avería </strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 " id="Tiempo1" name="Tiempo1" oninput="validateInput3(this)"> </td>
                                            <td style="width:5%"> / </td>
                                            <td style="text-align:left; font-size:  1em; border:none; "><strong>Plazo establecido en pliego de condiciones técnicas </strong><br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 " id="Tiempo2" name="Tiempo2" oninput="validateInput3(this)" >
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="text-align:left; font-size: 1em; border:none;">
                                                <strong>T<sup>1.5</sup></strong><br>
                                                <input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="Solo Lectura " id="Texponente" name="Texponente" oninput="validateInput3(this)" readonly  required>
                                            </td>
                                            <td style="width:5%"> * </td>
                                            <td  style="text-align:justify;font-size: 1em; border:none; width:45%"> <strong>K </strong><br> <input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 " id="K" name="k" oninput="validateInput(this)">  --></td>
                                        </tr>
                                        <!-- FIN SEGUNDA FILA DE OPERACIONES T -->

                                            <tr>
                                                <td style="text-align:left; font-size:  1em; border:none; "><strong> T<sup>1.5</sup> * K </strong><br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="Solo Lectura" id="Texponente2" name="Texponente2" oninput="validateInput3(this)" readonly required>
                                            </tr>

                                            <tr>
                                                <td style="text-align:left; font-size:  1em; border:none; "><strong> Coste diario de conservación de los elementos afectados por la avería </strong><br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 " id="costeDiarioAveria" name="costeDiarioAveria" oninput="validateInput3(this)" >
                                                <td style="width:5%"> * </td>
                                                <td style="text-align:justify;font-size: 1em; border:none; width:45%">
                                                    <strong>N</strong><br>
                                                    <select style="width: 50%; font-size:1em; text-align: Left " id="N" name="N" onchange="">
                                                        <option value="0%">Seleccione un valor </option>
                                                        <option value="10%">10 % Nivel G (Centralizado)</option>
                                                        <option value="20%">20 % Nivel I (Intermedio)</option>
                                                        <option value="30%">30 % Nivel L (Local)</option>
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td  style="text-align:justify;font-size: 1em; border:none;"> <strong>C </strong><br><input type="text" style="width: 50%; font-size:1em; text-align: right " value="Solo Lectura" id="C" name="C" oninput="validateInput3(this)" readonly required></td>
                                            </tr>


                                            <tr></tr>


                                            <tr>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Seccion Operativo del Formulario -->

                                    <script>
                                        function validateInput(input) {
                                        // Permite solo números, comas y puntos en el input
                                        input.value = input.value.replace(/[^0-9]/g, '');
                                    }

                                        function validateInput2(input) {
                                            // Permite solo números, comas y puntos en el input
                                            input.value = input.value.replace(/[^0-9-]/g, '');
                                        }
                                        function validateInput3(input) {
                                            // Permite solo números, comas y puntos en el input
                                            input.value = input.value.replace(/[^0-9,]/g, '');
                                        }
                                        function validateInput4(input) {
                                            // Permite solo números, comas y puntos en el input
                                            input.value = input.value.replace(/[^0-9.]/g, '');
                                        }

                                        //Operaciones de los Campos Input
                                        // Operacion para determinar el valor de F
                                        function calcularF() {
                                            // Obtener los valores de los campos de entrada
                                            var costeDiario = parseFloat(document.getElementById("costeDiarioConservacion").value.replace(',', '.'));
                                            var valorMinimo = parseFloat(document.getElementById("valorMinimoestablecido").value.replace(',', '.'));

                                            // Calcular el resultado de la multiplicación
                                            var resultadoF = costeDiario * valorMinimo;

                                            // Formatear el resultado con coma para las centésimas
                                            var resultadoFormateadoF = resultadoF.toFixed(2).replace('.', ',');

                                            // Mostrar el resultado en el campo "F"
                                            document.getElementById("F").value = resultadoFormateadoF + ' €';

                                            // Calcular S3 nuevamente
                                            calcularS3();
                                        }

                                        // Llamar a la función calcularF() cada vez que cambie el valor en los campos de entrada
                                        document.getElementById("costeDiarioConservacion").addEventListener("input", calcularF);
                                        document.getElementById("valorMinimoestablecido").addEventListener("input", calcularF);


                                        function calcularTexponente() {
                                            // Obtener los valores de los campos de entrada
                                            var tiempo1 = parseFloat(document.getElementById("Tiempo1").value.replace(',', '.'));
                                            var tiempo2 = parseFloat(document.getElementById("Tiempo2").value.replace(',', '.'));

                                            // Calcular el resultado de la división y elevarlo a 1.5
                                            var resultado = Math.pow(tiempo1 / tiempo2, 1.5);

                                            // Formatear el resultado con coma para las centésimas
                                            var resultadoFormateado = resultado.toFixed(2).replace('.', ',');

                                            // Mostrar el resultado en el campo "Texponente"
                                            document.getElementById("Texponente").value = resultadoFormateado;
                                        }

                                        // Llamar a la función calcularTexponente() cada vez que cambie el valor en los campos de entrada
                                        document.getElementById("Tiempo1").addEventListener("input", calcularTexponente);
                                        document.getElementById("Tiempo2").addEventListener("input", calcularTexponente);

                                        function calcularTexponente2() {
                                            // Obtener los valores de los campos de entrada
                                            var texponente = parseFloat(document.getElementById("Texponente").value.replace(',', '.'));
                                            var k = parseFloat(document.getElementById("K").value.replace(',', '.'));

                                            // Calcular el resultado de la multiplicación
                                            var resultadoTexponente2 = texponente * k;

                                            // Formatear el resultado con coma para las centésimas
                                            var resultadoFormateadoTexponente2 = resultadoTexponente2.toFixed(2).replace('.', ',');

                                            // Mostrar el resultado en el campo "Texponente2"
                                            document.getElementById("Texponente2").value = resultadoFormateadoTexponente2;

                                            // Calcular S3 nuevamente
                                            calcularS3();
                                        }

                                        // Llamar a la función calcularTexponente2() cada vez que cambie el valor en los campos de entrada
                                        document.getElementById("Texponente").addEventListener("input", calcularTexponente2);
                                        document.getElementById("K").addEventListener("input", calcularTexponente2);

                                        function calcularC() {
                                            // Obtener los valores de los campos de entrada
                                            var costeDiarioAveria = parseFloat(document.getElementById("costeDiarioAveria").value.replace(',', '.'));
                                            var n = parseFloat(document.getElementById("N").value.replace('%', '')) / 100; // Convertir el valor de porcentaje a decimal

                                            // Calcular el resultado de la multiplicación
                                            var resultadoC = costeDiarioAveria * n;

                                            // Formatear el resultado con coma para las centésimas
                                            var resultadoFormateadoC = resultadoC.toFixed(2).replace('.', ',');

                                            // Mostrar el resultado en el campo "C"
                                            document.getElementById("C").value = resultadoFormateadoC + ' €';

                                            // Calcular S3 nuevamente
                                            calcularS3();
                                        }

                                        // Llamar a la función calcularC() cada vez que cambie el valor en los campos de entrada
                                        document.getElementById("costeDiarioAveria").addEventListener("input", calcularC);
                                        document.getElementById("N").addEventListener("input", calcularC);

                                        function calcularS3() {
                                            // Obtener los valores de los campos de entrada
                                            var F = parseFloat(document.getElementById("F").value.replace(',', '.'));
                                            var Texponente2 = parseFloat(document.getElementById("Texponente2").value.replace(',', '.'));
                                            var C = parseFloat(document.getElementById("C").value.replace(',', '.'));

                                            // Calcular el resultado de la suma
                                            var resultadoS3 = F + Texponente2 + C;

                                            // Formatear el resultado con coma para las centésimas
                                            var resultadoFormateadoS3 = resultadoS3.toFixed(2).replace('.', ',');

                                            // Mostrar el resultado en el campo "S3"
                                            document.getElementById("S3").value = resultadoFormateadoS3 + ' €';
    }


                                    </script>




                <!-- Seccion Resultado del Formulario -->
                <br><br>

            <div class="row" bis_skin_checked="1">
                <div class="col-sm-4" bis_skin_checked="1" style="display: block">
                    <div class="form-group">
                        {{ Form::label('Creado por') }}
                        <input type="hidden" name="creadoPor" id="creadoPor" value={{ Auth::user()->id }}>
                        <p class="form-control">{{ Auth::user()->nombres }} {{ Auth::user()->apellidos }} </p>
                    </div>
                </div>

                <div class="col" style="display: block">
                    <div class="form-group">
                        {{ Form::label('Fecha y hora de creacion') }}
                        <?php $fechaHoraActual = date("Y-m-d H:i:s"); ?>
                        {{ Form::text('fechaCreacion', $fechaHoraActual, ['class' => 'form-control', 'id' => 'fechaCreacion', 'readonly' => 'true', 'style' => 'width: 200px;']) }}
                        {!! $errors->first('fechaCreacion', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>


                <div class="row" bis_skin_checked="1" style="display: none">
                    <div class="col-sm-2" bis_skin_checked="1" style="display: block">
                        <div class="form-group">
                            {{ Form::label('Tipo de Penalizacion') }}
                            <input type="hidden" name="tipoPenalidad" id="tipoPenalidad" value="">
                            <input type="text" style="width: 40%; font-size:1em; text-align:center" placeholder="" id="tipoPenalidad" name="tipoPenalidad" value="3" oninput="validateInput3(this)" required>
                        </div>
                    </div>
                </div>

            <div class="form-group">
                {{ Form::label('observaciones') }}
                {!! $errors->first('obscreadorpenalidad', '<div class="invalid-feedback">:message</div>') !!}
                <textarea class="form-control" name="obsCreacion" style="white-space: pre-line;"></textarea>
            </div>




                <table width="95%" style="margin: auto; padding: 3% 3% 3% 3% ">

                    <tr>
                        <td  style="text-align:justify;font-size: 1em; border:none;"> <strong>S₃ (Importe de la penalidad en euros) : </strong> <input type="text" style="width: 30%; font-size:1em; text-align: right " placeholder="Solo Lectura (resultado €)" id="S3" name="S3" oninput="validateInput3(this)" readonly>&nbsp &nbsp <strong>S₃ = F + ( T<sup>1.5</sup> * K ) + C x N</strong></td>
                    </tr>

                </table>

                 <br><br>
                            </body>
                        </div>

                        <div class="box-footer mt20">
                            <a href="{{url('penalidades')}}" type="button"  class="btn btn-danger" id="backButton">
                                Cancelar
                            </a>

                            <button type="submit" class="btn btn-primary btnpenalidad4" style="text-align: right;">{{ _('Guardar Penalidad') }}</button>
                        </div>
                    </div>

</form>


                </div>
                <div style="text-align: right; padding: 0px 10px 10px 10px">
                    <button type="button" onclick="goToHome()" class="btn btn-secondary" style="text-align: right;">Volver</button>
                </div>
                <script>
                    function goToHome() {
                        window.location.href = "{{ url('/penalidades/panel/modulos') }}";
                    }
                </script>
            </div>
        </div>

        </div>

    </div>

    <div class="container  d-none" id="contenpartes">



    </div>
@endsection
