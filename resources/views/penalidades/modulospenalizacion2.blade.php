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
                                    <span class="card-title" style="color: black">{{ __('') }}U.2.- PENALIDAD POR FALLOS EN LA DETECCIÓN DE INCIDENCIAS </span>
                                </div><!-- IMAGEN ENCABEZADO DE LA HOJA DE CALCULO PENALIZACION -->

                                <script>
                                    // Función para validar los campos antes de enviar el formulario
                                    function validarCampos() {
                                        // Obtener los valores de los campos
                                        var TValue = document.getElementById('T').value;
                                        var S2Value = document.getElementById('S2').value;

                                        // Verificar si algún campo está vacío
                                        if (TValue.trim() === '' || S2Value.trim() === '') {
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
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:30%"> <strong>tiempo tardado en detección de la incidencia o avería : </strong> <br><input type="text" style="width: 40%; font-size:1em; text-align: right" placeholder="0 " id="Tiempo1" name="Tiempo1" oninput="validateInput3(this); concatenarValores()"> </td>
                                                <td style="width:5%"> / </td>
                                                <td style="text-align:left; font-size:  1em; border:none; "><strong>tiempo máximo del plazo correspondiente : </strong><br><input type="text" style="text-align: right" placeholder="0 " id="Tiempo2" name="Tiempo2" oninput=" concatenarValores()" >
                                                </td>
                                            </tr>

                                            <tr>
                                                <td  style="text-align:justify;font-size: 1em; border:none; width:45%"> <strong>Valor Fijo</strong><br> <input type="text" style="width: 70%; font-size:1em; text-align: right " value="1000" id="valorFijo" name="valorFijo" oninput="validateInput3(this); concatenarValores()" readonly></td>
                                                <td style="width:5%"> * </td>
                                                <td  style="text-align:justify;font-size: 1em; border:none;"> <strong>T : </strong> <input type="text" style="width: 40%; font-size:1em" placeholder="Solo Lectura" id="T" name="T" oninput="concatenarValores()"  readonly> </td>
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



                                        function calcularDivision() {
                                        // Obtener los valores de los campos
                                        var Tiempo = parseFloat(document.getElementById("Tiempo1").value.replace(',', '.'));
                                        var Tiempo2 = parseFloat(document.getElementById("Tiempo2").value.replace(',', '.'));

                                        // Verificar si los valores son válidos
                                        if (isNaN(Tiempo) || isNaN(Tiempo2) || Tiempo2 === 0) {
                                            document.getElementById("T").value = "0 ";
                                            return;
                                        }

                                        function formatearNumero(numero) {
                                        return numero.toLocaleString('es-ES', {
                                            minimumFractionDigits: 2,
                                            maximumFractionDigits: 2
                                        });
                                    }

                                        // Calcular la división
                                        var resultado = Tiempo / Tiempo2;

                                        // Formatear el resultado
                                        var resultadoFormateado = resultado.toLocaleString('es-ES', {
                                            minimumFractionDigits: 0,
                                            maximumFractionDigits: 2
                                        });

                                        // Actualizar el valor en el campo S44
                                        document.getElementById("T").value = resultadoFormateado.replace('.', ',') + " "; // Ajusta el resultado y utiliza coma como separador decimal

                                        // Multiplicar por valorFijo y actualizar S2
                                        var valorFijo = parseFloat(document.getElementById("valorFijo").value.replace(',', '.'));
                                        var s2 = resultado * valorFijo;

                                        // Actualizar el valor en el campo S4
                                        document.getElementById("S2").value = s2.toFixed(2).replace('.', ',') + " €"; // Ajusta el resultado a dos decimales y utiliza coma como separador decimal
                                    }

                                    // Llamar a la función al cargar la página y cada vez que haya un cambio en los campos relevantes
                                    window.onload = function() {
                                        calcularDivision();
                                        document.getElementById("Tiempo1").addEventListener("input", calcularDivision);
                                        document.getElementById("Tiempo2").addEventListener("input", calcularDivision);
                                        document.getElementById("valorFijo").addEventListener("input", calcularDivision);
                                    };

                                    function concatenarValores() {
                                        // Obtener los valores de los campos de entrada
                                        var tiempo1 = parseFloat(document.getElementById("Tiempo1").value);
                                        var tiempo2 = parseFloat(document.getElementById("Tiempo2").value);
                                        var valorFijo = parseFloat(document.getElementById("valorFijo").value);
                                        var T;

                                        // Calcular el valor de T según las condiciones
                                        if (tiempo1 === 0 || tiempo2 === 0) {
                                            T = 0; // Si alguno de los tiempos es 0, entonces T es 0
                                        } else {
                                            T = tiempo1 / tiempo2; // Calcular T normalmente
                                        }

                                        // Concatenar los valores
                                        var operaciones = "T_Det : " + tiempo1 + " / " + "T_Max :" + tiempo2 + " = " + "T : " + T.toFixed(2) + " * " + valorFijo + " = " ;  // Limitar T a 2 decimales

                                        // Mostrar el resultado en el campo de texto
                                        document.getElementById("operaciones").value = operaciones;
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
                        <td  style="text-align:justify;font-size: 1em; border:none;"> <strong>S₂ (Importe de la penalidad en euros) : </strong> <input type="text" style="width: 30%; font-size:1em; text-align: right " placeholder="Solo Lectura (resultado €)" id="S2" name="S2" oninput="validateInput3(this)" readonly>&nbsp &nbsp <strong> S<sub>2</sub> = 1000 * T</strong></td>
                    </tr>

                </table>

                <table style="margin: auto; padding: 3% 3% 3% 3% ;display:none;width:95%" id="operAritmeticaMaster" border="1">
                    <!--<th style="text-align:justify;font-size: 1em; width:100%; padding: 3% 3% 3% 3%"> </th>
                    <td><input type="text" style="font-size:1em; text-align: right; width:90% " placeholder="Solo Lectura " id="operaciones" name="operaciones" readonly></td>-->
                    <div class="form-group" style="display: none">
                        {{ Form::label('Valores de las Operaciones') }}
                        {!! $errors->first('operaciones', '<div class="invalid-feedback">:message</div>') !!}
                        <textarea class="form-control" id="operaciones" name="operaciones" style="white-space: pre-line;"></textarea>
                    </div>
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
