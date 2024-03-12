@extends('layouts.app')

@section('template_title')
    {{ $penalidades->name ?? "{{ __('Show') Penalidades" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Penalidade</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('penalidades.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Idpenalidad:</strong>
                            {{ $penalidades->idpenalidad }}
                        </div>
                        <div class="form-group">
                            <strong>Fechacreacion:</strong>
                            {{ $penalidades->fechaCreacion }}
                        </div>
                        <div class="form-group">
                            <strong>Creadopor:</strong>
                            {{ $penalidades->creadoPor }}
                        </div>
                        <div class="form-group">
                            <strong>Obscreacion:</strong>
                            {{ $penalidades->obsCreacion }}
                        </div>
                        <div class="form-group">
                            <strong>Valorpenalidad:</strong>
                            {{ $penalidades->valorPenalidad4 }}
                        </div>
                        <div class="form-group">
                            <strong>Estadopenalidad Id:</strong>
                            {{ $penalidades->estadopenalidad_Id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
