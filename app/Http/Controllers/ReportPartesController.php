<?php

namespace App\Http\Controllers;

use App\Models\Evidencia;
use App\Models\Parte;
use App\Models\Elementosparte;
use Barryvdh\DomPDF\Facade\Pdf;
use DB;
use Luecano\NumeroALetras\NumeroALetras;
use Illuminate\Http\Request;
class ReportPartesController extends Controller
{
    public function generarinforme(Request $request)
    {



/*   "fechaautorizacionInicio" => "2024-01-01"
      "fechaautorizacionFin" => "2024-02-28*/
//dd($request);
$partesid=$request->input('parte_ids');

$penalidad= $request->input('penalidad');
 //dd($partesid);
//die();



        $img = base_path('public/img/icono_representativo_caratulapdf.png');
//die();
       $partes = DB::table('parte as P')
    ->select(
        'P.id',
        'LC.cod_localizacion',
        'TP.nombre as tipoparte',
        DB::raw("U.codigo as partecreadopor"),
        'P.fechacreacion',
        DB::raw("UL.codigo as autorizadopor"),
        'P.fechaautorizacion',
        DB::raw("UR.codigo as reportadoPor"),
        'P.fechareporte',
        'P.obscreadorparte',
        'P.fecha_validacion',
        'EST.estadoparte'
    )

    ->join('tipoparte as TP', 'P.idtipoparte', '=', 'TP.id')
    ->join('localizacion as LC', 'LC.id', '=', 'P.id_localizacion')
    ->join('estadoparte as EST', 'EST.id', '=', 'P.estadoparte_id')
    ->join('users as U', 'U.id', '=', 'P.creadopor')
    ->join('users as UL', 'UL.id', '=', 'P.autorizado_por')
    ->join('users as UR', 'UR.id', '=', 'P.reportadopor')

    ->where('EST.id','5')->wherein('P.id',$partesid)->get();

//dd($partes);
$parteIds = $partes->pluck('id')->toArray();


// Realiza la segunda consulta utilizando los IDs obtenidos
$totalPartes = DB::table('elemtos_parte')
    ->select(DB::raw('ROUND(SUM(precio_total), 2) as total'))
    ->whereIn('parteid', $parteIds)
    ->first();



       $fechaInicio = $request->input('fechaautorizacionInicio');
$fechaFin = $request->input('fechaautorizacionFin');

// Consulta para obtener la suma de 'Total' entre las fechas indicadas
$totalSum = DB::table('informecorrectivo')
    ->whereBetween('Fecha_de_carga', [$fechaInicio, $fechaFin])
    ->sum('Total');


//dd($totalSum);

// Consulta para obtener los informes correctivos entre las fechas indicadas
$informeCorrectivo = DB::table('informecorrectivo')
    ->whereBetween('Fecha_de_carga', [$fechaInicio, $fechaFin])
    ->get()
    ->toArray();
//dd($informeCorrectivo);

        $chunkSize = 30;
        $totalItems = count($informeCorrectivo);

// Calcular cuántos conjuntos completos se pueden formar
        $numCompleteChunks = intdiv($totalItems, $chunkSize);

// Calcular el tamaño del último conjunto
        $lastChunkSize = $totalItems % $chunkSize;

// Dividir el array en conjuntos
        $conjuntosDeInformes = array_chunk($informeCorrectivo, $chunkSize);

// Si el último conjunto es menor que $chunkSize, agrégale más elementos del inicio para completarlo
        if ($lastChunkSize > 0) {
            $conjuntosDeInformes[$numCompleteChunks] = array_merge(
                $conjuntosDeInformes[$numCompleteChunks],
                array_slice($informeCorrectivo, $numCompleteChunks * $chunkSize, $lastChunkSize)
            );
        }

  //dd($totalSum);
        $pdf = Pdf::loadView('pdf.informeParte', compact('penalidad', 'partes', 'img', 'conjuntosDeInformes','totalSum','totalPartes'));
        //$pdf->inline('informeParte.pdf');
       $pdf->setPaper('legal');
Parte::whereIn('id', $parteIds)->update(['estadoparte_id' => 6]);
        return $pdf->stream();

    }

   /* public function procesarFormulario(Request $request)
    {
        // Obtener el valor del input "penalidad" del formulario
        $penalidad = $request->input('penalidad');

        // Pasar la variable $penalidad a la vista
        return view('informeParte', ['penalidad' => $penalidad]);
    }
*/
    public  function numerosletras($valor){

    $valor_formateado = number_format($valor / 100, 2, '.', '');
    $formatter = new NumeroALetras();
    $texto =$formatter->toMoney($valor_formateado, 2, 'EUROS', 'CENTAVOS');
    return  $texto;
    }

}
