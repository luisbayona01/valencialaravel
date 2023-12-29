<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombres') }}
            {{ Form::text('nombres', $user->nombres, ['class' => 'form-control' . ($errors->has('nombres') ? ' is-invalid' : ''), 'placeholder' => 'Nombres','required' => 'required']) }}
               <div class="invalid-feedback"> El  campo Nombres es obligatorio  </div>
        </div>
        <div class="form-group">
            {{ Form::label('apellidos') }}
            {{ Form::text('apellidos', $user->apellidos, ['class' => 'form-control' . ($errors->has('apellidos') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos','required' => 'required']) }}
             <div class="invalid-feedback"> El  campo Apellidos es obligatorio  </div>
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email','required' => 'required']) }}
             <div class="invalid-feedback"> el   campo Email es obligatorio  </div>
        </div>
     <div class="form-group">
            {{ Form::label('username') }}
            {{ Form::text('username', $user->username, ['class' => 'form-control' . ($errors->has('username') ? ' is-invalid' : ''), 'placeholder' => 'Username','required' => 'required']) }}
             <div class="invalid-feedback"> el   campo username es obligatorio  </div>
        </div>


     <div class="form-group">
    {{ Form::label('role', 'Rol') }}
    {{ Form::select('idrol', $roles,$user->idrol, ['class' => 'form-control','placeholder' => 'Seleccione un rol', 'required' => 'required']) }}
   <div class="invalid-feedback">el  campo  Rol es obligatorio  </div>
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
