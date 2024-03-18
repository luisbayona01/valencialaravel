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


    </style>


    <title></title>

</head>

<body class="antialiased">
@php

               $Tbajaoppdf = $totalSum + $totalPartes->total;
                $porcentaje = floatval(21.90);
                $resultbaja = ($Tbajaoppdf * $porcentaje) / 100;
                $restarbaja1 = $Tbajaoppdf - $resultbaja;

           $porcentaje = 13.0;
            $gastosgeneralesS2 = ($restarbaja1 * $porcentaje) / 100;
          $porcentaje = 6.0;
            $beneficioInd = ($gastosgeneralesS2 * $porcentaje) / 100;
      $suma = $restarbaja1 + $gastosgeneralesS2 + $beneficioInd;

         $porcentaje = 21;
            $iva21s3 = ($suma * $porcentaje) / 100;

            $suma2 = $suma - $penalidad;
            $totalizacion = $iva21s3 + $suma2;


            $totalletras = app('App\Http\Controllers\ReportPartesController')->numerosletras($totalizacion);
@endphp

    <table class="border table-bordered" width="100%">
        <thead >
            <tr>
                <td rowspan="2" style="width: 60%"> <img src="{{ $img }}" width="80%" height="50"></td>
                <td width='40%' colspan="3" style="text-align:center ">1 / {{ $portada->anoCertificado }}</td>
            </tr>
            <tr>
                <td width='40%' colspan="3" style="text-align:center ">Mes de {{ $portada->mesVigente }} de {{ $portada->AnoVigente }}</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td rowspan="2" style="text-align:justify;font-size: 12px;"> <strong>OBRA:</strong>{{ $portada->obra }}</td>
                <td width='50%' rowspan="2" colspan="3" style="text-align:left; font-size: 12px;">
                    {{ $portada->contratista }}
                    <br>{{ $portada->contactoContratista }}
                    <br>{{ $portada->ubicacion }}</td>
            </tr>


        </tbody>

    </table>
    <table class="table table-bordered" width="100%">
        <tr>
            <td width='100%' colspan="3" style="text-align:center ">Aplicación presupuestaria LJ 160/13300/21000
            </td>

        </tr>
        <tr width='100%'>

            <td style="text-align:left; font-size: 0.7em" colspan="2">Inicio contrato: {{ \Carbon\Carbon::parse($portada->fechaInicioContrato)->locale('es_ES')->isoFormat('dddd, DD [de] MMMM [de] YYYY') }}</td>
            <td width='100%' style="text-align:justify; font-size: 0.7em ">Plazo de ejecución:  {{ $portada->plazoejecucion}} años
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
                <p style="text-align: center ; font-size: 0.9em ">{{ $portada->bajaobtenida }} %</p>
            </td>
            <td style="text-align: left; width:50%; font-size: 0.8em ; ">
                <p>Fecha de la adjudicación: {{ \Carbon\Carbon::parse($portada->fechaAdjudicacion)->locale('es_ES')->isoFormat('dddd, DD [de] MMMM [de] YYYY') }}</p>
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
            <td style="width:20%; text-align: right; font-size: 0.7em;">{{number_format($totalizacion, 2, ',', '.') .' '. 'Euros' }}</td>
            <td style="width:20%; text-align: right; font-size: 0.7em;">0,00 Euros</td>
            <td></td>
        </tr>
</table>
<!-- class='ocultar-bordes' -->
<table style='font-size:0.7em; width: 100%' border="1">
    <tr>
        <td style="width: 80%; border:none">Ejecución material de las obras ...............................................................................................................................</td> <td style='text-align: right; border:none'>{{number_format($Tbajaoppdf, 2, ',', '.').' '.'Euros'}}</td>
    </tr>
    <tr>
        <td style="border:none">Valor por Revisión de Precios ..................................................................................................................................</td> <td style="text-align: right ; border:none">0,00 Euros</td>
    </tr>
    <tr>
        <td style="border:none">TOTAL REVISADO ..................................................................................................................................................</td> <td style="text-align: right; border:none">{{number_format($Tbajaoppdf, 2, ',', '.').' '.'Euros'}} </td>
    </tr>
    <tr>
        <td style="border:none">Baja Obtenida 32,00% .............................................................................................................................................</td> <td style="text-align: right; border:none"> {{number_format($resultbaja, 2, ',', '.').' '.'Euros'}}</td>
    </tr>
    <tr>
        <td style="border:none"><strong>DIFERENCIA ...........................................................................................................................................................</strong></td> <td style="text-align: right; border:none"> {{number_format($restarbaja1, 2, ',', '.').' '.'Euros'}}</td>
    </tr>
    <tr>
        <td style="border:none">Gastos Generales 13,00% .......................................................................................................................................</td><td style="text-align: right; border:none"> {{number_format($gastosgeneralesS2, 2, ',', '.').' '.'Euros'}} </td>
    </tr>
    <tr>
        <td style="border:none">Beneficio Industrial 6,00% ........................................................................................................................................</td> <td style="text-align: right; border:none"> {{number_format($beneficioInd, 2, ',', '.').' '.'Euros'}} </td>
    </tr>
    <tr>
        <td style="border:none">SUMA .......................................................................................................................................................................</td> <td style="text-align: right; border:none">{{number_format($suma, 2, ',', '.').' '.'Euros'}} </td>
    </tr>
    <tr>
        <td style="border:none">ABONO POR PENALIDAD REFERENTE AL ART. 27.2 .........................................................................................</td> <td style="text-align: right; border:none">- {{ number_format($penalidad, 2, ',', '.' ).' '.'Euros' }}</td>
    </tr>
    <tr>
        <td style="border:none">SUMA .......................................................................................................................................................................</td> <td style="text-align: right; border:none">{{ number_format($suma2, 2, ',', '.' ).' '.'Euros'}}</td>
    </tr>

    <tr>
        <td style="border:none">I.V.A 21,00% ............................................................................................................................................................</td> <td style="text-align: right; border:none"> {{number_format($iva21s3, 2, ',', '.').' '.'Euros'}}</td>
    </tr>
    <tr>
        <td style="border:none">LIQUIDO A PERCIBIR EL CONTRATISTA .............................................................................................................</td> <td style="text-align: right; border:none"> {{number_format($totalizacion, 2, ',', '.').' '.'Euros'}}</td>
    </tr>
</table>
<br>
<p style="text-align: justify; font-size: 0.9em">Y para que conste y pueda servir de abono, expido la presente certificación de: {{$totalletras}}</p>

<br>

<table border="0" style="width: 100%">
    <tr>
        <td colspan="3" style="text-align: center; padding: 5px 5px 5px 15px; border: none; font-size:0.8em">
            VALENCIA, <label id="fechaActual2">{{$currentDateTime}}</label>
        </td>
    </tr>
    <tr>
        <td colspan="3" style="text-align: center; padding: 5px 5px 5px 15px; border: none; font-size:0.7em">
            Documento firmado electrónicamente por el contratista, el Jefe de la Sección y el Concejal Coordinador
            del Área
        </td>
    </tr>
</table>




 <!-- SEGUNDA Area TABLA LISTA DE CONSERVACIÓN -->
<div style="page-break-before: always;">

    @php

        $totalTotal = 0;
        $totaltotalesEPartes = 0;
    @endphp
    <!--<table>
        <tr>
            <td style="width: 100%">
                <center><img src="{{ base_path('public/img/imagen_Relacion_valorada.png') }}" width="100%" height="50"></center>
            </td>
        </tr>
        <tr>

        </tr>
    </table>-->
    @foreach ($conjuntosDeInformes as $index => $conjunto)
        <table style="width: 100%; border:0" id="tablaConservancia">
            <thead >
                <tr>
                    <td style="width: 90%; padding: 0; border: none;" colspan="7">
                        <center><img src="{{ base_path('public/img/LogoTablaConservacion.png') }}" width="90%" height="150px" style="border: none; display: block;"></center>
                    </td>
                </tr>
                <tr>
                    <td style="width: 90%; padding: 0; border: none;" colspan="7" >
                        <label for="">Desde el {{$fechaInicio}} hasta el {{$fechaFin}}</label>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" style="border-bottom: 1px solid black; border-top: none; border-left: none; border-right: none; padding: 0; margin: 0; width: 100%;"></td>
                </tr>
                <tr>
                    <td colspan="7" style="border-bottom: 1px solid black; border-top: none; border-left: none; border-right: none; padding: 0; margin: 0; width: 100%;"></td>
                </tr>
                <tr>
                    <td style="width: 90%; padding: 3px; margin: 3px; border: none;" colspan="7"></td>
                </tr>



                <tr >
                    <th style="text-align: center; font-size: 0.7em; width: 7%">Codigo</th>
                    <th style="text-align: center; font-size: 0.7em; width:40%;">Concepto</th>
                    <th style="text-align: center; font-size: 0.7em; width: 8%">Uds en garantía</th>
                    <th style="text-align: center; font-size: 0.7em; width: 11%">Uds en conservación</th>
                    <th style="text-align: center; font-size: 0.7em; width: 11%">Días en conservación</th>
                    <th style="text-align: center; font-size: 0.7em; width: 11%">Precio (€ por día)</th>
                    <th style="text-align: center; font-size: 0.7em; width: 12%">Total</th>
                </tr>
            </thead>
            <tbody style="border:none">
                @foreach ($conjunto as $item)
                    <tr>
                        <td style="text-align:center; font-size: 0.7em;  padding: 0; margin: 0 ">{{ $item->Codigo }}</td>
                        <td style="text-align:left; font-size: 0.7em;  padding: 0; margin: 0 ">{{ $item->Concepto }}</td>
                        <td style="text-align:center; font-size: 0.7em;  padding: 0; margin: 0 ">{{ $item->Uds_en_garantia }}</td>
                        <td style="text-align:center; font-size: 0.7em;  padding: 0; margin: 0 ">{{ $item->Uds_en_conservacion }}</td>
                        <td style="text-align:center; font-size: 0.7em;  padding: 0; margin: 0 ">{{ $item->Dias_en_conservacion }}</td>
                        <td style="text-align:right; font-size: 0.7em; padding: 0, 5, 0, 0; margin: 0;">{{ $item->Euros_por_dia }} €</td>
                        <td style="text-align:right; font-size: 0.7em; padding: 0, 5, 0, 0 ; margin: 0;">{{ number_format($item->Total, 2, ',', '.') }} €</td>


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

            <td width='100%' colspan="3" style="text-align:center ">{{ number_format($totalSum, 2, ',', '.') }} Euros</td>
        </tr>

    </table>
</div>

<!-- FIN SEGUNDA Area TABLA LISTA DE CONSERVACIÓN -->

<!-- TERCERA Area TABLA RELACION VALORADA - PARTES -->

<div style=" ">

    @php
        $contador = 0; // Inicializar el contador
    @endphp

    @foreach ($partes as $index => $parte)

        @php
            $contador++; // Incrementar el contador
            $elementos = app('App\Http\Controllers\ElementosController')->list_data_elements_api_elemntparte($parte->id);
            $totalporparte = app('App\Http\Controllers\ElementosController')->totalporparte($parte->id);
        @endphp

        <table style="width: 100%; border:none;page-break-before: always;" class="table table-bordered">


            <thead>
                <tr style="text-align: center;">
                    <td colspan="3" style="border: none; width: 100%">
                        <center><img src="{{ base_path('public/img/imagen_Relacion_valorada.png') }}" width="100%"
                            height="50"></center>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="padding: 0px 0px 0px 25px; width:60%; border:none">
                        <h4> Relacion valorada de Partes</h4>
                    </td>
                    <td colspan="1" style="padding: 0px 0px 0px 25px; width:30%; border:none">
                        <h4>Lote No.</h4>
                    </td>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td colspan="2" style="text-align: left; padding: 10px 0px 10px 20px; font-size:0.8em; border:none">
                        <strong>No. Orden:</strong> <label id="noOrden">{{ $contador }}</label>
                    </td>
                    <td colspan="1" style="text-align: right; padding: 0px 20px 0px 0px; font-size:0.8em; border:none">Parte de <label>
                            <strong>{{ $parte->tipoparte }}</strong> </label><strong>No.: </strong> <label><strong>{{ $parte->id }}</strong></label>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: left; padding: 10px 0px 10px 20px; font-size:0.8em; border:none" colspan="1">
                        <strong>Código Localización:</strong> <label>{{ $parte->cod_localizacion }}</label>
                    </td>
                    <td style="text-align: right; padding: 0px 0px 0px 0px; font-size:0.8em; border:none" colspan="2"><label>{{ $parte->descripcion}}</label></td>
                </tr>

                <tr>

                    <td style="text-align: left; padding: 10px 0px 10px 20px; font-size:0.7em; width:30%; border:none"><strong>Autorizado por:
                        </strong><label>{{ $parte->autorizadopor }}</label></td>
                    <td style="text-align: left; padding: 10px 0px 10px 20px; font-size:0.7em; width:30%; border:none"><strong>Reparado por:</strong>
                        <label>{{ $parte->reportadoPor }}</label></td>
                    <td style="text-align: left; padding: 10px 0px 10px 20px; font-size:0.7em; width:40%; border:none"><strong>Fecha conforme:</strong>
                        <label>{{$parte->fechaautorizacion}}</label></td>
                </tr>
                <tr>
                    <td style="text-align: justify; padding: 10px 0px 10px 20px; font-size:0.8em; border:none" colspan="3" with="100%">
                        <p> <strong>Observaciones: </strong> {{ $parte->obscreadorparte }}</p>
                    </td>
                </tr>

                <tr>
                    <!--<td style="text-align: justify; padding: 10px 0px 10px 20px; border:none"><strong>N° C.</strong></td>-->
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
            <table style="width: 100%" id="table-relacion" border="0">
                <thead>
                    <tr>
                        <th style="width: 15%">Código</th>
                        <th style="width: 40%">Descripción</th>
                        <th style="width: 15%">Cantidad</th>
                        <th style="width: 15%">Precio</th>
                        <th style="width: 15%">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($elementos as $elemento)
                        <tr>
                            <td style="text-align: center; padding: 5px 0px 5px 0px; font-size:0.7em">{{ $elemento->elemento }}</td>
                            <td style="text-align: justify; padding: 5px 0px 5px 10px; font-size:0.7em">{{ $elemento->descripcion }}
                            </td>
                            <td style="text-align: right; padding: 5px 10px 5px 0px; font-size:0.7em">{{ $elemento->cantidad }}</td>
                            <td style="text-align: right; padding: 5px 10px 5px 0px; font-size:0.7em">{{ $elemento->precioU }} </td>
                            <td style="text-align: right; padding: 5px 10px 5px 0px; font-size:0.7em">
                                {{ number_format($elemento->precio_total, 2, ',', '.') }} eur</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            </tbody>
            </table>

            @if (count($elementos) > 0)
            @endif
            <br>

            <table style="width:95%" border="0">
                </thead>
                <tbody>
                    <td style="width: 50%; border: none;"></td>
                    <td
                        style="width: 15%; text-align: right; padding: 0; border-top: 3px solid black; border-bottom:0; border-left:0; border-right:0 ">
                        <strong>Total</strong></td>
                    @php
                        $totalParte = number_format($totalporparte->total, 2, ',', '.' );
                    @endphp
                    <td style="width: 35%; text-align: right;  padding: 0; border-top: 3px solid black; border-bottom:0; border-left:0; border-right:0 ">
                        {{ number_format($totalporparte->total, 2, ',', '.') }} eur</td>
                </tbody>

            </table>
            @php
                $totaltotalesEPartes += 0 + $totalporparte->total;
            @endphp
        @endif
        <br>


    @endforeach

    <table style="width:95%" border="0">
    <tbody>

        <td style="width: 30%; border:none;"></td>
        <td style="width: 35%; text-align: right; padding: 0; border-top: 3px solid black; border-bottom:0; border-left:0; border-right:0">
            <strong>Importe Total Partes </strong></td>
        <td style="width: 35%; text-align: right;  padding: 0; border-top: 3px solid black; border-bottom:0; border-left:0; border-right:0"><label
                id="totalGeneralRelacion">{{number_format($totaltotalesEPartes, 2, ',', '.') }} Euros </label></td>
    </tbody>

</table>

</div>

<!-- FIN TERCERA Area TABLA RELACION VALORADA - PARTES -->


    <!-- FIN TERCERA Area TABLA RELACION VALORADA - PARTES -->

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
            <td style="width: 15%; border: none; text-align:right; padding: 5px 5px 5px 10px">{{ number_format($totalSum, 2, ',', '.' ) }}</td>
            <td style="width: 10%; border: none; padding: 5px 5px 5px 7px">Euros</td>
        </tr>
        <tr style="font-size:0.7em">
            <td style="border: none;">VALORACIÓN COLISIONES Y MODIFICACIONES ...................................................</td>
            <td style="border-bottom: 3px solid black; border-top: none; border-left: none; border-right: none;  text-align:right; padding: 5px 7px 5px 10px;">
                {{number_format($totaltotalesEPartes, 2, ',', '.' ) }} </td>
            <td style="padding: 5px 5px 5px 7px; border: none;">Euros</td>
        </tr>
        <tr style="font-size:0.7em">
            <td style="border: none">SUMA ...........................................................................................................................</td>
            <td style="text-align:right; padding: 5px 7px 5px 10px; border:none">
                {{ number_format($totalSum + $totaltotalesEPartes, 2, ',', '.') }} </td>
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
                    id="suma2">{{ number_format($totalSum + $totaltotalesEPartes, 2, ',', '.') }}</label></td>
            <td style="padding: 5px 5px 5px 7px; border:none">Euros </td>
        </tr>
        <tr style="font-size:0.7em">
            @php
                $Tbajaoppdf = $totalSum + $totaltotalesEPartes;
                $porcentaje = floatval( $portada->bajaobtenida );
                $resultbaja = ($Tbajaoppdf * $porcentaje) / 100;
            @endphp
            <td style="border: none">BAJA OBTENIDA 21,90% s/(1) ...................................................................................</td>
            <td style="border-bottom: 3px solid black; border-top: none; border-left: none; border-right: none; text-align:right; padding: 5px 7px 5px 10px"><label
                    id="multiplicar1"></label>{{ number_format($resultbaja, 2, ',', '.' ) }} </td>
            <td style="padding: 5px 5px 5px 7px; border:none">Euros</td>
        </tr>
        @php
            $restarbaja1 = $Tbajaoppdf - $resultbaja;
        @endphp

        <tr style="font-size:0.7em">
            <td style="border: none">EJECUCIÓN MATERIAL .............................................................................................</td>
            <td style="text-align:right; padding: 5px 7px 5px 10px; border:none"><label id="resta1">
                    {{ number_format($restarbaja1, 2, ',', '.' ) }}</label></td>
            <td style="padding: 5px 5px 5px 7px; border:none">Euros</td>
        </tr>
        @php
            $porcentaje = 13.0;
            $gastosgeneralesS2 = ($restarbaja1 * $porcentaje) / 100;
        @endphp
        <tr style="font-size:0.7em">
            <td style="border: none">GASTOS GENERALES 13,00% S/(2) .........................................................................</td>
            <td style="text-align:right; padding: 5px 7px 5px 10px; border: none"><label
                    id="multiplicar2">{{ number_format($gastosgeneralesS2, 2, ',', '.' ) }}</label></td>
            <td style="padding: 5px 5px 5px 7px; border:none">Euros</td>
        </tr>
        @php
            $porcentaje = 6.0;
            $beneficioInd = ($gastosgeneralesS2 * $porcentaje) / 100;
        @endphp
        <tr style="font-size:0.7em">
            <td style="border: none">BENEFICIO INDUSTRIAL 6,00% S/(2) .......................................................................</td>
            <td style="border-bottom: 3px solid black; border-top: none; border-left: none; border-right: none; text-align:right; padding: 5px 7px 5px 10px"><label
                    id="multiplicar3">{{ number_format($beneficioInd, 2, ',', '.' ) }}</label></td>
            <td style="padding: 5px 5px 5px 7px; border:none">Euros</td>
        </tr>

        @php
            $suma = $restarbaja1 + $gastosgeneralesS2 + $beneficioInd;
        @endphp
        <tr style="font-size:0.7em">
            <td style="border: none">SUMA ...........................................................................................................................</td>
            <td style="text-align:right; padding: 5px 7px 5px 10px; border:none"><label
                    id="suma3">{{ number_format($suma, 2, ',', '.' ) }}</label></td>
            <td style="padding: 5px 5px 5px 7px; border:none">Euros</td>
        </tr>
        @php
            $porcentaje = 21;
            $iva21s3 = ($suma * $porcentaje) / 100;
            $totalizacion = $iva21s3 + $suma2;
        @endphp

        <!-- Penalidades Resumen General -->
        <tr style="font-size:0.7em">
            <td style="border: none">ABONO POR PENALIDAD REFERENTE AL ART. 27.2 .............................................</td>
            <td style="text-align:right; padding: 5px 7px 5px 10px; border-bottom: 3px solid black; border-top: none; border-left: none; border-right: none;">
                <label id="penalidad">- {{ number_format($penalidad, 2, ',', '.' ) }}</label>
            </td>
            <td style="padding: 5px 5px 5px 7px; border:none">Euros</td>
        </tr>



        <!-- Resta de las Penalidades Resumen General -->
        <tr style="font-size:0.7em">
            <td style="border: none">SUMA ...........................................................................................................................</td>
            <td style="text-align:right; padding: 5px 7px 5px 10px; border:none"><label
                    id="suma3">{{ number_format($suma2, 2, ',', '.' ) }}</label></td>
            <td style="padding: 5px 5px 5px 7px; border:none">Euros</td>
        </tr>

        <tr style="font-size:0.7em">
            <td style="border: none">I.V.A (21 %) S/(3) .........................................................................................................</td>
            <td style="border-bottom: 3px solid black; border-top: none; border-left: none; border-right: none; text-align:right; padding: 5px 7px 5px 10px"><label
                    id="multiplicar4"> {{ number_format($iva21s3, 2, ',', '.' ) }}</label></td>
            <td style="padding: 5px 5px 5px 7px; border: none">Euros</td>
        </tr>
    </table>


    <br>
    <table style="width:95%; border-collapse: collapse; " border="0">
        </thead>
        <tbody style="font-size:0.9em">
            <td style="width: 45%; font-size:0.9em; border: none"><STRong>TOTAL CERTIFICACIÓN ..........................................................................</STRong></td>
            <td style="width: 15%; text-align:right; border:none"><label
                    id="totalResumen">{{ number_format($totalizacion, 2, ',', '.' ) }} </label></td>
            <td style="width: 10%; padding: 5px 5px 5px 7px; border:none"> Euros.</td>
        </tbody>
    </table>

    <br><br><br><br><br>
    <table border="0" style="width: 100%">
        <tr>
            <td colspan="3" style="text-align: center; padding: 5px 5px 5px 15px; border: none; font-size:0.8em">
                VALENCIA, <label id="fechaActual2">{{$currentDateTime}}</label>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center; padding: 5px 5px 5px 15px; border: none; font-size:0.7em">
                Documento firmado electrónicamente por el contratista, el Jefe de la Sección y el Concejal Coordinador
                del Área
            </td>
        </tr>
    </table>


</body>

</html>
