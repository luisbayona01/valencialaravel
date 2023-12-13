@extends('layouts.plantilla')

@section('template_title')
    {{ __('Create') }} Parte
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


        var forms = document.querySelectorAll('#createParte ');

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

    @includeif('partials.errors')

    <!-- Inicia el div con la clase "card card-default" -->
    <div class="card card-default">

        <!-- Inicia el div con la clase "card-header" -->
        <div class="card-header">
            <span class="card-title">{{ __('Creacion') }} De  Partes</span>
                       <div>
                            <img src="{{asset('img/icono_representativo_caratula.png')}}" class="card-img-top" style="width: 30rem;">
                        </div>
        </div>
        <!-- Termina el div con la clase "card-header" -->

        <!-- Inicia el div con la clase "card-body" -->
        <div class="card-body">
            <form method="POST" action="{{str_replace('http://commonly-blessed-python.ngrok-free.app/','https://commonly-blessed-python.ngrok-free.app/', route('partes.store') )}}" role="form" enctype="multipart/form-data"  id="createParte" class="needs-validation" novalidate>
                @csrf

                @include('parte.form')

            </form>
        </div>
        <!-- Termina el div con la clase "card-body" -->

    </div>
    <!-- Termina el div con la clase "card card-default" -->

</section>

@endsection
