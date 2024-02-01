@extends('layouts.app')


@section('content')
    <style>
        body {
            background-image: url('{{ asset('img/fondo.png') }}');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            /**/
        }

        .formulario {
            background: #f8f9facc;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(15, 15, 15, 0.568);
            color: rgb(18, 17, 17);
        }

        .form-control {

            border-style: none;
            transition: 0.5s ease-in;
            outline: none;
            box-shadow: none;
        }

        .form-control:focus {
            color: #212529;
            background-color: #fff;
            border-color: #86b7fe;
            outline: 0;
            box-shadow: 0 0 0 .25rem rgba(13, 110, 253, .25)
        }

        .form-control::placeholder {
            color: rgb(28, 27, 27);
        }

        .ingresar {
            background: #222A3F;
            padding: 10px;
            font-size: 16px;
            font-weight: 700 !important;
            color: white;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.568);
            transition: 0.5s ease-in;
        }

        .ingresar:hover {
            color: white;
        }

        .olvide {
            color: white;
            text-decoration-style: none;
            text-decoration-line: none;
        }

        .olvide:hover {
            color: white;
            text-decoration-style: none;
            text-decoration-line: none;
            cursor: pointer;
        }

        .olvide1 {
            color: white;
            text-decoration-style: none;
            text-decoration-line: none;
            font-size: 20px;
            font-weight: 700 !important;
            /* border: 2px solid white; */
            padding: 10px;
            border-radius: 10px;
            background: rgba(0, 0, 0, .5);
        }

        .olvide1:hover {
            color: white;
            text-decoration-style: none;
            text-decoration-line: none;
            cursor: pointer;
        }
    </style>
    <script>
        $(document).ready(function () {
            // Agregar controlador de eventos para la tecla Enter en los campos del formulario
            $('#login input').keypress(function (e) {
                if (e.which === 13) {
                    // Si se presiona Enter, activar el clic en el botón de inicio de sesión
                    $('#logear').click();
                }
            });

            $("#logear").click(function () {
                console.log('aaa');
                $("#loading2").show();

                let isValid = document.querySelector('#login').reportValidity();

                if (isValid == false) {
                    $('#login').addClass('was-validated');
                    $("#loading2").hide();
                } else {
                    var datosFormulario = new FormData($("#login")[0]);

                    fetch("{{str_replace('http://commonly-blessed-python.ngrok-free.app/','https://commonly-blessed-python.ngrok-free.app/', url('/auth/logear')) }}", {
                        method: 'POST',
                        body: datosFormulario
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data['ok'] == false) {
                            toastr.error(data['user']);
                        } else {
                            window.location.href = "{{ url('/home') }}";
                        }
                        $("#loading2").hide();
                    })
                    .catch(error => {
                        console.error('There was a problem with the fetch operation:', error);
                        $("#loading2").hide();
                    });
                }
            });
        });
    </script>



    <div class="container">
        <div class="row justify-content-center pt-5 mt-5 m-1">
            <div class="col-md-6 col-sm-8 col-xl-4 col-lg-5 formulario">

                <form method="POST" autocomplete="off" class="row g-3 needs-validation" novalidate id="login">
                @csrf
               <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
                    <div class="form-group text-center pt-3">
                        <img class="card-img-top" src="{{ asset('img/logo-blanco-bloque.png') }}" alt="Card image cap">
                    </div>
                    <div class="form-group mx-sm-4 pt-3">
                        <label></label>

                        <input id="email" type="text" class="form-control" name="username" value="" required
                            placeholder="Ingrese su usuario" />

                        <span class="invalid-feedback" role="alert">
                            el campo username es obligatorio
                        </span>

                    </div>
                    <div class="form-group mx-sm-4 pb-3">
                        <label></label>
                        <input id="password" type="password" class="form-control" name="password" required
                            autocomplete="current-password" placeholder="Ingrese su contraseña">

                        <span class="invalid-feedback" role="alert">
                            el campo password es obligatorio
                        </span>

                    </div>





                    <div class="form-group mx-sm-4 pb-2 text-center">
                        <button type="button" style="" class="btn btn-primary" id="logear">
                            <span class="spinner-border spinner-border-sm mr-2" style="display:none;text-align:center" id="loading2"></span>
                            Iniciar session
                        </button>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <!--<input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember"style="color: #178fd9;">
                                    {{ __('recordarme') }}
                                </label>-->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
