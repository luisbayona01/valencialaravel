<?php

namespace App\Http\Controllers;

use App\Models\Evidencia;
use App\Models\Parte;
use App\Models\Elementosparte;
use Barryvdh\DomPDF\Facade\Pdf;
use DB;

class ReportPartesController extends Controller
{
    public function generarinforme()
    {
       $totalSum = DB::table('informecorrectivo')->sum('Total');
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

    ->where('EST.id','5')->get();


//dd($partes);



        $informeCorrectivo = DB::table('informecorrectivo')->get()->toArray();

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
        $pdf = Pdf::loadView('pdf.informeParte', compact('partes', 'img', 'conjuntosDeInformes','totalSum'));
        //$pdf->inline('informeParte.pdf');

        return $pdf->stream();

    }
}
