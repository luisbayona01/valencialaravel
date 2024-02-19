@extends('layouts.app')

@section('template_title')
    {{ $listaPrecios->name ?? "{{ __('Show') listaPrecios" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} listaPrecios</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('listaPrecios.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Codigo:</strong>
                            {{ $listaPrecios->elemento }}
                        </div>
                        <div class="form-group">
                            <strong>Concepto:</strong>
                            {{ $listaPrecios->ud }}
                        </div>
                        <div class="form-group">
                            <strong>Uds En Garantia:</strong>
                            {{ $listaPrecios->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Uds En Conservacion:</strong>
                            {{ $listaPrecios->precio }}
                        </div>

                        <div class="form-group">
                            <strong>Fecha De Carga:</strong>
                            {{ $listaPrecios->Fecha_de_carga }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
