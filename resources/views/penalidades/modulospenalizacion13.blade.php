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
                                    <span class="card-title" style="color: black; text-align:justify">{{ __('') }} U.13.- PENALIDAD POR INCUMPLIMIENTOS DE LAS CONDICIONES
                                        ESPECIALES DE EJECUCIÓN DE CARÁCTER MEDIOAMBIENTAL </span>
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
                                    <span class="card-title" style="color: black; text-align:justify">Modalidad de Penalidad</span>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="clase" id="claseA" value="option1" checked>
                                        <label class="form-check-label" for="claseA">
                                            A- Penalidades por retraso en la evaluación de la Huella de Carbono
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="clase" id="claseB" value="option2">
                                        <label class="form-check-label" for="claseB">
                                            B- Penalidades por Huella de Carbono excesiva
                                        </label>
                                      </div>
                                </div>
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
                                            <!-- Valor de referencia -->
                                            <tr>
                                                <td style="text-align:justify;font-size: 1em; border-bottom: 0; width:50%"> <strong>Valor de referencia</strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " value="1000 " id="referencia" name="referencia" oninput="calcularS13()" readonly> </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:justify;font-size: 1em; border-bottom: 0; width:50%"> <strong>M= Número de meses</strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0" id="noMeses" name="noMeses" oninput="calcularS13()"> </td>
                                                <td style="text-align:justify;font-size: 1em; border-bottom: 0; width:50%; display:none"> <strong>Numero Fijo = 1</strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " value="1" id="NoFijo" name="NoFijo" oninput="calcularS13()"> </td>
                                                <td style="width:5%"> = </td>
                                                <td style="text-align:justify;font-size: 1em; border-bottom: 0; width:50%"> <strong>(M + 1)</strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0" id="primeraOp" name="primeraOp" oninput="calcularS13()" readonly> </td>
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

                                   // Función para sumar el valor de los campos noMeses y NoFijo y actualizar el campo primeraOp
                                    function sumarYActualizarPrimeraOp() {
                                        // Obtener el valor del campo noMeses y reemplazar las comas por puntos
                                        var noMeses = parseFloat(document.getElementById('noMeses').value.replace(',', '.')) || 0;
                                        var NoFijo = parseFloat(document.getElementById('NoFijo').value) || 0; // No es necesario reemplazar en NoFijo ya que lo dejamos sin procesar

                                        // Sumar los valores
                                        var resultadoSuma = noMeses + NoFijo;

                                        // Actualizar el campo primeraOp con el resultado de la suma
                                        document.getElementById('primeraOp').value = resultadoSuma;
                                    }

                                    // Llamar a la función sumarYActualizarPrimeraOp cuando se modifique el valor de los campos noMeses y NoFijo
                                    document.getElementById('noMeses').addEventListener('input', sumarYActualizarPrimeraOp);
                                    document.getElementById('NoFijo').addEventListener('input', sumarYActualizarPrimeraOp);

                                    // Llamar a la función sumarYActualizarPrimeraOp cuando se cargue la página para calcular el valor inicial
                                    window.addEventListener('load', sumarYActualizarPrimeraOp);


                                    function calcularS13() {
    // Obtener los valores de los campos primeraOp y referencia
    var primeraOpVal = parseFloat(document.getElementById('primeraOp').value) || 0;
    var referenciaVal = parseFloat(document.getElementById('referencia').value) || 0;

    // Mostrar los valores obtenidos para depuración
    console.log('primeraOpVal:', primeraOpVal);
    console.log('referenciaVal:', referenciaVal);

    // Verificar si ambos valores son números válidos
    if (!isNaN(primeraOpVal) && !isNaN(referenciaVal)) {
        // Realizar la multiplicación
        var S13 = primeraOpVal * referenciaVal;

        // Mostrar el resultado en el input "S13"
        console.log('S13:', S13);
        document.getElementById('S13').value = S13;
    }
}


    // Llamar a la función calcularS13 cuando se modifique el valor de los campos primeraOp y referencia
    document.getElementById('primeraOp').addEventListener('input', calcularS13);
    document.getElementById('referencia').addEventListener('input', calcularS13);




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
                    <td  style="text-align:justify;font-size: 1em"> <strong> S<sub>13</sub> (Importe de la penalidad en euros) : </strong> <input type="text" style="width: 30%; font-size:1em; text-align: right " placeholder="0 €" id="S13" name="S13" oninput="validateInput3(this)" readonly> &nbsp &nbsp <strong> S <sub>13</sub> = 1000 * (M + 1)</strong></td>
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
