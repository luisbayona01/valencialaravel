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
    </style>


    <title></title>

</head>

<body class="antialiased">
@php

               $Tbajaoppdf = $totalSum + $totalPartes->total;
                $porcentaje = floatval('21.90');
                $resultbaja = ($Tbajaoppdf * $porcentaje) / 100;
                $restarbaja1 = $Tbajaoppdf - $resultbaja;

           $porcentaje = 13.0;
            $gastosgeneralesS2 = ($restarbaja1 * $porcentaje) / 100;
          $porcentaje = 6.0;
            $beneficioInd = ($gastosgeneralesS2 * $porcentaje) / 100;
      $suma = $restarbaja1 + $gastosgeneralesS2 + $beneficioInd;

         $porcentaje = 21;
            $iva21s3 = ($suma * $porcentaje) / 100;
            $totalizacion = $iva21s3 + $suma;



            $totalletras = app('App\Http\Controllers\ReportPartesController')->numerosletras($totalizacion);
@endphp

    <table class="border table-bordered" width="100%">
        <thead >
            <tr>
                <td rowspan="2" style="width: 60%"> <img src="{{ $img }}" width="80%" height="50"></td>
                <td width='40%' colspan="3" style="text-align:center ">1/23</td>
            </tr>
            <tr>
                <td width='40%' colspan="3" style="text-align:center ">Mes de Agosto de 2023</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td rowspan="2" style="text-align:justify;font-size: 12px;"> <strong>OBRA:</strong> CONTRATO DE GESTIÓN DEL TRÁFICO EN
                    LA CIUDAD DE VALENCIA</td>
                <td width='50%' rowspan="2" colspan="3" style="text-align:left; font-size: 12px;">CONTRATISTA: ELECTRONIC
                    TRAFIC, S.A.
                    <br>A/ 46138921
                    <br>C/ Tres Forques, nº 147 VALENCIA</td>
            </tr>


        </tbody>

    </table>
    <table class="table table-bordered" width="100%">
        <tr>
            <td width='100%' colspan="3" style="text-align:center ">Aplicación presupuestaria LJ 160/13300/21000
            </td>

        </tr>
        <tr width='100%'>
            <td style="text-align:left; font-size: 0.7em" colspan="2">Inicio contrato: Miércoles, 02 de Agosto de 2023</td>
            <td width='100%' style="text-align:justify; font-size: 0.7em ">Plazo de ejecución: 5 años
                <br>Fecha de la escritura de contrata</td>

        </tr>
        <tr>
            <td width='100%' style="text-align:center;font-size: 0.8em;">PRESUPUESTOS APROBADOS</td>
            <td width='100%' style="text-align:center; font-size: 0.8em;">IMPORTE</td>
            <td width='100%' style="text-align:center;font-size: 0.8em;">
                FECHA DE APROBACIÓN</td>

        </tr>
        <tr>
            <td width='100%' style="text-align:center ">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td width='100%' style="text-align:center ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td width='100%' style="text-align:center ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

        </tr>
    </table>
    <table class='table table-bordered' style="width: 100%">
        <tr>
            <td style="text-align: center; width:50% ">
                <p style="text-align: left; font-size: 0.8em ">Baja obtenida en la subasta o concurso:</p>
                <p style="text-align: center ; font-size: 0.9em ">21,90% </p>
            </td>
            <td style="text-align: left; width:50%; font-size: 0.8em ; ">
                <p> Plazo de ejecución: Jueves, 6 de Abril de 2023</p>
                <p>Fecha de la escritura de contrata:</p>
            </td>
        </tr>

    </table>
    <table class='table table-bordered' border="1" style="width:100%">
        <tr>
            <td colspan="3" style="  width=100%; height-max: 10px ;text-align: justify; ">
                <p style="font-size: 0.7em;">CERTIFICO: Que las obras ejecutadas en el expresado mes por el Contratista,
                    a los precios del presupuesto, importan lo siguiente:</p>
            </td>
        </tr>
    </table>

   <table class='table table-bordered'  style="width:100%">
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
            <td style="width:20%; text-align: right; font-size: 0.7em;">{{number_format($totalizacion) .' '. 'Euros' }}</td>
            <td style="width:20%; text-align: right; font-size: 0.7em;">0,00 Euros</td>
            <td></td>
        </tr>
</table>
<!-- class='ocultar-bordes' -->
<table style='font-size:0.7em; width: 100%' border="1">
    <tr>
        <td style="width: 80%; border:none">Ejecución material de las obras ...............................................................................................................................</td> <td style='text-align: right; border:none'>{{number_format($Tbajaoppdf).' '.'Euros'}}</td>
    </tr>
    <tr>
        <td style="border:none">Valor por Revisión de Precios ..................................................................................................................................</td> <td style="text-align: right ; border:none">0,00 Euros</td>
    </tr>
    <tr>
        <td style="border:none">TOTAL REVISADO ..................................................................................................................................................</td> <td style="text-align: right; border:none">{{number_format($Tbajaoppdf).' '.'Euros'}} </td>
    </tr>
    <tr>
        <td style="border:none">Baja Optenida 21,90% .............................................................................................................................................</td> <td style="text-align: right; border:none"> {{number_format($resultbaja).' '.'Euros'}}</td>
    </tr>
    <tr>
        <td style="border:none"><strong>DIFERENCIA ...........................................................................................................................................................</strong></td> <td style="text-align: right; border:none"> {{number_format($restarbaja1).' '.'Euros'}}</td>
    </tr>
    <tr>
        <td style="border:none">Gastos Generales 13,00% .......................................................................................................................................</td><td style="text-align: right; border:none"> {{number_format($gastosgeneralesS2).' '.'Euros'}} </td>
    </tr>
    <tr>
        <td style="border:none">Beneficio Industrial 6,00% ........................................................................................................................................</td> <td style="text-align: right; border:none"> {{number_format($beneficioInd).' '.'Euros'}} </td>
    </tr>
    <tr>
        <td style="border:none">SUMA .......................................................................................................................................................................</td> <td style="text-align: right; border:none">{{number_format($suma).' '.'Euros'}} </td>
    </tr>
    <tr>
        <td style="border:none">I.V.A 21,00% ............................................................................................................................................................</td> <td style="text-align: right; border:none"> {{number_format($iva21s3).' '.'Euros'}}</td>
    </tr>
    <tr>
        <td style="border:none">LIQUIDO A PERCIBIR EL CONTRATISTA .............................................................................................................</td> <td style="text-align: right; border:none"> {{number_format($totalizacion).' '.'Euros'}}</td>
    </tr>
</table>
<br>
<p style="text-align: justify; font-size: 0.9em">Y para que conste y pueda servir de abono, expido la presente certificación de: {{$totalletras}}</p>

<br><br>


<p style="text-align: center; font-size: 0.7em">Documento firmado electrónicamente por el contratista, el Jefe de la Sección y el Concejal Coordinador del Área</p>

 <!-- SEGUNDA Area del Formulario principal -->
<div style="page-break-before: always;"></div>

    @php

        $totalTotal = 0;
        $totaltotalesEPartes = 0;
    @endphp
    @foreach ($conjuntosDeInformes as $index => $conjunto)
        <table class="tables" style="width: 100%" >
            <thead >
                <tr >
                    <th style="text-align: center; font-size: 0.7em; width: 10%">Codigo</th>
                    <th style="text-align: center; font-size: 0.7em; width:31%;">Concepto</th>
                    <th style="text-align: center; font-size: 0.7em; width: 11%">Uds en garantía</th>
                    <th style="text-align: center; font-size: 0.7em; width: 11%">Uds en conservación</th>
                    <th style="text-align: center; font-size: 0.7em; width: 11%">Días en conservación</th>
                    <th style="text-align: center; font-size: 0.7em; width: 11%">Precio (€ por día)</th>
                    <th style="text-align: center; font-size: 0.7em; width: 13%">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($conjunto as $item)
                    <tr>
                        <td style="text-align:center; font-size: 0.7em; ">{{ $item->Codigo }}</td>
                        <td style="text-align:left; font-size: 0.7em; ">{{ $item->Concepto }}</td>
                        <td style="text-align:center; font-size: 0.7em; ">{{ $item->Uds_en_garantia }}</td>
                        <td style="text-align:center; font-size: 0.7em; ">{{ $item->Uds_en_conservacion }}</td>
                        <td style="text-align:center; font-size: 0.7em; ">{{ $item->Dias_en_conservacion }}</td>
                        <td style="text-align:right; font-size: 0.7em; ">{{ $item->Euros_por_dia }} €</td>
                        <td style="text-align:right; font-size: 0.7em; ">{{ number_format($item->Total) }} €</td>

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
        <table style="width: 100%; page-break-before: always; border:none" class="table table-bordered">


            <thead>
                <tr style="text-align: center;">
                    <td colspan="3" style="border: none; width: 100%">
                        <center><img src="{{ base_path('public/img/imagen_Relacion_valorada.png') }}" width="100%"
                            height="50"></center>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="padding: 0px 0px 0px 25px; width:60%; border:none">
                        <h4> Relacion valorada de...</h4>
                    </td>
                    <td colspan="1" style="padding: 0px 0px 0px 25px; width:30%; border:none">
                        <h4>Lote No.</h4>
                    </td>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td colspan="2" style="text-align: left; padding: 10px 0px 10px 20px; font-size:0.8em; border:none">
                        <strong>No. Orden:</strong> <label>1</label>
                    </td>
                    <td colspan="1" style="text-align: right; padding: 0px 20px 0px 0px; font-size:0.8em; border:none">Parte de <label>
                            <strong>{{ $parte->tipoparte }}</strong> </label><strong>No.: </strong> <label><strong>{{ $parte->id }}</strong></label>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: left; padding: 10px 0px 10px 20px; font-size:0.8em; border:none" colspan="1">
                        <strong>Código Localización:</strong> <label>{{ $parte->cod_localizacion }}</label>
                    </td>
                    <td style="text-align: right; padding: 0px 0px 0px 0px; font-size:0.8em; border:none" colspan="2"><label>JUAN
                            XXIII - HERMANOS MACHADO ESTE</label></td>
                </tr>

                <tr>

                    <td style="text-align: left; padding: 10px 0px 10px 20px; font-size:0.7em; width:30%; border:none"><strong>Autorizado por:
                        </strong><label>{{ $parte->autorizadopor }}</label></td>
                    <td style="text-align: left; padding: 10px 0px 10px 20px; font-size:0.7em; width:30%; border:none"><strong>Reparado por:</strong>
                        <label>{{ $parte->reportadoPor }}</label></td>
                    <td style="text-align: left; padding: 10px 0px 10px 20px; font-size:0.7em; width:40%; border:none"><strong>Fecha conforme:</strong>
                        <label>Fecha Reparacion</label></td>
                </tr>
                <tr>
                    <td style="text-align: justify; padding: 10px 0px 10px 20px; font-size:0.8em; border:none" colspan="3" with="100%">
                        <p> <strong>Observaciones: </strong> {{ $parte->obscreadorparte }}</p>
                    </td>
                </tr>

                <tr>
                    <td style="text-align: justify; padding: 10px 0px 10px 20px; border:none"><strong>N° C.</strong></td>
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
                            <td style="text-align: center; padding: 5px 0px 5px 0px">{{ $elemento->elemento }}</td>
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

    <table border="0" style="width: 95%; page-break-before: always;">
        <tr>
            <td colspan="3" style="text-align: center; border:none">
                <img src="{{ base_path('public/img/icono_representativo_caratula.png') }}" class="card-img-top"
                    style="width: 60%;text-align:center">
            </td>
        </tr>

        <tr>
            <td colspan="3" style="border-bottom: 3px solid black; border-top: none; border-left: none; border-right: none;">
                <h3>RESUMEN GENERAL DE CERTIFICACION N°: <Label>1</Label></h3>
            </td>
        </tr>

        <tr style="font-size:0.7em; ">
            <td style="width: 45%; border: none;">RELACIÓN VALORADA CONSERVACIÓN SISTEMAS CONTROL TRÁFICO .........</td>
            <td style="width: 15%; border: none; text-align:right; padding: 5px 5px 5px 10px">{{ number_format($totalSum) }}</td>
            <td style="width: 10%; border: none; padding: 5px 5px 5px 7px">Euros</td>
        </tr>
        <tr style="font-size:0.7em">
            <td style="border: none;">VALORACIÓN COLISIONES Y MODIFICACIONES ...................................................</td>
            <td style="border-bottom: 3px solid black; border-top: none; border-left: none; border-right: none;  text-align:right; padding: 5px 7px 5px 10px;">
                {{ $totaltotalesEPartes }} </td>
            <td style="padding: 5px 5px 5px 7px; border: none;">Euros</td>
        </tr>
        <tr style="font-size:0.7em">
            <td style="border: none">SUMA ...........................................................................................................................</td>
            <td style="text-align:right; padding: 5px 7px 5px 10px; border:none">
                {{ number_format($totalSum + $totaltotalesEPartes) }} </td>
            <td style="padding: 5px 5px 5px 7px; border:none">Euros</td>
        </tr>
        <tr style="font-size:0.7em">
            <td style="border: none">VALOR POR REVISIÓN DE PRECIOS .......................................................................</td>
            <td style="border-bottom: 3px solid black; border-top: none; border-left: none; border-right: none; text-align:right; padding: 5px 7px 5px 10px"><label
                    id="3">0.00</label></td>
            <td style="padding: 5px 5px 5px 7px; border:none">Euros</td>
        </tr>
        <tr style="font-size:0.7em">
            <td style="border: none">TOTAL REVISADO ......................................................................................................</td>
            <td style="text-align:right; padding: 5px 7px 5px 10px; border:none"><label
                    id="suma2">{{ number_format($totalSum + $totaltotalesEPartes) }}</label></td>
            <td style="padding: 5px 5px 5px 7px; border:none">Euros </td>
        </tr>
        <tr style="font-size:0.7em">
            @php
                $Tbajaoppdf = $totalSum + $totaltotalesEPartes;
                $porcentaje = floatval('21.90');
                $resultbaja = ($Tbajaoppdf * $porcentaje) / 100;
            @endphp
            <td style="border: none">BAJA OBTENIDA 21,90% s/(1) ...................................................................................</td>
            <td style="border-bottom: 3px solid black; border-top: none; border-left: none; border-right: none; text-align:right; padding: 5px 7px 5px 10px"><label
                    id="multiplicar1"></label>{{ number_format($resultbaja) }} </td>
            <td style="padding: 5px 5px 5px 7px; border:none">Euros</td>
        </tr>
        @php
            $restarbaja1 = $Tbajaoppdf - $resultbaja;
        @endphp

        <tr style="font-size:0.7em">
            <td style="border: none">EJECUCIÓN MATERIAL .............................................................................................</td>
            <td style="text-align:right; padding: 5px 7px 5px 10px; border:none"><label id="resta1">
                    {{ number_format($restarbaja1) }}</label></td>
            <td style="padding: 5px 5px 5px 7px; border:none">Euros</td>
        </tr>
        @php
            $porcentaje = 13.0;
            $gastosgeneralesS2 = ($restarbaja1 * $porcentaje) / 100;
        @endphp
        <tr style="font-size:0.7em">
            <td style="border: none">GASTOS GENERALES 13,00% S/(2) .........................................................................</td>
            <td style="text-align:right; padding: 5px 7px 5px 10px; border: none"><label
                    id="multiplicar2">{{ number_format($gastosgeneralesS2) }}</label></td>
            <td style="padding: 5px 5px 5px 7px; border:none">Euros</td>
        </tr>
        @php
            $porcentaje = 6.0;
            $beneficioInd = ($gastosgeneralesS2 * $porcentaje) / 100;
        @endphp
        <tr style="font-size:0.7em">
            <td style="border: none">BENEFICIO INDUSTRIAL 6,00% S/(2) .......................................................................</td>
            <td style="border-bottom: 3px solid black; border-top: none; border-left: none; border-right: none; text-align:right; padding: 5px 7px 5px 10px"><label
                    id="multiplicar3">{{ number_format($beneficioInd) }}</label></td>
            <td style="padding: 5px 5px 5px 7px; border:none">Euros</td>
        </tr>

        @php
            $suma = $restarbaja1 + $gastosgeneralesS2 + $beneficioInd;
        @endphp
        <tr style="font-size:0.7em">
            <td style="border: none">SUMA ...........................................................................................................................</td>
            <td style="text-align:right; padding: 5px 7px 5px 10px; border:none"><label
                    id="suma3">{{ number_format($suma) }}</label></td>
            <td style="padding: 5px 5px 5px 7px; border:none">Euros</td>
        </tr>
        @php
            $porcentaje = 21;
            $iva21s3 = ($suma * $porcentaje) / 100;
            $totalizacion = $iva21s3 + $suma;
        @endphp
        <tr style="font-size:0.7em">
            <td style="border: none">I.V.A (21 %) S/(3) .........................................................................................................</td>
            <td style="border-bottom: 3px solid black; border-top: none; border-left: none; border-right: none; text-align:right; padding: 5px 7px 5px 10px"><label
                    id="multiplicar4"> {{ number_format($iva21s3) }}</label></td>
            <td style="padding: 5px 5px 5px 7px; border: none">Euros</td>
        </tr>
    </table>


    <br>
    <table style="width:95%; border-collapse: collapse; " border="0">
        </thead>
        <tbody style="font-size:0.9em">
            <td style="width: 45%; font-size:0.9em; border: none"><STRong>TOTAL CERTIFICACIÓN ..........................................................................</STRong></td>
            <td style="width: 15%; text-align:right; border:none"><label
                    id="totalResumen">{{ number_format($totalizacion) }} </label></td>
            <td style="width: 10%; padding: 5px 5px 5px 7px; border:none"> Euros.</td>
        </tbody>
    </table>

    <br><br>
    <table border="0">
        <tr>
            <td colspan="3" style="text-align: center; padding: 5px 5px 5px 15px; border: none; font-size:0.9em">
                VALENCIA, <LAbel id="fechaActual2"></LAbel>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center; padding: 5px 5px 5px 15px; border: none; font-size:0.9em">
                Documento firmado electrónicamente por el contratista, el Jefe de la Sección y el Concejal Coordinador
                del Área
            </td>
        </tr>
    </table>


</body>

</html>
