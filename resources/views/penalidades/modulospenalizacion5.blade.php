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
                                    </div><br><br>
                                    <span class="card-title" style="color: black">{{ __('') }} U.5.- PENALIDAD POR DEMORA EXCESIVA EN LA REPARACIÓN DE COLISIONES </span>
                                </div><!-- IMAGEN ENCABEZADO DE LA HOJA DE CALCULO PENALIZACION -->

                                <script>
                                    // Función para validar los campos antes de enviar el formulario
                                    function validarCampos() {
                                        // Obtener los valores de los campos
                                        var TexponenteValue = document.getElementById('Texponente').value;
                                        var multiplicacionValue = document.getElementById('multiplicacion').value;
                                        var S5Value = document.getElementById('S5').value;

                                        // Verificar si algún campo está vacío
                                        if (TexponenteValue.trim() === '' || multiplicacionValue.trim() === '' || S5Value.trim() === '') {
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
                                    <table class="" border="1" width="95%" style="margin: auto; padding:3% 3% 3% 3%" >
                                        <tbody>
                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif

                                            <tr>
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:45%"> <strong>F </strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " value="1000 €" placeholder="" id="F" name="F" oninput="validateInput3(this); calcularSuma()" readonly> </td>
                                                <td style="width:5%">  </td>
                                                </td>
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
                                                    <input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 " id="Texponente" name="Texponente" oninput="validateInput3(this); calcularExponente(); calcularResultado() " readonly  required>
                                                </td>
                                            </tr>
                                            <!-- FIN SEGUNDA FILA DE OPERACIONES T -->

                                            <tr>
                                                <td  style="text-align:justify;font-size: 1em; border:none; width:45%"> <strong>Elementos del sistema de tráfico y comunicaciones (K) </strong><br> <input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 " id="K" name="k" oninput="validateInput(this); calcularResultado()"> </td>
                                                <td></td>
                                                <td style="text-align:left; font-size:  1em; border:none; "><strong> Coste diario de conservación de los elementos afectados por la avería (C) </strong><br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 " value="20 €" id="costeDiarioAveria" name="costeDiarioAveria" oninput="validateInput3(this); calcularResultado()" >

                                            </tr>

                                            <tr>
                                                <td  style="text-align:justify;font-size: 1em; border:none; width:45%"> <strong>( T<sup>1.5</sup> * C * K )</strong><br> <input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 " id="multiplicacion" name="multiplicacion" oninput="validateInput(this); calcularResultado(); calcularSuma()" readonly> </td>
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

                                    // Función para calcular la suma y actualizar el campo S5
                                    // Función para calcular la suma y actualizar el campo S5
                                    function calcularSuma() {
                                        // Obtener los valores de los campos F y multiplicacion
                                        var valorF = parseFloat(document.getElementById('F').value.replace('€', '').replace('.', '').replace(',', '.')) || 0; // Si el valor es vacío, se toma como 0
                                        var valorMultiplicacion = parseFloat(document.getElementById('multiplicacion').value) || 0; // Si el valor es vacío, se toma como 0

                                        // Realizar la suma
                                        var suma = valorF + valorMultiplicacion;

                                        // Formatear el resultado con coma como separador decimal
                                        var resultadoFormateado = suma.toLocaleString('es-ES', { minimumFractionDigits: 2, maximumFractionDigits: 2 }).replace('.', '').replace(',', '.') + ' €';

                                        // Actualizar el campo S5 con el resultado formateado
                                        document.getElementById('S5').value = resultadoFormateado;
                                    }

                                    // Llamar a la función calcularSuma cuando se cargue la página para calcular el valor inicial
                                    window.addEventListener('load', function() {
                                        // Calcular el exponente inicialmente cuando la página se carga
                                        calcularExponente();
                                        // Calcular el resultado inicialmente cuando la página se carga
                                        calcularResultado();
                                        // Calcular la suma inicialmente cuando la página se carga
                                        calcularSuma();
                                    });

                                    // Función para calcular el resultado de la segunda operación (T^1.5 * costeDiarioAveria * K)
                                    function calcularResultado() {
                                        // Obtener los valores de los campos
                                        var Texponente = parseFloat(document.getElementById('Texponente').value);
                                        var costeDiarioAveria = parseFloat(document.getElementById('costeDiarioAveria').value);
                                        var K = parseFloat(document.getElementById('K').value);

                                        // Verificar si los valores son válidos
                                        if (!isNaN(Texponente) && !isNaN(costeDiarioAveria) && !isNaN(K)) {
                                            // Calcular el resultado de la multiplicación
                                            var resultado = Texponente * costeDiarioAveria * K;

                                            // Mostrar el resultado en el campo 'multiplicacion'
                                            document.getElementById('multiplicacion').value = resultado.toFixed(2); // Ajustar el resultado a dos decimales
                                        } else {
                                            // Si algún valor no es válido, mostrar un mensaje de error o dejar el campo vacío
                                            document.getElementById('multiplicacion').value = "";
                                        }

                                        // Después de calcular el resultado, llamar a la función para calcular la suma
                                        calcularSuma();
                                    }

                                    // Función para calcular el resultado de la primera operación (T^1.5)
                                    function calcularExponente() {
                                        // Obtener los valores de los campos Tiempo1 y Tiempo2
                                        var tiempo1 = parseFloat(document.getElementById('Tiempo1').value);
                                        var tiempo2 = parseFloat(document.getElementById('Tiempo2').value);

                                        // Verificar si los valores son válidos
                                        if (!isNaN(tiempo1) && !isNaN(tiempo2) && tiempo2 !== 0) {
                                            // Calcular el resultado
                                            var resultado = Math.pow(tiempo1 / tiempo2, 1.5);

                                            // Formatear el resultado con punto como separador decimal
                                            var resultadoFormateado = resultado.toFixed(2).replace(',', '.');

                                            // Actualizar el campo de texto con el resultado formateado
                                            document.getElementById('Texponente').value = resultadoFormateado;

                                            // Después de calcular el exponente, llamar a la función para calcular el resultado
                                            calcularResultado();
                                        } else {
                                            // Si los valores no son válidos, mostrar un mensaje de error
                                            document.getElementById('Texponente').value = "0";

                                            // Después de establecer el valor predeterminado, llamar a la función para calcular el resultado
                                            calcularResultado();
                                        }
                                    }

                                    // Llamar a las funciones correspondientes cuando se cambien los valores en los campos relevantes
                                    document.getElementById('Tiempo1').addEventListener('input', calcularExponente);
                                    document.getElementById('Tiempo2').addEventListener('input', calcularExponente);
                                    document.getElementById('Texponente').addEventListener('input', calcularResultado);
                                    document.getElementById('costeDiarioAveria').addEventListener('input', calcularResultado);
                                    document.getElementById('K').addEventListener('input', calcularResultado);
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
                            <input type="text" style="width: 40%; font-size:1em; text-align:center" placeholder="" id="tipoPenalidad" name="tipoPenalidad" value="5" oninput="validateInput3(this)" required>
                        </div>
                    </div>
                </div>

            <div class="form-group">
                {{ Form::label('observaciones') }}
                {!! $errors->first('obscreadorpenalidad', '<div class="invalid-feedback">:message</div>') !!}
                <textarea class="form-control" name="obsCreacion" style="white-space: pre-line;"></textarea>
            </div>




                <table width="95%" style="margin: auto; padding: 3% 3% 3% 3%; display:block ">
                    <tr>
                        <td  style="text-align:justify;font-size: 1em"> <strong>S₅ (Importe de la penalidad en euros) : </strong> <input type="text" style="width: 30%; font-size:1em; text-align: right " placeholder="0 €" id="S5" name="S5" oninput="validateInput3(this); calcularSuma()" readonly> &nbsp &nbsp <strong>S₅ = F + ( T<sup>1.5</sup> * C * K )</strong></td>
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
