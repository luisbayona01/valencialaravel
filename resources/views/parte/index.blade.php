@extends('layouts.plantilla')

@section('template_title')
    Parte
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
                            <table class="table table-striped" id="table-parte" border="1">
                                <thead class="thead">
                                    <tr style="text-align: center;">
                                        <th>No parte</th>
										<th>Ubicación novedad</th>
										<th>tipo parte</th>
										<th>Creado por</th>
										<th>Fecha creación</th>
										<th>Comunicado por</th>
										<th>Fecha Comunicación</th>
										<th style="text-align: center;">Obsrvación inicial</th>
										<th>Responsable</th>
										<th style="text-align: center;">Fecha asignación</th>
								        <th>Estado</th>
                                        <th>Acción</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($partes as $parte)
                                        <tr style="font-size:0.9em;">
                                            <td style="text-align: center;">{{  $parte->id }}</td>

											<td style="text-align: center;">{{ $parte->cod_localizacion }}</td>
											<td>{{ $parte->tipoparte }}</td>
											<td>{{ $parte->partecreadopor }}</td>
											<td style="text-align: center;">{{ $parte->fechacreacion }}</td>
											<td>{{ $parte->reportadoPor }}</td>
											<td style="text-align: center;">{{ $parte->fechareporte }}</td>
											<td>{{ $parte->obscreadorparte }}</td>
											<td>{{ $parte->asignadoA }}</td>
											<td>{{ $parte->fechaAsignacion }}</td>
											<td ><span class="{{ $parte->estadoparte }}" style="display: block; width: 100%; height: 100%; text-align: center;"> {{ $parte->estadoparte }}</span> </td>

                                            <td>

                                          <a class="btn btn-sm btn-success" href="{{ route('partes.edit',$parte->id) }}" ><i "></i> {{ __('Editar') }}</a>

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
