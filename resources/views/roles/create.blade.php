@extends('layouts.plantilla')

@section('template_title')
    {{ __('Nuevo') }} Role
@endsection

<script>
    // Espera a que el DOM esté listo
    $(document).ready(function () {




        var forms = document.querySelectorAll('#CreateRol');

        forms.forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);
        });
    });
</script>


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Nuevo') }} Rol</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{str_replace('http://commonly-blessed-python.ngrok-free.app/','https://commonly-blessed-python.ngrok-free.app/', route('roles.store')) }}"  role="form" enctype="multipart/form-data" id="CreateRol" class="needs-validation" novalidate>
                            @csrf

                            @include('roles.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
