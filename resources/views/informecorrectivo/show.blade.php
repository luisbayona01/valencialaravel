@extends('layouts.app')

@section('template_title')
    {{ $informecorrectivo->name ?? "{{ __('Show') Informecorrectivo" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Informecorrectivo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('informecorrectivos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Codigo:</strong>
                            {{ $informecorrectivo->Codigo }}
                        </div>
                        <div class="form-group">
                            <strong>Concepto:</strong>
                            {{ $informecorrectivo->Concepto }}
                        </div>
                        <div class="form-group">
                            <strong>Uds En Garantia:</strong>
                            {{ $informecorrectivo->Uds_en_garantia }}
                        </div>
                        <div class="form-group">
                            <strong>Uds En Conservacion:</strong>
                            {{ $informecorrectivo->Uds_en_conservacion }}
                        </div>
                        <div class="form-group">
                            <strong>Dias En Conservacion:</strong>
                            {{ $informecorrectivo->Dias_en_conservacion }}
                        </div>
                        <div class="form-group">
                            <strong>Euros Por Dia:</strong>
                            {{ $informecorrectivo->Euros_por_dia }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $informecorrectivo->Total }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha De Carga:</strong>
                            {{ $informecorrectivo->Fecha_de_carga }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
