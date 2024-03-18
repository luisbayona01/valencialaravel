<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<link href="{{asset('css/toastr.min.css') }}" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="{{asset('js/toastr.min.js') }}"></script>
<div class="container">
<div  class="row">
<div class="col-sm-4">

</div> 
<div class="col-sm-4">
<button type="button" class="btn btn-info" onclick="certificar()">  validar  cerificar </button>
</div>
</div>
</div>

 @foreach ($idspartes as $parteid)

<input type="hidden"  name="parte_ids[]" value="{{$parteid}}">
@endforeach
@csrf



<iframe src="{{ $pdfUrl }}" width="100%" height="90%"></iframe>

<script>
function  certificar(){

var token = document.querySelector('input[name="_token"]').value;

// Crear un nuevo objeto FormData
var formData = new FormData();

// Obtener el valor de cada input hidden y agregarlo al formData
var parteIds = document.querySelectorAll('input[name="parte_ids[]"]');
parteIds.forEach(function(input) {
    formData.append(input.name, input.value);
});

// Agregar el token CSRF al formData
formData.append('_token', token);

// Crear una nueva solicitud AJAX
var xhr = new XMLHttpRequest();

// Configurar la solicitud AJAX
xhr.open('POST', '/certificarpartes');

// Configurar el evento para manejar la respuesta
xhr.onreadystatechange = function() {
    // Verificar si la solicitud se ha completado y la respuesta está lista
    if (xhr.readyState === XMLHttpRequest.DONE) {
        // Verificar si la respuesta es exitosa (código 200)
        if (xhr.status === 200) {
            // Convertir la respuesta JSON a un objeto JavaScript
            var respuesta = JSON.parse(xhr.responseText);
            // Imprimir la respuesta en la consola o donde desees
            console.log(respuesta);
             toastr.info(respuesta.respuesta)
        } else {
            // Si hay un error en la solicitud, imprimir el mensaje de error
            console.error('Error en la solicitud:', xhr.status);
        }
    }
};

// Enviar la solicitud AJAX con los datos del formData
xhr.send(formData);

}
</script>
