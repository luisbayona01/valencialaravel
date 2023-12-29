@extends('layouts.app')

@section('template_title')
    {{ $tipoparte->name ?? "{{ __('Show') Tipoparte" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Tipoparte</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tipopartes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $tipoparte->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection