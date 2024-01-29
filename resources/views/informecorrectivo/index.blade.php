@extends('layouts.plantilla')

@section('template_title')
    Informecorrectivo
@endsection

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script>
$(document).ready( function () {
    $('#Informecorrectivo').DataTable();
} );
</script>


    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Informecorrectivo') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('informecorrectivos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                            <table class="table table-striped table-hover" id="Informecorrectivo">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Codigo</th>
										<th>Concepto</th>
										<th>Uds En Garantia</th>
										<th>Uds En Conservacion</th>
										<th>Dias En Conservacion</th>
										<th>Euros Por Dia</th>
										<th>Total</th>
										<th>Fecha De Carga</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($informecorrectivos as $informecorrectivo)
                                        <tr>
                                            <td>{{ $informecorrectivo->id }}</td>

											<td>{{ $informecorrectivo->Codigo }}</td>
											<td>{{ $informecorrectivo->Concepto }}</td>
											<td>{{ $informecorrectivo->Uds_en_garantia }}</td>
											<td>{{ $informecorrectivo->Uds_en_conservacion }}</td>
											<td>{{ $informecorrectivo->Dias_en_conservacion }}</td>
											<td>{{ $informecorrectivo->Euros_por_dia }}</td>
											<td>{{ $informecorrectivo->Total }}</td>
											<td>{{ $informecorrectivo->Fecha_de_carga }}</td>


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
