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
                                    <span class="card-title" style="color: black; text-align:justify">{{ __('') }} U.1.- PENALIDAD POR INCORRECTA GESTIÓN DEL TRÁFICO EN EL CGT </span>
                                </div><!-- IMAGEN ENCABEZADO DE LA HOJA DE CALCULO PENALIZACION -->

                                <script>
                                    // Función para validar los campos antes de enviar el formulario
                                    function validarCampos() {
                                        // Obtener los valores de los campos
                                        var primeraOpValue = document.getElementById('primeraOp').value;
                                        var segundaOpValue = document.getElementById('segundaOp').value;
                                        var S13Value = document.getElementById('S13').value;
                                        var S133Value = document.getElementById('S133').value;
                                        var claseASelected = document.getElementById('claseA').checked;
                                        var claseBSelected = document.getElementById('claseB').checked;

                                        // Verificar qué campos validar dependiendo de la selección del checkbox
                                        if (claseASelected) {
                                            if (primeraOpValue.trim() === '' || S13Value.trim() === '') {
                                                alert('Por favor complete todos los campos de la clase A antes de guardar.');
                                                return false; // Evitar enviar el formulario
                                            }
                                        } else if (claseBSelected) {
                                            if (segundaOpValue.trim() === '' || S133Value.trim() === '') {
                                                alert('Por favor complete todos los campos de la clase B antes de guardar.');
                                                return false; // Evitar enviar el formulario
                                            }
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
                                        <input class="form-check-input" type="radio" name="clase" id="claseA" value="option1">
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
                                <!-- TABLA REFERENCIA FORMULACION A -->
                                <div>
                                    <table class="" border="1" width="95%" style="margin: auto; padding:3% 3% 3% 3%; display:none" id="claseA-table" >
                                        <tbody>
                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif
                                            <tr>
                                                <td style="text-align:justify;font-size: 1em; border-bottom: 0; width:30%"> <strong>F<sub>cm</sub> = Factor de calidad del mes actual</strong> <br><input type="text" style="width: 80%; font-size:1em; text-align: right " placeholder="0" id="F" name="F" oninput="validateInput7(this);calcularS1();concatenarValores()"> </td>
                                                <td style="width:5%; text-align:center"> / </td>
                                                <td style="text-align:justify;font-size: 1em; border-bottom: 0; width:30%"> <strong>FC<sub>cmo</sub> = Factor de calidad del mismo mes del año anterior</strong> <br><input type="text" style="width: 80%; font-size:1em; text-align: right " placeholder="0" id="FC" name="FC" oninput="validateInput3(this);calcularS1();concatenarValores()"> </td>
                                                <td style="width:5%; text-align:center"> = </td>
                                                <td style="text-align:justify;font-size: 1em; border-bottom: 0; width:30%"> <strong>Q<sub>m</sub> = Índice de calidad del mes actual</strong><br> <br><input type="text" style="width: 80%; font-size:1em; text-align: right " placeholder="Solo Lectura " id="Q" name="Q" oninput="calcularS1();concatenarValores()" readonly> </td>

                                            </tr>

                                            <tr>

                                            </tr>

                                        </tbody>
                                    </table>



                                </div>

                                <script>
                                    function concatenarValores() {
                                        // Obtener los valores de los campos de entrada
                                        var valorF = document.getElementById("F").value;
                                        var valorFC = document.getElementById("FC").value;
                                        var valorQ = document.getElementById("Q").value;

                                        // Concatenar los valores
                                        var resultado = "Fcm = " + valorF + " / " + " FCcmo =" + valorFC + "==>";

                                        // Asignar el resultado al campo de entrada "operaciones"
                                        document.getElementById("operaciones").value = resultado;
                                    }

                                    function concatenarValoresB() {
                                        // Obtener los valores de los campos de entrada
                                        var valorTdi = document.getElementById("Tdi").value;
                                        var valorIi = document.getElementById("Ii").value;
                                        var valorLi = document.getElementById("Li").value;
                                        var valor4Tci = document.getElementById("4T").value;
                                        var valorIi2 = document.getElementById("Ii2").value;
                                        var valorLi2 = document.getElementById("Li2").value;
                                        var valorIi3 = document.getElementById("Li3").value;
                                        var valoroper1 = document.getElementById("oper1").value;
                                        var valoroper2 = document.getElementById("oper2").value;
                                        var valoroper3 = document.getElementById("oper3").value;
                                        var valorS1B = document.getElementById("S1B").value;


                                        // Concatenar los valores
                                        var resultado = "Tdi = " + valorTdi + " * " + "Ii =" + valorIi + " * " + "Li =" + valorLi + " + " + "4Tci =" + valor4Tci + " * " + "Ii =" + valorIi2 + " * " + "Li =" + valorLi2 + " / " + "Ii =" + valorIi3 + " * " + "Li =" + valorIi3 + " = " ;

                                        // Asignar el resultado al campo de entrada "operaciones"
                                        document.getElementById("operaciones").value = resultado;
                                    }
                                </script>


                                <!-- TABLA REFERENCIA FORMULACION B -->
                                <div>
                                    <table class="" border="1" width="95%" style="margin: auto; padding:3% 3% 3% 3%; display:none" id="claseB-table" >
                                        <tbody>
                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif
                                            <tr>
                                                <td style="text-align:justify;font-size: 1em; border-bottom: 0; width:30%"> <strong> T<sub>di</sub> Tiempo Denso (del recorrido i) </strong> <br><input type="text" style="width: 80%; font-size:1em; text-align: right " placeholder="0 " id="Tdi" name="Tdi" oninput="validateInput3(this); concatenarValoresB() "> </td>
                                                <td style="width:5%; text-align:center"> * </td>
                                                <td style="text-align:justify;font-size: 1em; border-bottom: 0; width:30%"> <strong> I<sub>i</sub> Intensidad media del recorrido </strong> <br><input type="text" style="width: 80%; font-size:1em; text-align: right " placeholder="0" id="Ii" name="Ii" oninput="validateInput3(this); concatenarValoresB() "> </td>
                                                <td style="width:5%; text-align:center"> * </td>
                                                <td style="text-align:justify;font-size: 1em; border-bottom: 0; width:30%"> <strong> L<sub>i</sub> Longitud del recorrido i en metros </strong> <br><input type="text" style="width: 80%; font-size:1em; text-align: right " placeholder="0" id="Li" name="Li" oninput="validateInput3(this); concatenarValoresB()"> </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:justify;font-size: 1em; border-bottom: 0; width:30%"> <strong>4T<sub>ci</sub> Longitud del recorrido (metros)</strong> <br><input type="text" style="width: 80%; font-size:1em; text-align: right " placeholder="0" id="4T" name="4T" oninput="validateInput3(this); concatenarValoresB()"> </td>
                                                <td style="width:5%; text-align:center"> * </td>
                                                <td style="text-align:justify;font-size: 1em; border-bottom: 0; width:30%"> <strong> I<sub>i</sub> Intensidad media del recorrido </strong> <br><input type="text" style="width: 80%; font-size:1em; text-align: right " placeholder="0" id="Ii2" name="Ii2" oninput="validateInput3(this); concatenarValoresB()"> </td>
                                                <td style="width:5%; text-align:center"> * </td>
                                                <td style="text-align:justify;font-size: 1em; border-bottom: 0; width:30%"> <strong> L<sub>i</sub> Longitud del recorrido i en metros </strong> <br><input type="text" style="width: 80%; font-size:1em; text-align: right " placeholder="0" id="Li2" name="Li2" oninput="validateInput3(this); concatenarValoresB()"> </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:justify;font-size: 1em; border-bottom: 0; width:30%"> <strong> I<sub>i</sub> Intensidad media del recorrido </strong> <br><input type="text" style="width: 80%; font-size:1em; text-align: right " placeholder="0" id="Ii3" name="Ii3" oninput="validateInput3(this); concatenarValoresB()"> </td>
                                                <td style="width:5%; text-align:center"> * </td>
                                                <td style="text-align:justify;font-size: 1em; border-bottom: 0; width:30%"> <strong> L<sub>i</sub> Longitud del recorrido i en metros </strong> <br><input type="text" style="width: 80%; font-size:1em; text-align: right " placeholder="0" id="Li3" name="Li3" oninput="validateInput3(this); concatenarValoresB()"> </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:justify;font-size: 1em; border-bottom: 0; width:30%"><strong> T<sub>di</sub> * I<sub>i</sub> * L<sub>i</sub> </strong> <br><input type="text" style="width: 80%; font-size:1em; text-align: right " placeholder="Solo Lectura" id="oper1" name="oper1" oninput="validateInput3(this);S1B(); concatenarValoresB()" readonly></td>
                                                <td style="width:5%; text-align:center"> + </td>
                                                <td style="text-align:justify;font-size: 1em; border-bottom: 0; width:30%"><strong>4T<sub>ci</sub> * I<sub>i</sub> * L<sub>i</sub> </strong> <br><input type="text" style="width: 80%; font-size:1em; text-align: right " placeholder="Solo Lectura" id="oper2" name="oper2" oninput="validateInput3(this);S1B(); concatenarValoresB()" readonly></td>
                                                <td style="width:5%; text-align:center"> / </td>
                                                <td style="text-align:justify;font-size: 1em; border-bottom: 0; width:30%"><strong>&#8721;<sup>n</sup> <sub>i=1</sub>   I<sub>i</sub> * L<sub>i</sub> </strong> <br><input type="text" style="width: 80%; font-size:1em; text-align: right " placeholder="Solo Lectura" id="oper3" name="oper3" oninput="validateInput3(this);S1B(); concatenarValoresB()" readonly></td>
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
                                function validateInput7(input) {
                                // Obtener el valor actual del campo de entrada
                                let value = input.value.trim();

                                // Eliminar cualquier caracter que no sea un número entero
                                value = value.replace(/[^\d]/g, '');

                                // Si el valor resultante es una cadena vacía o es '0', establecer el valor del campo como una cadena vacía
                                if (value === '' || value === '0') {
                                    input.value = '';
                                    return;
                                }

                                // Establecer el valor del campo como el valor procesado
                                input.value = value;
                            }


                                    function mostrarTablaSeleccionada() {
                                        var claseASelected = document.getElementById('claseA').checked;
                                        var claseBSelected = document.getElementById('claseB').checked;

                                        if (claseASelected) {
                                            document.getElementById('claseA-table').style.display = 'block';
                                            document.getElementById('claseB-table').style.display = 'none';
                                            document.getElementById('resultadosA').style.display = 'block';
                                            document.getElementById('resultadosB').style.display = 'none';
                                        } else if (claseBSelected) {
                                            document.getElementById('claseA-table').style.display = 'none';
                                            document.getElementById('claseB-table').style.display = 'block';
                                            document.getElementById('resultadosA').style.display = 'none';
                                            document.getElementById('resultadosB').style.display = 'block';
                                        }
                                    }

                                    document.getElementById('claseA').addEventListener('change', mostrarTablaSeleccionada);
                                    document.getElementById('claseB').addEventListener('change', mostrarTablaSeleccionada);

                                    document.addEventListener('DOMContentLoaded', function() {
                                        mostrarTablaSeleccionada(); // Llamar a la función al cargar la página para mostrar la tabla inicial
                                    });


                                    //<!-- SCRIPT REFERENCIA FORMULACION A -->

                                    // Función para calcular S13
                                    function calcularS1() {
                                        // Obtener los valores de los campos primeraOp y referencia
                                        var FValue = parseFloat(document.getElementById('F').value);
                                        var FCValue = parseFloat(document.getElementById('FC').value);

                                        // Mostrar los valores obtenidos para depuración
                                        console.log('FValue:', FValue);
                                        console.log('FCValue:', FCValue);

                                        // Verificar si ambos valores son números válidos
                                        if (!isNaN(FValue) && !isNaN(FCValue)) {
                                            // Realizar la multiplicación
                                            var S1A = FValue / FCValue;

                                            // Mostrar el resultado en el input "S13"
                                            console.log('S1A:', S1A);
                                            document.getElementById('S1A').value = S1A.toFixed(2).replace('.', ','); // Redondear a 2 decimales y agregar el símbolo de euro

                                            // Duplicar el resultado y colocarlo en el campo Q
                                            document.getElementById('Q').value = S1A.toFixed(2).replace('.', ',');
                                        }
                                    }

                                    // Llamar a la función calcularS13 cuando se cargue la página para calcular el valor inicial
                                    window.addEventListener('load', calcularS1);

                                    // Llamar a la función calcularS13 cuando se modifique el valor de los campos primeraOp y referencia
                                    document.getElementById('F').addEventListener('input', calcularS1);
                                    document.getElementById('FC').addEventListener('input', calcularS1);

                                    //<!-- SCRIPT REFERENCIA FORMULACION B -->

                                    // Función para calcular oper1
                                    function oper1() {
                                        // Obtener los valores de los campos primeraOp y referencia
                                        var TdiValue = parseFloat(document.getElementById('Tdi').value);
                                        var IiValue = parseFloat(document.getElementById('Ii').value);
                                        var LiValue = parseFloat(document.getElementById('Li').value);

                                        // Mostrar los valores obtenidos para depuración
                                        console.log('TdiValue:', TdiValue);
                                        console.log('IiValue:', IiValue);
                                        console.log('LiValue:', LiValue);

                                        // Verificar si ambos valores son números válidos
                                        if (!isNaN(TdiValue) && !isNaN(IiValue) && !isNaN(LiValue)) {
                                            // Realizar la multiplicación
                                            var oper1 = TdiValue * IiValue * LiValue;

                                            // Mostrar el resultado en el input "oper1"
                                            console.log('oper1:', oper1);
                                            document.getElementById('oper1').value = oper1.toFixed(2).replace('.', ','); // Redondear a 2 decimales y agregar el símbolo de euro

                                            // Llamar a la función para sumar las operaciones
                                            sumarOperaciones();
                                        }
                                    }

                                    // Función para calcular oper2
                                    function oper2() {
                                        // Obtener los valores de los campos primeraOp y referencia
                                        var TTValue = parseFloat(document.getElementById('4T').value);
                                        var Ii2Value = parseFloat(document.getElementById('Ii2').value);
                                        var Li2Value = parseFloat(document.getElementById('Li2').value);

                                        // Mostrar los valores obtenidos para depuración
                                        console.log('TTValue:', TTValue);
                                        console.log('Ii2Value:', Ii2Value);
                                        console.log('Li2Value:', Li2Value);

                                        // Verificar si ambos valores son números válidos
                                        if (!isNaN(TTValue) && !isNaN(Ii2Value) && !isNaN(Li2Value)) {
                                            // Realizar la multiplicación
                                            var oper2 = TTValue * Ii2Value * Li2Value;

                                            // Mostrar el resultado en el input "oper2"
                                            console.log('oper2:', oper2);
                                            document.getElementById('oper2').value = oper2.toFixed(2).replace('.', ','); // Redondear a 2 decimales y agregar el símbolo de euro

                                            // Llamar a la función para sumar las operaciones
                                            sumarOperaciones();
                                        }
                                    }

                                    // Función para calcular oper3
                                    function oper3() {
                                        // Obtener los valores de los campos primeraOp y referencia
                                        var Ii3Value = parseFloat(document.getElementById('Ii3').value);
                                        var Li3Value = parseFloat(document.getElementById('Li3').value);

                                        // Mostrar los valores obtenidos para depuración
                                        console.log('Ii3Value:', Ii3Value);
                                        console.log('Li3Value:', Li3Value);

                                        // Verificar si ambos valores son números válidos
                                        if (!isNaN(Ii3Value) && !isNaN(Li3Value)) {
                                            // Realizar la multiplicación
                                            var oper3 = Ii3Value * Li3Value;

                                            // Mostrar el resultado en el input "oper3"
                                            console.log('oper3:', oper3);
                                            document.getElementById('oper3').value = oper3.toFixed(2).replace('.', ','); // Redondear a 2 decimales y agregar el símbolo de euro

                                            // Llamar a la función para sumar las operaciones
                                            sumarOperaciones();
                                        }
                                    }

                                    // Función para sumar las operaciones y mostrar el resultado en S1B
                                    function sumarOperaciones() {
                                        // Obtener los valores de los campos oper1, oper2 y oper3
                                        var oper1Value = parseFloat(document.getElementById('oper1').value) || 0;
                                        var oper2Value = parseFloat(document.getElementById('oper2').value) || 0;
                                        var oper3Value = parseFloat(document.getElementById('oper3').value) || 0;

                                        // Calcular la suma
                                        var suma = (oper1Value + oper2Value) / oper3Value;

                                        // Mostrar el resultado en el input "S1B"
                                        document.getElementById('S1B').value = suma.toFixed(2).replace('.', ',') + '€';
                                    }

                                    // Llamar a las funciones oper1, oper2 y oper3 cuando se modifiquen los valores de los campos correspondientes
                                    document.getElementById('Tdi').addEventListener('input', oper1);
                                    document.getElementById('Ii').addEventListener('input', oper1);
                                    document.getElementById('Li').addEventListener('input', oper1);

                                    document.getElementById('4T').addEventListener('input', oper2);
                                    document.getElementById('Ii2').addEventListener('input', oper2);
                                    document.getElementById('Li2').addEventListener('input', oper2);

                                    document.getElementById('Ii3').addEventListener('input', oper3);
                                    document.getElementById('Li3').addEventListener('input', oper3);

                                    // Llamar a la función para sumar las operaciones cuando se cargue la página inicialmente
                                    window.addEventListener('load', sumarOperaciones);

                                    // Llamar a la función para sumar las operaciones cuando se modifiquen los valores de oper1, oper2 o oper3
                                    document.getElementById('oper1').addEventListener('input', sumarOperaciones);
                                    document.getElementById('oper2').addEventListener('input', sumarOperaciones);
                                    document.getElementById('oper3').addEventListener('input', sumarOperaciones);


                                    function concatenarValores() {
                                        // Obtener los valores de los campos de entrada
                                        var valorF = document.getElementById("F").value;
                                        var valorFC = document.getElementById("FC").value;
                                        var valorQ = document.getElementById("Q").value;

                                        // Concatenar los valores
                                        var resultado = "Fcm = " + valorF + " / " + " FCcmo =" + valorFC + "==>";

                                        // Asignar el resultado al campo de entrada "operaciones"
                                        document.getElementById("operaciones").value = resultado;
                                    }

                                    function concatenarValoresB() {
                                        // Obtener los valores de los campos de entrada
                                        var valorTdi = document.getElementById("Tdi").value;
                                        var valorIi = document.getElementById("Ii").value;
                                        var valorLi = document.getElementById("Li").value;
                                        var valor4Tci = document.getElementById("4T").value;
                                        var valorIi2 = document.getElementById("Ii2").value;
                                        var valorLi2 = document.getElementById("Li2").value;
                                        var valorIi3 = document.getElementById("Li3").value;
                                        var valoroper1 = document.getElementById("oper1").value;
                                        var valoroper2 = document.getElementById("oper2").value;
                                        var valoroper3 = document.getElementById("oper3").value;
                                        var valorS1B = document.getElementById("S1B").value;


                                        // Concatenar los valores
                                        var resultado = "Tdi = " + valorTdi + " * " + "Ii =" + valorIi + " * " + "Li =" + valorLi + " + " + "4Tci =" + valor4Tci + " * " + "Ii =" + valorIi2 + " * " + "Li =" + valorLi2 + " / " + "Ii =" + valorIi3 + " * " + "Li =" + valorIi3 + " = " ;

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
                            <input type="text" style="width: 40%; font-size:1em; text-align:center" placeholder="" id="tipoPenalidad" name="tipoPenalidad" value="1" oninput="validateInput3(this)" required>
                        </div>
                    </div>
                </div>

            <div class="form-group">
                {{ Form::label('observaciones') }}
                {!! $errors->first('obscreadorpenalidad', '<div class="invalid-feedback">:message</div>') !!}
                <textarea class="form-control" name="obsCreacion" style="white-space: pre-line;"></textarea>
            </div>

            <table width="100%" style="margin: auto; padding: 3% 3% 3% 3% ;display:none" id="resultadosA">
                <tr>
                    <th  style="text-align:justify;font-size: 1em; width:100%" id="filaA"> <strong> Q<sub>m</sub> = (Índice de calidad del mes actual) : </strong> <input type="text" style="width: 25%; font-size:1em; text-align: right " placeholder="0 €" id="S1A" name="S1A" oninput="validateInput3(this);sumarYMostrar()" readonly> &nbsp &nbsp <strong> Q <sub>m</sub> = F<sub>cmo</sub> / F<sub>cm</sub> </strong></th>

                </tr>
            </table>
            <table width="100%" style="margin: auto; padding: 3% 3% 3% 3% ;display:none" id="resultadosB">
                <tr>
                    <th  style="text-align:justify;font-size: 1em; width:100%;" id="filaB"> <strong> F<sub>C</sub> = Factor de calidad (calculado sólo para los días laborables): </strong> <input type="text" style="width: 23%; font-size:1em; text-align: right " placeholder="0 €" id="S1B" name="S1B" oninput="validateInput3(this); concatenarValoresB()" readonly> &nbsp &nbsp <strong>&#8721;<sup>n</sup> <sub>i=1</sub>  <sup> T<sub>di</sub> * I<sub>i</sub> * L<sub>i</sub> + 4T<sub>ci</sub> * I<sub>i</sub> * L<sub>i</sub></sup> / <sub>&#8721;<sup>n</sup> <sub>i=1</sub>I<sub>i</sub> * L<sub>i</sub></sub></strong></th>
                </tr>
            </table>

            <table style="margin: auto; padding: 3% 3% 3% 3% ;display:none;width:95%" id="operAritmeticaMaster" border="1">
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
        <br><br>

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
