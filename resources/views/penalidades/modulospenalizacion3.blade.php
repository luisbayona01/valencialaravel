@extends('layouts.plantilla')

@section('content')
<script>
function crearPenalidades(){
$("#container-principal").addClass('d-none');
$("#contenpartes").removeClass('d-none');
}

</script>

<script>
    // Función para actualizar el resultado en tiempo real
    function updateResult(inputId, resultId) {
        var input = document.getElementById(inputId);
        var resultField = document.getElementById(resultId);
        input.addEventListener('input', function() {
            resultField.textContent = input.value;
        });
    }

    // Llamar a la función para cada par de campos de entrada y resultado
    updateResult('S4', 'resultS4');
    updateResult('importeConservacionAnual', 'resultImporteConservacionAnual');
    updateResult('importeConservacionAnual2', 'resultImporteConservacionAnual2');
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
                                    <span class="card-title">{{ __('Creacion') }} De Penalidades No. </span>
                                </div><!-- IMAGEN ENCABEZADO DE LA HOJA DE CALCULO PENALIZACION -->

                                <form action="{{url('/regpenalizacion4')}}" method="POST" role="form" >
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
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:45%"> <strong>Valor del coste diario de la conservación del elemento averiado </strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 €" id="costeDiarioConservacion" name="costeDiarioConservacion" oninput="validateInput3(this); calcularResultado()"> </td>
                                                <td style="width:5%"> * </td>
                                                <td style="text-align:left; font-size:  1em; border:none; "><strong>Valor establecido (Min 10 €) </strong><br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 €" id="valorMinimoestablecido" name="valorMinimoestablecido" oninput="validateInput3(this); calcularResultado()" >
                                                </td>
                                            </tr>

                                            <tr>
                                                <td  style="text-align:justify;font-size: 1em; border:none;"> <strong>F </strong><br><input type="text" style="width: 50%; font-size:1em; text-align: right " value="0 €" id="F" name="F" oninput="validateInput3(this)" readonly></td>
                                            </tr>

                                            <br><br>

                                            <tr>
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:30%"> <strong>tiempo tardado en detección de la incidencia o avería </strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 " id="Tiempo1" name="Tiempo1" oninput="validateInput3(this); calcularResultado2()"> </td>
                                                <td style="width:5%"> / </td>
                                                <td style="text-align:left; font-size:  1em; border:none; "><strong>Plazo establecido en pliego de condiciones técnicas </strong><br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 " id="Tiempo2" name="Tiempo2" oninput="validateInput3(this); calcularResultado2(); calcularResultado3(); calcularResultado4() " >
                                                </td>
                                            </tr>

                                            <tr>
                                                <td  style="text-align:justify;font-size: 1em; border:none; width:45%"> <strong>T </strong><br> <input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 €"  id="T" name="T" oninput="validateInput3(this)" readonly></td>
                                                <td style="width:5%"> = </td>
                                                <td style="text-align:left; font-size:  1em; border:none; "><strong> T<sup>1.5</sup></strong><br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 " id="Texponente" name="Texponente" oninput="validateInput3(this); calcularResultado2()" readonly > --> *
                                            </tr>

                                            <tr>
                                                <td  style="text-align:justify;font-size: 1em; border:none; width:45%"> <strong>K </strong><br> <input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 " id="K" name="k" oninput="validateInput(this); calcularResultado4()">  --></td>
                                                <td style="width:5%"> = </td>
                                                <td style="text-align:left; font-size:  1em; border:none; "><strong> T<sup>1.5</sup> * K </strong><br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 " id="Texponente2" name="Texponente2" oninput="validateInput3(this)" readonly >
                                            </tr>

                                            <tr>
                                                <td style="text-align:left; font-size:  1em; border:none; "><strong> Coste diario de conservación de los elementos afectados por la avería </strong><br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 " id="costeDiarioAveria" name="costeDiarioAveria" oninput="validateInput3(this); calcularResultado5()" >
                                                <td style="width:5%"> = </td>
                                                <td style="text-align:justify;font-size: 1em; border:none; width:45%">
                                                    <strong>N</strong><br>
                                                    <select style="width: 50%; font-size:1em; text-align: right " id="N" name="N" onchange="calcularResultado5()">
                                                        <option value="10%">10 % Nivel G (Centralizado)</option>
                                                        <option value="20%">20 % Nivel I (Intermedio)</option>
                                                        <option value="30%">30 % Nivel L (Local)</option>
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td  style="text-align:justify;font-size: 1em; border:none;"> <strong>C </strong><br><input type="text" style="width: 50%; font-size:1em; text-align: right " value="0 €" id="C" name="C" oninput="validateInput3(this)" readonly></td>
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
                                        function calcularResultado() {
                                            var costeDiarioConservacion = parseFloat(document.getElementById('costeDiarioConservacion').value.replace(' €', '').replace(',', '.'));
                                            var valorMinimoestablecido = parseFloat(document.getElementById('valorMinimoestablecido').value.replace(' €', '').replace(',', '.'));

                                            // Validar que los valores ingresados sean números válidos
                                            if (!isNaN(costeDiarioConservacion) && !isNaN(valorMinimoestablecido)) {
                                                var resultado = costeDiarioConservacion * valorMinimoestablecido;
                                                document.getElementById('F').value = resultado.toFixed(1) + ' €'; // Mostrar el resultado en el campo F con un decimal
                                            }
                                        }

                                        function calcularResultado2() {
                                           // Operacion para determinar el valor de T elevado 1,5
                                            var tiempo1 = parseFloat(document.getElementById('Tiempo1').value);
                                            var tiempo2 = parseFloat(document.getElementById('Tiempo2').value);

                                            // Verificar si los valores son válidos
                                            if (!isNaN(tiempo1) && !isNaN(tiempo2) && tiempo2 !== 0) {
                                                // Calcular el resultado de la división y convertirlo a euros
                                                var resultado = tiempo1 / tiempo2;
                                                // Mostrar el resultado en el campo T con coma para las centésimas de euro
                                                document.getElementById('T').value = resultado.toFixed(2).replace('.', ',')+ ' €';
                                            } else {
                                                // Si los valores no son válidos, mostrar un mensaje de error o establecer un valor predeterminado en T
                                                document.getElementById('T').value = "Valores inválidos";
                                            }
                                        }

                                        // Llamar a la función calcularResultado cuando se cambie el valor de Tiempo1 o Tiempo2
                                        document.getElementById('Tiempo1').addEventListener('input', calcularResultado);
                                        document.getElementById('Tiempo2').addEventListener('input', calcularResultado);

                                        function calcularResultado3() {
                                            var T = document.getElementById("T").value;
                                            var resultado = Math.pow(parseFloat(T), 1.5);
                                            document.getElementById("Texponente").value = resultado.toFixed(2); // Redondear el resultado a dos decimales
                                        }

                                        function calcularResultado4() {
                                            var TexponenteValue = parseFloat(document.getElementById("Texponente").value);
                                            var KValue = parseFloat(document.getElementById("K").value);
                                            var resultado = TexponenteValue * KValue;
                                            document.getElementById("Texponente2").value = resultado.toFixed(2); // ToFixed(2) para dos decimales, ajusta según tu necesidad
                                        }

                                        function calcularResultado5() {
        var costeDiarioAveria = parseFloat(document.getElementById("costeDiarioAveria").value);
        var N = parseFloat(document.getElementById("N").value) / 100; // Convertir porcentaje a decimal

        var resultado = costeDiarioAveria * N;
        document.getElementById("C").value = resultado.toFixed(2) + " €"; // Mostrar resultado con 2 decimales
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
                        {{ Form::text('fechaCreacion', $fechaHoraActual, ['class' => 'form-control', 'id' => 'fechaCreacion', 'readonly' => 'true']) }}
                        {!! $errors->first('fechaCreacion', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>

                <div class="row" bis_skin_checked="1" style="display: block">
                    <div class="col-sm-2" bis_skin_checked="1" style="display: block">
                        <div class="form-group">
                            {{ Form::label('Tipo de Penalizacion') }}
                            <input type="hidden" name="tipoPenalidad" id="tipoPenalidad" value="">
                            <input type="text" style="width: 40%; font-size:1em; text-align:center" placeholder="" id="tipoPenalidad" name="tipoPenalidad" value="2" oninput="validateInput3(this)" readonly>
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
                        <td  style="text-align:justify;font-size: 1em; border:none;"> <strong>S₃ (Importe de la penalidad en euros) : </strong> <input type="text" style="width: 30%; font-size:1em; text-align: right " placeholder="0 €" id="S2" name="S2" oninput="validateInput3(this)" readonly></td>
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
