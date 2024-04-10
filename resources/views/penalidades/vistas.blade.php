<!-- FORM DEL FRONT VISTA DE PENALIDADES -->

@extends('layouts.plantilla')

@section('template_title')
    generarparte
@endsection

@section('content')
    <style>
        .Activo {
            background-color: #00FF00 !important;
            /* Estado 1 Activo */
        }

        .No_Comprobado {
            background-color: #FFDEAD !important;
            /* Estado 2 No_Comprobado */
        }

        .Aceptado {
            background-color: #FFD700 !important;
            /* Estado 3 Aceptado o Verificado */
        }

        .Certificado {
            background-color: #d7f1e7 !important;
        }

        .Rechazado {
            background-color: #FA8072 !important;
            /* Estado 3 Rechazado */
            color: #ffFF;
        }


        /* Estilo opcional para ocultar el input inicialmente */
        input[type="text"] {
            display: none;
        }

        input[type="text"],
        #penalidadEuro {
            display: none;
        }

        .main-div {
    border: 1px solid black; /* Ajusta el grosor y color del borde según tus necesidades */
    padding: 10px; /* Opcional: agrega relleno alrededor del contenido dentro del div */
    margin-bottom: 20px; /* Opcional: agrega espacio entre este div y otros elementos */
}

    </style>
<div class="box box-info padding-1"
style="background-color:
@php
if ($penalidades->estadopenalidad_Id == 1) {
        echo '#00FF0020'; // Set the background color to #00FF0020 for estado 1
    } elseif ($penalidades->estadopenalidad_Id == 2) {
        echo '#ff000005'; // Set the background color to #ff000020 for estado 2
    } elseif ($penalidades->estadopenalidad_Id == 3) {
        echo '#ffff0020'; // Set the background color to #FFD70060 for estado 3
    } elseif ($penalidades->estadopenalidad_Id == 4) {
        echo '#ED912109'; // Set the background color to #ED912170 for estado 4
    } elseif ($penalidades->estadopenalidad_Id == 5) {
        echo '#ED912109'; // Set the background color to #ED912109 for estado 5
    } elseif ($penalidades->estadopenalidad_Id == 6) {
        echo '#00a2d310'; // Set the background color to #00a2d310 for estado 6
    } elseif ($penalidades->estadopenalidad_Id == 7) {
        echo '#ff000050'; // Set the background color to #ff000090 for estado 7
    } elseif ($penalidades->estadopenalidad_Id == 8) {
        echo '#84857d10'; // Set the background color to #84857d for estado 8
    } else {
        echo 'initial'; // Set the default background color here
    } @endphp ">


@if (Auth::user()->idrol == 4)
    @php
        $dnone = 'd-none';
    @endphp
@else
    @php
        $dnone = '';
    @endphp
@endif

    <div class="container-fluid">



        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                        <div>
                            <img src="{{asset('img/icono_representativo_caratula.png')}}" class="card-img-top" style="width: 30rem;">
                        </div>


                        </div>
                    </div>

                    <div style="text-align: right; padding:0% 3% 0% 0%">
                        <h2><strong>Penalidad No. {{$penalidades->idpenalidad}}</strong></h2>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif



 {!! Form::open(['id' => 'formulario', 'method' => 'POST', 'url' => '/updatepestado']) !!} 
                    <div class="box-body" style="padding: 5px 15px 5px 15px; width:100%">
                        <!-- Primera Fila de Campos -->
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3" style="width: 100%; text-align:left">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <strong>{{ Form::label('tipo Penalidad') }}</strong>
                                    <div class="form-group" style="text-align: center">
                                        U- {{$penalidades->tipoPenalidad}}
                                      </div>
                                </div>
                            </div>
                        </div>

                        <!-- Segunda Fila de Campos -->
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3" style="width: 100%; text-align:left">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <strong>{{ Form::label('Creado Por') }}</strong>
                                    <div class="form-group" style="text-align: center">
                                        {{$penalidades->creadoPor}}
                                      </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group" style="width: 80%; margin: 0 auto; text-align: left;">
                                <strong >{{ Form::label('Fecha de Creación') }} <!-- Alineación a la Izquierda --></strong>
                                    {{ Form::datetime('fechaCreacion', $penalidades->fechaCreacion, [
                                        'class' => 'form-control' . ($errors->has('fechaCreacion') ? ' is-invalid' : ''),
                                        'placeholder' => 'fechaCreacion',
                                        'required' => 'required',
                                        'readonly' => 'readonly',
                                    ]) }}
                                    {!! $errors->first('fechaCreacion', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-2" style="width: 100%; text-align:left">
                            <div class="col-sm-8 ">
                                <div class="form-group">
                                    <strong>{{ Form::label('Valores de la Operacion') }}</strong>
                                    <div class="form-group" style="text-align: justify">
                                        {{$penalidades->operaciones}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <strong>{{ Form::label('Costo de la Penalidad') }}</strong>
                                    <div class="form-group" style="text-align: center">
                                        {{$penalidades->valorPenalidad4}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <!-- Tercera Fila de Campos < Campo de observaciones > -->
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-1" style="width: 100%; text-align:left">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    {{ Form::label('observaciones Iniciales') }} <!-- Alineación a la Izquierda -->
                                    {{ Form::textarea('obscreadorparte', $penalidades->obsCreacion, [
                                        'class' => 'form-control' . ($errors->has('obscreadorparte') ? ' is-invalid' : ''),
                                        'placeholder' => 'Ingrese los detalles del parte',
                                        'rows' => 5,
                                        $errors->has('idtipoparte') ? ' is-invalid' : '',
                                        'placeholder' => 'Seleccione el tipo de parte',
                                        'required' => 'required',
                                        (Auth::user()->idrol == 4 || Auth::user()->idrol == 1 || Auth::user()->idrol == 2) &&
                                        ($penalidades->estadoparte_id == 1 || $penalidades->estadoparte_id == 2)
                                            ? ''
                                            : 'disabled', // Número de filas del textarea, ajusta según tus necesidades
                                    ]) }}
                                    {!! $errors->first('obscreadorparte', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                        </div>


                        <br>
                        <!-- SECCION ACCION DE MODULACION DE LOS ESTADOS -->

                        <div>
                            <td>
                                {!! Form::label('estadoparte_id', 'Estado actual de la Penalidad es: ', ['style' => 'font-weight: normal;']) !!}
                                @if ($penalidades->estadopenalidad_Id  == 1)
                                    <strong>Activo</strong>
                                @elseif($penalidades->estadopenalidad_Id  == 2)
                                    <strong>Aceptado</strong>
                                @elseif($penalidades->estadopenalidad_Id  == 3)
                                    <strong>Rechazadp</strong>
                                @elseif($penalidades->estadopenalidad_Id  == 4)
                                    <strong>Anulado</strong>
                                @elseif($penalidades->estadopenalidad_Id  == 5)
                                    <strong>Cerrado</strong>
                                @else
                                    <strong>{{ $penalidades->estadopenalidad_Id  }}</strong>
                                @endif
                            </td>

                            <td hidden>
                                {{ Form::text('estadoparte_id', $penalidades->estadopenalidad_Id , [
                                    'class' => 'form-control' . ($errors->has('estadopenalidad_Id ') ? ' is-invalid' : ''),
                                    'placeholder' => 'estadopenalidad Id',
                                    'readonly' => 'readonly',
                                    'id' => 'estadoparte_id',
                                    'style' => 'display: none;', // Agregar esta línea para hacerlo invisible
                                ]) }}
                                {!! $errors->first('estadoparte_id', '<div class="invalid-feedback">:message</div>') !!}
                            </td>
                        </div>

                        <!-- SECCION ACCION DE MODULACION DE LOS ESTADOS -->
                        <div class="form-group" id="seccion-estado-parte">
                            @if ($penalidades->estadopenalidad_Id == 1)
                                <!-- Si el estado actual es 1 (Activo), mostrar el select -->
                                <label for="formFileSm" class="form-label">
                                    <h5 style="font-weight: normal; color: black;">
                                        Seleccione el estado al que desea pasar la Penalidad, para su proceso de verificación
                                    </h5>
                                </label>
                                <td>
                                    {{ Form::select(
                                        'estadopenalidad_id',
                                        // Condicionalmente selecciona los estados permitidos
                                        [
                                            // Opciones de estados permitidos
                                            2 => 'Aceptado',
                                            3 => 'Rechazado',
                                            4 => 'Anulado',
                                            5 => 'Cerrado',
                                        ],
                                        null, // Valor seleccionado, puede ser el valor actual de estadoparte_id
                                        [
                                            'class' => 'form-control' . ($errors->has('estadopenalidad_Id') ? ' is-invalid' : ''),
                                            'placeholder' => 'Despliege para indicar siguiente estado',
                                            'required' => 'required',
                                        ]
                                    ) }}
                                    <div class="invalid-feedback">
                                        Por favor, seleccione un estado
                                    </div>
                                </td>
                            @else
                                <!-- Si el estado actual no es 1 (Activo), muestra un mensaje o realiza la acción que desees -->
                                <p>La penalidad no está en un estado que permita cambios.</p>
                            @endif
                        </div>
                      
                       <input type="hidden" name ="idpenalidad" value="{{$penalidades->idpenalidad}}">
                        <!-- Sección de botones -->
                        <div class="box-footer mt-20" style="margin-top: 10px; padding: 0px 15px 15px 15px">
                            &nbsp;
                            <button type="button" onclick="goBack()" class="btn btn-secondary"
                                style="text-align: right;">Volver</button>
                            &nbsp;
                            @if (in_array($penalidades->estadopenalidad_Id, [2, 3, 4, 5]) === false)
                                <!-- Si el estado actual NO es "Validado" -->
                                <button style="text-align: left;" type="button" onclick="submitForm()"
                                    class="btn btn-primary float-right">{{ __('Procesar') }}</button>
                            @endif
                        </div>


                        {!! Form::close() !!}



                    </div> <!-- DIV DE CIERRE DE ESTRUCTURA -->


                        <!-- AREA GENERAL DE LA TABLA APLICABLE DE LAS PENALIZACIONES -->


                    </div>

                    <!-- AREA GENERAL DE LA TABLA APLICABLE DE LAS PENALIZACIONES -->

                    <br>
                    <script>
                        // JavaScript function to submit the form
                        function submitForm() {
                              //console.log(1);
                              //return false;
                            // Obtiene el valor seleccionado en el select
                            //var estadoSeleccionado = document.getElementById('estadoparte_id').value;

                            // Si el estado seleccionado es "Aceptado" (valor 2)
                            //if (estadoSeleccionado == 1) {
                                // Cambia el valor de estadopenalidad_Id a 2
                                //document.getElementById('estadopenalidad_Id').value = 2;
                            //}

                            // Envía el formulario
                            document.getElementById('formulario').submit();
                        }
                    </script>
                    <script>
                        // JavaScript function to go back to the previous page
                        function goBack() {
                            window.history.back();
                        }
                    </script>


                </div>

            </div>
        </div>
    </div>
@endsection
