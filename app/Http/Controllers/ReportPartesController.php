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
use App\Models\Certificados;
use App\Models\Penalidades;
use Illuminate\Support\Facades\Log;

class ReportPartesController extends Controller
{
    public function generarinforme(Request $request)
    {

        //dd($request->input());
        //dd($request->fechacorrectivo);
        $idspenalidades=$request->idspenalidades;
        $fechacorectivo = explode("-", $request->fechacorrectivo);
        $mesC = $fechacorectivo[0];
        $anioC = $fechacorectivo[1];
        //dd($dia,$mes,$fechacorectivo);
        $currentDateTimes = Carbon::now();
        Carbon::setLocale('es');
        // Obtener día, mes y año en formato de cadena
        $dia = $currentDateTimes->day;
        $mes = $currentDateTimes->format('m'); // Obtener el número del mes
        $anio = $currentDateTimes->year;
        $nombreMes = $currentDateTimes->isoFormat('MMMM');


        $currentDateTime = $dia . '-' . $nombreMes . '-' . $anio;
        $partesid = $request->input('parte_ids');

        $penalidad_raw = $request->input('penalidad');


        $penalidad = str_replace(',', '.', $penalidad_raw);
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

        $parteIds = $partes->pluck('id')->toArray();

        $totalPartes = DB::table('elemtos_parte')
            ->select(DB::raw('SUM(precio_total) as total'))
            ->whereIn('parteid', $parteIds)
            ->first();

        $totalSum = DB::table('informecorrectivo')
            ->whereRaw('YEAR(Fecha_de_carga) = ?', [$anioC])
            ->whereRaw('MONTH(Fecha_de_carga) = ?', [$mesC])
            ->sum('Total');


        $informeCorrectivo = DB::table('informecorrectivo')
            ->whereRaw('YEAR(Fecha_de_carga) = ?', [$anioC])
            ->whereRaw('MONTH(Fecha_de_carga) = ?', [$mesC])
            ->get()
            ->toArray();

        $chunkSize = 28;
        $totalItems = count($informeCorrectivo);

        $numCompleteChunks = intdiv($totalItems, $chunkSize);

        $lastChunkSize = $totalItems % $chunkSize;

        $conjuntosDeInformes = array_chunk($informeCorrectivo, $chunkSize);

        if ($lastChunkSize > 0) {
            $conjuntosDeInformes[$numCompleteChunks] = array_merge(
                $conjuntosDeInformes[$numCompleteChunks],
                array_slice($informeCorrectivo, $numCompleteChunks * $chunkSize, $lastChunkSize)
            );
        }

        $currentDateTime = Carbon::now();
        $mes_actual_espanol = $currentDateTime->translatedFormat('F');
        $ano_actual = $currentDateTime->year;

        $fechaActual = now()->format('Ymd');
        $mesActualN = now()->format('m');
        // Obtener el ID del usuario logeado
        $idUsuario = Auth::id();
        $user = new User();
        $rollname = $user->rolname();

        //$portada = DB::table('portada')->latest()->first();
        /*$portada = DB::table('portada')->orderBy('noCertificado', 'desc')->first();
        $fechaInicio = $request->input('fechaautorizacionInicio');
        $fechaFin = $request->input('fechaautorizacionFin');*/

        //dd($parteIds);
        $cadenaDelimitadaPorComas = '';
        if (is_array($parteIds)) {
            $cadenaDelimitadaPorComas = implode(',', $parteIds);
        }
        $Certificados = Certificados::where('mesCertificado', $mesActualN)->latest('noCertificado')->first();
        //echo $cadenaDelimitadaPorComas;
        //die();
        //var_dump($Certificados);
        if ($Certificados != null) {
            // echo  "aaaa";
            //die();
            $noCertificado = $Certificados->noCertificado + 1;
        } else {
            //echo 0;
            //die();
            $noCertificado = 1;

        }





        $nombreArchivo = 'Certificado_' . $noCertificado . '_' . $fechaActual . '_' . $idUsuario . '.pdf';

        $pdf = Pdf::loadView('pdf.informeParte', compact('portada', 'penalidad', 'partes', 'img', 'conjuntosDeInformes', 'totalSum', 'totalPartes', 'fechaInicio', 'fechaFin', 'currentDateTime', 'mes_actual_espanol', 'ano_actual', 'noCertificado'));
        //$pdf->inline('informeParte.pdf');
        $pdf->setPaper('legal');
        //Parte::whereIn('id', $parteIds)->update(['estadoparte_id' => 6]);
        $pdfPath = public_path('pdfs/' . $nombreArchivo);
        $pdf->save($pdfPath);
        return view('pdf.pdf_viewer', ['pdfUrl' => asset('pdfs/' . $nombreArchivo), 'idspartes' => $parteIds, 'noCertificado' => $noCertificado, 'mesActualN' => $mesActualN, 'ano_actual' => $ano_actual, 'penalidad' => $penalidad, 'totalSum' => $totalSum,'idspenalidades'=>$idspenalidades]);
        //return $pdf->stream();

    }




    public function numerosletras($valor)
    {
        $formatter = new NumeroALetras();
        $texto = $formatter->toMoney($valor, 2, 'EUROS', 'CÉNTIMOS');
        return $texto;
    }

    public function validarchecks(Request $request)
    {

        $partesid = $request->parte_ids;
        $totalPartes = DB::table('elemtos_parte')
            ->select(DB::raw('SUM(precio_total) as total'))
            ->whereIn('parteid', $partesid)
            ->first();

        return response()->json([
            'ok' => true,
            'totalPartes' => $totalPartes,
        ]);

    }

    public function certificarpartes(Request $request)
    {
        $parteIds = $request->parte_ids;
        $cadenaDelimitadaPorComas = '';
        if (is_array($parteIds)) {
            // Paso 2: Convertir el array en una cadena delimitada por comas
            $cadenaDelimitadaPorComas = implode(',', $parteIds);


        }

         $Certificados = Certificados::where('mesCertificado', $request->mesActualN)->where('partes', $cadenaDelimitadaPorComas)->first();



        if ($Certificados !== null) {
            return response()->json([
                'ok' => true,
                'respuesta' => 'ya se  han certificado los partes',
            ]);
        } else {
            $Certificados = new certificados([
                "noCertificado" => $request->noCertificado,
                "mesCertificado" => $request->mesActualN,
                "anioCertificacion" => $request->ano_actual,
                "penalidades" => $request->penalidad,
                "Val_LisConservacion" => $request->totalSuma,
                "partes" => $cadenaDelimitadaPorComas
            ]);
            //var_dump($Certificados);
            //die();
            $Certificados->save();
            Parte::whereIn('id', $parteIds)->update(['estadoparte_id' => 6]);
            //penalidades::whereIn('id', $penalidad)->update(['estadopenalidad_Id' => 3]);

            //
            Parte::whereIn('id', $parteIds)->update(['ParteEnCertificado' => $request->noCertificado]);
             $idString = $request->idspenalidades;

                        if (!empty($idString)) {
                    // Convertir el string en un array de IDs
                    $penalidadesArray = explode(',', $idString);

                    // Actualizar los registros en la base de datos utilizando el constructor de consultas
                    $penalidad= DB::table('penalidades')
                        ->whereIn('idpenalidad', $penalidadesArray)
                        ->update(['penalidadEnCertificado' => $request->noCertificado,'estadopenalidad_Id'=>3]);
                       //var_dump($penalidad);
                }
        }



        //
        return response()->json([
            'ok' => true,
            'respuesta' => 'se han certificado los partes',
        ]);

    }


    public function store(Request $request)
    {

        //$password='Etra1234';//
        // Validar el formulario según tus necesidades
        $request->validate([
            'imagenes.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            // Añade más reglas de validación según sea necesario
        ]);

        // Obtener las imágenes del formulario
        if ($request->hasFile('imgportada')) {

            $imagenes = $request->file('imgportada');
            // Generar un nombre único para cada imagen
            $nombreImagen = uniqid('imagen_') . '.' . $imagenes->getClientOriginalExtension();

            // Guardar la imagen en la ruta public/img/imaPartes
            $imagenes->move(public_path('/public/img/imgPortadas'), $nombreImagen);
            //dd($request);
        }


        $Usuarios = new certificados([
            "anoCertificado" => $request->anoCertificado,
            "AnoVigente" => $request->AnoVigente,
            "mesVigente" => $request->mesVigente,
            "contratista" => $request->contratista,
            "contactoContratista" => $request->contactoContratista,
            "ubicacion" => $request->ubicacion,
            "obra" => $request->obra,
            "fechaInicioContrato" => $request->fechaInicioContrato,
            "plazoejecucion" => $request->plazoejecucion,
            "iva" => $request->iva,
            "bajaobtenida" => $request->bajaobtenida,
            "fechaAdjudicacion" => $request->fechaAdjudicacion,
            "beneficioind" => $request->beneficioind,
            "gastosgenerales" => $request->gastosgenerales,
            "imgportada" => $nombreImagen
        ]);

        if ($Usuarios->save()) {

            //$menssage = "Usuario registrado correctamente";



            return redirect()->route('configPortada')
                ->with('success', 'Portada certificacion Actualizada correctamente');

        }

        $data = $request->all();
        // Obtener las imágenes del formulario
        if ($request->hasFile('file')) {
            $imagenes = $request->file('file');

            foreach ($imagenes as $imagen) {
                //dd($imagen);
                $nombreImagen = Str::slug($imagen->getClientOriginalName(), '_');

                $imagen->storeAs('img/imgPortadas', $nombreImagen, 'public');

                // Almacenar la ruta completa en la base de datos
                $data['file'] = 'img/imgimgPortadas/' . $nombreImagen;

                $evidencia = portada::configPortada($data);

                if (!$evidencia) {

                    return response()->json(['success' => false, 'message' => 'Error al guardar la evidencia']);

                }

            }
        }
    }




}
