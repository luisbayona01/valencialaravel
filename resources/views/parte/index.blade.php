<!-- FORM DEL FRONT EDIT -->

@extends('layouts.plantilla')

@section('template_title')
    Parte
@endsection

@section('content')
 <style>

.Activo {
background-color: #00FF0050 !important;
/* Estado 1 Activo */
}
.Revisar{
background-color:#ff000020 !important;
/* Estado 2 Revisar */
}
.Finalizado{
background-color:#FFD70060 !important;
/* Estado 3 Finalizado */
}
.Comprobado{
background-color:#ED912170 !important;
/* Estado 4 Comprobado */
 }
 .Certificado{
background-color:#00a2d360 !important;
/* Estado 5 Certificado */
 }
 .Rechazado{
background-color:#ff000090 !important;
/* Estado 6 Rechazado */
 }
.Anulado{
background-color:#84857d !important;
/* Estado 7 Anulado */
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
                            <!--
                            <span id="card_title">
                                {{ __('Parte') }}
                            </span>
                            -->

                             <div class="float-right">
                                <a href="{{ route('partes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Nuevo parte') }}
                                </a>
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
                                        <tr style="font-size:0.9em;">
                                            <td style="text-align: center;">{{  $parte->id }}</td> <!-- No. Parte -->
											<td style="text-align: center;">{{ $parte->cod_localizacion }}</td> <!-- Ubicacion Novedad -->
											<td>{{ $parte->tipoparte }}</td> <!-- Tipo Parte -->
											<td>{{ $parte->reportadoPor }}</td> <!-- Comunicado por -->
											<td style="text-align: center;">{{ $parte->fechareporte }}</td> <!-- Fecha de comunicacion -->
											<td>{{ $parte->obscreadorparte }}</td> <!-- Observaciones -->
											<td>{{ $parte->asignadoA }}</td> <!-- Reparado por -->
											<td>{{ $parte->fechaAsignacion }}</td> <!-- Fecha reparacion -->
                                            <td>{{ $parte->fechaAsignacion }}</td>
											<td ><span class="{{ $parte->estadoparte }}" style="display: block; width: 100%; height: 100%; text-align: center;"> {{ $parte->estadoparte }}</span> </td> <!-- Estado -->
                                            <td style="text-align: center">
                                                <a class="btn btn-sm btn-info" href="{{ route('partes.edit',$parte->id) }}" ><i "></i> {{ __('Ver') }}</a> <!-- Accion -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <div style="text-align: right; padding: 0px 10px 10px 10px">
                        <button type="button" onclick="goToHome()" class="btn btn-secondary" style="text-align: right;">Volver</button>
                    </div>
                    <script>
                        function goToHome() {
                            window.location.href = "{{ url('/gestorParte') }}";
                        }
                    </script>
                </div>

            </div>
        </div>
    </div>
@endsection
