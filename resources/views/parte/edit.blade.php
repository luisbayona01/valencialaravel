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
<<<<<<< HEAD
                          console.log('iditem',item.idelementos_parte);
                            let rows = `<tr>
                    <td style="text-align: center;">${item.elemento}</td>
                    <td>${item.descripcion}</td>
                    <td style="text-align: right;">${item.precioU} € </td>
                    <td style="text-align: right;">${item.cantidad} </td>
                    <td style="text-align: right;">${item.precio_total} € </td>
                    <td style="text-align: center;">
                      <a style="text-align: center; margin-right: 10px; font-size: 1.3em; " type="button" class="b" id="selecione">
                      <i class="fa fa-pencil-square-o" aria-hidden="true">
                     <input type="hidden" class="idelementoP" value='${item.idelementos_parte}'> 

                      </i></a>
                      <a style="text-align: center; margin-left: 10px; font-size: 1.3em; " type="button" class="b" id="selecione"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
=======
                           
                            let rows = `<tr>
                    <td>${item.elemento}</td>
                    <td>${item.descripcion}</td>
                    <td>${item.precioU}€</td>
                    <td>${item.cantidad}Unid</td>
                    <td>${item.precio_total}€</td>
>>>>>>> dbf8a5172a9079112eb3e19a6b645406ce16241c
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

<<<<<<< HEAD
    
=======
>>>>>>> dbf8a5172a9079112eb3e19a6b645406ce16241c
        // Espera a que el DOM esté listo
        $(document).ready(function() {
          $("#showE").click(function(){
            $("#elementos").removeClass('d-none')
              })
            lisdataelements();
<<<<<<< HEAD
             $(document).on('click', '.fa-trash', function() {
                // Find the closest <tr> element and remove it
                $(this).closest('tr').remove();
            });
=======
>>>>>>> dbf8a5172a9079112eb3e19a6b645406ce16241c
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
<<<<<<< HEAD

$(document).on('click', '.fa-pencil-square-o', function() {
   

var $row = $(this).closest('tr');
  
    // Get the current quantity and total values
    var currentQuantity = $row.find('td:eq(3)').text();
    var currentTotal = $row.find('td:eq(4)').text();

    // Prompt the user to enter a new quantity
    var newQuantity = prompt('Enter new quantity:', currentQuantity);

    // Validate if the user entered a valid number
    if (newQuantity !== null && !isNaN(newQuantity) && newQuantity !== '') {
        // Update the quantity in the table
        $row.find('td:eq(3)').text(newQuantity);
       var idelementosParte = $row.find('.idelementoP').val();
    
    console.log('idelementosParte:', idelementosParte);
        // Calculate the new total and update the total column
        var pricePerUnit = parseFloat(currentTotal) / parseInt(currentQuantity);
        var newTotal = pricePerUnit * parseInt(newQuantity);
        $row.find('td:eq(4)').text(newTotal.toFixed(2) + ' €');
         //console.log('iddel  clivk',newQuantity);
      //console.log('newtotal',newTotal);
     ajaxactulizar(newQuantity,idelementosParte,newTotal);
}




});


 function  ajaxactulizar(cantidad,id,precio_total){
  
const url = '/api/partes/updateElement';

// Crea una instancia de FormData y agrega tus datos
const postData = new FormData();
postData.append('id', id);
postData.append('cantidad', cantidad);
postData.append('precio_total', precio_total);

// Usa el método fetch para hacer la solicitud
fetch(url, {
  method: 'POST',
  body: postData,  // Pasa la instancia de FormData como cuerpo de la solicitud
})
  .then(response => response.json())
  .then(data => {
    console.log('Respuesta del servidor:', data);
  })
  .catch(error => {
    console.error('Error al enviar la solicitud:', error);
  });




 }
 
   
 


// ...

// In your Laravel routes or controller, you need to handle the DELETE request to delete the record



=======
>>>>>>> dbf8a5172a9079112eb3e19a6b645406ce16241c
    </script>
    <section class="content container-fluid">
        <div class="">
            <div class="col-lg-12">

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
<<<<<<< HEAD


=======
>>>>>>> dbf8a5172a9079112eb3e19a6b645406ce16241c

                        </form>
                            

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
