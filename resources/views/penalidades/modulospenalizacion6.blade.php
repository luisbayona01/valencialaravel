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
                                    </div><br><br>
                                    <span class="card-title" style="color: black">{{ __('') }} U.6.- PENALIDAD POR DEMORA EXCESIVA EN LA REALIZACIÓN DE MODIFICACIONES Y NUEVAS INSTALACIONES </span>
                                </div><!-- IMAGEN ENCABEZADO DE LA HOJA DE CALCULO PENALIZACION -->

                                <script>
                                    // Función para validar los campos antes de enviar el formulario
                                    function validarCampos() {
                                        // Obtener los valores de los campos
                                        var TexponenteValue = document.getElementById('Texponente').value;
                                        var VValue = document.getElementById('V').value;
                                        var S6Value = document.getElementById('S6').value;

                                        // Verificar si algún campo está vacío
                                        if (TexponenteValue.trim() === '' || VValue.trim() === '' || S6Value.trim() === '') {
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

                                            <!-- INICIO FILA DE OPERACIONES T -->
                                            <tr>
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:30%"> <strong>tiempo tardado en detección de la incidencia o avería </strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 " id="Tiempo1" name="Tiempo1" oninput="validateInput3(this)"> </td>
                                                <td style="width:5%"> / </td>
                                                <td style="text-align:left; font-size:  1em; border:none; "><strong>Plazo establecido en pliego de condiciones técnicas </strong><br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 " id="Tiempo2" name="Tiempo2" oninput="validateInput3(this)" ></td>
                                            </tr>

                                            <tr>
                                                <td style="text-align:left; font-size: 1em; border:none;">
                                                    <strong>T</strong><br>
                                                    <input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 " id="Texponente" name="Texponente" oninput="validateInput3(this) " readonly  required>
                                                </td>
                                            </tr>
                                            <!-- FIN SEGUNDA FILA DE OPERACIONES T -->

                                            <tr>
                                                <td  style="text-align:justify;font-size: 1em; border:none; width:45%"> <strong>Valor de la modificación o instalación </strong><br> <input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 " id="costeModificacion" name="costeModificacion" oninput="validateInput3(this)"> </td>
                                                <td></td>
                                                <td style="text-align:left; font-size:  1em; border:none; display:none "><strong> 1% </strong><br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 " value="1%" id="porcentaje" name="porcentaje" oninput="validateInput3(this)" >
                                                    <td  style="text-align:justify;font-size: 1em; border:none; width:45%"> <strong>V</strong><br> <input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 " id="V" name="V" oninput="validateInput(this)" readonly> </td>
                                            </tr>

                                            <tr>
                                                <td style="text-align:justify;font-size: 1em; border:none; width:45%"> <strong>* 1000</strong><br> <input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 " value="1000" id="valueFijo" name="valueFijo" oninput="validateInput(this)" readonly> </td>

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

                                    function dividirYMostrar() {
                                        var tiempo1 = parseFloat(document.getElementById("Tiempo1").value);
                                        var tiempo2 = parseFloat(document.getElementById("Tiempo2").value);

                                        if (!isNaN(tiempo1) && !isNaN(tiempo2) && tiempo2 !== 0) {
                                            var resultado = (tiempo1 / tiempo2).toFixed(2); // Limitar a dos decimales
                                            resultado = resultado.replace('.', ',');
                                            document.getElementById("Texponente").value = resultado;
                                            calcularS6(); // Actualizar S6 después de actualizar Texponente
                                        } else {
                                            document.getElementById("Texponente").value = '';
                                        }
                                    }


                                    function multiplicarYMostrar() {
                                        var costeModificacion = parseFloat(document.getElementById("costeModificacion").value);
                                        var porcentaje = parseFloat(document.getElementById("porcentaje").value.replace('% €', ''));

                                        if (!isNaN(costeModificacion) && !isNaN(porcentaje)) {
                                            var resultado = (costeModificacion * (porcentaje / 100)).toString();
                                            resultado = resultado.replace('.', ',');
                                            // Limitar el resultado a dos decimales sin redondeo
                                            resultado = resultado.substring(0, resultado.indexOf(',') + 3);
                                            document.getElementById("V").value = resultado;
                                            calcularS6(); // Actualizar S6 después de actualizar V
                                        } else {
                                            document.getElementById("V").value = '';
                                        }
                                    }

                                    function calcularS6() {
                                        var Texponente = parseFloat(document.getElementById("Texponente").value.replace(',', '.'));
                                        var V = parseFloat(document.getElementById("V").value.replace(',', '.'));
                                        var valueFijo = parseFloat(document.getElementById("valueFijo").value);

                                        if (!isNaN(Texponente) && !isNaN(V) && !isNaN(valueFijo)) {
                                            var resultado = (Texponente * V + valueFijo).toString();
                                            resultado = resultado.replace('.', ',');
                                            document.getElementById("S6").value = resultado += " €";
                                        } else {
                                            document.getElementById("S6").value = '';
                                        }
                                    }

                                    // Llamar a las funciones al cambiar los valores de Tiempo1, Tiempo2, costeModificacion, porcentaje, Texponente, V y valueFijo
                                    document.getElementById("Tiempo1").addEventListener("input", dividirYMostrar);
                                    document.getElementById("Tiempo2").addEventListener("input", dividirYMostrar);
                                    document.getElementById("costeModificacion").addEventListener("input", multiplicarYMostrar);
                                    document.getElementById("porcentaje").addEventListener("input", multiplicarYMostrar);
                                    document.getElementById("Texponente").addEventListener("input", calcularS6);
                                    document.getElementById("V").addEventListener("input", calcularS6);
                                    document.getElementById("valueFijo").addEventListener("input", calcularS6);

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
                            <input type="text" style="width: 40%; font-size:1em; text-align:center" placeholder="" id="tipoPenalidad" name="tipoPenalidad" value="6" oninput="validateInput3(this)" required>
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
                        <td  style="text-align:justify;font-size: 1em"> <strong> S₆ (Importe de la penalidad en euros) : </strong> <input type="text" style="width: 30%; font-size:1em; text-align: right " placeholder="0 €" id="S6" name="S6" oninput="validateInput3(this); calcularSuma()" readonly> &nbsp &nbsp <strong> S₆ = T * V + 1000</strong></td>
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
