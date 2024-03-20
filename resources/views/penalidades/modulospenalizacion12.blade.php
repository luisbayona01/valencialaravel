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
                                <div class="card-header" style="text-align:justify">
                                    <div>
                                        <img src="{{ asset('img/icono_representativo_caratula.png') }}" class="card-img-top" style="width: 30rem;">
                                    </div><br><br>
                                    <span class="card-title" style="color: black; text-align:justify">{{ __('') }} U.12.- PENALIDAD POR FALTA DE CALIDAD DE LOS FOCOS O LÁMPARAS DE LEDS </span>
                                </div><!-- IMAGEN ENCABEZADO DE LA HOJA DE CALCULO PENALIZACION -->

                                <script>
                                    // Función para validar los campos antes de enviar el formulario
                                    function validarCampos() {
                                        // Obtener los valores de los campos
                                        var primeraOpValue = document.getElementById('primeraOp').value;
                                        var segundaOpValue = document.getElementById('segundaOp').value;
                                        var terceraOpValue = document.getElementById('terceraOp').value;
                                        var S12Value = document.getElementById('S12').value;

                                        // Verificar si algún campo está vacío
                                        if (primeraOpValue.trim() === '' || segundaOpValue.trim() === ''|| terceraOpValue.trim() === ''|| S12Value.trim() === '') {
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

                                            <!-- INICIO FILA DE OPERACIONES  -->


                                            <!-- Valor D  -->
                                            <tr>
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:50%"> <strong>A = Número de averías registradas en el periodo considerado</strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 " id="NoAverias" name="NoAverias" oninput="validateInput3(this)"> </td>
                                                <td style="width:5%"> * </td>
                                                <td style="text-align:left; font-size:  1em; border:none; "><strong>365</strong><br><input type="text" style="width: 50%; font-size:1em; text-align: right " value="365 " id="anio" name="anio" oninput="validateInput3(this)" readonly ></td>
                                            </tr>
                                            <tr>
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:50%"> <strong>D</strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0" id="D" name="D" oninput="validateInput3(this)"> </td>
                                                <td style="width:5%"> = </td>
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:50%"> <strong><sup>A*365</sup>/<sub>D</sub></strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="Solo Lectura" id="primeraOp" name="primeraOp" oninput="validateInput3(this)" readonly  > </td>
                                            </tr>

                                            <tr>
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:50%"> <strong>N = Número total de focos sustituidos por la empresa</strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0" id="N" name="N" oninput="validateInput(this)"> </td>
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:50%; display:none"> <strong>N = Value de Operacion</strong> <br><input type="hiddens" style="width: 50%; font-size:1em; text-align: right " value="1" id="valueN" name="valueN" oninput="validateInput(this)" readonly> </td>
                                                <td style="width:5%">  </td>
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:50%"> <strong><sup>1</sup>/<sub>N</sub></strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="Solo Lectura" id="segundaOp" name="segundaOp" oninput="validateInput(this)" disabled> </td>
                                            </tr>

                                            <tr>
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:50%"> <strong><sup>1</sup>/<sub>P</sub> = 0.02 <2%> (porcentaje anual máximo de fallos admitido)</strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0,02" id="terceraOp" name="terceraOp" oninput="(this)"  > </td>
                                                <td style="width:5%">  </td>
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:50% ; display:none"> <strong><sup>1</sup>/<sub>P</sub></strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " value="1" id="valuePor" name="valuePor" oninput="validateInput(this)" readonly> </td>

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


                                    // Función para calcular la primera operación (NoAverias * anio) y mostrar el resultado en el campo primeraOp
                                    function calcularPrimeraOperacion() {
                                        // Obtener los valores de los campos NoAverias, anio y D

                                        var NoAverias = parseFloat(document.getElementById('NoAverias').value.replace(',', '.'));
                                        var anio = parseFloat(document.getElementById('anio').value.replace(',', '.'));
                                        var D = parseFloat(document.getElementById('D').value.replace(',', '.'));

                                        // Realizar la primera operación (NoAverias * anio)
                                        var primeraOperacion = NoAverias * anio;

                                        // Dividir el resultado obtenido por el valor de D
                                        var resultadoFinal = primeraOperacion / D;

                                        // Formatear el resultado con coma como separador decimal y dos dígitos después de la coma
                                        var resultadoFormateado = resultadoFinal.toFixed(2).replace('.', ',');

                                        // Actualizar el campo primeraOp con el resultado formateado
                                        document.getElementById('primeraOp').value = resultadoFormateado ; // Agregar el símbolo de euro al final
                                    }

                                    // Llamar a la función calcularPrimeraOperacion cuando se modifique el valor de los campos NoAverias, anio y D
                                    document.getElementById('NoAverias').addEventListener('input', calcularPrimeraOperacion);
                                    document.getElementById('anio').addEventListener('input', calcularPrimeraOperacion);
                                    document.getElementById('D').addEventListener('input', calcularPrimeraOperacion);

                                    // Llamar a la función calcularPrimeraOperacion cuando se cargue la página para calcular el valor inicial
                                    window.addEventListener('load', calcularPrimeraOperacion);

                                    // Función para calcular la segunda operación (N / valueN) y mostrar el resultado en el campo segundaOp
                                    function calcularSegundaOperacion() {
                                        // Obtener los valores de los campos N y valueN
                                        var N = parseFloat(document.getElementById('N').value.replace(',', '.'));
                                        var valueN = parseFloat(document.getElementById('valueN').value.replace(',', '.'));

                                        // Realizar la segunda operación (N / valueN)
                                        var segundaOperacion = N / valueN;

                                        // Formatear el resultado con coma como separador decimal y dos dígitos después de la coma
                                        var resultadoFormateado = segundaOperacion.toFixed(2).replace('.', ',');

                                        // Actualizar el campo segundaOp con el resultado formateado
                                        document.getElementById('segundaOp').value = resultadoFormateado ; // Agregar el símbolo de euro al final
                                    }

                                    // Llamar a la función calcularSegundaOperacion cuando se modifique el valor de los campos N y valueN
                                    document.getElementById('N').addEventListener('input', calcularSegundaOperacion);
                                    document.getElementById('valueN').addEventListener('input', calcularSegundaOperacion);

                                    // Llamar a la función calcularSegundaOperacion cuando se cargue la página para calcular el valor inicial
                                    window.addEventListener('load', calcularSegundaOperacion);


                                   // Función para realizar la multiplicación y actualizar el campo S12
                                    function actualizarS12() {
                                        // Obtener los valores de los campos primeraOp, segundaOp y terceraOp
                                        var primeraOp = parseFloat(document.getElementById('primeraOp').value.replace(',', '.'));
                                        var segundaOp = parseFloat(document.getElementById('segundaOp').value.replace(',', '.'));
                                        var terceraOp = parseFloat(document.getElementById('terceraOp').value.replace(',', '.'));

                                        // Realizar la multiplicación de los tres valores
                                        var resultadoMultiplicacion = primeraOp * segundaOp * terceraOp;

                                        // Formatear el resultado con coma como separador decimal y dos dígitos después de la coma
                                        var resultadoFormateado = resultadoMultiplicacion.toFixed(2).replace('.', ',');

                                        // Actualizar el campo S12 con el resultado formateado
                                        document.getElementById('S12').value = resultadoFormateado;
                                    }

                                    // Llamar a la función actualizarS12 cada vez que se modifiquen los campos primeraOp, segundaOp y terceraOp
                                    document.getElementById('primeraOp').addEventListener('input', actualizarS12);
                                    document.getElementById('segundaOp').addEventListener('input', actualizarS12);
                                    document.getElementById('terceraOp').addEventListener('input', actualizarS12);

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
                            <input type="text" style="width: 40%; font-size:1em; text-align:center" placeholder="" id="tipoPenalidad" name="tipoPenalidad" value="12" oninput="validateInput3(this)" required>
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
                    <td  style="text-align:justify;font-size: 1em; width:50%"> <strong> S<sub>12</sub> (Importe de la penalidad en euros) : </strong> <input type="text" style="width: 30%; font-size:1em; text-align: right " placeholder="Solo Lectura (resultado €)" id="S12" name="S12" oninput="validateInput3(this)" readonly> &nbsp &nbsp <strong> S <sub>12</sub> = <sup>A*365</sup>/<sub>D</sub> * <sup>1</sup>/<sub>N</sub> * <sup>1</sup>/<sub>P</sub></strong></td>
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
