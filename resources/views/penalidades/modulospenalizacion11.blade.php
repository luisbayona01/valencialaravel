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
                                    <span class="card-title" style="color: black; text-align:justify">{{ __('') }} U.11.- PENALIDAD POR DEMORA EN LA PRESENTACIÓN DE LOS PARTES
                                        Y DEMÁS INFORMES REQUERIDOS </span>
                                </div><!-- IMAGEN ENCABEZADO DE LA HOJA DE CALCULO PENALIZACION -->

                                <script>
                                    // Función para validar los campos antes de enviar el formulario
                                    function validarCampos() {
                                        // Obtener los valores de los campos
                                        var DValue = document.getElementById('D').value;
                                        var NValue = document.getElementById('N').value;
                                        var S11Value = document.getElementById('S11').value;

                                        // Verificar si algún campo está vacío
                                        if (DValue.trim() === '' || NValue.trim() === ''|| S11Value.trim() === '') {
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
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:50%"> <strong>Importe de un día de conservación</strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 " id="importe" name="importe" oninput="validateInput3(this); validateInput33(this)"> </td>
                                                <td style="width:5%"> / </td>
                                                <td style="text-align:left; font-size:  1em; border:none; "><strong>Referencia Mes</strong><br><input type="text" style="width: 50%; font-size:1em; text-align: right " value="30 " id="mes" name="mes" oninput="validateInput3(this); validateInput33(this)" readonly ></td>
                                            </tr>
                                            <tr>
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:50%"> <strong>D</strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="Solo Lectura" id="D" name="D" oninput="validateInput3(this)" readonly> </td>

                                            </tr>

                                            <tr>
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:50%"> <strong>N</strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0" id="N" name="N" oninput="validateInput(this)"> </td>
                                            </tr>

                                            <!-- FIN SEGUNDA FILA DE OPERACIONES  -->


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

                                    function validateInput33() {
                                        // Obtener los valores de importe y mes
                                        var importe = parseFloat(document.getElementById('importe').value);
                                        var mes = parseFloat(document.getElementById('mes').value);

                                        // Realizar la división
                                        var resultadoDivision = importe / mes;

                                        // Formatear el resultado para mostrarlo sin puntos de miles y con coma para las centésimas de euro
                                        var resultadoFormateado = resultadoDivision.toLocaleString('es-ES', {minimumFractionDigits: 2});

                                        // Mostrar el resultado en el elemento con id="D"
                                        document.getElementById('D').value = resultadoFormateado;
                                    }

                                    function multiplicarDN() {
                                        // Obtener los valores de los inputs "D" y "N"
                                        var valorD = parseFloat(document.getElementById('D').value);
                                        var valorN = parseFloat(document.getElementById('N').value);

                                        // Verificar si ambos valores son números válidos
                                        if (!isNaN(valorD) && !isNaN(valorN)) {
                                            // Realizar la multiplicación
                                            var resultado = valorD * valorN;

                                            // Agregar el símbolo del euro al final del resultado
                                            var resultadoConEuro = resultado.toFixed(2) + ' €';

                                            // Mostrar el resultado en el input "S11"
                                            document.getElementById('S11').value = resultadoConEuro;
                                        }
                                    }

                                    // Llamar a la función cada vez que se cambie el valor de los inputs "D" o "N"
                                    document.getElementById('D').addEventListener('input', multiplicarDN);
                                    document.getElementById('N').addEventListener('input', multiplicarDN);

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
                            <input type="text" style="width: 40%; font-size:1em; text-align:center" placeholder="" id="tipoPenalidad" name="tipoPenalidad" value="11" oninput="validateInput3(this)" required>
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
                        <td  style="text-align:justify;font-size: 1em; width:50%"> <strong> S<sub>11</sub> (Importe de la penalidad en euros) : </strong> <input type="text" style="width: 40%; font-size:1em; text-align: right " placeholder="Solo Lectura (resultado €)" id="S11" name="S11" oninput="validateInput3(this)" readonly> &nbsp &nbsp <strong> S <sub>11</sub> = D * N</strong></td>
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
