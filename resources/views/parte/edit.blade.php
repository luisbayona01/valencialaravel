@extends('layouts.plantilla')

@section('template_title')
    {{ __('Update') }} Parte
@endsection

@section('content')
    <script>
        function descEl(element) {
            let textcadena = element.options[element.selectedIndex].text;
            let partes = textcadena.split('-');
            let descripcion = partes[0];
            let codigo = partes[1];
            let precio = partes[2];
            $("#codigo").val('')
            $("#codigo").val(codigo);
            $("#precio").val('')
            $("#precio").val(precio)


        }

        function lisdataelements() {
            var idParte = {{ $parte->id }};
            fetch(`/api/partes/elementos/${idParte}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    // Validar que data exista y no esté vacío
                    if (data && Object.keys(data).length > 0) {
                        $(".contenido").removeClass("d-none");
                        $(".contenidoElements").html("");
                        data.forEach(item => {
                           
                            let rows = `<tr>
                    <td>${item.elemento}</td>
                    <td>${item.descripcion}</td>
                    <td>${item.precioU}€</td>
                    <td>${item.cantidad}Unid</td>
                    <td>${item.precio_total}€</td>
                </tr>`;
                            $(".contenidoElements").append(rows)
                        });
                        // Hacer algo con los datos recibidos
                        //console.log('Datos de la API:', data);
                    } else {
                        // No hay datos o los datos están vacíos
                        console.log('La respuesta de la API no contiene datos.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });

        }

        // Espera a que el DOM esté listo
        $(document).ready(function() {
          $("#showE").click(function(){
            $("#elementos").removeClass('d-none')
              })
            lisdataelements();
            $("#selecione").click(function() {

                if ($("#codigo").val() == '') {
                    toastr.error("el campo codigo es obligatorio");
                    return false;
                }
                if ($("#descripcionelementos").val() == '') {
                    toastr.error("el campo descripcion es obligatorio");
                    return false;
                }
                if ($("#precio").val() == '') {
                    toastr.error("el campo precio es obligatorio");
                    return false;
                }
                if ($("#cantidad").val() == '') {
                    toastr.error("el campo cantidad es obligatorio");
                    return false;
                }

                $(".contenido").removeClass("d-none");
                let element = document.getElementById(
                    "descripcionelementos");
                let textcadena = element.options[element.selectedIndex].text;
                let partes = textcadena.split('-');
                let precio = partes[2];
                let cantidad = parseInt($("#cantidad").val());
                precio = parseFloat(precio.replace(',', '.'))
                let idparte = {{ $parte->id }};
                let total = precio * cantidad;
                let idelemento = element.value;

                let formData = new FormData();
                formData.append('cantidad', cantidad);
                //formData.append('precio', precio);
                formData.append('idparte', idparte);
                formData.append('idelemento', idelemento);
                formData.append('total', total);
                fetch('/api/partes/addelement', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        //console.log('Respuesta del servidor:', data);
                        toastr.success(data['menssage'])
                        lisdataelements();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });


            });

            var forms = document.querySelectorAll('#UpdateParte');

            forms.forEach(function(form) {
                form.addEventListener('submit', function(event) {
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
                        <span class="card-title">{{ __('Seguimiento') }} Parte</span>

                        <div>
                            <img src="{{ asset('img/icono_representativo_caratula.png') }}" class="card-img-top"
                                style="width: 30rem;">
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST"
                            action="{{ str_replace('http://commonly-blessed-python.ngrok-free.app/', 'https://commonly-blessed-python.ngrok-free.app/', route('partes.update', $parte->id)) }}"
                            role="form" enctype="multipart/form-data" id="UpdateParte" class="needs-validation"
                            novalidate>
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('parte.formEdit')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
