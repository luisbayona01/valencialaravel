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
                                {{ __('Tabla de Conservación') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('informecorrectivos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Subir tabla') }}
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

										<th style="text-align:center">Codigo</th>
										<th style="text-align:center">Concepto</th>
										<th style="font-size: 0.9em; text-align:center">Uds En Garantia</th>
										<th style="font-size: 0.9em; text-align:center">Uds En Conservacion</th>
										<th style="font-size: 0.9em; text-align:center">Dias En Conservacion</th>
										<th style="font-size: 0.9em; text-align:center">Euros Por Dia</th>
										<th>Total</th>
										<th style="font-size: 0.9em; text-align:center">Fecha De Carga</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($informecorrectivos as $informecorrectivo)
                                        <tr>
                                            <td>{{ $informecorrectivo->id }}</td>

											<td style="font-size: 0.9em; text-align:center">{{ $informecorrectivo->Codigo }}</td>
											<td style="font-size: 0.9em; text-align:center">{{ $informecorrectivo->Concepto }}</td>
											<td>{{ $informecorrectivo->Uds_en_garantia }}</td>
											<td>{{ $informecorrectivo->Uds_en_conservacion }}</td>
											<td>{{ $informecorrectivo->Dias_en_conservacion }}</td>
											<td style="font-size: 0.9em; text-align:right">{{ $informecorrectivo->Euros_por_dia }} €</td>
											<td style="font-size: 0.9em; text-align:right">{{ number_format($informecorrectivo->Total,2, ',', '.')  }} €</td>
											<td style="font-size: 0.9em; text-align:center">{{ $informecorrectivo->Fecha_de_carga }}</td>


                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Sección de botones -->
<div class="box-footer mt-20" style="margin-top: 10px; padding: 0px 15px 15px 15px">

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
@endsection
