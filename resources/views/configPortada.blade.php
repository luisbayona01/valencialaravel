<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <style>
        @page {
            size: oficio;
            margin: 1cm;
        }

        table {

            color: #212529;
            border-style: solid;
            border-color: #000000;
            /*font-size: 2em;*/
            font-family: Arial, Helvetica, sans-serif;
        }

        tr,
        td,
        th {
            border-color: inherit;
            border-style: solid;
            border-color: #dee2e6;
        }

        .tables {
            border-collapse: collapse;
            width: 100%;
        }

        .tables th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        .ocultar-bordes {
            border-collapse: collapse;
            border: none;
        }

        /* Opcional: Estilo para ocultar los bordes de las celdas */
        .ocultar-bordes td, .ocultar-bordes th,.ocultar-bordes tr  {
            border: none;
        }

        .preview-image {
                max-width: 100%;
                max-height: 200px;
                margin-top: 0px;
        }

        .btnConfig {
                padding: 10px 20px;
                background-color: #081e9b;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
        }
        .btnConfig:hover {
                background-color: #0b2dee;
        }
        .btnConfig:active {
                background-color: #152bac;
        }

        .btnback {
                padding: 10px 20px;
                background-color: #c44141;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
        }
        .btnback:hover {
                background-color: #b31010;
        }
        .btnback:active {
                background-color: #ec2424;
        }


    </style>


    <title></title>

</head>

<body class="antialiased">

    <form action="" method="POST" role="form">
    <!-- Seccion del Encabezado del Formulario -->

    <div>
        <table class="border table-bordered" width="95%" style="margin: auto" >
            <thead >
                <tr>
                    <td rowspan="2" style="width: 60%; text-align:center">
                        <img id="preview" src="{{asset('img/cargarImagen.png')}}" width="80%" height="50">
                        <input type="file" accept="image/*" id="ImgPortada">
                    </td>
                    <td width='40%' colspan="3" style="text-align:center "><input type="text" inputmode="numeric" pattern="[0-9]*" placeholder="No" id="noCertificado" style="width: 30px; text-align:center"> / <input type="text" placeholder="Año" id="añoCertificado"></td>
                </tr>
                <tr>
                    <td width='40%' colspan="3" style="text-align:center "><strong>Mes de <input type="text" placeholder="Mes" id="mesVigente"> de <input type="text" placeholder="Año" id="AñoVigente"> </strong></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td rowspan="2" style="text-align:justify;font-size: 12px;"> <strong>OBRA:</strong> <input type="text" style="width: 80%" placeholder="Razon de la Obra" id="obra"> </td>
                    <td width='50%' rowspan="2" colspan="3" style="text-align:left; font-size: 12px;">CONTRATISTA: <input type="text" placeholder="Nombre del contratista" id="contratista">
                        <br><input type="text" placeholder="Contacto" id="contactoContratista">
                        <br><input type="text" placeholder="Ubicacion" id="ubicacion"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        const ImgPortada = document.getElementById('ImgPortada');
        const preview = document.getElementById('preview');

        ImgPortada.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    preview.src = reader.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>

    <!-- Seccion del Encabezado del Formulario -->


    <!-- Segunda Seccion del Formulario -->

    <table class="table table-bordered" width="95%" style="margin: auto" >
        <tr>
            <td colspan="3" style="text-align:center ">Aplicación presupuestaria LJ 160/13300/21000</td>
        </tr>
        <tr >
            <td style="text-align:left; font-size: 0.7em" colspan="2" ><strong>Inicio contrato:
                <input type="date" id="fechaInicioContrato" onchange="mostrarFechaSeleccionada()">
                <input type="text" id="fecha_mostrada" readonly>
            </strong></td>
            <td style="text-align:justify; font-size: 0.7em;"><strong>Plazo de ejecución: <input type="text" placeholder="Años" id="plazoejecucion"> años</strong>
                <br>Fecha de la escritura de contrata</td>
        </tr>

        <tr>
            <td width='30%' style="text-align:center;font-size: 0.8em;">PRESUPUESTOS APROBADOS</td>
            <td width='30%' style="text-align:center; font-size: 0.8em;">IMPORTE</td>
            <td width='30%' style="text-align:center;font-size: 0.8em;">
                FECHA DE APROBACIÓN</td>

        </tr>
        <tr>
            <td style="text-align:center ">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td style="text-align:center ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td style="text-align:center ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

        </tr>
    </table>

    <script>
        function mostrarFechaSeleccionada() {
        var inputFecha = document.getElementById("fechaInicioContrato");
        var fechaSeleccionada = new Date(inputFecha.value);

        var diasSemana = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
        var diaSemana = diasSemana[fechaSeleccionada.getDay()];
        var dia = ("0" + fechaSeleccionada.getDate()).slice(-2); // Agregar ceros iniciales si es necesario
        var mes = fechaSeleccionada.toLocaleString('default', { month: 'long' }); // Obtener el nombre del mes
        var anio = fechaSeleccionada.getFullYear();

        var resultado = diaSemana + ", " + dia + " de " + mes + " de " + anio;

        document.getElementById("fecha_mostrada").value = resultado;
    }

    function mostrarFechaSeleccionada2() {
        var inputFecha = document.getElementById("fechaAdjudicacion");
        var fechaSeleccionada = new Date(inputFecha.value);

        var diasSemana = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
        var diaSemana = diasSemana[fechaSeleccionada.getDay()];
        var dia = ("0" + fechaSeleccionada.getDate()).slice(-2); // Agregar ceros iniciales si es necesario
        var mes = fechaSeleccionada.toLocaleString('default', { month: 'long' }); // Obtener el nombre del mes
        var anio = fechaSeleccionada.getFullYear();

        var resultado = diaSemana + ", " + dia + " de " + mes + " de " + anio;

        document.getElementById("fecha_mostrada2").value = resultado;
    }

    </script>

    <table class='table table-bordered' style="width: 95%; margin:auto" >
        <tr>
            <td style="text-align: center; width:50% ">
                <p style="text-align: left; font-size: 0.8em ">Baja obtenida en la subasta o concurso:</p>
                <p style="text-align: center ; font-size: 0.9em "><input type="text" placeholder="21,90%" readonly> </p>
            </td>
            <td style="text-align: left; width:50%; font-size: 0.8em ; ">
                <p>Fecha de la adjudicación:
                <input type="date" id="fechaAdjudicacion" onchange="mostrarFechaSeleccionada2()">
                <input type="text" id="fecha_mostrada2" readonly>
                </p>
                <p>Fecha de la escritura de contrata:</p>
            </td>
        </tr>

    </table>
    <!-- Segunda Seccion del Formulario -->

    <!-- Tercera Seccion del Formulario -->
    <table class='table table-bordered' border="1" style="width: 95%; margin:auto">
        <tr>
            <td colspan="3" style="  width=100%; height-max: 10px ;text-align: justify; ">
                <p style="font-size: 0.7em;">CERTIFICO: Que las obras ejecutadas en el expresado mes por el Contratista,
                    a los precios del presupuesto, importan lo siguiente:</p>
            </td>
        </tr>
    </table>

    <table class='table table-bordered' style="width: 95%; margin:auto">
        <tr>
            <td style="width: 20%; text-align: center;font-size: 0.7em; "rowspan="2">
                PRESUPUESTO
            </td>
            <td style="width: 20%; text-align: center;font-size: 0.7em; "rowspan="2">
                CANTIDAD LÍQUIDA DEL REMATE
            </td>
            <td style="text-align: center;font-size: 0.8em;" colspan="3">
                IMPORTE DE LAS OBRAS
            </td>
        </tr>
        <tr>
            <td style="width:20%; text-align:center; font-size: 0.6em;">
                EJECUTADAS Y CORRESPONDIENTES A ESTA CERTIFICACIÓN
            </td>
            <td style="width:20%; text-align: center;font-size: 0.6em; ">
                EJECUTADAS Y CORRESPONDIENTES A CERT. ANTERIORES
            </td>
            <td style="width:20%; text-align: center;font-size: 0.6em;">
                QUE FALTAN EJECUTAR
            </td>
        </tr>
        <tr>
            <td> </td>
            <td> </td>
            <td style="width:20%; text-align: center; font-size: 0.7em;"><input type="text" placeholder="Euros" style="text-align: right"></td>
            <td style="width:20%; text-align: center; font-size: 0.7em;"><input type="text" placeholder="Euros" style="text-align: right"></td>
            <td></td>
        </tr>
    </table>
    <!-- Tercera Seccion del Formulario -->
    <!-- class='ocultar-bordes' -->
    <table style='font-size:0.7em; width: 95%; margin:auto' border="1">
        <tr>
            <td style="width: 40%; border:none">Ejecución material de las obras </td> <td style='text-align: left; border:none; width:60%'></td>
        </tr>
        <tr>
            <td style="border:none">Valor por Revisión de Precios </td> <td style="text-align: left ; border:none">0,00 Euros</td>
        </tr>
        <tr>
            <td style="border:none">TOTAL REVISADO </td> <td style="text-align: left; border:none"></td>
        </tr>
        <tr>
            <td style="border:none">Baja Obtenida </td><td style="text-align: left; border:none"><input type="text" placeholder="Baja Obtenida 0 %" style="text-align: right" id="bajaobtenida"> %</td>
        </tr>
        <tr>
            <td style="border:none"><strong>DIFERENCIA </strong></td> <td style="text-align: right; border:none"></td>
        </tr>
        <tr>
            <td style="border:none">Gastos Generales </td><td style="text-align: left; border:none"><input type="text" placeholder="Gastos Generales 0 %" style="text-align: right" id="gastosgenerales"> %</td>
        </tr>
        <tr>
            <td style="border:none">Beneficio Industrial</td> <td style="text-align: left; border:none"><input type="text" placeholder="Beneficio Industrial 0 %" style="text-align: right" id="beneficioind"> %</td>
        </tr>
        <tr>
            <td style="border:none">SUMA </td> <td style="text-align: left; border:none"> </td>
        </tr>
        <tr>
            <td style="border:none">ABONO POR PENALIDAD REFERENTE AL ART. 27.2 </td> <td style="text-align: left; border:none"></td>
        </tr>
        <tr>
            <td style="border:none">SUMA </td> <td style="text-align: left; border:none"></td>
        </tr>

        <tr>
            <td style="border:none">I.V.A </td> <td style="text-align: rileftght; border:none"><input type="text" placeholder="I. V. A 0 %" style="text-align: right" id="iva"> %</td>
        </tr>
        <tr>
            <td style="border:none">LIQUIDO A PERCIBIR EL CONTRATISTA </td> <td style="text-align: left; border:none"></td>
        </tr>
    </table>
    <br>
    <p style="text-align: justify; font-size: 0.9em"></p>

    <div style="text-align: center">
        <button type="button" onclick="goBack()" class="btn btn-secondary btnback" style="text-align: right;">Volver</button>

        <button type="button" class="btn btn-primary btnConfig" style="text-align: right;">Guardar Configuración</button>
    </div>

    {{ Form::close() }}

    <script>
        // JavaScript function to go back to the previous page
        function goBack() {
        window.history.back();
        }
    </script>

    </form>

</body>

</html>
