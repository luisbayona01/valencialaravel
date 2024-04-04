<style>
    #elementos {
        border-collapse: collapse;
        width: 100%;
        text-align: left;
        border: 1px solid #ddd;
        /* Ajusta el grosor y color del borde según tus preferencias */
        padding: 15px 15px 15px 15px;
        /* Ajusta el espacio interno de las celdas según tus preferencias */
    }



    #elementos button {
        border: 1px solid #ddd;
        /* Ajusta el grosor y color del borde según tus preferencias */
        padding: 5px;
        /* Ajusta el espacio interno de las celdas según tus preferencias */
    }

    .card {
        box-shadow: 0 0 0.875rem 0 rgb(33 37 41 / 84%);
        margin-bottom: 24px;
    }


    .color-#00FF0050 {
        color: #00FF0005;
    }

    /* Estado 1 Activo */

    .color-#ff000020 {
        color: #ff000005;
    }

    /* Estado 2 Revisar */

    .color-#FFD70060 {
        color: #ffff0060;
    }

    /* Estado 3 Finalizado */

    .color-#ED912109 {
        color: #ED912109;
    }

    /* Estado 4 Comprobado */

    .color-#ED912109 {
        color: #ED912109;
    }

    /* Estado 5 Validado */

    .color-#00a2d310 {
        color: #00a2d310;
    }

    /* Estado 6 Certificado */

    .color-#ff000090 {
        color: #ff000050;
    }

    /* Estado 7 Rechazado */

    .color-#84857d10 {
        color: #84857d10;
    }

    /* Estado 8 Anulado */

    label {
        font-weight: bold;
        color: black;
    }

    .small-text {
        font-size: 12px;
        /* Puedes ajustar el tamaño según tus necesidades */
    }
</style>
<div class="box box-info padding-1"
    style="background-color:
    @php
    if ($parte->estadoparte_id == 1) {
                echo '#00FF0020'; // Set the background color to #00FF0020 for estado 1
            } elseif ($parte->estadoparte_id == 2) {
                echo '#ff000005'; // Set the background color to #ff000020 for estado 2
            } elseif ($parte->estadoparte_id == 3) {
                echo '#ffff0020'; // Set the background color to #FFD70060 for estado 3
            } elseif ($parte->estadoparte_id == 4) {
                echo '#ED912109'; // Set the background color to #ED912170 for estado 4
            } elseif ($parte->estadoparte_id == 5) {
                echo '#ED912109'; // Set the background color to #ED912109 for estado 5
            } elseif ($parte->estadoparte_id == 6) {
                echo '#00a2d310'; // Set the background color to #00a2d310 for estado 6
            } elseif ($parte->estadoparte_id == 7) {
                echo '#ff000050'; // Set the background color to #ff000090 for estado 7
            } elseif ($parte->estadoparte_id == 8) {
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



    <div class="box-body" style="padding: 5px 15px 5px 15px">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4" style="width: 100%">

            <div class="col-md-6">
                {{ Form::label('localización', 'Localización') }}
                {{ Form::select('id_localizacion', $localizaciones, $parte->id_localizacion, [
                    'class' => 'form-control' . ($errors->has('id_localizacion') ? ' is-invalid' : ''),
                    'placeholder' => 'Seleccione una ubicacion',
                    'required' => 'required',
                    (Auth::user()->idrol == 3 || Auth::user()->idrol == 1 || Auth::user()->idrol == 2) &&
                    ($parte->estadoparte_id == 1 || $parte->estadoparte_id == 2)
                        ? ''
                        : 'disabled',
                ]) }}
                <div class="invalid-feedback">
                    porfavor seleccione una ubicacion
                </div>
            </div>

            <div class="col" style="display: none">
                <div class="form-group" style="width: 100%">
                    {{ Form::label('Creado por') }}
                    <input type="hidden" name="creadopor"value={{ Auth::user()->id }}>

                    <p class="form-control">{{ Auth::user()->nombres }} {{ Auth::user()->apellidos }} </p>
                </div>
            </div>
            <div class="col" style="display: none">
                <div class="form-group" style="width: 100%">
                    {{ Form::label('Fecha de Creación') }}
                    {{ Form::datetime('fechacreacion', $parte->fechacreacion, [
                        'class' => 'form-control' . ($errors->has('fechacreacion') ? ' is-invalid' : ''),
                        'placeholder' => 'Fechacreacion',
                        'required' => 'required',
                        'readonly' => 'readonly',
                    ]) }}
                    {!! $errors->first('fechacreacion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group" style="text-align: center; ">
                    {{ Form::label('No') }}
                    <p class="form-control" id="idparte">{{ $no }} </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group" style="text-align: left; width: 100%">
                    {{ Form::label('Tipo de parte') }}
                    {{ Form::select('idtipoparte', $tipoparte, $parte->idtipoparte, [
                        'class' => 'form-control' . ($errors->has('idtipoparte') ? ' is-invalid' : ''),
                        'placeholder' => 'Seleccione el tipo de parte',
                        'required' => 'required',
                        (Auth::user()->idrol == 3 || Auth::user()->idrol == 1) &&
                        ($parte->estadoparte_id == 1 || $parte->estadoparte_id == 2)
                            ? ''
                            : 'disabled',
                    ]) }}
                    <div class="invalid-feedback">
                        porfavor seleccione el tipo de parte
                    </div>
                </div>
            </div>

        </div>

        <div class="row" bis_skin_checked="1">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Autorizado por') }}
                    {{ Form::select('autorizado_por', $autorizadopor, $parte->autorizado_por, ['class' => 'form-control' . ($errors->has('autorizadopor') ? ' is-invalid' : ''), 'placeholder' => 'selecione', 'required' => 'required', (Auth::user()->idrol == 3 || Auth::user()->idrol == 1|| Auth::user()->idrol==2) && ($parte->estadoparte_id == 1 || $parte->estadoparte_id == 2) ? '' : 'disabled']) }}
                    <div class="invalid-feedback">
                        porfavor seleccione una opcion
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Fecha de Autorización') }}
                    {{ Form::datetime('fechaautorizacion', $parte->fechaautorizacion, [
                        'class' => 'form-control' . ($errors->has('fechacreacion') ? ' is-invalid' : ''),
                        'id' => 'fechaautorizacion',
                        'placeholder' => 'fechaautorizacion',
                        'required' => 'required',
                        (Auth::user()->idrol == 3 || Auth::user()->idrol == 1 || Auth::user()->idrol == 2) &&
                        ($parte->estadoparte_id == 1 || $parte->estadoparte_id == 2)
                            ? ''
                            : 'readonly',
                    ]) }}
                    {!! $errors->first('fechacreacion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="row" bis_skin_checked="1">

            <div class="col-sm-6" bis_skin_checked="1">
                <div class="form-group">
                    {{ Form::label('Comunicado Por') }}
                    {{ Form::select('reportadopor', $reportadopor, $parte->reportadopor, ['class' => 'form-control' . ($errors->has('reportadoPor') ? ' is-invalid' : ''), 'placeholder' => 'selecione', 'required' => 'required', $errors->has('idtipoparte') ? ' is-invalid' : '', 'placeholder' => 'Seleccione el tipo de parte', 'required' => 'required', (Auth::user()->idrol == 3 || Auth::user()->idrol == 1 || Auth::user()->idrol == 2) && ($parte->estadoparte_id == 1 || $parte->estadoparte_id == 2) ? '' : 'disabled']) }}
                    <div class="invalid-feedback">
                        porfavor seleccione una opcion
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('Fecha de Comunicación') }}
                    <div class="input-group date">

                        {{ Form::text('fechareporte', $parte->fechareporte, ['class' => 'form-control', 'placeholder' => 'Fechareporte', 'id' => 'Fechareporte', 'required' => 'required', $errors->has('Fechareporte') ? ' is-invalid' : '', 'placeholder' => 'Seleccione el tipo de parte', 'required' => 'required', (Auth::user()->idrol == 3 || Auth::user()->idrol == 1) && ($parte->estadoparte_id == 1 || $parte->estadoparte_id == 2) ? '' : 'disabled']) }}
                        <div class="input-group-addon input-group-append" bis_skin_checked="1">
                            <div class="input-group-text" bis_skin_checked="1">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>


        <div class="row" bis_skin_checked="1">
            <div class="col-sm-6" bis_skin_checked="1">
                <div class="form-group">
                    {{ Form::label('Reparado por') }}
                    {{ Form::select('asignadoa', $asignadoa, $parte->asignadoa, ['class' => 'form-control' . ($errors->has('asignadoa') ? ' is-invalid' : ''), 'placeholder' => 'seleccione', 'required' => 'required', $errors->has('idtipoparte') ? ' is-invalid' : '', 'placeholder' => 'Seleccione el tipo de parte', 'required' => 'required', (Auth::user()->idrol == 3 || Auth::user()->idrol == 1 || Auth::user()->idrol == 2) && ($parte->estadoparte_id == 1 || $parte->estadoparte_id == 2) ? '' : 'disabled']) }}
                    <div class="invalid-feedback">
                        porfavor asigne un usuario
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('fecha de Reparación') }}
                    <div class="input-group date">

                        {{ Form::text('fechaAsignacion', $parte->fechaAsignacion, ['class' => 'form-control', 'placeholder' => 'fechaAsignacion', 'id' => 'fechaAsignacion', 'required' => 'required', $errors->has('idtipoparte') ? ' is-invalid' : '', 'placeholder' => 'Seleccione el tipo de parte', 'required' => 'required', (Auth::user()->idrol == 3 || Auth::user()->idrol == 1) && ($parte->estadoparte_id == 1 || $parte->estadoparte_id == 2) ? '' : 'disabled']) }}
                        <div class="input-group-addon input-group-append" bis_skin_checked="1">
                            <div class="input-group-text" bis_skin_checked="1">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-lg-10">
                <div class="form-group">
                    {{ Form::label('observaciones Iniciales') }}
                    {{ Form::textarea('obscreadorparte', $parte->obscreadorparte, [
                        'class' => 'form-control' . ($errors->has('obscreadorparte') ? ' is-invalid' : ''),
                        'placeholder' => 'Ingrese los detalles del parte',
                        'rows' => 5,
                        $errors->has('idtipoparte') ? ' is-invalid' : '',
                        'placeholder' => 'Seleccione el tipo de parte',
                        'required' => 'required',
                        (Auth::user()->idrol == 4 || Auth::user()->idrol == 1||Auth::user()->idrol == 2) &&
                        ($parte->estadoparte_id == 1 || $parte->estadoparte_id == 2)
                            ? ''
                            : 'disabled', // Número de filas del textarea, ajusta según tus necesidades
                    ]) }}
                    {!! $errors->first('obscreadorparte', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

        </div>
        <hr style="border-width: 2px;">

        <div>
            <h4 style="text-align: left;">Acciones Realizadas: </h4>
        </div><br>
        <div class="container" id="elementos" style="display: block; width: 100%;">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
                    <label style="width: 80%; text-align: left;" for="codigo">Código</label>
                    <input style="width: 80%; text-align: center;" type="text" class="form-control" id="codigo"
                        readonly>
                </div> <br>

                <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
                    <label style="text-align: left;" for="descripcionelementos">Descripción</label>


                    {{ Form::select('descripcionelementos', $Descripcionelementos, 'descripcionelementos', [
                        'class' => 'form-control',
                        'placeholder' => 'seleccione',
                        'id' => 'descripcionelementos',
                        'data-live-search' => 'true',
                        'onchange' => 'descEl(this)',
                    ]) }}
                </div>

                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
                    <label style="text-align: left; width: 100%" for="precio">Precio</label>
                    <input style="text-align: right; width: 100%" type="text" class="form-control" id="precio"
                        readonly>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
                    <label style="text-align: left; width: 100%" for="cantidad">Cantidad</label>
                    <input style="text-align: center; width: 100%;" type="number" class="form-control" id="cantidad">
                </div>

                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-3" style="text-align: center;">
                    <label style="text-align: center; color: transparent;" for="Select">Acción</label>

                    <div class="form-group">
                        <a style="text-align: center; " type="button" class="b" id="selecione"><i
                                class="fa fa-plus fa-2x" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

            <div class="contenido d-none" id="tabla-recibe">
                <table class="table table-bordered" style="width: 95%;" id="tabla-recibe2">
                    <thead>
                        <tr style="text-align: center; font-weight: bold; color: black;">
                            <!-- <th style="width: 10%">id</th> -->
                            <th style="width: 10%">Código</th>
                            <th style="width: 40%">Descripcion</th>
                            <th style="width: 10%">Precio</th>
                            <th style="width: 10%">Cantidad</th>
                            <th style="width: 10%">Total</th>
                            <th style="width: 10%">Acción</th>
                        </tr>
                    </thead>
                    <tbody class="contenidoElements">

                    </tbody>
                </table>

                <table class="" style="width: 95%;  ">
                    <tr>
                        <td colspan="2" style="visibility: hidden; width: 60%"></td>
                        <td colspan="1" class="table-bordered" style="text-align:center; width: 15%">
                            <strong>Total</strong>
                        </td>
                        <td colspan="2" class="table-bordered" style="width:15%; text-align:right">
                            <label id="totalImportes"> </label>
                        </td>
                        <td colspan="1" style="visibility: hidden; width: 10%"></td>
                    </tr>
                </table>

            </div>

            <script>
                // Espera a que el DOM esté completamente cargado
                /*document.addEventListener("DOMContentLoaded", function() {
                    // Obtiene la tabla
                    var tablaRecibe2 = document.getElementById("tabla-recibe2");

                    // Obtiene todas las filas de la tabla, excluyendo la primera (encabezados)
                    var filas = tablaRecibe2.getElementsByTagName("tbody")[0].getElementsByTagName("tr");

                    // Inicializa la variable para la suma total
                    var total = 0;

                    // Recorre todas las filas y suma los valores de la columna "Total"
                    for (var i = 0; i < filas.length; i++) {
                        var celdaTotal = filas[i].getElementsByTagName("td")[4]; // La columna "Total" es la quinta (índice 4)
                        var valorTotal = parseFloat(celdaTotal.textContent || celdaTotal.innerText);

                        // Asegúrate de que el valor sea un número válido antes de sumarlo
                        if (!isNaN(valorTotal)) {
                            total += valorTotal;
                        }
                    }

                    let total = total.toFixed(2)
               let   totalstring= total.replace(".", ",");
                    // Actualiza el contenido del label "totalImportes" con la suma total
                    document.getElementById("totalImportes").textContent =totalstring + " €1"; // Puedes ajustar el número de decimales según tus necesidades
                });*/
            </script>




            <br>
            {{ Form::open(['url' => 'your-route', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
            <div class="form-group">
                {{ Form::label('Observaciones Generales') }}
                {{ Form::textarea('obsOperador', $parte->obsOperador, [
                    'class' => 'form-control' . ($errors->has('obsOperador') ? ' is-invalid' : ''),
                    'placeholder' => 'Ingrese las novedades Halladas',
                    'rows' => 5,
                ]) }}
                {!! $errors->first('obsOperador', '<div class="invalid-feedback">:message</div>') !!}
            </div>


            <!-- DIVISION PARA EL FRONT DE ADD IMAGENES -->

            <div class="mb-3">
                <label for="formFileSm" class="form-label">
                    <h5 style="font-weight: bold; color: black;">Adjunte evidencias fotograficas</h5>
                </label>
                <input class="form-control form-control-sm multiple" id="formFileSm" type="file" multiple
                    accept=".jpg, .jpeg, .png" style="background-color: #e6e6e6; color: #706c6c;"
                    onchange="handleFileSelect(this)">

            </div>
            <br><label for="formFileSm" class="form-label">
                <h5 style="bold; color: black;">Vista previa</h5>
            </label>

            <div id="imageListContainer" style="max-height: 300px; overflow-y: auto;">
                <div id="imageList" style="display: flex; flex-wrap: wrap;"></div>
            </div>

            <!-- SCRIPT PARA EL CARGE DE LAS IMAGENES -->
            <script>
                function handleFileSelect(input) {
                    var fileList = input.files;
                    var imageListContainer = document.getElementById("imageList");

                    for (var i = 0; i < fileList.length; i++) {
                        var file = fileList[i];
                        var imageURL = URL.createObjectURL(file);

                        // Crear miniatura de la imagen
                        var thumbnail = document.createElement("div");
                        thumbnail.style.width = "100px"; // Ancho de la miniatura
                        thumbnail.style.height = "100px"; // Altura de la miniatura
                        thumbnail.style.backgroundImage = "url('" + imageURL + "')";
                        thumbnail.style.backgroundSize = "cover";
                        thumbnail.style.margin = "5px"; // Espaciado entre miniaturas
                        thumbnail.style.cursor = "pointer";
                        thumbnail.onclick = function() {
                            // Mostrar la imagen grande al hacer clic en la miniatura
                            window.open(imageURL, "_blank");
                        };

                        // Agregar la miniatura a la lista de imágenes
                        imageListContainer.appendChild(thumbnail);
                    }
                }
            </script>

            <br><br>


            <div class="form-group"style="display:none">
                {{ Form::label('validado_por') }}
                {{ Form::text('validado_por', $parte->validado_por, ['class' => 'form-control' . ($errors->has('validado_por') ? ' is-invalid' : ''), 'placeholder' => 'Validado Por']) }}
                {!! $errors->first('validado_por', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group"style="display:none">
                {{ Form::label('fecha_validacion') }}
                {{ Form::text('fecha_validacion', $parte->fecha_validacion, ['class' => 'form-control' . ($errors->has('fecha_validacion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Validacion']) }}
                {!! $errors->first('fecha_validacion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group"style="display:none">
                {{ Form::label('obscliente') }}
                {{ Form::text('obscliente', $parte->obscliente, ['class' => 'form-control' . ($errors->has('obscliente') ? ' is-invalid' : ''), 'placeholder' => 'Obscliente']) }}
                {!! $errors->first('obscliente', '<div class="invalid-feedback">:message</div>') !!}
            </div>




            <div>
                <td>
                    {!! Form::label('estadoparte_id', 'Estado actual del parte es: ', ['style' => 'font-weight: normal;']) !!}
                    @if ($parte->estadoparte_id == 1)
                        <strong>Activo</strong>
                    @elseif($parte->estadoparte_id == 2)
                        <strong>Revisar</strong>
                    @elseif($parte->estadoparte_id == 3)
                        <strong>Finalizado</strong>
                    @elseif($parte->estadoparte_id == 4)
                        <strong>Comprobado</strong>
                    @elseif($parte->estadoparte_id == 5)
                        <strong>Validado</strong>
                    @elseif($parte->estadoparte_id == 6)
                        <strong>Certificado</strong>
                    @elseif($parte->estadoparte_id == 7)
                        <strong>Rechazado</strong>
                    @elseif($parte->estadoparte_id == 8)
                        <strong>Anulado</strong>
                    @else
                        <strong>{{ $parte->estadoparte_id }}</strong>
                    @endif
                </td>

                <td hidden>
                    {{ Form::text('estadoparte_id', $parte->estadoparte_id, [
                        'class' => 'form-control' . ($errors->has('estadoparte_id') ? ' is-invalid' : ''),
                        'placeholder' => 'Estadoparte Id',
                        'readonly' => 'readonly',
                        'id' => 'estadoparte_id',
                        'style' => 'display: none;', // Agregar esta línea para hacerlo invisible
                    ]) }}
                    {!! $errors->first('estadoparte_id', '<div class="invalid-feedback">:message</div>') !!}

                </td>

            </div>


            <!-- Seccion indicacion Estado Perfil y Select cambio estado -->

            <div class="form-group" id="seccion-estado-parte">
                @if (!in_array($parte->estadoparte_id, [5, 6, 8]))
                    <!-- Si el estado actual NO es "Validado" -->
                    <label for="formFileSm" class="form-label">
                        <h5 style="font-weight: normal; color: black;">
                            Seleccione el estado al que desea pasar el parte, para su proceso de verificación
                        </h5>
                    </label>
                    <td>
                        {{ Form::select(
                            'estadoparte_id',
                            // Condicionalmente selecciona los estados permitidos
                            $parte->estadoparte_id == 2
                                ? collect($estadopPartes)->only([1, 3, 7, 8]) // Si el estado actual es "Revisar"
                                : ($parte->estadoparte_id == 3
                                    ? collect($estadopPartes)->only([4, 7]) // Si el estado actual es "Finalizado"
                                    : ($parte->estadoparte_id == 4
                                        ? collect($estadopPartes)->only([5, 7]) // Si el estado actual es "Comprobado"
                                        : collect($estadopPartes)->only([2]))), // En otros casos
                            $parte->estadopPartes,
                            [
                                'class' => 'form-control' . ($errors->has('estadoparte_id') ? ' is-invalid' : ''),
                                'placeholder' => 'Despliege para indicar siguiente estado',
                                'required' => 'required',
                            ],
                        ) }}
                        <div class="invalid-feedback">
                            Por favor, seleccione un estado
                        </div>
                    </td>
                @else
                    <!-- Si el estado actual es "Validado", muestra un mensaje o realiza la acción que desees -->
                    <p>El parte está Validado. No se pueden realizar cambios.</p>
                @endif
            </div>



            <!-- Seccion indicacion Estado Perfil y Select cambio estado -->

            <!-- Sección de botones -->
            <div class="box-footer mt-20" style="margin-top: 10px; padding: 0px 15px 15px 15px">
                &nbsp;
                <button type="button" onclick="goBack()" class="btn btn-secondary"
                    style="text-align: right;">Volver</button>
                &nbsp;
                @if (in_array($parte->estadoparte_id, [5, 6, 8]) === false)
                    <!-- Si el estado actual NO es "Validado" -->
                    <button style="text-align: left;" type="submit"
                        class="btn btn-primary float-right">{{ __('Procesar') }}</button>
                @endif
            </div>



            {{ Form::close() }}

            <script>
                // JavaScript function to go back to the previous page
                function goBack() {
                    window.history.back();
                }
            </script>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    // Obtén el valor del estado actual del parte
                    var estadoParte = <?php echo $parte->estadoparte_id; ?>;

                    // Obtiene el campo de carga de imágenes y el botón de submit
                    var fileInput = document.getElementById("formFileSm");
                    var submitButton = document.querySelector("[type='submit']");

                    // Desactiva el campo de carga y el botón de submit si el estado es uno de los especificados
                    if (estadoParte === 3 || estadoParte === 4 || estadoParte === 5 || estadoParte === 6 || estadoParte ===
                        8) {
                        fileInput.disabled = true;
                        //submitButton.disabled = true;
                    }
                });

                document.addEventListener("DOMContentLoaded", function() {
                    // Obtén el valor del estado actual del parte
                    var estadoParte = <?php echo $parte->estadoparte_id; ?>;

                    // Obtiene la tabla y el botón de selección
                    var tablaRecibe = document.getElementById("tabla-recibe");
                    var selecioneButton = document.getElementById("selecione");

                    // Desactiva la edición de la tabla y oculta el botón de selección si el estado es uno de los especificados
                    if (estadoParte === 3 || estadoParte === 4 || estadoParte === 5 || estadoParte === 6 || estadoParte ===
                        8) {
                        tablaRecibe.classList.add("d-none"); // Agrega la clase d-none para ocultar la tabla
                        selecioneButton.style.display = "none"; // Oculta el botón de selección
                    }
                });

                document.addEventListener("DOMContentLoaded", function() {
                    // Obtén el valor del estado actual del parte
                    var estadoParte = <?php echo $parte->estadoparte_id; ?>;

                    // Obtiene el campo de observaciones generales
                    var obsGeneralesInput = document.getElementsByName("obsOperador")[0];

                    // Desactiva el campo de observaciones generales si el estado es uno de los especificados
                    if (estadoParte === 3 || estadoParte === 4 || estadoParte === 5 || estadoParte === 6 || estadoParte ===
                        8) {
                        obsGeneralesInput.disabled = true;
                    }
                });

                $(document).ready(function() {
                    // Manejar el cambio en el select
                    $('#estadoparte_id').change(function() {
                        var selectedValue = $(this).val();

                        // Si la opción seleccionada es "Rechazado" (asumiendo que el valor es 2)
                        if (selectedValue == 2) {
                            // Cambiar el valor del select al estado actual activo
                            $(this).val({{ $parte->estadoparte_id }});
                        }
                    });
                });
            </script>







        </div>

    </div>
