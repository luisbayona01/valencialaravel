@extends('layouts.plantilla')

@section('template_title')
    {{ __('Update') }} Parte
@endsection

@section('content')

<script>
    // Espera a que el DOM esté listo
    $(document).ready(function () {

$('#fechareporte').datetimepicker({
            "allowInputToggle": true,
            "showClose": true,
            "showClear": true,
            "showTodayButton": true,
            "format": "YYYY/MM/DD HH:mm:ss",

        });

$("#fechaAsignacion").datetimepicker({
            "allowInputToggle": true,
            "showClose": true,
            "showClear": true,
            "showTodayButton": true,
            "format": "YYYY/MM/DD HH:mm:ss",

        });


        var forms = document.querySelectorAll('#UpdateParte ');

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
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Parte</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{str_replace('http://commonly-blessed-python.ngrok-free.app/','https://commonly-blessed-python.ngrok-free.app/', route('partes.update', $parte->id)) }}"   role="form" enctype="multipart/form-data" id="UpdateParte" class="needs-validation" novalidate>
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('parte.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
