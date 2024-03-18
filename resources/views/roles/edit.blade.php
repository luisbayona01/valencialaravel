@extends('layouts.plantilla')

@section('template_title')
    {{ __('Update') }} Role
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} Perfil</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ str_replace('http://commonly-blessed-python.ngrok-free.app/','https://commonly-blessed-python.ngrok-free.app/', route('roles.update', $role->id)) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('roles.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
