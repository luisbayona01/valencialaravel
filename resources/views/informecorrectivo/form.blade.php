<div class="box box-info padding-1">
    <div class="box-body">

      <div class="form-group">
		<label for="cuentas">Selecciona un Archivo:</label>
		<div class="input-group">
			<span class="input-group-btn">
				<span class="btn btn-primary btn-file">
					Navegar&hellip;
					<input type="file" id="localizaciones" class="localizaciones" accept=".xlt,xls, .xlsx" onchange="validarArchivo(this)">
				</span>
			</span>
			<input type="text" class="form-control namearchivo" readonly>
		</div>
	</div>

    </div>
   <button type="button" class="btn btn-success envio-masivo">Enviar

		<div class="align-items-center d-none" id="loadingM">
			<strong>Cargando...</strong>
			<div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
		</div>
	</button>
</div>
