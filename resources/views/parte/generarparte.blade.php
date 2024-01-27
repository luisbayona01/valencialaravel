<!-- FORM DEL FRONT EDIT -->

@extends('layouts.plantilla')

@section('template_title')
    generarparte
@endsection

@section('content')
 <style>

.Activo {
background-color: #00FF00 !important;
/* Estado 1 Activo */
}
.No_Comprobado{
background-color:#FFDEAD !important;
/* Estado 2 No_Comprobado */
}
.Aceptado{
background-color:#FFD700 !important;
/* Estado 3 Aceptado o Verificado */
}
.Certificado{
background-color:#d7f1e7 !important;
 }
.Rechazado{
background-color:#FA8072 !important;
/* Estado 3 Rechazado */
color: #ffFF ;
 }
</style>
    <div class="container-fluid" >
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                          <div >
                            <img src="{{asset('img/icono_representativo_caratula.png')}}" class="card-img-top" style="width: 30rem;">
                        </div>

                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-parte" >
                                <thead class="thead">
                                    <tr style="text-align: center;">
                                        <th>No parte</th>
										<th>Ubicación novedad</th>
										<th>Tipo parte</th>
										<th>Comunicado por</th>
										<th>Fecha Comunicación</th>
										<th style="text-align: center;">Observaciones</th>
										<th>Reparado por</th>
										<th style="text-align: center;">Fecha Reparacion</th>
                                        <th>Total importe</th>
								        <th>Estado</th>
                                        <th>Acción</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($partes as $parte)
                                    @if ($parte->estadoparte == 'Validado')

                                        <tr style="font-size:0.9em;">
                                            <td style="text-align: center;">{{  $parte->id }}</td> <!-- No. Parte -->
											<td style="text-align: center;">{{ $parte->cod_localizacion }}</td> <!-- Ubicacion Novedad -->
											<td>{{ $parte->tipoparte }}</td> <!-- Tipo Parte -->
											<td>{{ $parte->reportadoPor }}</td> <!-- Comunicado por -->
											<td style="text-align: center;">{{ $parte->fechareporte }}</td> <!-- Fecha de comunicacion -->
											<td>{{ $parte->obscreadorparte }}</td> <!-- Observaciones -->
											<td>{{ $parte->asignadoA }}</td> <!-- Reparado por -->
											<td>{{ $parte->fechaAsignacion }}</td> <!-- Fecha reparacion -->
                                            <td>{{ $parte->fechaAsignacion }}</td><!-- Total Importes -->
											<td ><span class="{{ $parte->estadoparte }}" style="display: block; width: 100%; height: 100%; text-align: center;"> {{ $parte->estadoparte }}</span> </td> <!-- Estado -->
                                            <td style="text-align: center">
                                                <a class="btn btn-sm btn-success" href="{{ route('partes.edit',$parte->id) }}" ><i ></i> {{ __('Ver') }}</a> <!-- Accion -->
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <br>
                    <div style="text-align: letf; padding: 0px 10px 10px 10px">
                        <button type="button" onclick="goToHome()" class="btn btn-secondary" style="text-align: right;">Volver</button>
                        <button type="button" onclick="pdf()" class="btn btn-primary float-right" style="text-align: right;">Generar Certificación</button>
                    </div>
                    <script>
                        function goToHome() {
                            window.location.href = "{{ url('/gestorParte') }}";
                        }
                    function pdf() {
                        window.open("{{ url('/pdf') }}", "_blank");
                    }
                    </script>
                </div>

            </div>
        </div>
    </div>
@endsection
