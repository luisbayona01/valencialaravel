@extends('layouts.plantilla')

@section('template_title')
    listaPrecios
@endsection

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script>
$(document).ready( function () {
    $('#listaPrecios').DataTable();
} );
</script>


    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title" >
                                <h3>{{ __('Lista de Precios') }}</h3>
                            </span>

                             <div class="float-right">
                                <a href="{{ route('listaPrecios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                            <table class="table table-striped table-hover" id="listaPrecios" style="padding: 3px 15px 0px 8px; width:100% ">
                                <thead class="thead">
                                    <tr>
                                        <th style="width:5% ;font-size: 0.9em; text-align:center">No</th>
                                        <th style="width:5% ;font-size: 0.9em; text-align:center">Elemento</th>
										<th style="width:5% ;font-size: 0.9em; text-align:center">UD</th>
										<th style="width:45% ;font-size: 0.9em; text-align:center">Descripcion</th>
										<th style="width:10% ;font-size: 0.9em; text-align:center">Precio</th>
                                        <th style="width:30% ;font-size: 1em; text-align:center">Fecha De Carga</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listaPrecio as $listaPrecios)
                                    @if ($listaPrecios->estado==1)
                                        <tr>
                                            <td style="font-size: 1em; text-align:center">{{ $listaPrecios->id }}</td>

											<td style="font-size: 1em; text-align:center">{{ str_replace(',', '.', $listaPrecios->elemento) }}</td>
											<td style="font-size: 1em; text-align:center">{{ $listaPrecios->ud }}</td>
											<td style="font-size: 1em; text-align:Justify">{{ $listaPrecios->descripcion }}</td>
											<td style="font-size: 1em; text-align:right" >{{ $listaPrecios->precio }} </td>
											<td style="font-size: 0.9em; text-align:center">{{ $listaPrecios->Fecha_de_carga }}</td>

                                        </tr>
                                        @endif
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
