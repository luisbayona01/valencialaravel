<style>
    .card {
        box-shadow: 0 0 0.875rem 0 rgb(33 37 41 / 84%);
        margin-bottom: 24px;
    }
</style>
<div class="box box-info padding-1">

  @if (Auth::user()->idrol!=4)
  @php
    $dnone = 'd-none';
@endphp    
  @else
      @php
    $dnone = '';
@endphp
  @endif
    <div class="box-body">

        <div class="row">
            <div class="col-lg-10 offset-lg-1 text-center">
                <div class="form-group">
                    {{ Form::label('localizacion', 'Localizacion') }}
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

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('No') }}
                    <p class="form-control" id="idparte">{{ $no}} </p>
                
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('tipoparte') }}
                    {{ Form::select('idtipoparte', $tipoparte, $parte->idtipoparte, ['class' => 'form-control' . ($errors->has('idtipoparte') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione el tipo de parte', 'required' => 'required','disabled' =>'disabled' ,
                    ]) }}
                    <div class="invalid-feedback">
                        porfavor seleccione el tipo de parte
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('creadopor') }}
                    <input type="hidden" name="creadopor"value={{ Auth::user()->id }}>

                    <p class="form-control">{{ Auth::user()->nombres }} {{ Auth::user()->apellidos }} </p>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('fechacreacion') }}
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
                    {{ Form::label('reportadoPor') }}
                    {{ Form::select('reportadopor',$reportadopor,$parte->reportadopor, ['class' => 'form-control' . ($errors->has('reportadoPor') ? ' is-invalid' : ''), 'placeholder' => 'selecione', 'required' => 'required', 'disabled' =>'disabled']) }}
                   <div class="invalid-feedback">
                        porfavor seleccione una  opcion
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('fechareporte') }}
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
                    {{ Form::label('asignado A') }}
                    {{ Form::select('asignadoa',$asignadoa,$parte->asignadoa, ['class' => 'form-control' . ($errors->has('asignadoa') ? ' is-invalid' : ''), 'placeholder' => 'seleccione', 'required' => 'required']) }}
                  <div class="invalid-feedback">
                        porfavor asigne un usuario
                    </div>
                </div>
            </div>





          <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('fechaAsignacion') }}
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
    <div class="col-sm-2 d-flex align-items-end {{ $dnone }}">
        <div class="form-group mb-0">
            <button type="button" class="btn btn-info" id="showE">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</div>
<div class="container d-none" id="elementos">
    <div class="row">
        <div class="col">
            <label for="codigo">Código</label>
            <input type="text" class="form-control" id="codigo" readonly>
        </div>
        <div class="col">
            <label for="descripcionelementos">Descripción</label>
            {{ Form::select('descripcionelementos', $Descripcionelementos, 'descripcionelementos', ['class' => 'form-control', 'placeholder' => 'seleccione', 'id' => 'descripcionelementos', 'onchange' => 'descEl(this)']) }}
        </div>
        <div class="col">
            <label for="precio">Precio</label>
            <input type="text" class="form-control" id="precio" readonly>
        </div>
        <div class="col">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" id="cantidad">
        </div>
        <div class="col ">
   <label for="Select">Select</label>
           <div class="form-group">
            <button type="button" class="btn btn-info" id="selecione"><i class="fa fa-check-square" aria-hidden="true"></i></button>
           </div>        
</div>
    </div>
</div>

 <div class="contenido d-none">
   <table class="table table-bordered">
         <thead>
    <tr>
      <th>elemento</th>
      <th>Descripcion</th>
      <th>Precio</th>
      <th>Cantidad</th>
      <th>total</th>
    </tr>
  </thead>
  <tbody class="contenidoElements">

  </tbody>
   </table>

 </div>

        <div class="form-group {{$dnone}}">
            {{ Form::label('observaciones del operador') }}
            {{ Form::textarea('obsOperador', $parte->obsOperador, ['class' => 'form-control' . ($errors->has('obsOperador') ? ' is-invalid' : ''), 
           'placeholder' => 'Obsoperador','rows' => 5,
            'required' => Auth::user()->id_rol == 4 ? 'required' : ''
     ]) }}
            {!! $errors->first('obsOperador', '<div class="invalid-feedback">:message</div>') !!}
        </div>


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
        <div class="form-group"style="display:none">
            {{ Form::label('estadoparte_id') }}
            {{ Form::text('estadoparte_id', $parte->estadoparte_id, ['class' => 'form-control' . ($errors->has('estadoparte_id') ? ' is-invalid' : ''), 'placeholder' => 'Estadoparte Id']) }}
            {!! $errors->first('estadoparte_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>

    <div class="box-footer mt-20"style="
    margin-top: 10px;
">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
</div>
