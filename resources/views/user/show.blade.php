@extends('layouts.plantilla')

@section('template_title')

@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left" style="padding: 5% 5% 0% 3%">
                            <span class="card-title" style="font-weight: bold; color: black;">{{ __('Perfil') }} De Usuario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ url('/users') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body" style="padding: 0% 5% 5% 5%">

                        <div class="form-group">
                            <strong>Nombres:</strong>
                            {{ $user->nombres }}
                        </div>
                        <div class="form-group">
                            <strong>Apellidos:</strong>
                            {{ $user->apellidos }}
                        </div>
                       <div class="form-group">
                            <strong>Username:</strong>
                            {{ $user->username }}
                        </div>
                        <div class="form-group">
                            <strong>Codigo:</strong>
                            {{ $user->codigo }}
                        </div>
                        <div class="form-group d-none">
                            <strong>Contraseña:</strong>
                            {{ $user->password }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                        <div class="form-group">
                            <strong>Perfil:</strong>
                            {{ $user->rollname }}
                        </div>

                    </div>
                </div>
t55
            </div>
        </div>
    </section>
@endsection
