@extends('layouts.plantilla')

@section('template_title')
    Parte
@endsection

@section('content')
 <style>

.Activo {
    background-color: #FFD700;

    }
.Aceptado{
background-color:#00FF00 !important;
}

.Rechazado{
background-color:#FF0000 !important;
}
.Certificado{
background-color:#FF8C00 !important;
 }
.Comprobado{
background-color:#4169E1 !important;
color: #ffFF ;
 }
</style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                          <div >
                            <img src="{{asset('img/icono_representativo_caratula.png')}}" class="card-img-top" style="width: 30rem;">
                        </div>
                            <span id="card_title">
                                {{ __('Parte') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('partes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                            <table class="table table-striped" id="table-parte">
                                <thead class="thead">
                                    <tr>
                                        <th>No parte</th>

										<th>Ubicacion novedad</th>
										<th>tipo parte</th>
										<th>Creado por</th>
										<th>Fecha creacion</th>
										<th>Reportado por</th>
										<th>Fecha reporte</th>
										<th>Obsrvacion ini</th>
										<th>Responsable</th>
										<th>Fechaasignacion</th>
									   <th>Estadoparte</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($partes as $parte)
                                        <tr>
                                            <td>{{  $parte->id }}</td>

											<td>{{ $parte->cod_localizacion }}</td>
											<td>{{ $parte->tipoparte }}</td>
											<td>{{ $parte->partecreadopor }}</td>
											<td>{{ $parte->fechacreacion }}</td>
											<td>{{ $parte->reportadoPor }}</td>
											<td>{{ $parte->fechareporte }}</td>
											<td>{{ $parte->obscreadorparte }}</td>
											<td>{{ $parte->asignadoA }}</td>
											<td>{{ $parte->fechaAsignacion }}</td>
											<td><span class="{{ $parte->estadoparte }}"> {{ $parte->estadoparte }}</span> </td>

                                            <td>

                                          <a class="btn btn-sm btn-success" href="{{ route('partes.edit',$parte->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
