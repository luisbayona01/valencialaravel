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
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:50%"> <strong>A = Número de averías registradas en el periodo considerado</strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 " id="NoAverias" name="NoAverias" oninput="validateInput3(this); concatenarValores()"> </td>
                                                <td style="width:5%"> * </td>
                                                <td style="text-align:left; font-size:  1em; border:none; "><strong>365</strong><br><input type="text" style="width: 50%; font-size:1em; text-align: right " value="365 " id="anio" name="anio" oninput="validateInput3(this); concatenarValores()" readonly ></td>
                                            </tr>
                                            <tr>
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:50%"> <strong>D (días)</strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0" id="D" name="D" oninput="validateInput(this); concatenarValores()"> </td>
                                                <td style="width:5%"> = </td>
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:50%"> <strong><sup>A*365</sup>/<sub>D</sub></strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="Solo Lectura" id="primeraOp" name="primeraOp" oninput="validateInput3(this); concatenarValores(); calcularS12()" readonly  > </td>
                                            </tr>


                                            <tr>
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:50%"> <strong>N = Número total de focos sustituidos por la empresa</strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0" id="N" name="N" oninput="validateInput(this); concatenarValores()"> </td>
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:50%; display:none"> <strong>N = Value de Operacion</strong> <br><input type="hiddens" style="width: 50%; font-size:1em; text-align: right " value="1" id="valueN" name="valueN" oninput="validateInput(this); concatenarValores()" readonly> </td>
                                                <td style="width:5%">  </td>
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:50%"> <strong><sup>1</sup>/<sub>N</sub></strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="Solo Lectura" id="segundaOp" name="segundaOp" oninput="validateInput3(this); concatenarValores(); calcularS12()" readonly > </td>
                                            </tr>
                                            <tr>
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:50% ; display:none"> <strong><sup>1</sup>/<sub>P</sub></strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " value="1" id="1" name="valuePor" oninput="validateInput(this); concatenarValores()" readonly> </td>
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:50% "> <strong>P</strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " value="" id="P" name="P" oninput="validateInput3(this); concatenarValores()" > </td>
                                                <td style="width:5%">  </td>
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:50%"> <strong><sup>1</sup>/<sub>P</sub> = (porcentaje anual máximo de fallos admitido)</strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " value="" id="terceraOp" name="terceraOp" oninput="concatenarValores(); calcularS12()" readonly > </td>
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


                                    function calcularPrimeraOp() {
                                        var NoAverias = parseFloat(document.getElementById("NoAverias").value);
                                        var anio = parseFloat(document.getElementById("anio").value);
                                        var D = parseFloat(document.getElementById("D").value);
                                        var primeraOp = (NoAverias * anio) / D;
                                        document.getElementById("primeraOp").value = primeraOp.toFixed(2);
                                        calcularS12(); // Llamamos a calcularS12() después de actualizar primeraOp
                                    }

                                    function calcularSegundaOp() {
                                        var N = parseFloat(document.getElementById("N").value);
                                        var valueN = parseFloat(document.getElementById("valueN").value);
                                        var segundaOp = valueN/N;
                                        document.getElementById("segundaOp").value = segundaOp.toFixed(2);
                                        calcularS12(); // Llamamos a calcularS12() después de actualizar segundaOp
                                    }

                                    function calcularTerceraOp() {
                                        var P = parseFloat(document.getElementById("P").value);
                                        var terceraOp1 = P / 100;
                                        var terceraOp = 1 / terceraOp1;
                                        if (Number.isInteger(terceraOp)) {
                                            document.getElementById("terceraOp").value = terceraOp.toFixed(0);
                                        } else {
                                            document.getElementById("terceraOp").value = terceraOp.toFixed(2);
                                        }
                                        calcularS12(); // Llamamos a calcularS12() después de actualizar terceraOp
                                    }

                                    function calcularS12() {
                                        var primeraOp = parseFloat(document.getElementById("primeraOp").value);
                                        var segundaOp = parseFloat(document.getElementById("segundaOp").value);
                                        var terceraOp = parseFloat(document.getElementById("terceraOp").value);
                                        var S12 = primeraOp * segundaOp * terceraOp;
                                        document.getElementById("S12").value = S12.toFixed(2).replace(".", ",");
                                    }

                                    document.getElementById("NoAverias").addEventListener("input", calcularPrimeraOp);
                                    document.getElementById("anio").addEventListener("input", calcularPrimeraOp);
                                    document.getElementById("D").addEventListener("input", calcularPrimeraOp);
                                    document.getElementById("N").addEventListener("input", calcularSegundaOp);
                                    document.getElementById("P").addEventListener("input", calcularTerceraOp);

                                    function concatenarValores() {
                                        // Obtener los valores de los campos de entrada
                                        var NoAverias = document.getElementById("NoAverias").value;
                                        var anio = document.getElementById("anio").value;
                                        var valD = document.getElementById("D").value;
                                        var N = document.getElementById("N").value;
                                        var P = document.getElementById("P").value;
                                        var segundaOp = document.getElementById("segundaOp").value;
                                        var primeraOp = document.getElementById("primeraOp").value;
                                        var valterceraOp = document.getElementById("terceraOp").value;

                                        // Concatenar los valores
                                       var operaciones = " < " + "A: " + NoAverias + " * " + anio + " / " + "D: " + valD + " > " + " * " + " < " + " 1 " + " / " + "N: " + N + " > " + " * " + " < " + " 1 " + " / " + "P: " + P +"%" + " > " ;

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
                    <td  style="text-align:justify;font-size: 1em; width:50%"> <strong> S<sub>12</sub> (Importe de la penalidad en euros) : </strong> <input type="text" style="width: 30%; font-size:1em; text-align: right " placeholder="Solo Lectura" id="S12" name="S12" oninput="validateInput3(this)" readonly> &nbsp &nbsp <strong> S <sub>12</sub> = <sup>A*365</sup>/<sub>D</sub> * <sup>1</sup>/<sub>N</sub> * <sup>1</sup>/<sub>P</sub></strong></td>
                </tr>
            </table>
            <table style="margin: auto; padding: 3% 3% 3% 3% ;display:none;width:95%" id="operAritmeticaMaster" >
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
