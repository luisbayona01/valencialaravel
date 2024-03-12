@extends('layouts.plantilla')

@section('template_title')
    {{ __('Crear') }} Usuarios
@endsection

@section('content')
<script>
$(document).ready(function () {


        var forms = document.querySelectorAll('#createUser');

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

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header" style="padding: 5% 5% 5% 5%">
                        <span class="card-title">{{ __('Crear') }} Usuarios</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{str_replace('http://commonly-blessed-python.ngrok-free.app/','https://commonly-blessed-python.ngrok-free.app/',  route('users.store')) }}"  role="form" enctype="multipart/form-data" id="createUser" class="needs-validation" novalidate>
                            @csrf

                            @include('user.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
