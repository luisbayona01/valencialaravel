@extends('layouts.app')

@section('template_title')
    {{ $localizacion->name ?? "{{ __('Show') Localizacion" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Localizacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('localizacions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cod Localizacion:</strong>
                            {{ $localizacion->cod_localizacion }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $localizacion->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Zona:</strong>
                            {{ $localizacion->zona }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
