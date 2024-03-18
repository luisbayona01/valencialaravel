<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group" style="padding: 2% 2% 2% 2% ">
            {{ Form::label('Descripción del Perfil') }}
            {{ Form::text('name', $role->name, ['class' => 'form-control' . ($errors->has('Descripción') ? ' is-invalid' : ''), 'placeholder' => 'Nuevo identificador del perfil','required' => 'required']) }}
            <div class="invalid-feedback">el campo nombre es obligatorio</div>
        </div>


    </div>
<br>
    <div style="text-align: right; padding: 0px 10px 10px 10px">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>

        <button type="button" onclick="goToHome()" class="btn btn-secondary" style="text-align: right;">Volver</button>
    </div>
    </div>
    <script>
        function goToHome() {
            window.location.href = "{{ url('/roles') }}";
        }
    </script>
</div>
