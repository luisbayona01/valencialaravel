<div class="box box-info padding-1">
    <div class="box-body">

      <div class="form-group">
		<label for="cuentas">Selecciona un Archivo:</label>
		<div class="input-group">
			<span class="input-group-btn">
				<span class="btn btn-primary btn-file">
					Buscar&hellip;
					<input type="file" id="localizaciones" class="localizaciones" accept=".xlt,xls, .xlsx" onchange="validarArchivo(this)">
				</span>
			</span>
			<input type="text" class="form-control namearchivo" readonly>
		</div>
	</div>

    </div>
    <div style="padding: 5px 5px 5px 5px;">
   <button type="button" class="btn btn-success envio-masivo float-right" style="" >Guardar

		<div class="align-items-center d-none" id="loadingM">
			<strong>Cargando...</strong>
			<div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
		</div>
	</button>
    &nbsp;&nbsp;
    <button type="button" class="btn btn-danger float-right" >Cargar</button>

    <button type="button" onclick="goBack()" class="btn btn-secondary" style="text-align: right;">Volver</button>

    </div>
    {{ Form::close() }}

    <script>
        // JavaScript function to go back to the previous page
        function goBack() {
        window.history.back();
        }
    </script>

</div>

