@extends('layouts.plantilla')

@section('template_title')
    {{ __('Create') }} Informe correctivo
@endsection

@section('content')

<style>
	.btn-file {
		position: relative;
		overflow: hidden;
	}
	.btn-file input[type=file] {
		position: absolute;
		top: 0;
		right: 0;
		min-width: 100%;
		min-height: 100%;
		font-size: 100px;
		text-align: right;
		filter: alpha(opacity=0);
		opacity: 0;
		outline: none;
		background: white;
		cursor: inherit;
		display: block;
	}
</style>

<script>
function validarArchivo(input) {
    $("#error").addClass('-d-none');
    $("#exitoso").addClass('-d-none');
    let archivo = input.files[0];
    let extensionPermitida = ["xlt"," xls", "xlsx", "csv"];
    let extension = archivo.name.split(".").pop().toLowerCase();

    if (extensionPermitida.indexOf(extension) === -1) {
 toastr.warning("El archivo seleccionado no tiene una extensión válida !!")
/*Swal.fire({
            title: ,
            icon: "error",
            showDenyButton: false,
            showCancelButton: false,
            confirmButtonText: "Ok",
        });*/

        input.value = "";
    } else {

        let nombreArchivo = archivo ? archivo.name : "";
        $(".namearchivo").val(nombreArchivo);
    }
}

$(document).ready(function(){
$(".envio-masivo").click(function() {
  console.log('aaaa');
    var archivoInput = document.getElementById("localizaciones");
    //console.log(archivoInput);
    // console.log(archivoInput.files[0])
    var archivo = archivoInput.files[0];
    //console.log(archivo);
    if (archivo) {
//console.log()  ;
//return false;
        $("#loadingM").removeClass('d-none');
        var formData = new FormData();
        formData.append("xlt_file", archivo);
formData.append("_token", document.getElementsByName("_token")[0].value);
        //masivoloacalizacion
        fetch(`{{ route('informecorrectivos.store') }}`, {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
              //console.log(data)
   if (data['ok']){
toastr.success(data['menssage'])
 $("#loadingM").addClass('d-none');
window.location.href='/informecorrectivos/'

  }
            })
            .catch(error => {
                console.error("Error:", error);
            });
    }


    //$("#error").fafadeOut(1000);
    // $("#exitoso").fafadeOut(1000);
})


})
</script>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Cargar') }} Informe correctivo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('informecorrectivo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
