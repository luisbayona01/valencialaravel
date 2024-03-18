<?php


namespace App\Http\Controllers;

use App\Models\Parte;
use Barryvdh\DomPDF\Facade\Pdf;
use DB;
use Illuminate\Http\Request;
use Luecano\NumeroALetras\NumeroALetras;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class ReportPartesController extends Controller
{
    public function generarinforme(Request $request)
    {


   //dd($request->fechacorrectivo);
$fechacorectivo= explode("-",$request->fechacorrectivo);
$mesC=$fechacorectivo[0];
$anioC=$fechacorectivo[1];
//dd($dia,$mes,$fechacorectivo);
        $currentDateTimes = Carbon::now();
     Carbon::setLocale('es');
// Obtener día, mes y año en formato de cadena
$dia = $currentDateTimes->day;
$mes = $currentDateTimes->format('m'); // Obtener el número del mes
$anio = $currentDateTimes->year;
$nombreMes = $currentDateTimes->isoFormat('MMMM');
/*   "fechaautorizacionInicio" => "2024-01-01"
"fechaautorizacionFin" => "2024-02-28*/
//dd($request);

$currentDateTime=$dia.'-'.$nombreMes.'-'.$anio;
        $partesid = $request->input('parte_ids');
  //dd( $partesid);
        $penalidad_raw = $request->input('penalidad');

        // Reemplazar comas por puntos (si las comas son el separador decimal)
        $penalidad = str_replace(',', '.', $penalidad_raw);
        //dd($partesid);
//die();
        //$portada = DB::table('portada')->latest()->first();
        $portada = DB::table('portada')->orderBy('noCertificado', 'desc')->first();
        $fechaInicio = $request->input('fechaautorizacionInicio');
        $fechaFin = $request->input('fechaautorizacionFin');

        if (empty($fechaInicio) || empty($fechaFin)) {
            // Si fecha de inicio no está presente, establece el primer día del mes actual
            $fechaInicio = date('Y-m-01');

            // Si fecha de fin no está presente, establece el último día del mes actual
            $fechaFin = date('Y-m-t');
        }

        $img = base_path('public/img/icono_representativo_caratulapdf.png');
//die();
        $partes = DB::table('parte as P')
            ->select(
                'P.id',
                'LC.cod_localizacion',
                'LC.descripcion',
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

            ->where('EST.id', '5')->wherein('P.id', $partesid)->get();

//dd($partes);
        $parteIds = $partes->pluck('id')->toArray();

// Realiza la segunda consulta utilizando los IDs obtenidos
        $totalPartes = DB::table('elemtos_parte')
            ->select(DB::raw('SUM(precio_total) as total'))
            ->whereIn('parteid', $parteIds)
            ->first();

//dd($totalPartes);

// Consulta para obtener la suma de 'Total' entre las fechas indicadas
        $totalSum = DB::table('informecorrectivo')
             ->whereRaw('YEAR(Fecha_de_carga) = ?', [$anioC])
             ->whereRaw('MONTH(Fecha_de_carga) = ?', [$mesC])
            ->sum('Total');


//dd($fechaInicio, $fechaFin);


// Consulta para obtener los informes correctivos entre las fechas indicadas
        $informeCorrectivo = DB::table('informecorrectivo')
     ->whereRaw('YEAR(Fecha_de_carga) = ?', [$anioC])
    ->whereRaw('MONTH(Fecha_de_carga) = ?', [$mesC])
    ->get()
    ->toArray();
//dd($informeCorrectivo,$totalSum);

        $chunkSize = 28;
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

  $fechaActual = now()->format('Ymd');

// Obtener el ID del usuario logeado
$idUsuario = Auth::id();
$user=new User();
$rollname=  $user->rolname();
// Generar el nombre del archivo PDF con la fecha actual y el ID del usuario
 $nombreArchivo = 'informe_' . $fechaActual .'_'.$rollname.'_' . $idUsuario . '.pdf';

        //dd($totalSum);
        $pdf = Pdf::loadView('pdf.informeParte', compact('portada','penalidad', 'partes', 'img', 'conjuntosDeInformes', 'totalSum', 'totalPartes', 'fechaInicio', 'fechaFin','currentDateTime'));
        //$pdf->inline('informeParte.pdf');
        $pdf->setPaper('legal');
        //Parte::whereIn('id', $parteIds)->update(['estadoparte_id' => 6]);
        $pdfPath = public_path('pdfs/'.$nombreArchivo);
        $pdf->save($pdfPath);
     return view('pdf.pdf_viewer', ['pdfUrl' => asset('pdfs/'.$nombreArchivo),'idspartes'=>$parteIds]);
     //return $pdf->stream();

    }

    /* public function procesarFormulario(Request $request)
    {
    // Obtener el valor del input "penalidad" del formulario
    $penalidad = $request->input('penalidad');

    // Pasar la variable $penalidad a la vista
    return view('informeParte', ['penalidad' => $penalidad]);
    }
     */
    /*public function numerosletras($valor)
    {

    $valor_formateado = number_format($valor / 100, 2, '.', '');
    $formatter = new NumeroALetras();
    $texto =$formatter->toMoney($valor_formateado, 2, 'EUROS', 'CÉNTIMOS');
    return  $texto;
    }*/


    public function numerosletras($valor)
    {
        $formatter = new NumeroALetras();
        $texto = $formatter->toMoney($valor, 2, 'EUROS', 'CÉNTIMOS');
        return $texto;
    }

  public  function validarchecks( Request $request){

$partesid=$request->parte_ids;
  $totalPartes = DB::table('elemtos_parte')
            ->select(DB::raw('SUM(precio_total) as total'))
            ->whereIn('parteid', $partesid)
            ->first();

 return response()->json([
            'ok' => true,
            'totalPartes' => $totalPartes,
        ]);

}

  public   function    certificarpartes(Request $request){
  $parteIds= $request->parte_ids;
  Parte::whereIn('id', $parteIds)->update(['estadoparte_id' => 6]);
  return response()->json([
            'ok' => true,
            'respuesta' => 'se han certificado los partes',
        ]);

   }




}
