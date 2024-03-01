<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('idpenalidad') }}
            {{ Form::text('idpenalidad', $penalidades->idpenalidad, ['class' => 'form-control' . ($errors->has('idpenalidad') ? ' is-invalid' : ''), 'placeholder' => 'Idpenalidad']) }}
            {!! $errors->first('idpenalidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fechaCreacion') }}
            {{ Form::text('fechaCreacion', $penalidades->fechaCreacion, ['class' => 'form-control' . ($errors->has('fechaCreacion') ? ' is-invalid' : ''), 'placeholder' => 'Fechacreacion']) }}
            {!! $errors->first('fechaCreacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('creadoPor') }}
            {{ Form::text('creadoPor', $penalidades->creadoPor, ['class' => 'form-control' . ($errors->has('creadoPor') ? ' is-invalid' : ''), 'placeholder' => 'Creadopor']) }}
            {!! $errors->first('creadoPor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('obsCreacion') }}
            {{ Form::text('obsCreacion', $penalidades->obsCreacion, ['class' => 'form-control' . ($errors->has('obsCreacion') ? ' is-invalid' : ''), 'placeholder' => 'Obscreacion']) }}
            {!! $errors->first('obsCreacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('valorPenalidad') }}
            {{ Form::text('valorPenalidad', $penalidades->valorPenalidad, ['class' => 'form-control' . ($errors->has('valorPenalidad') ? ' is-invalid' : ''), 'placeholder' => 'Valorpenalidad']) }}
            {!! $errors->first('valorPenalidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estadopenalidad_Id') }}
            {{ Form::text('estadopenalidad_Id', $penalidades->estadopenalidad_Id, ['class' => 'form-control' . ($errors->has('estadopenalidad_Id') ? ' is-invalid' : ''), 'placeholder' => 'Estadopenalidad Id']) }}
            {!! $errors->first('estadopenalidad_Id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>

    <div class="box-footer mt20">
        <a href="{{url('penalidades')}}" type="button"  class="btn btn-danger" id="backButton">
            Cancelar
        </a>

        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
