<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <style>
        table {

            color: #212529;
            border-style: solid;
            border-color: #dee2e6;
            font-size: 12;
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
    </style>


    <title></title>

</head>

<body class="antialiased">


    <table class="table table-bordered" width="100%">
        <thead>
            <tr>
                <td rowspan="2"> <img src="{{ $img }}" width="300" height="50"></td>
                <td width='100%' colspan="3" style="text-align:center ">1/23</td>
            </tr>
            <tr>
                <td width='100%' colspan="3" style="text-align:center ">Mes de Agosto de 2023</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td rowspan="2" style="text-align:center;font-size: 12px;"> OBRA: CONTRATO DE GESTIÓN DEL TRÁFICO EN
                    LA CIUDAD DE VALENCIA</td>
                <td width='100%' rowspan="2" colspan="3" style="text-align:center; font-size: 12px;">CONTRATISTA: ELECTRONIC
                    TRAFIC, S.A.
                    A/ 46138921
                    C/ Tres Forques, nº 147 VALENCIA</td>
            </tr>


        </tbody>

    </table>
    <table class="table table-bordered" width="100%">
        <tr>
            <td width='100%' colspan="3" style="text-align:center ">Aplicación presupuestaria LJ 160/13300/21000
            </td>

        </tr>
        <tr width='100%'>
            <td style="text-align:center" colspan="2">Inicio contrato: Miércoles, 02 de Agosto de 2023</td>
            <td width='100%' style="text-align:center ">Plazo de ejecución: 5 años
                Fecha de la escritura de contrata</td>

        </tr>
        <tr>
            <td width='100%' style="text-align:center;font-size: 15px;">PRESUPUESTOS APROBADOS</td>
            <td width='100%' style="text-align:center; font-size: 15px;">IMPORTE</td>
            <td width='100%' style="text-align:center;font-size: 15px;">
                FECHA DE APROBACIÓN</td>

        </tr>
        <tr>
            <td width='100%' style="text-align:center ">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td width='100%' style="text-align:center ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td width='100%' style="text-align:center ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

        </tr>
    </table>
    <table class='tables' style="width: 100%">
        <tr>
            <td style="text-align: center; width:50% ">
                <p>Baja obtenida en la subasta o concurso: 21,90% </p>
            </td>
            <td style="text-align: left; width:50%;; ">
                <p> Plazo de ejecución: Jueves, 6 de Abril de 2023</p>
                <p>Fecha de la escritura de contrata:</p>
            </td>
        </tr>

    </table>
    <table class='tables' border="1" style="width:100%">
        <tr>
            <td colspan="3" style="  width=100%; text-align: justify; ">
                <p style="font-size: 12px;">CERTIFICO: Que las obras ejecutadas en el expresado mes por el Contratista,
                    a los precios del presupuesto, importan lo siguiente:</p>
            </td>
        </tr>
    </table>

   <table class='tables' border="1" style="width:100%">
        <tr>
            <td style=" width=100%; text-align: center;font-size: 14px; "rowspan="2">
                PRESUPUESTO
            </td>
<td style="  width=100%; text-align: center;font-size: 14px; "rowspan="2">
CANTIDAD LÍQUIDA DEL
REMATE
            </td>
<td style=" width=100%; text-align: center;font-size: 14px;" colspan="2">
IMPORTE DE LAS OBRAS
            </td>

        </tr>
<tr>
           <td style=" width=100%; text-align:center; font-size: 12px;">
                EJECUTADAS Y
CORRESPONDIENTES A ESTA
CERTIFICACIÓN
            </td>
<td style="  width=100%; text-align: center;font-size: 12px; ">
EJECUTADAS Y
CORRESPONDIENTES A
CERT. ANTERIORES
            </td>
<td style=" width=100%; text-align: center;font-size: 12px;">
QUE FALTAN EJECUTAR
            </td>

</tr>
<tr>
<td>1</td>
<td>2</td>
<td>3</td>
<td>4</td>
<td>5</td>
</tr>
</table>

 <p style='font-size:12px;'> Ejecución material de las obras .................................................................................. valor </p>
    <p  style='font-size:12px;'> Ejecución material de las obras .................................................................................. valor </p>
<p style='font-size:12px;'> Ejecución material de las obras .................................................................................. valor </p>
<p style='font-size:12px;'> Ejecución material de las obras .................................................................................. valor </p>
<p style='font-size:12px;'> Ejecución material de las obras .................................................................................. valor </p>
<p style='font-size:12px;'> Ejecución material de las obras .................................................................................. valor </p>
<p style='font-size:12px;'> Ejecución material de las obras .................................................................................. valor </p>
<p style='font-size:12px;'> Ejecución material de las obras .................................................................................. valor </p>
<p style='font-size:12px;'> Ejecución material de las obras .................................................................................. valor </p>
<p style='font-size:12px;'>  Ejecución material de las obras .................................................................................. valor </p>
Y para que conste y pueda servir de abono, expido la presente certificación de: SEISCIENTOS TREINTA MIL
SETECIENTOS VEINTISEIS EUROS CON DIECISIETE CÉNTIMOS
<br><br>
Documento firmado electrónicamente por el contratista, el Jefe de la Sección y el Concejal Coordinador del Área

    <div style="page-break-before: always;"></div>

    @php

        $totalTotal = 0;
        $totaltotalesEPartes = 0;
    @endphp
    @foreach ($conjuntosDeInformes as $index => $conjunto)
        <table class='tables'>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Concepto</th>
                    <th>Uds en garantía</th>
                    <th>Uds en conservación</th>
                    <th>Días en conservación</th>
                    <th>Euros por día</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($conjunto as $item)
                    <tr>
                        <td style="text-align:center ">{{ $item->Codigo }}</td>
                        <td style="text-align:center ">{{ $item->Concepto }}</td>
                        <td style="text-align:center ">{{ $item->Uds_en_garantia }}</td>
                        <td style="text-align:center ">{{ $item->Uds_en_conservacion }}</td>
                        <td style="text-align:center ">{{ $item->Dias_en_conservacion }}</td>
                        <td style="text-align:center ">{{ $item->Euros_por_dia }}</td>
                        <td style="text-align:center ">{{ number_format($item->Total) }}</td>

                    </tr>
                @endforeach

            </tbody>
        </table>
        @if ($index < count($conjuntosDeInformes) - 1)
            <div style="page-break-before: always;"></div> {{-- Añade un salto de página para cada conjunto, excepto el último --}}
        @endif
    @endforeach

    <table width='100%' style="border:0">

        <tr>
            <td width='100%' colspan="2" style="text-align:center ">Total:</td>

            <td width='100%' colspan="3" style="text-align:center ">{{ number_format($totalSum) }}</td>
        </tr>

    </table>
    @foreach ($partes as $index => $parte)
        <table style="width: 100%; page-break-before: always;" class="tables">


            <thead>
                <tr style="text-align: center;">
                    <td colspan="3">
                        <img src="{{ base_path('public/img/imagen_Relacion_valorada.png') }}" width="500"
                            height="50">
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
                        <strong>No. Orden:</strong> <label>1</label>
                    </td>
                    <td style="text-align: right; padding: 0px 20px 0px 0px"></td>
                    <td style="text-align: right; padding: 0px 20px 0px 0px"><strong>Parte de..</strong> <label>
                            {{ $parte->tipoparte }}</label><strong>No.:</strong> <label>{{ $parte->id }}</label>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: left; padding: 10px 0px 10px 20px">
                        <strong>Código Localización:</strong> <label>{{ $parte->cod_localizacion }}</label>
                    </td>
                    <td style="text-align: right; padding: 0px 0px 0px 0px; font-size:0.8em" colspan="3"><label>JUAN
                            XXIII - HERMANOS MACHADO ESTE</label></td>
                </tr>

                <tr>

                    <td style="text-align: left; padding: 10px 0px 10px 20px"><strong>Autorizado por:
                        </strong><label>{{ $parte->autorizadopor }}</label></td>
                    <td style="text-align: left; padding: 10px 0px 10px 20px"><strong>Reparado por:</strong>
                        <label>{{ $parte->reportadoPor }}</label></td>
                    <td style="text-align: left; padding: 10px 0px 10px 20px"><strong>Fecha conforme:</strong>
                        <label>Fecha Reparacion</label></td>
                </tr>
                <tr>
                    <td style="text-align: justify; padding: 10px 0px 10px 20px" colspan="3" with="100%">
                        <p> <strong>Observaciones: </strong> {{ $parte->obscreadorparte }}</p>
                    </td>
                </tr>

                <tr>
                    <td style="text-align: justify; padding: 10px 0px 10px 20px"><strong>N° C.</strong></td>
                </tr>
            </tbody>
            <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
        </table>
        @php
            $elementos = app('App\Http\Controllers\ElementosController')->list_data_elements_api_elemntparte($parte->id);

            $totalporparte = app('App\Http\Controllers\ElementosController')->totalporparte($parte->id);
            //dd();
        @endphp
        @if (count($elementos) > 0)
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
                    @foreach ($elementos as $elemento)
                        <tr>
                            <td style="text-align: center; padding: 5px 0px 5px 0px">{{ $elemento->precioU }}</td>
                            <td style="text-align: justify; padding: 5px 0px 5px 10px">{{ $elemento->descripcion }}
                            </td>
                            <td style="text-align: right; padding: 5px 10px 5px 0px">{{ $elemento->cantidad }}</td>
                            <td style="text-align: right; padding: 5px 10px 5px 0px">{{ $elemento->precioU }} </td>
                            <td style="text-align: right; padding: 5px 10px 5px 0px">
                                </label>{{ $elemento->precio_total }} €</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            </tbody>
            </table>
            <br>

            <table style="width:95%">
                </thead>
                <tbody>
                    <td style="width: 70%; border-bottom: 0px solid black;"></td>
                    <td
                        style="width: 15%; text-align: right; padding: 0px 10px 0px 0px; ; border-top: 1px solid black">
                        <strong>Total</strong></td>
                    @php
                        $totalParte = number_format($totalporparte->total);
                    @endphp
                    <td style="width: 15%; text-align: right;  border-top: 1px solid black; padding: 5px 10px 5px 0px">
                        {{ $totalporparte->total }}</td>
                </tbody>

            </table>
            @php
                $totaltotalesEPartes += 0 + $totalporparte->total;
            @endphp
        @endif
        <br><br>
    @endforeach
    <table style="width:95%">
        </thead>
        <tbody>

            <td style="width: 70%; border-bottom: 0px solid black;"></td>
            <td style="width: 15%; text-align: right; padding: 0px 10px 0px 0px; ; border-top: 1px solid black">
                <strong>Total</strong></td>
            <td style="width: 15%; text-align: right;  border-top: 1px solid black; padding: 5px 10px 5px 0px"><label
                    id="totalGeneralRelacion">{{ $totaltotalesEPartes }} Euros </label></td>
        </tbody>

    </table>

    <table style="width: 95%; page-break-before: always;">
        <tr>
            <td colspan="4" style="text-align: center">
                <img src="{{ base_path('public/img/icono_representativo_caratula.png') }}" class="card-img-top"
                    style="width: 60%;text-align:center">
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
            <td style="width: 15%; text-align:right; padding: 5px 5px 5px 10px">{{ number_format($totalSum) }}</td>
            <td style="width: 10%; padding: 5px 5px 5px 7px">Euros</td>
        </tr>
        <tr>
            <td>VALORACIÓN COLISIONES Y MODIFICACIONES</td>
            <td style="border-bottom: 1px dotted black; width:30%"></td>
            <td style="border-bottom: 3px solid black;  text-align:right; padding: 5px 7px 5px 10px;">
                {{ $totaltotalesEPartes }} </td>
            <td style="padding: 5px 5px 5px 7px">Euros</td>
        </tr>
        <tr>
            <td>SUMA</td>
            <td style="border-bottom: 1px dotted black; width:30%"></td>
            <td style="text-align:right; padding: 5px 7px 5px 10px">
                {{ number_format($totalSum + $totaltotalesEPartes) }} </td>
            <td style="padding: 5px 5px 5px 7px">Euros</td>
        </tr>
        <tr>
            <td>VALOR POR REVISIÓN DE PRECIOS</td>
            <td style="border-bottom: 1px dotted black; width:30%"></td>
            <td style="border-bottom: 3px solid black; text-align:right; padding: 5px 7px 5px 10px"><label
                    id="3">0.00</label></td>
            <td style="padding: 5px 5px 5px 7px">Euros</td>
        </tr>
        <tr>
            <td>TOTAL REVISADO</td>
            <td style="border-bottom: 1px dotted black; width:30%"></td>
            <td style="text-align:right; padding: 5px 7px 5px 10px"><label
                    id="suma2">{{ number_format($totalSum + $totaltotalesEPartes) }}</label></td>
            <td style="padding: 5px 5px 5px 7px">Euros</td>
        </tr>
        <tr>
            @php
                $Tbajaoppdf = $totalSum + $totaltotalesEPartes;
                $porcentaje = floatval('21.90');
                $resultbaja = ($Tbajaoppdf * $porcentaje) / 100;
            @endphp
            <td>BAJA OBTENIDA 21,90% s/(1)</td>
            <td style="border-bottom: 1px dotted black; width:30%"></td>
            <td style="border-bottom: 3px solid black; text-align:right; padding: 5px 7px 5px 10px"><label
                    id="multiplicar1"></label>{{ number_format($resultbaja) }} </td>
            <td style="padding: 5px 5px 5px 7px">Euros</td>
        </tr>
        @php
            $restarbaja1 = $Tbajaoppdf - $resultbaja;
        @endphp

        <tr>
            <td>EJECUCIÓN MATERIAL</td>
            <td style="border-bottom: 1px dotted black; width:30%"></td>
            <td style="text-align:right; padding: 5px 7px 5px 10px"><label id="resta1">
                    {{ number_format($restarbaja1) }}</label></td>
            <td style="padding: 5px 5px 5px 7px">Euros</td>
        </tr>
        @php
            $porcentaje = 13.0;
            $gastosgeneralesS2 = ($restarbaja1 * $porcentaje) / 100;
        @endphp
        <tr>
            <td>GASTOS GENERALES 13,00% S/(2)</td>
            <td style="border-bottom: 1px dotted black; width:30%"></td>
            <td style="text-align:right; padding: 5px 7px 5px 10px"><label
                    id="multiplicar2">{{ number_format($gastosgeneralesS2) }}</label></td>
            <td style="padding: 5px 5px 5px 7px">Euros</td>
        </tr>
        @php
            $porcentaje = 6.0;
            $beneficioInd = ($gastosgeneralesS2 * $porcentaje) / 100;
        @endphp
        <tr>
            <td>BENEFICIO INDUSTRIAL 6,00% S/(2)</td>
            <td style="border-bottom: 1px dotted black; width:30%"></td>
            <td style="border-bottom: 3px solid black; text-align:right; padding: 5px 7px 5px 10px"><label
                    id="multiplicar3">{{ number_format($beneficioInd) }}</label></td>
            <td style="padding: 5px 5px 5px 7px">Euros</td>
        </tr>

        @php
            $suma = $restarbaja1 + $gastosgeneralesS2 + $beneficioInd;
        @endphp
        <tr>
            <td>SUMA</td>
            <td style="border-bottom: 1px dotted black; width:30%"></td>
            <td style="text-align:right; padding: 5px 7px 5px 10px"><label
                    id="suma3">{{ number_format($suma) }}</label></td>
            <td style="padding: 5px 5px 5px 7px">Euros</td>
        </tr>
        @php
            $porcentaje = 21;
            $iva21s3 = ($suma * $porcentaje) / 100;
            $totalizacion = $iva21s3 + $suma;
        @endphp
        <tr>
            <td>I.V.A (21 %) S/(3)</td>
            <td style="border-bottom: 1px dotted black; width:30%"></td>
            <td style="border-bottom: 3px solid black; text-align:right; padding: 5px 7px 5px 10px"><label
                    id="multiplicar4"> {{ number_format($iva21s3) }}</label></td>
            <td style="padding: 5px 5px 5px 7px">Euros</td>
        </tr>
    </table>
    <br>
    <table style="width:95%">
        </thead>
        <tbody>
            <td style="width: 45%;"><STRong>TOTAL CERTIFICACIÓN</STRong></td>
            <td style="border-bottom: 1px dotted black; width:30%"></td>
            <td style="width: 15%; text-align:right; padding: 5px 5px 5px 10px"><label
                    id="totalResumen">{{ number_format($totalizacion) }}</label></td>
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
                Documento firmado electrónicamente por el contratista, el Jefe de la Sección y el Concejal Coordinador
                del Área
            </td>
        </tr>
    </table>


</body>

</html>
