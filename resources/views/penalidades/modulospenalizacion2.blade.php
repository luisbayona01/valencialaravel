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
                                    </div><br>
                                    <span class="card-title">{{ __('Creacion') }} De Penalidades No. </span>
                                </div><!-- IMAGEN ENCABEZADO DE LA HOJA DE CALCULO PENALIZACION -->

                                <form action="{{url('/regpenalizacion4')}}" method="POST" role="form" >
                                    @csrf
                                <!-- Seccion del Encabezado del Formulario -->

                                <!-- Seccion Operativo del Formulario -->
                                <div>
                                    <table class="" border="1" width="95%" style="margin: auto; " >
                                        <tbody>
                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif

                                            <tr>
                                                <td  style="text-align:justify;font-size: 1em; border-bottom: 0; width:30%"> <strong>tiempo tardado en detección de la incidencia o avería : </strong> <br><input type="text" style="width: 40%; font-size:1em; text-align: right" placeholder="0 €" id="importeConservacionAnual4" name="importeConservacionAnual4" oninput="validateInput3(this)"> </td>
                                                <td style="width:5%"> / </td>
                                                <td style="text-align:left; font-size: 12px; border:none; "><strong>número de veces que se ha de realizar la
                                                    operación no efectuada : </strong><br><input type="text" style="text-align: right" placeholder="0 €" id="Repeticiones4" name="Repeticiones4" oninput="validateInput(this)">
                                            </tr>

                                            <tr>
                                                <td  style="text-align:justify;font-size: 1em; border:none; width:45%"> <strong>I (Importe correspondiente al plazo de conservación)</strong> <input type="text" style="width: 70%; font-size:1em; text-align: right " placeholder="0 €" id="S44" name="S44" oninput="validateInput3(this)" readonly></td>
                                                <td style="width:5%"> * </td>
                                                <td  style="text-align:justify;font-size: 1em; border:none;"> <strong>K : </strong> <input type="text" style="width: 40%; font-size:1em" placeholder="" id="K44" name="K44" value="1,5" oninput="validateInput3(this)"> </td>
                                            </tr>

                                            <tr>

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


                    function calcularDivision() {
                    // Obtener los valores de los campos
                    var importe = parseFloat(document.getElementById("importeConservacionAnual4").value.replace(',', '.'));
                    var repeticiones = parseFloat(document.getElementById("Repeticiones4").value.replace(',', '.'));

                    // Verificar si los valores son válidos
                    if (isNaN(importe) || isNaN(repeticiones) || repeticiones === 0) {
                        document.getElementById("S44").value = "0 €";
                        return;
                    }

                    // Calcular la división
                    var resultado = importe / repeticiones;

                    // Formatear el resultado
                    var resultadoFormateado = resultado.toLocaleString('es-ES', {
                        minimumFractionDigits: 0,
                        maximumFractionDigits: 2
                    });

                    // Actualizar el valor en el campo S44
                    document.getElementById("S44").value = resultadoFormateado.replace('.', ',') + " €"; // Ajusta el resultado y utiliza coma como separador decimal

                    // Multiplicar por K44 y actualizar S4
                    var k44 = parseFloat(document.getElementById("K44").value.replace(',', '.'));
                    var s4 = resultado * k44;

                    // Actualizar el valor en el campo S4
                    document.getElementById("S4").value = s4.toFixed(2).replace('.', ',') + " €"; // Ajusta el resultado a dos decimales y utiliza coma como separador decimal
                }

                // Llamar a la función al cargar la página y cada vez que haya un cambio en los campos relevantes
                window.onload = function() {
                    calcularDivision();
                    document.getElementById("importeConservacionAnual4").addEventListener("input", calcularDivision);
                    document.getElementById("Repeticiones4").addEventListener("input", calcularDivision);
                    document.getElementById("K44").addEventListener("input", calcularDivision);
                };
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
                        {{ Form::text('fechaCreacion', $fechaHoraActual, ['class' => 'form-control', 'id' => 'fechaCreacion', 'readonly' => 'true']) }}
                        {!! $errors->first('fechaCreacion', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>

                <div class="row" bis_skin_checked="1" style="display: none">
                    <div class="col-sm-2" bis_skin_checked="1" style="display: block">
                        <div class="form-group">
                            {{ Form::label('Tipo de Penalizacion') }}
                            <input type="hidden" name="tipoPenalidad" id="tipoPenalidad" value="">
                            <input type="text" style="width: 40%; font-size:1em; text-align:center" placeholder="" id="tipoPenalidad" name="tipoPenalidad" value="2" oninput="validateInput3(this)" readonly>
                        </div>
                    </div>



            </div>





            <div class="form-group">
                {{ Form::label('observaciones') }}
                {!! $errors->first('obscreadorpenalidad', '<div class="invalid-feedback">:message</div>') !!}
                <textarea class="form-control" name="obsCreacion" style="white-space: pre-line;"></textarea>
            </div>





                <table width="95%" style="margin: auto; padding: 3% 3% 3% 3% ">

                    <tr>
                        <td  style="text-align:justify;font-size: 1em; border:none;"> <strong>S₄ (Importe de la penalidad en euros) : </strong> <input type="text" style="width: 30%; font-size:1em; text-align: right " placeholder="0 €" id="S4" name="S4" oninput="validateInput3(this)" readonly></td>
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
