<div class="box box-info padding-1" style="padding: 0% 5% 5% 5%">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Nombres') }}
            {{ Form::text('nombres', $user->nombres, ['class' => 'form-control' . ($errors->has('nombres') ? ' is-invalid' : ''), 'placeholder' => 'Nombres','required' => 'required']) }}
               <div class="invalid-feedback"> El  campo Nombres es obligatorio  </div>
        </div>
        <div class="form-group">
            {{ Form::label('Apellidos') }}
            {{ Form::text('apellidos', $user->apellidos, ['class' => 'form-control' . ($errors->has('apellidos') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos','required' => 'required']) }}
             <div class="invalid-feedback"> El  campo Apellidos es obligatorio  </div>
        </div>
        <div class="form-group">
            {{ Form::label('Email') }}
            {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email','required' => 'required']) }}
             <div class="invalid-feedback"> el   campo Email es obligatorio  </div>
        </div>
        <div class="form-group">
            {{ Form::label('Usuario') }}
            {{ Form::text('username', $user->username, [
                'class' => 'form-control' . ($errors->has('username') ? ' is-invalid' : ''),
                'placeholder' => 'Usuario',
                'required' => 'required',
                'readonly' => $estado ? 'readonly' : null,
            ]) }}
            <div class="invalid-feedback">El campo Usuario es obligatorio</div>
        </div>


        <div class="form-group">
            {{ Form::label('Contraseña') }}
            {{ Form::text('password', $user->password, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Contraseña','required' => 'required']) }}
             <div class="invalid-feedback"> La contraseña es obligatoria  </div>
        </div>


     <div class="form-group">
    {{ Form::label('role', 'Perfil') }}
    {{ Form::select('idrol', $roles,$user->idrol, ['class' => 'form-control','placeholder' => 'Seleccione un Perfil', 'required' => 'required']) }}
   <div class="invalid-feedback">el  campo  Perfil es obligatorio  </div>
</div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
        <button style="text-align: right;" type="button" class="btn btn-danger" id="backButton">
        Cancelar
        </button>
    </div>


        <script>
        document.getElementById('backButton').addEventListener('click', function() {
            window.history.back();
        });
        </script>
</div>
