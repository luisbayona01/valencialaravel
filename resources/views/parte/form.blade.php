<style>

    #elementos {
        border-collapse: collapse;
        width: 100%;
        text-align: left;
        border: 1px solid #ddd; /* Ajusta el grosor y color del borde según tus preferencias */
        padding: 15px 15px 15px 15px; /* Ajusta el espacio interno de las celdas según tus preferencias */
    }

    #elementos button {
        border: 1px solid #ddd; /* Ajusta el grosor y color del borde según tus preferencias */
        padding: 5px; /* Ajusta el espacio interno de las celdas según tus preferencias */
    }

    .card {
        box-shadow: 0 0 0.875rem 0 rgb(33 37 41 / 84%);
        margin-bottom: 24px;
    }

    .color-#00FF0050 {
        color: #00FF0005;
    } /* Estado 1 Activo */

    .color-#ff000020 {
        color: #ff000005 ;
    } /* Estado 2 Revisar */

    .color-#FFD70060 {
        color: #ffff0080;
    } /* Estado 3 Finalizado */

    .color-#ED912109 {
        color: #ED912109;
    } /* Estado 4 Comprobado */

    .color-#00a2d310 {
        color: #00a2d310;
    } /* Estado 5 Certificado */

    .color-#ff000090 {
        color: #ff000090;
    } /* Estado 6 Rechazado */

    .color-#84857d10 {
        color: #84857d10;
    } /* Estado 7 Anulado */

    label {
        font-weight: bold;
        color: black;
    }


</style>
<div class="box box-info padding-1" style="background-color:
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
            echo '#00a2d310'; // Set the background color to #00a2d360 for estado 5
        } elseif ($parte->estadoparte_id == 6) {
            echo '#ff000090'; // Set the background color to #ff000090 for estado 6
        } elseif ($parte->estadoparte_id == 7) {
            echo '#84857d10'; // Set the background color to #84857d for estado 7
        } else {
            echo 'initial'; // Set the default background color here
        }
    @endphp ">



  @if (Auth::user()->idrol!=4)
  @php
    $dnone = 'd-none';
@endphp
  @else
      @php
    $dnone = '';
@endphp
  @endif


    <div class="box-body" style="padding: 5px 15px 5px 15px" >



        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">

            <div class="col-md-6 form-group">
                {{ Form::label('localización', 'Localización') }}
                {{ Form::select('id_localizacion', $localizaciones, $parte->id_localizacion, [
                    'class' => 'form-control' . ($errors->has('id_localizacion') ? ' is-invalid' : ''),
                    'placeholder' => 'Seleccione una ubicacion',
                    'required' => 'required'

                ]) }}
                <div class="invalid-feedback">
                    porfavor seleccione una ubicacion
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group" style="text-align:center;">
                    {{ Form::label('No') }}
                    <p class="form-control" id="idparte">{{ $no}} </p>
                 <input type="hidden"name="idparte"  class='idparte'value="{{$no}}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group" style="text-align: left; width: 100%" >
                    {{ Form::label('Tipo de parte') }}
                    {{ Form::select('idtipoparte', $tipoparte, $parte->idtipoparte, ['class' => 'form-control' . ($errors->has('idtipoparte') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione el tipo de parte', 'required' => 'required'
                    ]) }}
                    <div class="invalid-feedback">
                        porfavor seleccione el tipo de parte
                    </div>
                </div>
            </div>


            <!-- INICIO Espacio Oculto de los campos Creador por y Fecha de Creación -->
            <div class="col" style="display: none">
                <div class="form-group">

                    {{ Form::label('Creado por') }}
                    <input type="hidden" name="creadopor" id="creadopor" value={{ Auth::user()->id }}>


                    <p class="form-control">{{ Auth::user()->nombres }} {{ Auth::user()->apellidos }} </p>
                </div>
            </div>
            <div class="col" style="display: none">
                <div class="form-group">
                    {{ Form::label('Fecha de creacion') }}
                    {{ Form::datetime('fechacreacion', $currentDateTime, [
                        'class' => 'form-control' . ($errors->has('fechacreacion') ? ' is-invalid' : ''),
                        'placeholder' => 'Fechacreacion',
                        'readonly' => 'readonly',
                    ]) }}
                    {!! $errors->first('fechacreacion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <!-- FIN Espacio Oculto de los campos Creador por y Fecha de Creación -->
        </div>

        <div class="row" bis_skin_checked="1">
            <div class="col-sm-6" bis_skin_checked="1">
                <div class="form-group">
                    {{ Form::label('Autorizado por') }}
                    {{ Form::select('autorizado_por',$autorizadopor,$parte->autorizado_por, ['class' => 'form-control' . ($errors->has('autorizadopor') ? ' is-invalid' : ''), 'placeholder' => 'seleccione', 'required' => 'required' ]) }}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('Fecha de autorización') }}
                    <div class="input-group date">
                        <!--Modificar en base a nuevo campo -->
                        {{ Form::text('fechaautorizacion', $parte->fechaautorizacion, ['class' => 'form-control', 'placeholder' => 'Fecha de Autorización', 'fecha', 'id'=>'fechaautorizacion', 'required' => 'required' ]) }}
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
                   {{ Form::label('Comunicado por') }}
                    {{ Form::select('reportadopor',$reportadopor,$parte->reportadopor, ['class' => 'form-control' . ($errors->has('reportadoPor') ? ' is-invalid' : ''), 'placeholder' => 'seleccione', 'required' => 'required' ]) }}
                   <div class="invalid-feedback">
                        por favor seleccione una  opción
                    </div>

                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('Fecha Comunicación') }}
                    <div class="input-group date">
                       {{ Form::text('fechareporte', $parte->fechareporte, ['class' => 'form-control', 'placeholder' => 'Fecha de Reporte', 'fecha', 'id'=>'fechareporte', 'required' => 'required' ]) }}
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
                    {{ Form::select('asignadoa',$asignadoa,$parte->asignadoa, ['class' => 'form-control' . ($errors->has('asignadoa') ? ' is-invalid' : ''), 'placeholder' => 'seleccione', 'required' => 'required']) }}
                  <div class="invalid-feedback">
                        porfavor asigne un usuario
                    </div>

                </div>
            </div>

          <div class="col-sm-6">
                <div class="form-group">

                    {{ Form::label('Fecha de Reparación') }}

                    <div class="input-group date">

                        {{ Form::text('fechaAsignacion', $parte->fechaAsignacion, ['class' => 'form-control', 'placeholder' => 'Fecha de Reparación', 'fecha', 'id'=>'fechaAsignacion','required' => 'required' ]) }}
                        <div class="input-group-addon input-group-append" bis_skin_checked="1">
                            <div class="input-group-text" bis_skin_checked="1">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>



        <div class="form-group">
            {{ Form::label('observaciones') }}
            {{ Form::textarea('obscreadorparte', $parte->obscreadorparte, [
                'class' => 'form-control' . ($errors->has('obscreadorparte') ? ' is-invalid' : ''),
                'placeholder' => 'Ingrese los detalles del parte',
                'rows' => 5,
                 // Número de filas del textarea, ajusta según tus necesidades
            ]) }}
            {!! $errors->first('obscreadorparte', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

</div>
<center><hr style="border-width: 2px; width:95%; text-align:center"></center>

<div>
    <h4 style="text-align: left;padding: 0px 5px 5px 15px ">Acciones Realizadas </h4>
</div><br>

<div class="container" id="elementos" style="display: block; width: 100%;">
    <div class="row " >

        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3" >
            <label style="text-align: left;" for="codigo">Código</label>
            <input style=" text-align: center;" type="text" class="form-control" id="codigo" readonly>
        </div> <br>

        <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12" >
            <label style="text-align: left;" class="" for="descripcionelementos">Descripción</label>
            {{ Form::select('descripcionelementos', $Descripcionelementos, 'descripcionelementos', ['class' => 'form-control', 'placeholder' => 'seleccione', 'id' => 'descripcionelementos', 'onchange' => 'descEl(this)']) }}
        </div>

        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3" >
            <label style="text-align: left; width: 100%" for="precio">Precio</label>
            <input style="text-align: right; width: 100%"  type="text" class="form-control" id="precio" readonly>
        </div>

        <div class="col-xs-2 col-md-2 col-sm-3 col-xs-3" >
            <label style="text-align: left; width: 100%" for="cantidad">Cantidad</label>
            <input style="text-align: center; width: 100%;" type="number" class="form-control" id="cantidad">
        </div>

        <div class="col-lg-1 col-md-2 col-sm-3 col-xs-3" style="text-align: center;">
            <label style="text-align: center; color: transparent;" for="Select">Acción</label>

            <div class="form-group">
                <a style="text-align: center; " type="button" class="b" id="selecione"><i class="fa fa-plus fa-2x" onclick="calcularTotal() aria-hidden=true"></i></a>
            </div>
        </div>
    </div>

 <div class="contenido d-none" id="tabla-recibe">
   <table class="table table-bordered" style="width: 95%;" id="tabla-recibe2">
    <thead>
    <tr style="text-align: center; font-weight: bold; color: black;">
      <!-- <th style="width: 10%">id</th> -->
      <th>Código</th>
      <th class=”col-lg-2 col-md-2 col-sm-3 col-xs-3″>Descripcion</th>
      <th>Precio</th>
      <th>Cantidad</th>
      <th>Total</th>
      <th>Acción</th>
    </tr>
  </thead>
  <tbody class="contenidoElements">

  </tbody>
   </table>

   <table class="" style="width: 95%;  ">
    <tr>
        <td colspan="2" style="visibility: hidden; width: 60%"></td>
        <td colspan="1" class="table-bordered" style="text-align:center; width: 15%">
            Total
        </td>
        <td colspan="2" class="table-bordered" style="width:15%; text-align:right"  >
            <label id="totalImportes"> </label>
        </td>
        <td colspan="1" style="visibility: hidden; width: 10%"></td>
    </tr>
   </table>
 </div>

 <script>
    // Espera a que el DOM esté completamente cargado
    document.addEventListener("DOMContentLoaded", function() {
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

        // Actualiza el contenido del label "totalImportes" con la suma total
        document.getElementById("totalImportes").textContent = total.toFixed(2)+ " €" ; // Puedes ajustar el número de decimales según tus necesidades
    });
</script>


 <br>

        <!-- DIVISION PARA EL FRONT DE ADD IMAGENES -->

        <div class="mb-3">
            <label for="formFileSm" class="form-label"><h5 style="font-weight: bold; color: black;">Adjunte evidencias fotograficas</h5></label>
            <input class="form-control form-control-sm multiple" id="formFileSm" type="file" multiple accept=".jpg, .jpeg, .png" style="background-color: #e6e6e6; color: #706c6c;" onchange="handleFileSelect(this)">

        </div>
        <br><label for="formFileSm" class="form-label"><h5 style="bold; color: black;">Vista previa</h5></label>

        <div id="imageListContainer" style="max-height: 300px; overflow-y: auto;">
            <div id="imageList" style="display: flex; flex-wrap: wrap;"></div>
        </div>

        <!-- SCRIPT PARA EL CARGO DE LAS IMÁGENES -->
<script>
    /*function handleFileSelect(input) {
        var fileList = input.files;
        var imageListContainer = document.getElementById("imageList");

        for (var i = 0; i < fileList.length; i++) {
            var file = fileList[i];
            var imageURL = URL.createObjectURL(file);

            // Crear miniatura de la imagen

        }
    }*/
</script>


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
        <div class="form-group" style="display: none;">
            {{ Form::label('estadoparte_id') }}
            {{ Form::text('estadoparte_id', $parte->estadoparte_id, ['class' => 'form-control' . ($errors->has('estadoparte_id') ? ' is-invalid' : ''), 'placeholder' => 'Estadoparte Id', 'readonly' => 'readonly', 'id' => 'estadoparte_id']) }}
            {!! $errors->first('estadoparte_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>


    </div>

    <div class="box-footer mt-20" style="margin-top: 10px; padding: 0px 15px 15px 15px">
        <button style="text-align: left;" type="submit" class="btn btn-primary">{{ __('Registrar') }}</button>

        <a href="{{url('cancelar/'.$no)}}" type="button"  class="btn btn-danger" id="backButton">
        Cancelar
        </a>
    </div>



</div>
</div>
