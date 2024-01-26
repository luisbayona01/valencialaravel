@extends('layouts.app')

@section('template_title')
    {{ $estadoparte->name ?? "{{ __('Show') Estadoparte" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Estadoparte</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('estadopartes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Estadoparte:</strong>
                            {{ $estadoparte->estadoparte }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
