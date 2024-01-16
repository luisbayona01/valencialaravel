@extends('layouts.app')

@section('template_title')
    {{ $parte->name ?? "{{ __('Show') Parte" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Parte</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('partes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Id Localizacion:</strong>
                            {{ $parte->id_localizacion }}
                        </div>
                        <div class="form-group">
                            <strong>Idtipoparte:</strong>
                            {{ $parte->idtipoparte }}
                        </div>
                        <div class="form-group">
                            <strong>Creadopor:</strong>
                            {{ $parte->creadopor }}
                        </div>
                        <div class="form-group">
                            <strong>Fechacreacion:</strong>
                            {{ $parte->fechacreacion }}
                        </div>
                        <div class="form-group">
                            <strong>Reportadopor:</strong>
                            {{ $parte->reportadoPor }}
                        </div>
                        <div class="form-group">
                            <strong>Fechareporte:</strong>
                            {{ $parte->fechareporte }}
                        </div>
                        <div class="form-group">
                            <strong>Obscreadorparte:</strong>
                            {{ $parte->obscreadorparte }}
                        </div>
                        <div class="form-group">
                            <strong>Asignadoa:</strong>
                            {{ $parte->asignadoA }}
                        </div>
                        <div class="form-group">
                            <strong>Fechaasignacion:</strong>
                            {{ $parte->fechaAsignacion }}
                        </div>
                        <div class="form-group">
                            <strong>Obsoperador:</strong>
                            {{ $parte->obsOperador }}
                        </div>
                        <div class="form-group">
                            <strong>Validado Por:</strong>
                            {{ $parte->validado_por }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Validacion:</strong>
                            {{ $parte->fecha_validacion }}
                        </div>
                        <div class="form-group">
                            <strong>Obscliente:</strong>
                            {{ $parte->obscliente }}
                        </div>
                        <div class="form-group">
                            <strong>Estadoparte Id:</strong>
                            {{ $parte->estadoparte_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
