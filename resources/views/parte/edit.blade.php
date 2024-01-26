<!-- FORM DEL FRONT EDIT -->

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
                    console.log('iditem', item.idelementos_parte);
                    let rows = `<tr>
                        <td style="text-align: center;">${item.elemento}</td>
                        <td>${item.descripcion}</td>
                        <td style="text-align: right;">${item.precioU} € </td>
                        <td style="text-align: right;">${item.cantidad} </td>
                        <td style="text-align: right;">${item.precio_total.toFixed(2)} € </td>
                        <td style="text-align: center;">
                            <form action="{{ route('partes.destroy', $parte->id) }}" method="POST">
                                <a style="text-align: center; margin-right: 10px; font-size: 1.3em; " type="button" class="b" id="selecione">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true">
                                        <input type="hidden" class="idelementoP" value='${item.idelementos_parte}'>
                                    </i>
                                </a>
                                @csrf
                                <a style="text-align: center; margin-right: 10px; font-size: 1.3em; " type="button" class="b" id="selecione">
                                    <i class="fa fa-trash" aria-hidden="true">
                                        <input type="hidden" class="idelementoP" value='${item.idelementos_parte}'>
                                    </i>
                                </a>
                            </form>
                        </td>
                    </tr>`;

                    // Agregar la fila a la tabla
                    $(".contenidoElements").append(rows);
                });

                // Calcular la suma de la columna "Total" después de agregar todas las filas
                var totalImportes = 0;
                $('.contenidoElements tr').each(function () {
                    var totalColumn = parseFloat($(this).find('td:eq(4)').text().replace('€', '').trim());
                    if (!isNaN(totalColumn)) {
                        totalImportes += totalColumn;
                    }
                });

                // Mostrar el resultado en el label
                $('#totalImportes').text(totalImportes.toFixed(2) + ' €');
                // Asignar la suma total a una variable global
                //sumaTotalGlobal = sumaTotal;
            } else {
                // No hay datos o los datos están vacíos
                console.log('La respuesta de la API no contiene datos.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });

}

// Llamar a la función después de cargar la página o en el momento apropiado
lisdataelements();

// Puedes utilizar la variable sumaTotalGlobal en otras partes de tu código
// Por ejemplo, si tienes otra función que necesita este valor
/*function otraFuncionQueUsaLaSumaTotal() {
    console.log('La suma total es:', sumaTotalGlobal);
}*/


function listevidencias() {

const hostname = window.location.hostname;

// Obtener el puerto (si es diferente de 80, que es el puerto predeterminado para HTTP)
const port = window.location.port !== '' ? ':' + window.location.port : '';

// Crear la URL completa con el hostname y el puerto
const urlCompleta =  hostname + port;

//console.log(urlCompleta);
            var idParte = {{ $parte->id }};
            fetch(`/api/partes/listevidencias/${idParte}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    // Validar que data exista y no esté vacío
                    if (data && Object.keys(data).length > 0) {
                   //console.log(data);

      const evidencias = data.evidencias;
const imageListContainer = document.getElementById('imageListContainer');
const imageList = document.getElementById('imageList');
imageList.innerHTML=''
evidencias.forEach(evidencia => {
    const imgElement = document.createElement('img');


    const listItem = document.createElement('div');
    listItem.appendChild(imgElement);

    imageList.appendChild(listItem);

    var imageURL = '/storage/' + evidencia.file;  // Utiliza la URL proporcionada en evidencia.file
    // Crear miniatura de la imagen
    var thumbnail = document.createElement("div");
            thumbnail.style.width = "100px"; // Ancho de la miniatura
            thumbnail.style.height = "100px"; // Altura de la miniatura
            thumbnail.style.backgroundImage = "url('" + imageURL + "')";
            thumbnail.style.backgroundSize = "cover";
            thumbnail.style.margin = "5px"; // Espaciado entre miniaturas
            thumbnail.style.cursor = "pointer";
            thumbnail.onclick = function () {
                // Mostrar la imagen grande al hacer clic en la miniatura
                window.open(imageURL, "_blank");
            };

            // Agregar la miniatura a la lista de imágenes
            imageList.appendChild(thumbnail);
});

                       }else {
                        // No hay datos o los datos están vacíos
                        // No hay datos o los datos están vacíos
                        console.log('La respuesta de la API no contiene datos.');
                     }
                })
                .catch(error => {
                    console.error('Error:', error);
                });

        }

        function limpiarCampos() {
    // Limpiar los campos del container
    $("#codigo").val('');
    $("#descripcionelementos").val('');
    $("#precio").val('');
    $("#cantidad").val('');
    // Otros campos que desees limpiar
}

   //document.getElementById('formFileSm').addEventListener('change', handleFileSelect);
   //document.getElementById('formFileSm').addEventListener('change', handleFileSelect);

            function handleFileSelect(event) {
                const files = event.files;
                const imageListContainer = document.getElementById('imageListContainer');
                const imageList = document.getElementById('imageList');

                if (files.length > 0 && files[0].type.startsWith('image/') && imageList.childNodes.length === 0) {
                    imageListContainer.style.height = 'auto'; // Auto-expand height if it's the first image
                }
                  const formData = new FormData();
                for (const file of files) {
                    // Check file type and size
                    if (file.type.startsWith('image/') && /\.(jpe?g|png)$/i.test(file.name) && file.size <= 2 * 1024 * 1024) {

                        formData.append('file[]', file);


                       /*const imgElement = document.createElement('img');
                        imgElement.src = URL.createObjectURL(file);
                        imgElement.alt = file.name;
                        imgElement.style.width = '100%';

                        const listItem = document.createElement('div');
                        listItem.appendChild(imgElement);

                        imageList.appendChild(listItem);*/
                    } else {
                        alert('Invalid file: ' + file.name);
                    }
                }
                    let  parteid = document.getElementById('idparte');

                    // Obtener el texto dentro del elemento
                    let  idparte = parteid.innerText || parteid.textContent;
                    formData.append('parteevidencia_id',idparte );
                        // Realizar la solicitud usando fetch
                fetch('/api/partes/evidencias', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.json()) // Suponiendo que el servidor responde con JSON
                .then(data => {
                    // Manejar la respuesta del servidor
                    //console.log(data);
     toastr.success(data["message"]);
  listevidencias();
    $("#formFileSm").val('');
                })
                .catch(error => {
                    // Manejar errores
                    console.error('Error:', error);
                });


            }
        // Espera a que el DOM esté listo
        $(document).ready(function() {
           /* $("#fechaautorizacion").datetimepicker({
                "allowInputToggle": true,
                "showClose": true,
                "showClear": true,
                "showTodayButton": true,
                "format": "YYYY/MM/DD HH:mm:ss",

            });*/
            $("#showE").click(function() {
                $("#elementos").removeClass('d-none')
            })
            lisdataelements()
            listevidencias();
            $(document).on('click', '.fa-trash', function() {
                // Find the closest <tr> element and remove it
                $(this).closest('tr').remove();
            });
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
                        limpiarCampos(); // Llama a la función para limpiar los campos
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

        $(document).on('click', '.fa-pencil-square-o', function() {

            var $row = $(this).closest('tr');

            // Get the current quantity and total values
            var currentQuantity = $row.find('td:eq(3)').text();
            var currentTotal = $row.find('td:eq(4)').text();

            // Prompt the user to enter a new quantity
            var newQuantity = prompt('Ingrese nueva cantidad:', currentQuantity);

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
                ajaxactulizar(newQuantity, idelementosParte, newTotal);
            }
        });


        function ajaxactulizar(cantidad, id, precio_total) {

            const url = '/api/partes/updateElement';

            // Crea una instancia de FormData y agrega tus datos
            const postData = new FormData();
            postData.append('id', id);
            postData.append('cantidad', cantidad);
            postData.append('precio_total', precio_total);

            // Usa el método fetch para hacer la solicitud
            fetch(url, {
                    method: 'POST',
                    body: postData, // Pasa la instancia de FormData como cuerpo de la solicitud
                })
                .then(response => response.json())
                .then(data => {
                    toastr.success(data['menssage'])
                    //console.log('Respuesta del servidor:', data);
                    //lisdataelements();

                })
                .catch(error => {
                    console.error('Error al enviar la solicitud:', error);
                });
                lisdataelements();
        }


        // Codigo para eliminar  ...


        $(document).on('click', '.fa-trash', function() {
            var $row = $(this).closest('tr');
            var idelementosParte = $row.find('.idelementoP').val();
            console.log('eliminar', idelementosParte)
            const formData = new FormData;
            formData.append("id", idelementosParte)

            // Prompt the user for confirmation before deleting
            if (confirm('¿Estas seguro de eliminar este elemento?')) {
                // Perform AJAX request to delete the row from the database

                fetch('/api/partes/destroy/', {
                        method: 'POST',
                        body: formData, // Pasa la instancia de FormData como cuerpo de la solicitud
                    })
                    .then(response => response.json())
                    .then(data => {
                        toastr.success(data['menssage'])
                        //console.log('Respuesta del servidor:', data);
                        //lisdataelements();
                    })
                    .catch(error => {
                        console.error('Error al enviar la solicitud:', error);
                    });

            }



        });



        // ...
    </script>


    <section class="content container-fluid">
        <div class="">
            <div class="col-lg-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span style="font-size: 1.5em" class="card-title">{{ __('Seguimiento') }} Parte</span><br><br>

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
