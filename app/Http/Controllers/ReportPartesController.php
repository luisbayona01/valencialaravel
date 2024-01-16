<?php

namespace App\Http\Controllers;

 use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Evidencia;

use DB;


class ReportPartesController extends Controller
{
   public function  generarinforme(){

$img= base_path('public/img/icono_representativo_caratulapdf.png');
//die();
    $parte = DB::table('parte as P')
    ->select('T.nombre as tipopart', 'LC.descripcion', 'P.id as idparte', 'P.fechacreacion', 'P.fechareporte', 'P.obscreadorparte')
    ->join('tipoparte as T', 'P.idtipoparte', '=', 'T.id')
    ->join('localizacion as LC', 'LC.id', '=', 'P.id_localizacion')
    ->where('P.id', '=', 1)
    ->get();

    $dataParte= $parte[0];
    $elementosparte=$resultados = DB::table('elemtos_parte as Ep')
            ->select('Ep.cantidad', 'Ep.precio_total', 'P.id as numeroparte', 'DSlP.elemento', 'DSlP.descripcion', 'DSlP.precio as precioU', 'Ep.idelementos_parte')
            ->join('parte as P', 'P.id', '=', 'Ep.parteid')
            ->join('descripcionelementos as DSlP', 'DSlP.id', '=', 'Ep.elementosd_id')
            ->where('P.id', 1)
            ->get();
    $Evidencia=Evidencia::where('parteevidencia_id',1)->get();

$pdf= Pdf::loadView('pdf.informeParte',compact('dataParte','Evidencia','elementosparte','img'));
     //$pdf->inline('informeParte.pdf');

return $pdf->stream();

    }
}
