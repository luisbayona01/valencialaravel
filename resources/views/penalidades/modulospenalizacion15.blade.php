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
                            <span class="card-title" style="color: black; text-align:justify">{{ __('') }} U.15.- PENALIDAD POR INCUMPLIMIENTOS DE LAS EXIGENCIAS EN MATERIA DE TRATAMIENTO DE DATOS DE CARÁCTER PERSONAL </span>
                        </div><!-- IMAGEN ENCABEZADO DE LA HOJA DE CALCULO PENALIZACION -->

                        <script>
                            // Función para validar los campos antes de enviar el formulario
                            function validarCampos() {
                                // Obtener los valores de los campos
                                var PValue = document.getElementById('P').value;
                                var S15Value = document.getElementById('S15').value;

                                // Verificar si algún campo está vacío
                                if (PValue.trim() === '' || S15Value.trim() === '') {
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
                            <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:25%"> <strong>F = 1000 €</strong> <br><input type="text" style="width: 100%; font-size:1em; text-align: right " value="1000" id="F" name="F" oninput="validateInput3(this)" readonly > </td>
                            <td style="width: 5%; text-align:center">+</td>
                            <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:25%"> <strong>P = No. de personas desinformadas</strong> <br><input type="text" style="width: 100%; font-size:1em; text-align: right " placeholder="0" id="P" name="P" oninput="validateInput7(this)" > </td>
                            <td style="width: 5%; text-align:center">*</td>
                            <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:25%"> <strong>T = 500 €</strong> <br><input type="text" style="width: 100%; font-size:1em; text-align: right " value="500" id="T" name="T" oninput="validateInput3(this)"readonly > </td>
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


                function actualizarS15() {
                var FValue = parseFloat(document.getElementById("F").value);
                var PValue = parseFloat(document.getElementById("P").value);
                var TValue = parseFloat(document.getElementById("T").value);

                if (!isNaN(FValue) && !isNaN(PValue)&& !isNaN(TValue)) {
                    var resultadoS15 = FValue + (PValue * TValue);
                    document.getElementById('S15').value = resultadoS15.toFixed(2).replace(".", ",") + ' €';
                }
            }

            // Llamar a la función cada vez que se cambie el valor de los inputs "D" o "N"
            document.getElementById('F').addEventListener('input', actualizarS15);
            document.getElementById('P').addEventListener('input', actualizarS15);
            document.getElementById('T').addEventListener('input', actualizarS15);

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
                            <input type="text" style="width: 40%; font-size:1em; text-align:center" placeholder="" id="tipoPenalidad" name="tipoPenalidad" value="15" oninput="validateInput3(this)" required>
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
                        <td  style="text-align:justify;font-size: 1em; width:50%"> <strong> S<sub>15</sub> (el importe de la penalidad en euros, en el mes i) : </strong> <input type="text" style="width: 26%; font-size:1em; text-align: right " placeholder="Solo Lectura (resultado €)" id="S15" name="S15" oninput="validateInput3(this)" readonly> &nbsp &nbsp <strong> S <sub>15</sub> = F + P * T </strong></td>
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
