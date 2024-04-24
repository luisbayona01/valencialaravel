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
                            <span class="card-title" style="color: black; text-align:justify">{{ __('') }} U.14.- PENALIDAD POR INCUMPLIMIENTOS DE LAS CONDICIONES ESPECIALES DE EJECUCIÓN DE CARÁCTER SOCIAL </span>
                        </div><!-- IMAGEN ENCABEZADO DE LA HOJA DE CALCULO PENALIZACION -->

                        <script>
                            // Función para validar los campos antes de enviar el formulario
                            function validarCampos() {
                                // Obtener los valores de los campos
                                var resultadoValue = document.getElementById('resultado').value;
                                var S14Value = document.getElementById('S14').value;

                                // Verificar si algún campo está vacío
                                if (resultadoValue.trim() === '' || S14Value.trim() === '') {
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

                        <!-- Valor F  -->
                        <tr>

                        </tr>

                        <!-- Valor T  -->
                        <tr>
                            <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:50%"> <strong>Valor de Referencia</strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " value="3000 " id="referencia" name="referencia" oninput="validateInput3(this); concatenarValores()" readonly> </td>
                        </tr>
                        <tr>
                            <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:50%"> <strong>PDi = número de personas con alguna deficiencia o con riesgo de exclusión social</strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0" id="pdi" name="pdi" oninput="validateInput3(this); concatenarValores()"> </td>
                            <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:50%; display: none"> <strong>Valor Fijo de Referencia -1</strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " value="1" id="valorfijo" name="valorfijo" oninput="validateInput3(this); concatenarValores()" readonly> </td>
                            <td style="text-align: center"> = </td>
                            <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:50%"> <strong>(1 - PDi)</strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="Solo Lectura" id="resultado" name="resultado" oninput="validateInput3(this); concatenarValores()" readonly > </td>
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
                    input.value = input.value.replace(/[^0-9,-]/g, '');
                }
                function validateInput5(input) {
                    // Permite solo números, comas y puntos en el input
                    input.value = input.value.replace(/[^0-9.]/g, '');
                }

                function actualizarS14() {
                var referencia = parseFloat(document.getElementById("referencia").value.replace(",", "."));
                var resultado = parseFloat(document.getElementById("resultado").value.replace(",", "."));

                if (!isNaN(referencia) && !isNaN(resultado)) {
                    var resultadoMultiplicacion = referencia * resultado;
                    document.getElementById('S14').value = resultadoMultiplicacion.toFixed(2) + ' €';
                }
            }

            window.addEventListener('load', actualizarS14);

            function restar() {
                var valorFijo = parseFloat(document.getElementById("referencia").value.replace(",", "."));
                var pdi = parseFloat(document.getElementById("pdi").value);

                var resultado = 1 - pdi;

                document.getElementById("resultado").value = resultado.toFixed(2);
                actualizarS14(); // Llama a la función para actualizar el campo S14
            }

            // Llama a la función restar cuando se cambie el valor de "pdi"
            document.getElementById("pdi").addEventListener("input", restar);

            function concatenarValores() {
                // Obtener los valores de los campos de entrada
                var referencia = document.getElementById("referencia").value;
                var pdi = document.getElementById("pdi").value;



                // Concatenar los valores
                var resultado = referencia + " * " + " ( " + "pdi: " + pdi + " - " + " 1 " + " ) " + "==>";

                // Asignar el resultado al campo de entrada "operaciones"
                document.getElementById("operaciones").value = resultado;
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
                            <input type="text" style="width: 40%; font-size:1em; text-align:center" placeholder="" id="tipoPenalidad" name="tipoPenalidad" value="14" oninput="validateInput3(this)" required>
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
                        <td  style="text-align:justify;font-size: 1em; width:50%"> <strong> S<sub>14</sub> (el importe de la penalidad en euros, en el mes i) : </strong> <input type="text" style="width: 25%; font-size:1em; text-align: right " placeholder="Solo Lectura" id="S14" name="S14" oninput="validateInput3(this)" readonly> &nbsp &nbsp <strong> S <sub>14</sub> = 3000 ( 1 - PDi )</strong></td>
                    </tr>
                </table>
                <table style="margin: auto; padding: 3% 3% 3% 3% ;display:none;width:95%" id="operAritmeticaMaster" >
                    <!--<th style="text-align:justify;font-size: 1em; width:100%; padding: 3% 3% 3% 3%"> </th>
                    <td><input type="text" style="font-size:1em; text-align: right; width:90% " placeholder="Solo Lectura " id="operaciones" name="operaciones" readonly></td>-->
                    <div class="form-group" style="display: none ">
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
