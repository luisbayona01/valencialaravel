<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('estadoparte') }}
            {{ Form::text('estadoparte', $estadoparte->estadoparte, ['class' => 'form-control' . ($errors->has('estadoparte') ? ' is-invalid' : ''), 'placeholder' => 'Estadoparte']) }}
            {!! $errors->first('estadoparte', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>