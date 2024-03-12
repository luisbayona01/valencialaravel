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
                                    <span class="card-title" style="color: black; text-align:justify">{{ __('') }} U.9.- PENALIDAD POR INCUMPLIMIENTOS EN LA ACTUALIZACIÓN DE
                                        LOS PROGRAMAS Y APLICACIONES INSTALADOS EN EL CGT, EN LA
                                        ACTUALIZACIÓN DE EQUIPOS Y OTROS ELEMENTOS DEL SISTEMA, EN
                                        LA CARGA DE DATOS Y PROGRAMAS EN EQUIPOS DE REGULACIÓN Y
                                        LOS DEMÁS ELEMENTOS DEL SISTEMA DE GESTIÓN. </span>
                                </div><!-- IMAGEN ENCABEZADO DE LA HOJA DE CALCULO PENALIZACION -->

                                <script>
                                    // Función para validar los campos antes de enviar el formulario
                                    function validarCampos() {
                                        // Obtener los valores de los campos
                                        var resultadoValue = document.getElementById('resultado').value;
                                        var S9Value = document.getElementById('S9').value;

                                        // Verificar si algún campo está vacío
                                        if (resultadoValue.trim() === '' || S9Value.trim() === '') {
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
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:50%"> <strong>Tiempo total tardado en la instalación de la actualización y en la corrección y reposición</strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 " id="tiempoTarea" name="tiempoTarea" oninput="validateInput3(this)"> </td>
                                                <td style="width:5%"> / </td>
                                                <td style="text-align:left; font-size:  1em; border:none; "><strong>Tiempo establecido por el Ayuntamiento</strong><br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0 " id="tiempoAyu" name="tiempoAyu" oninput="validateInput3(this)" ></td>
                                            </tr>
                                            <tr>
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:50%"> <strong>T<sup>2</sup></strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0" id="T" name="T" oninput="validateInput3(this)" readonly> </td>

                                            </tr>

                                            <tr>
                                                <td style="text-align:justify;font-size: 1em; border:none; width:50%">
                                                    <strong>D = En función del tipo de elemento</strong><br>
                                                    <select style="width: 100%; font-size:1em; text-align: left; white-space: pre-wrap;" id="D" name="D" onchange="" oninput="">
                                                        <option value="" disabled selected hidden>Selecciona una opción</option>
                                                        <option value="200">1- Actualización de programas y aplicaciones informáticas, ordenadores, servidores y bases de datos = 200 €</option>
                                                        <option value="150">2- Comunicaciones = 150 €</option>
                                                        <option value="100">3- Equipo intermedio y ERU = 100 €</option>
                                                        <option value="50">4- Reguladores y otros elementos = 50 €</option>
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:50%"> <strong>K</strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0" id="K" name="K" oninput="validateInput(this)"> </td>
                                            </tr>

                                            <tr>
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:50%" class="float-right" > <strong>F</strong> <br><input type="text" style="width: 100%; font-size:1em; text-align: right " value="1000 " id="F" name="F" oninput="validateInput3(this);; calcularSuma()" readonly> </td>
                                                <td style="text-align: center"> + </td>
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:50%"> <strong>Resultado ( T<sup>2</sup> * D * K )</strong> <br><input type="text" style="width: 50%; font-size:1em; text-align: right " placeholder="0" id="resultado" name="resultado" oninput="validateInput3(this);; calcularSuma()" readonly> </td>
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

                                    function calcularT() {
                                        // Obtener los valores de los campos de entrada
                                        var tiempoTarea = parseFloat(document.getElementById("tiempoTarea").value.replace(',', '.'));
                                        var tiempoAyu = parseFloat(document.getElementById("tiempoAyu").value.replace(',', '.'));

                                        // Calcular el resultado de la división
                                        var resultado = tiempoTarea / tiempoAyu;

                                        // Elevar el resultado al cuadrado
                                        resultado *= resultado;

                                        // Formatear el resultado con coma para las centésimas
                                        var resultadoFormateado = resultado.toFixed(2).replace('.', ',');

                                        // Mostrar el resultado en el campo "T"
                                        document.getElementById("T").value = resultadoFormateado;
                                    }

                                    // Llamar a la función calcularT() cada vez que cambie el valor en los campos de entrada
                                    document.getElementById("tiempoTarea").addEventListener("input", calcularT);
                                    document.getElementById("tiempoAyu").addEventListener("input", calcularT);

                                    function calcularResultado() {
                                        // Obtener los valores de los campos de entrada
                                        var T = parseFloat(document.getElementById("T").value.replace(',', '.'));
                                        var D = parseFloat(document.getElementById("D").value.replace(',', '.'));
                                        var K = parseFloat(document.getElementById("K").value.replace(',', '.'));

                                        // Calcular el resultado de la multiplicación
                                        var resultado = T * D * K;

                                        // Formatear el resultado con coma para las centésimas
                                        var resultadoFormateado = resultado.toFixed(2).replace('.', ',');

                                        // Mostrar el resultado en el campo "resultado"
                                        document.getElementById("resultado").value = resultadoFormateado + ' €';
                                    }

                                    // Llamar a la función calcularResultado() cada vez que cambie el valor en los campos de entrada
                                    document.getElementById("T").addEventListener("input", calcularResultado);
                                    document.getElementById("D").addEventListener("input", calcularResultado);
                                    document.getElementById("K").addEventListener("input", calcularResultado);

                                    // Función para calcular la suma y mostrar el resultado en el campo "S8"
                                    function calcularResultado() {
                                        // Obtener los valores de los campos de entrada
                                        var T = parseFloat(document.getElementById("T").value.replace(',', '.'));
                                        var D = parseFloat(document.getElementById("D").value.replace(',', '.'));
                                        var K = parseFloat(document.getElementById("K").value.replace(',', '.'));

                                        // Calcular el resultado de la multiplicación
                                        var resultado = T * D * K;

                                        // Formatear el resultado con coma para las centésimas y puntos de miles
                                        var resultadoFormateado = resultado.toLocaleString('es-ES', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

                                        // Mostrar el resultado en el campo "resultado"
                                        document.getElementById("resultado").value = resultadoFormateado + ' €';

                                        // Obtener el valor del campo "F"
                                        var F = parseFloat(document.getElementById("F").value.replace(',', '.'));

                                        // Calcular la suma de "F" y "resultado"
                                        var suma = F + resultado;

                                        // Formatear la suma con coma para las centésimas y puntos de miles
                                        var sumaFormateada = suma.toLocaleString('es-ES', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

                                        // Mostrar la suma en el campo "S9"
                                        document.getElementById("S9").value = sumaFormateada + ' €';
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
                            <input type="text" style="width: 40%; font-size:1em; text-align:center" placeholder="" id="tipoPenalidad" name="tipoPenalidad" value="9" oninput="validateInput3(this)" required>
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
                        <td  style="text-align:justify;font-size: 1em"> <strong> S<sub>9</sub> (Importe de la penalidad en euros) : </strong> <input type="text" style="width: 30%; font-size:1em; text-align: right " placeholder="0 €" id="S9" name="S9" oninput="validateInput3(this)" readonly> &nbsp &nbsp <strong> S <sub>9</sub> = F ( T<sup>2</sup> * D * K )</strong></td>
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
