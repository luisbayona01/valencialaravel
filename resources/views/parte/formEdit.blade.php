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


    .color-#98FB98 {
        color: #98FB98;
    } /* Estado 1 Activo */

    .color-#FFDEAD {
        color: #FFDEAD ;
    } /* Estado 2 No_Comprobado */

    .color-#FFD700 {
        color: #FFD700;
    } /* Estado 3 Aceptado o Verificado */

    .color-#d7f1e7 {
        color: #d7f1e7;
    } /* Estado 4 Certificado */

    .color-#FA8072 {
        color: #FA8072;
    } /* Estado 5 Rechazado */

    label {
        font-weight: bold;
        color: black;
    }


</style>
<div class="box box-info padding-1" style="background-color:
    @php
        if ($parte->estadoparte_id == 1) {
            echo '#98FB98'; // Set the background color to #98FB98 for estado 1
        } elseif ($parte->estadoparte_id == 2) {
            echo '#FFDEAD'; // Set the background color to #FFDEAD for estado 2
        } elseif ($parte->estadoparte_id == 3) {
            echo '#FFD700'; // Set the background color to #FFD700 for estado 3
        } elseif ($parte->estadoparte_id == 4) {
            echo '#d7f1e7'; // Set the background color to #d7f1e7 for estado 4
        } elseif ($parte->estadoparte_id == 5) {
            echo '#FA8072'; // Set the background color to #ff4d4d for estado 5
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

        <div class="row">
            <div class="col-lg-10 offset-lg-1 text-center">
                <div class="form-group">
                    {{ Form::label('localización', 'Localización') }}
                    {{ Form::select('id_localizacion', $localizaciones, $parte->id_localizacion, [
                        'class' => 'form-control' . ($errors->has('id_localizacion') ? ' is-invalid' : ''),
                        'placeholder' => 'Seleccione una ubicacion',
                        'required' => 'required',
                       'disabled' =>'disabled'
                    ]) }}
                    <div class="invalid-feedback">
                        porfavor seleccione una ubicacion
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4" style="width: 100%">
            <div class="col">
                <div class="form-group" style="text-align: center; width: 55%">
                    {{ Form::label('No') }}
                    <p class="form-control" id="idparte">{{ $no}} </p>

                </div>
            </div>
            <div class="col">
                <div class="form-group" style="text-align: left; width: 100%" >
                    {{ Form::label('Tipo de parte') }}
                    {{ Form::select('idtipoparte', $tipoparte, $parte->idtipoparte, ['class' => 'form-control' . ($errors->has('idtipoparte') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione el tipo de parte', 'required' => 'required','disabled' =>'disabled' ,
                    ]) }}
                    <div class="invalid-feedback">
                        porfavor seleccione el tipo de parte
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group" style="width: 100%">
                    {{ Form::label('Autorizado por') }}
                    <input type="hidden" name="creadopor"value={{ Auth::user()->id }}>

                    <p class="form-control">{{ Auth::user()->nombres }} {{ Auth::user()->apellidos }} </p>
                </div>
            </div>
            <div class="col">
                <div class="form-group" style="width: 100%">
                    {{ Form::label('Fecha de Autorización') }}
                    {{ Form::datetime('fechacreacion', $parte->fechacreacion, [
                        'class' => 'form-control' . ($errors->has('fechacreacion') ? ' is-invalid' : ''),
                        'placeholder' => 'Fechacreacion',
                        'required' => 'required','readonly' => 'readonly',
                    ]) }}
                    {!! $errors->first('fechacreacion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="row" bis_skin_checked="1">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Creado por') }}
                    <input type="hidden" name="creadopor"value={{ Auth::user()->id }}>

                    <p class="form-control">{{ Auth::user()->nombres }} {{ Auth::user()->apellidos }} </p>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Fecha de Creación') }}
                    {{ Form::datetime('fechacreacion', $parte->fechacreacion, [
                        'class' => 'form-control' . ($errors->has('fechacreacion') ? ' is-invalid' : ''),
                        'placeholder' => 'Fechacreacion',
                        'required' => 'required','readonly' => 'readonly',
                    ]) }}
                    {!! $errors->first('fechacreacion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="row" bis_skin_checked="1">

            <div class="col-sm-6" bis_skin_checked="1">
                <div class="form-group">
                    {{ Form::label('Comunicado Por') }}
                    {{ Form::select('reportadopor',$reportadopor,$parte->reportadopor, ['class' => 'form-control' . ($errors->has('reportadoPor') ? ' is-invalid' : ''), 'placeholder' => 'selecione', 'required' => 'required', 'disabled' =>'disabled']) }}
                   <div class="invalid-feedback">
                        porfavor seleccione una  opcion
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('Fecha de Comunicación') }}
                    <div class="input-group date">

                        {{ Form::text('fechareporte', $parte->fechareporte, ['class' => 'form-control', 'placeholder' => 'Fechareporte', 'required' => 'required', 'disabled' =>'disabled']) }}
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
                    {{ Form::label('fecha de Reparación') }}
                    <div class="input-group date">

                        {{ Form::text('fechaAsignacion', $parte->fechaAsignacion, ['class' => 'form-control', 'placeholder' => 'fechaAsignacion', 'required' => 'required', 'disabled' =>'disabled']) }}
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
            {{ Form::label('observaciones') }}
            {{ Form::textarea('obscreadorparte', $parte->obscreadorparte, [
                'class' => 'form-control' . ($errors->has('obscreadorparte') ? ' is-invalid' : ''),
                'placeholder' => 'Ingrese los detalles del parte',
                'rows' => 5,
                'disabled' => 'disabled' // Número de filas del textarea, ajusta según tus necesidades
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
        <div class="col">
            <label style="width: 80%; text-align: left;" for="codigo">Código</label>
            <input style="width: 80%; text-align: center;" type="text" class="form-control" id="codigo" readonly>
        </div> <br>

    <div class="col" style="width: 2400px">
        <label style="text-align: left;" for="descripcionelementos">Descripción</label>
        {{ Form::select('descripcionelementos', $Descripcionelementos, 'descripcionelementos', ['class' => 'form-control', 'placeholder' => 'seleccione', 'id' => 'descripcionelementos', 'onchange' => 'descEl(this)']) }}
    </div>

    <div class="col">
        <label style="text-align: left; width: 100%" for="precio">Precio</label>
        <input style="text-align: right; width: 100%"  type="text" class="form-control" id="precio" readonly>
    </div>

    <div class="col">
        <label style="text-align: left; width: 100%" for="cantidad">Cantidad</label>
        <input style="text-align: center; width: 100%;" type="number" class="form-control" id="cantidad">
    </div>

    <div class="col" style="text-align: center;">
        <label style="text-align: center; color: transparent;" for="Select">Acción</label>

        <div class="form-group">
            <a style="text-align: center; " type="button" class="b" id="selecione"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>
        </div>
    </div>
</div>

 <div class="contenido d-none" id="tabla-recibe">
   <table class="table table-bordered" style="width: 95%; ">
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

 </div>



 <br>
 {{ Form::open(['url' => 'your-route', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
        <div class="form-group">
            {{ Form::label('Observaciones del operador') }}
            {{ Form::textarea('obsOperador', $parte->obsOperador, ['class' => 'form-control' . ($errors->has('obsOperador') ? ' is-invalid' : ''),
           'placeholder' => 'Ingrese las novedades Halladas','rows' => 5,
            'required' => Auth::user()->id_rol == 4 ? 'required' : ''
     ]) }}
            {!! $errors->first('obsOperador', '<div class="invalid-feedback">:message</div>') !!}
        </div>


        <!-- DIVISION PARA EL FRONT DE ADD IMAGENES -->

        <div class="mb-3">
            <label for="formFileSm" class="form-label"><h5 style="bold; color: black;">Adjunte evidencias fotograficas</h5></label>
            <input class="form-control form-control-sm multiple" id="formFileSm" type="file" multiple accept=".jpg, .jpeg, .png" style="background-color: #e6e6e6; color: #706c6c;" onchange="handleFileSelect(this)">

        </div>
        <br><label for="formFileSm" class="form-label"><h5 style="bold; color: black;">Vista previa</h5></label>

        <div id="imageListContainer" style="max-height: 300px; overflow-y: auto;">
            <div id="imageList"></div>
        </div>

        <!-- SCRIPT PARA EL CARGE DE LAS IMAGENES -->
        <script>

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
        <button style="text-align: left; type="submit" class="btn btn-primary">{{ __('Registrar') }}</button>
        &nbsp;
        <button type="button" onclick="goBack()" class="btn btn-secondary" style="text-align: right;">Volver</button>
        &nbsp;
        <button type="button" onclick="pdf()" class="btn btn-primary float-right" style="text-align: right;">Imprimir Certificado</button>
    </div>

    {{ Form::close() }}

       <script>
        // JavaScript function to go back to the previous page
        function goBack() {
        window.history.back();
        }
    </script>


</div>
</div>
