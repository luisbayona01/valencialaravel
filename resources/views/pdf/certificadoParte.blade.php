<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        table {
            border-collapse: collapse;
            width: 90%;
            height: 90%;
            margin: auto;
            font-size: 1em;
        }

        thead tr:first-child th {
            border-bottom: 2px solid black;
        }



    </style>

</head>
<body>
    <!-- PRIMERA PAGINA ENCABEZADO -->

    <table align="center" style="width: 100%; height:100%; ">

        <!-- Encabezado del Formulario principal -->

        <tr align="center" style="width: 85%">
            <td ALIGN=center ROWSPAN=2 COLSPAN=2 style="width: 50%; border: 1px solid black;">
                <img src="{{asset('img/icono_representativo_caratula.png')}}" class="card-img-top" style="width: 60%;">
            </td>
            <td style="border: 1px solid black;">1</td>
        </tr>
        <tr align="center" style="width: 50%; border: 1px solid black;">
            <td style="border: 1px solid black;">2</td>
        </tr>

        <br>

        <!-- SEGUNDA Area del Formulario principal -->

        <th></th><br> <!-- Espacio entre secciones del fomulario -->

        <tr align="center" style="width: 85% ; ">
            <td ALIGN=center ROWSPAN=3 COLSPAN=2 style="width: 50%; text-align: center; vertical-align: middle; padding: 5px 5px 5px 5px; border: 1px solid black;">
                <textarea type="text" style="width: 100%; height: 100%; padding: 10px 5px 10px 5px; box-sizing: border-box; font-size: 1.5em;" placeholder="Describa la razón social de la Obra">OBRA: </textarea>
            </td>
            <td style="border: 1px solid black; text-align: left;  padding: 5px 5px 15px 15px;">
                CONTRATISTA: <input type="text" value="ELECTRONIC TRAFIC, S.A." readonly><br>
                A/ 46138921
                <br><label>C/ Tres Forques, nº 147 VALENCIA</label>
            </td>
        </tr>

        <!-- Area del la Aplicacion Presupuestaria, del Formulario principal -->
    </table>

    <br>
    <table border="1" style="width: 100%">
            <tr>
                <td colspan="3" style="text-align: center;">
                    Aplicación presupuestaria LJ 160/13300/21000
                </td>
            </tr>
            <table border="1" style="width: 100%">
                <tr>
                    <td colspan="2">
                        INICIO DE CONTRATO:<input style="width: 50%" type="text">

                    </td>
                    <td style="font-size: 0.9em">
                        Plazo de ejecución: <input style="width: 30%" type="text"><br>
                        Fecha de la escritura de contrata: <input style="width: 30%" type="text">
                    </td>
                </tr>
                <colgroup>
                    <col style="width: 8%;"> <!-- Este col ocupa el 60% del ancho total -->
                    <col style="width: 5%;"> <!-- Este col ocupa el 20% del ancho total -->
                    <col style="width: 5%;"> <!-- Este col ocupa el 20% del ancho total -->
                </colgroup>
            </table>

            <table border="1" style="width: 100%">
                <tr>
                    <td style="text-align: center">PRESUPUESTOS APROBADOS</td>
                    <td style="text-align: center">IMPORTE</td>
                    <td style="text-align: center">FECHA DE APROBACIÓN</td>
                </tr>
                <tr>
                    <td>
                        <input style="width: 90%" type="text">
                    </td>
                    <td>
                        <input style="width: 90%" type="text">
                    </td>
                    <td>
                        <input style="width: 90%" type="text">
                    </td>
                </tr>
            </table>



        <table border="1" style="width: 100%">
            <tr>
                <td style="text-align: center; width:50% padding: 5px 15px 15px 15px;" >
                    Baja obtenida en la subasta o concurso:<input style="width: 90%" type="text">
                </td>
                <td style="text-align: left; width:50%;  padding: 5px 0px 15px 15px; " >
                    Plazo de ejecución: <input style="width: 30%" type="text"><br><br>
                    Fecha de la escritura de contrata: <input style="width: 30%" type="text">
                </td>
            </tr>
        </table>

    </table>

    <!-- Area  del la Aplicacion Ejecutoria, del Formulario principal -->

    <br>
    <table border="1" style="width:100%">
        <tr>
            <td colspan="5" style="text-align: justify; padding: 5px 5px 5px 15px">
                CERTIFICO: Que las obras ejecutadas en el expresado mes por el Contratista, a los precios del presupuesto, importan lo siguiente:
            </td>
        </tr>

        <tr>
            <td ALIGN=center ROWSPAN=2 COLSPAN=1 style="width: 20%; text-align: center">
                PRESUPUESTO
            </td>
            <td ALIGN=center ROWSPAN=2 COLSPAN=1 style="width: 20%; text-align: center">
                CANTIDAD LÍQUIDA DEL
                REMATE
            </td>
            <td colspan="3" style="text-align: center">
                IMPORTE DE LAS OBRAS
            </td>

        </tr>
        <tr>
            <td style="width: 20%; text-align: center">
                EJECUTADAS Y
                CORRESPONDIENTES A ESTA
                CERTIFICACIÓN
            </td>
            <td style="width: 20%; text-align: center">
                EJECUTADAS Y
                CORRESPONDIENTES A
                CERT. ANTERIORES
            </td>
            <td style="width: 20%; text-align: center">
                QUE FALTAN EJECUTAR
            </td>
        </tr>
        <tr>
            <td style="width: 20%; text-align: center">7</td>
            <td style="width: 20%; text-align: center">8</td>
            <td style="width: 20%; text-align: center">9</td>
            <td style="width: 20%; text-align: center">10</td>
            <td style="width: 20%; text-align: center">11</td>
        </tr>
        <tr>
            <td colspan="4" style="padding: 5px 5px 15px 15px; text-align: left;">
                Ejecución material de las obras<br>
                Valor por Revisión de Precios<br>
                TOTAL REVISADO<br>

                Baja obtenida 21,90%<br>
                DIFERENCIA<br>
                Gastos Generales 13,00%<br>
                Beneficio Industrial 6,00%<br>
                SUMA<br>

                I.V.A 21,00%<br>
                LIQUIDO A PRECIBIR EL CONTRATISTA
            </td>

            <td colspan="1" style="padding: 5px 5px 15px 15px; text-align:right;">
                <input type="text" style="text-align: right; padding: 0px 10px 0px 0px" placeholder="0. €" readonly><br>
                <input type="text" style="text-align: right; padding: 0px 10px 0px 0px" placeholder="0. €" readonly><br>
                <input type="text" style="text-align: right; padding: 0px 10px 0px 0px" placeholder="0. €" readonly><br>

                <input type="text" style="text-align: right; padding: 0px 10px 0px 0px" placeholder="0. €" readonly><br>
                <input type="text" style="text-align: right; padding: 0px 10px 0px 0px" placeholder="0. €" readonly><br>
                <input type="text" style="text-align: right; padding: 0px 10px 0px 0px" placeholder="0. €" readonly><br>
                <input type="text" style="text-align: right; padding: 0px 10px 0px 0px" placeholder="0. €" readonly><br>
                <input type="text" style="text-align: right; padding: 0px 10px 0px 0px" placeholder="0. €" readonly><br>

                <input type="text" style="text-align: right; padding: 0px 10px 0px 0px" placeholder="0. €" readonly><br>
                <input type="text" style="text-align: right; padding: 0px 10px 0px 0px" placeholder="0. €" readonly>
            </td>
        </tr>
    </table>

    <table>
        <tr>
            <td colspan="5" style="text-align: justify; padding: 5px 5px 5px 15px">
                Y para que conste y pueda servir de abono, expido la presente certificación de: SEISCIENTOS TREINTA MIL SETECIENTOS VEINTISEIS EUROS CON DIECISIETE CÉNTIMOS
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: center; padding: 5px 5px 5px 15px">
                VALENCIA, <LAbel id="fechaActual2"></LAbel>
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: center; padding: 5px 5px 5px 15px">
                Documento firmado electrónicamente por el contratista, el Jefe de la Sección y el Concejal Coordinador del Área
            </td>
        </tr>
    </table>

    <br><br><br>

    <!-- SEGUNDA PAGINA DESCRIPCION DE LAS TABLAS -->
     <!-- Tabla de Contenido de elementos para la Certificacion -->

    <table style="page-break-before: always;">
        <thead style="font-size: 0.8em">
        <th colspan="2">CERTIFICACION <label id="fechaLabel"></label> </th>
        <th colspan="2"></th>
        <th></th>
        <th></th>
        <th> Dias en conservacion <label id="diasLabel"></label></th>
        <th></th>
        </thead>
    </table><br>

     <table class="table table-striped" id="table-parte" style="font-size: 1em; width:100%; ">
        <thead style="border: 1px solid black;">
            <tr style="text-align: center; vertical-align:center; ">
                <th style="width: 10%; border: 1px solid black;">Código</th>
                <th style="width: 30%; border: 1px solid black;">Concepto</th>
                <th style="width: 15%; border: 1px solid black;">Uds en conservación</th>
                <th style="width: 15%; border: 1px solid black;">Dias en Conservación</th>
                <th style="width: 15%; border: 1px solid black;">Precio (€ por día)</th>
                <th style="width: 15%; border: 1px solid black;">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr style="font-size:0.9em;">
                <td style="text-align: center;border: 1px solid black;"><label></label></td><!-- Codigo Elemento -->
                <td style="text-align: center;border: 1px solid black;"><label></label></td><!-- Descripción del elemento -->
                <td style="text-align: center;border: 1px solid black;"><label></label></td><!-- Unidades en conservación -->
                <td style="text-align: center;border: 1px solid black;"><label></label></td><!-- Dias en Conservación -->
                <td style="text-align: center;border: 1px solid black;"><label></label></td><!-- Precio (valor en Euro por dia) -->
                <td style="text-align: right; border: 1px solid black;"><label id="totalTablaimporte">425.222,20</label> €</td> <!-- Total (valor por elemento) -->
            </tr>
        </tbody>
    </table>
    <br>
    <table border="1" style="width:100%">
        <tr>
            <td colspan="5" style="text-align: center; font-weight:bold; border: 1px solid black; width:85%">
                IMPORTE TOTAL
            </td>
            <td style="text-align: right; padding: 0px 10px 0px 0px; border: 1px solid black; width:15%">
                <label id="totalImporte"></label>
            </td>
        </tr>
    </table>


    <script>
        /* TABLA CONTENIDO ELEMENTOS */
        document.addEventListener('DOMContentLoaded', function () {
            // Obtén el valor del totalImporte
            var totalImporte = document.getElementById('totalImporte').textContent;

            // Filtra el contenido para eliminar símbolos de moneda
            var totalImporteSinMoneda = totalImporte.replace(/[€$£¥₹]/g, '');

            // Asigna el valor filtrado a 1
            document.getElementById('1').textContent = totalImporteSinMoneda;
        });

        /* MOSTRAR MES Y AÑO ACTUAL */

        // Obtener la fecha actual en JavaScript
        var fechaActual = new Date();
        var mesActual = fechaActual.toLocaleString('es-ES', { month: 'long' }).toUpperCase();
        var añoActual = fechaActual.getFullYear();

        // Mostrar la fecha en el elemento div
        document.getElementById("fechaLabel").innerHTML = mesActual + " " + añoActual;


        // Obtener la fecha actual en JavaScript
        var fechaActual = new Date();
        var añoActual = fechaActual.getFullYear();
        var mesActual = fechaActual.getMonth() + 1; // Nota: en JavaScript los meses van de 0 a 11

        /* MOSTRAR TOTAL DE NUMEROS DEL MES */

        // Obtener el número de días del mes actual
        var diasDelMes = new Date(añoActual, mesActual, 0).getDate();

        // Mostrar el número de días en el elemento div
        document.getElementById("diasLabel").innerHTML = " " + diasDelMes;

        /* SUMA DE LOS IMPORTES TOTALES DE LA TABLA */

         // Obtener todas las etiquetas con id="totalTablaimporte"
    var totalTablaimporteElements = document.querySelectorAll('#totalTablaimporte');

// Inicializar la variable para almacenar la suma
var totalSum = 0;

// Iterar a través de las etiquetas y sumar los valores
totalTablaimporteElements.forEach(function (element) {
    // Obtener el valor de texto y convertir a número
    var value = parseFloat(element.textContent.replace(/[^0-9,-]+/g, '').replace(',', '.'));

    // Sumar al total
    totalSum += value;
});

// Mostrar el total en la etiqueta con id="totalImporte"
document.getElementById('totalImporte').textContent = totalSum.toLocaleString('es-ES', {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2
}) + ' €';

    </script>


<!-- Tabla de Contenido de elementos para la Certificacion -->

<!-- TERCERA PAGINA DESCRIPCION DE RELACIÓN VALORADA -->

<!-- Tabla de Contenido Relación valorada de... -->
<br><br><br>

<table style="width: 100%; page-break-before: always;" >
    <thead >
        <tr style="text-align: center;">
            <td colspan="3">
                <img src="{{asset('img/imagen_Relación_valorada.png')}}" class="card-img-top" style="width: 100%;">
            </td>
        </tr>

        <tr>
            <td colspan="2" style="padding: 0px 0px 0px 25px">
                <h2> Relacion valorada de...</h2>
            </td>
            <td colspan="1" style="padding: 0px 0px 0px 25px">
                <h2>Lote No.</h2>
            </td>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td style="text-align: left; padding: 10px 0px 10px 20px">
                <strong>No. Orden:</strong> <label >1</label>
            </td>
            <td style="text-align: right; padding: 0px 20px 0px 0px"></td>
            <td style="text-align: right; padding: 0px 20px 0px 0px"><strong>Parte de..</strong> <label>1</label><strong>No.:</strong> <label>2</label></td>
        </tr>
        <tr>
            <td style="text-align: left; padding: 10px 0px 10px 20px">
               <strong>Código Localización:</strong> <label >A24002</label>
            </td>
            <td style="text-align: right; padding: 0px 0px 0px 0px; font-size:0.8em" colspan="3"><label>JUAN XXIII - HERMANOS MACHADO ESTE</label></td>
        </tr>

        <tr>
            <td style="text-align: left; padding: 10px 0px 10px 20px"><strong>Autorizado por: </strong><label>ID ayuntamiento</label></td>
            <td style="text-align: left; padding: 10px 0px 10px 20px"><strong>Reparado por:</strong> <label>Id Tec Campo</label></td>
            <td style="text-align: left; padding: 10px 0px 10px 20px"><strong>Fecha conforme:</strong> <label>Fecha Reparacion</label></td>
        </tr>
        <tr>
            <td style="text-align: justify; padding: 10px 0px 10px 20px" colspan="3">
                <strong>Observaciones: </strong> <label>Observaciones del parte</label>
            </td>
        </tr>

        <tr><td style="text-align: justify; padding: 10px 0px 10px 20px"><strong>N° C.</strong></td></tr>

        <br>

        <table style="width: 95%" id="table-relacion">
            <thead>
                <tr>
                    <th style="width: 15%">Precios</th>
                    <th style="width: 40%">Descripción</th>
                    <th style="width: 15%">Cantidad</th>
                    <th style="width: 15%">Precio</th>
                    <th style="width: 15%">Total</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td style="text-align: center; padding: 5px 0px 5px 0px">1</td>
                    <td style="text-align: justify; padding: 5px 0px 5px 10px">2</td>
                    <td style="text-align: right; padding: 5px 10px 5px 0px">3</td>
                    <td style="text-align: right; padding: 5px 10px 5px 0px">4.35 </td>
                    <td style="text-align: right; padding: 5px 10px 5px 0px"><label id="totalM"></label> €</td>
                </tr>

            </tbody>
        </table>
        </tbody>
        </table>
        <br>

        <table style="width:95%" >
            </thead>
                <tbody>
                    <td style="width: 70%; border-bottom: 0px solid black;"></td>
                    <td style="width: 15%; text-align: right; padding: 0px 10px 0px 0px; ; border-top: 1px solid black"><strong>Total</strong></td>
                    <td style="width: 15%; text-align: right;  border-top: 1px solid black; padding: 5px 10px 5px 0px"><label id="totalRelacion"></label></td>
                </tbody>

        </table>
        <br><br>
        <table style="width:95%" >
        </thead>
            <tbody>
                <td style="width: 70%; border-bottom: 0px solid black;"></td>
                <td style="width: 15%; text-align: right; padding: 0px 10px 0px 0px; ; border-top: 1px solid black"><strong>Total</strong></td>
                <td style="width: 15%; text-align: right;  border-top: 1px solid black; padding: 5px 10px 5px 0px"><label id="totalGeneralRelacion"> Euros</label></td>
            </tbody>

    </table>


    <script>
        // Obtener todos los elementos con id="totalRelacion"
        var totalRelacionElements = document.querySelectorAll('#totalRelacion');

        // Inicializar la variable para la suma total
        var totalSum = 0;

        // Iterar sobre los elementos y sumar sus valores
        totalRelacionElements.forEach(function (element) {
            // Obtener el valor numérico del contenido del label
            var value = parseFloat(element.innerText.trim());

            // Verificar si el valor es un número válido
            if (!isNaN(value)) {
                // Sumar al total
                totalSum += value;
            }
        });

        // Obtener el elemento con id="totalGeneralRelacion"
       // var totalGeneralRelacionElement = document.getElementById('totalGeneralRelacion');

        // Asignar el resultado al label
        //totalGeneralRelacionElement.innerText = totalSum.toFixed(2) + ' Euros';
    </script>

        <script>

            /* TABLA RELACION VALORADA */
          //  document.addEventListener('DOMContentLoaded', function () {
            // Obtén el valor del totalRelacion
            //var totalGeneralRelacion = document.getElementById('totalGeneralRelacion').textContent;

            // Filtra el contenido para eliminar símbolos de moneda
        ///    var totalGeneralRelacionSinMoneda = totalGeneralRelacion.replace(/[€$£¥₹]/g, '');

            // Asigna el valor filtrado a 2
         //   document.getElementById('2').textContent = totalGeneralRelacionSinMoneda;
       // });

             /* FUNCION DE SUMAR LOS VALORES TOTALES */

             document.addEventListener("DOMContentLoaded", function () {
            sumarYMostrarTotal();
        });

        function sumarYMostrarTotal() {
            // Obtener todos los elementos con el id "totalM"
            var elementosTotalM = document.querySelectorAll("#totalM");

            var totalRelacion = 0;

            // Iterar sobre los elementos y sumar sus valores
            elementosTotalM.forEach(function (elemento) {
                var valor = parseFloat(elemento.innerText);
                if (!isNaN(valor)) {
                    totalRelacion += valor;
                }
            });

            // Mostrar el total en el elemento con el id "totalRelacion"
            var totalRelacionElemento = document.getElementById("totalRelacion");
            totalRelacionElemento.innerText = totalRelacion.toFixed(2) + " €";
        }

            /* FUNCION DE MULTIPLICAR CANTIDAD POR VALOR */

            // Obtener todas las filas de la tabla
            var rows = document.querySelectorAll("#table-relacion tbody tr");

            // Inicializar la variable para almacenar el total multiplicado
            var totalMultiplicado = 0;

            // Recorrer las filas y multiplicar cantidad por precio
            rows.forEach(function(row) {
                var cantidad = parseFloat(row.cells[2].textContent);
                var precio = parseFloat(row.cells[3].textContent);
                var total = cantidad * precio;
                totalMultiplicado += total;
            });

            // Actualizar el contenido del elemento con ID "totalM"
            document.getElementById("totalM").textContent = totalMultiplicado.toFixed(2);

        </script>


<!-- FIN Tabla de Contenido Relación valorada de... -->
<br>


<!-- CUARTA PAGINA DESCRIPCION DE RELACIÓN VALORADA -->

<!-- INICIO Tabla Final RESUMEN GENERAL DE LA CERTIFICACION -->

    <table style="width: 95%; page-break-before: always;" >
        <tr>
            <td colspan="4" style="text-align: center">
                <img src="{{asset('img/icono_representativo_caratula.png')}}" class="card-img-top" style="width: 60%;text-align:center">
            </td>
        </tr>

        <tr>
            <td colspan="4" style="border-bottom: 3px solid black">
                <h1>RESUMEN GENERAL DE CERTIFICACION N°: <Label>1</Label></h1>
            </td>
        </tr>

        <tr>
            <td style="width: 45%;">RELACIÓN VALORADA CONSERVACIÓN SISTEMAS CONTROL TRÁFICO</td>
            <td style="border-bottom: 1px dotted black; width:30%"></td>
            <td style="width: 15%; text-align:right; padding: 5px 5px 5px 10px"><label id="1"></label></td>
            <td style="width: 10%; padding: 5px 5px 5px 7px">Euros</td>
        </tr>
        <tr>
            <td>VALORACIÓN COLISIONES Y MODIFICACIONES</td>
            <td style="border-bottom: 1px dotted black; width:30%"></td>
            <td style="border-bottom: 3px solid black;  text-align:right; padding: 5px 7px 5px 10px;"><label id="2"></label></td>
            <td style="padding: 5px 5px 5px 7px">Euros</td>
        </tr>
        <tr>
            <td>SUMA</td>
            <td style="border-bottom: 1px dotted black; width:30%"></td>
            <td style="text-align:right; padding: 5px 7px 5px 10px"><label id="suma1"></label></td>
            <td style="padding: 5px 5px 5px 7px">Euros</td>
        </tr>
        <tr>
            <td>VALOR POR REVISIÓN DE PRECIOS</td>
            <td style="border-bottom: 1px dotted black; width:30%"></td>
            <td style="border-bottom: 3px solid black; text-align:right; padding: 5px 7px 5px 10px"><label id="3">0.00</label></td>
            <td style="padding: 5px 5px 5px 7px">Euros</td>
        </tr>
        <tr>
            <td>TOTAL REVISADO</td>
            <td style="border-bottom: 1px dotted black; width:30%"></td>
            <td style="text-align:right; padding: 5px 7px 5px 10px"><label id="suma2">0.00</label></td>
            <td style="padding: 5px 5px 5px 7px">Euros</td>
        </tr>
        <tr>
            <td>BAJA OBTENIDA 21,90% s/(1)</td>
            <td style="border-bottom: 1px dotted black; width:30%"></td>
            <td style="border-bottom: 3px solid black; text-align:right; padding: 5px 7px 5px 10px"><label id="multiplicar1"></label></td>
            <td style="padding: 5px 5px 5px 7px">Euros</td>
        </tr>
        <tr>
            <td>EJECUCIÓN MATERIAL</td>
            <td style="border-bottom: 1px dotted black; width:30%"></td>
            <td style="text-align:right; padding: 5px 7px 5px 10px"><label id="resta1"></label></td>
            <td style="padding: 5px 5px 5px 7px">Euros</td>
        </tr>
        <tr>
            <td>GASTOS GENERALES 13,00% S/(2)</td>
            <td style="border-bottom: 1px dotted black; width:30%"></td>
            <td style="text-align:right; padding: 5px 7px 5px 10px"><label id="multiplicar2"></label></td>
            <td style="padding: 5px 5px 5px 7px">Euros</td>
        </tr>
        <tr>
            <td>BENEFICIO INDUSTRIAL 6,00% S/(2)</td>
            <td style="border-bottom: 1px dotted black; width:30%"></td>
            <td style="border-bottom: 3px solid black; text-align:right; padding: 5px 7px 5px 10px"><label id="multiplicar3"></label></td>
            <td style="padding: 5px 5px 5px 7px">Euros</td>
        </tr>
        <tr>
            <td>SUMA</td>
            <td style="border-bottom: 1px dotted black; width:30%"></td>
            <td style="text-align:right; padding: 5px 7px 5px 10px"><label id="suma3">0.00</label></td>
            <td style="padding: 5px 5px 5px 7px">Euros</td>
        </tr>
        <tr>
            <td>I.V.A (21 %) S/(3)</td>
            <td style="border-bottom: 1px dotted black; width:30%"></td>
            <td style="border-bottom: 3px solid black; text-align:right; padding: 5px 7px 5px 10px"><label id="multiplicar4">0.00</label></td>
            <td style="padding: 5px 5px 5px 7px">Euros</td>
        </tr>
    </table>
    <br>
    <table style="width:95%" >
    </thead>
        <tbody>
            <td style="width: 45%;"><STRong>TOTAL CERTIFICACIÓN</STRong></td>
            <td style="border-bottom: 1px dotted black; width:30%"></td>
            <td style="width: 15%; text-align:right; padding: 5px 5px 5px 10px"><label id="totalResumen">0.00</label></td>
            <td style="width: 10%; padding: 5px 5px 5px 7px">Euros</td>
        </tbody>
    </table>

    <br><br>
    <table>
        <tr>
            <td colspan="5" style="text-align: center; padding: 5px 5px 5px 15px">
                VALENCIA, <LAbel id="fechaActual2"></LAbel>
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: center; padding: 5px 5px 5px 15px">
                Documento firmado electrónicamente por el contratista, el Jefe de la Sección y el Concejal Coordinador del Área
            </td>
        </tr>
    </table>

    <script>
        // Obtener la fecha actual
        const fechaActual2 = new Date();

        // Obtener día, mes y año
        const dia = fechaActual2.getDate();
        const mes = fechaActual2.toLocaleString('es-ES', { month: 'long' }).toUpperCase(); // Obtener el nombre del mes en español
        const anio = fechaActual2.getFullYear();

        // Mostrar la fecha en el elemento con id "fechaActual"
        document.getElementById('fechaActual2').innerText = `${dia} ${mes} ${anio}`;
    </script>


<script>
    /* PRIMER OPERACIÓN RESULTADO EN LABEL SUMA1*/
    window.onload = function () {
        // Obtener los valores de los labels con los ids "1" y "2"
        var valor1 = parseFloat(document.getElementById("1").innerText.replace(".", "").replace(",", "."));
        var valor2 = parseFloat(document.getElementById("2").innerText.replace(".", "").replace(",", "."));

        // Calcular la suma
        var suma = valor1 + valor2;

        // Mostrar el resultado en el label con el id "suma1"
        document.getElementById("suma1").innerText = formatNumber(suma, 2);


        /* SEGUNDA OPERACIÓN RESULTADO EN LABEL SUMA2*/
        // Obtener los valores de los labels con los ids "suma1" y "3"
        var suma1  = parseFloat(document.getElementById("suma1").innerText.replace(".", "").replace(",", "."));
        var valor3 = parseFloat(document.getElementById("3").innerText.replace(".", "").replace(",", "."));

        // Calcular la suma
        var suma2 = suma1 + valor3;

        // Mostrar el resultado en el label con el id "suma2"
        document.getElementById("suma2").innerText = formatNumber(suma2, 2);

        /* TERCERA OPERACIÓN RESULTADO EN LABEL multplicar1 */

        // Obtener el valor del label "suma2"
        var suma2 = parseFloat(document.getElementById("suma2").innerText.replace(".", "").replace(",", "."));

        // Calcular el 21,90% de la cantidad en "suma2"
        var porcentaje = 21.90;
        var resultadoMultiplicar1 = (porcentaje / 100) * suma2;

        // Mostrar el resultado en el label con el id "multiplicar1"
        document.getElementById("multiplicar1").innerText = formatNumber(resultadoMultiplicar1, 2);



        /* CUARTA OPERACIÓN RESULTADO EN LABEL Resta1 */
        // Obtener el valor del label "suma2"
        var suma2 = parseFloat(document.getElementById("suma2").innerText.replace(".", "").replace(",", "."));
        var multiplicar1 = parseFloat(document.getElementById("multiplicar1").innerText.replace(".", "").replace(",", "."));


        // Calcular el 21,90% de la cantidad en "suma2"
        var resta1 = suma2 - multiplicar1;

        // Mostrar el resultado en el label con el id "multiplicar1"
        document.getElementById("resta1").innerText = formatNumber(resta1, 2);


        /* QUINTA OPERACIÓN RESULTADO EN LABEL multplicar2 */

        // Obtener el valor del label "suma2"
        var resta1 = parseFloat(document.getElementById("resta1").innerText.replace(".", "").replace(",", "."));

        // Calcular el 21,90% de la cantidad en "suma2"
        var porcentaje = 13.00;
        var resultadoMultiplicar2 = (porcentaje / 100) * resta1;

        // Mostrar el resultado en el label con el id "multiplicar1"
        document.getElementById("multiplicar2").innerText = formatNumber(resultadoMultiplicar2, 2);


        /* SEXTA OPERACIÓN RESULTADO EN LABEL multplicar3 */

        // Obtener el valor del label "suma2"
        var resta1 = parseFloat(document.getElementById("resta1").innerText.replace(".", "").replace(",", "."));

        // Calcular el 21,90% de la cantidad en "suma2"
        var porcentaje = 6.00;
        var resultadoMultiplicar3 = (porcentaje / 100) * resta1;

        // Mostrar el resultado en el label con el id "multiplicar1"
        document.getElementById("multiplicar3").innerText = formatNumber(resultadoMultiplicar3, 2);

        /* SEPTIMA OPERACIÓN RESULTADO EN LABEL SUMA3 */

        // Obtener los valores de los labels con los ids
        var valor1 = parseFloat(document.getElementById("resta1").innerText.replace(".", "").replace(",", "."));
        var valor2 = parseFloat(document.getElementById("multiplicar2").innerText.replace(".", "").replace(",", "."));
        var valor3 = parseFloat(document.getElementById("multiplicar3").innerText.replace(".", "").replace(",", "."));

        // Calcular la suma
        var suma3 = valor1 + valor2 + valor3;

        // Mostrar el resultado en el label con el id "suma1"
        document.getElementById("suma3").innerText = formatNumber(suma3, 2);

        /* OCTAVA OPERACIÓN RESULTADO EN LABEL multplicar4 */

        // Obtener el valor del label "suma3"
        var suma3 = parseFloat(document.getElementById("suma3").innerText.replace(".", "").replace(",", "."));

        // Calcular el 21,90% de la cantidad en "suma2"
        var porcentaje = 21.00;
        var resultadoMultiplicar4 = (porcentaje / 100) * suma3;


        // Mostrar el resultado en el label con el id "multiplicar1"
        document.getElementById("multiplicar4").innerText = formatNumber(resultadoMultiplicar4, 2);


        /* OCTAVA OPERACIÓN RESULTADO EN LABEL totalResumen */

        // Obtener los valores de los labels en totalResumen
        var valor1 = parseFloat(document.getElementById("suma3").innerText.replace(".", "").replace(",", "."));
        var valor2 = parseFloat(document.getElementById("multiplicar4").innerText.replace(".", "").replace(",", "."));

        // Calcular la suma
        var totalResumen = valor1 + valor2;

        // Mostrar el resultado en el label con el id "suma1"
        document.getElementById("totalResumen").innerText = formatNumber(totalResumen, 2);

        };



        // Función para formatear el número con dos decimales y coma como separador de miles
        function formatNumber(number, decimals) {
            return new Intl.NumberFormat('es-ES', { minimumFractionDigits: decimals, maximumFractionDigits: decimals }).format(number);
        }
</script>



    <br>
<!-- FIN Tabla Final RESUMEN GENERAL DE LA CERTIFICACION -->

   <!-- <table style="text-align: center;">
        <tr>
            <td>
        <button type="button" onclick="goToHome()" class="btn btn-secondary" style="text-align: right;">Volver</button>
        &nbsp;
        <button type="button" onclick="pdf()" class="btn btn-primary float-right" style="text-align: right;">Imprimir Certificado</button>
            </td>
        </tr>
    </table>
    <script>
        function goToHome() {
            window.location.href = "{{ url('/generarparte') }}";
        }
    function pdf() {
        window.location.href = "{{ url('/pdf') }}";
    }
    </script>
-->


</body>
</html>
