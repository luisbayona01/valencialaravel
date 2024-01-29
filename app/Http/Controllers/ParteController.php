<?php

namespace App\Http\Controllers;

use App\Models\Parte;
use App\Models\Localizacion;
use App\Models\Tipoparte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
 use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Descripcionelementos;
use App\Models\ElementoParte;
use App\Models\Elementosparte; // Import the Element model or replace it with the appropriate model namespace
use Barryvdh\DomPDF\PDF\paginate;
//use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Pagination\Paginator;
use PDF;
 use App\Models\Estadoparte;




/**
 * Class ParteController
 * @package App\Http\Controllers
 */
class ParteController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {  //dd( Auth::user()->nombres);

    $rolUsuario = Auth::user()->idrol;
    $subquery = DB::table('elemtos_parte as ELP')     ->select(DB::raw('SUM(ELP.precio_total)'))     ->whereColumn('ELP.parteid', 'P.id');

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
        DB::raw("UA.codigo as asignadoA"),
        'P.fechaAsignacion',
        'P.validado_por',
        'P.fecha_validacion',
        'EST.estadoparte'
    )
    ->join('tipoparte as TP', 'P.idtipoparte', '=', 'TP.id')
    ->join('localizacion as LC', 'LC.id', '=', 'P.id_localizacion')
    ->join('estadoparte as EST', 'EST.id', '=', 'P.estadoparte_id')
    ->join('users as U', 'U.id', '=', 'P.creadopor')
    ->join('users as UL', 'UL.id', '=', 'P.autorizado_por')
    ->join('users as UR', 'UR.id', '=', 'P.reportadopor')
    ->join('users as UA', 'UA.id', '=', 'P.asignadoa')
    ->addSelect(['totalImp' => $subquery]);

// Aplicar condición según el rol del usuario

switch ($rolUsuario) {

    case 1:
    //$partes->where('P.estadoparte_id', '=' );
    break;

    case 2:
    $partes->where('P.estadoparte_id', '=', 1 );
    break;

    case 3:
    $partes->where('P.estadoparte_id', '=', 2 );
    break;

    case 4:
    $partes->where('P.estadoparte_id', '=', 3 );
    break;

    case 5:
        $partes->where('P.estadoparte_id', '=', 4 );
        break;

    default:
        # code...
        break;
}

/*if ($rolUsuario == 3) {

    // No aplicar ninguna condición adicional
} else {
    // Filtrar por el usuario asignado si el rol es diferente de 1
    $partes->where('P.estadoparte_id', '=', 2 );
}*/

$partes = $partes->get();
//dd($partes);



        return view('parte.index', compact('partes'));

    }

/* METODO - VARIABLES Y DIRECCIONAMIENTOS PARA LA GENERACION DEL CERTIFICADO */
public function generarparte(Request $request)
{  //dd( Auth::user()->nombres);
  //dd('')
    $rolUsuario = Auth::user()->idrol;
$subquery = DB::table('elemtos_parte as ELP')
    ->select(DB::raw('SUM(ELP.precio_total)'))
    ->whereColumn('ELP.parteid', 'P.id')
    ->where('P.estadoparte_id', 5);

$partes = DB::table('parte as P')
  ->select(
      'P.id',
      'LC.cod_localizacion',
      'TP.nombre as tipoparte',
      DB::raw("CONCAT(U.nombres, '', U.apellidos) as partecreadopor"),
      'P.fechacreacion',
      DB::raw("CONCAT(UL.nombres, '', UL.apellidos) as autorizadopor"),
      'P.fechaautorizacion',
      DB::raw("CONCAT(UR.nombres, '', UR.apellidos) as reportadoPor"),
      'P.fechareporte',
      'P.obscreadorparte',
      DB::raw("CONCAT(UA.nombres, '', UA.apellidos) as asignadoA"),
      'P.fechaAsignacion',
      'P.validado_por',
      'P.fecha_validacion',
      'EST.estadoparte'
  )
  ->join('tipoparte as TP', 'P.idtipoparte', '=', 'TP.id')
  ->join('localizacion as LC', 'LC.id', '=', 'P.id_localizacion')
  ->join('estadoparte as EST', 'EST.id', '=', 'P.estadoparte_id')
  ->join('users as U', 'U.id', '=', 'P.creadopor')
  ->join('users as UL', 'UL.id', '=', 'P.autorizado_por')
  ->join('users as UR', 'UR.id', '=', 'P.reportadopor')
  ->join('users as UA', 'UA.id', '=', 'P.asignadoa')
  ->addSelect(['totalImp' => $subquery]);
// Aplicar condición según el rol del usuario
if ($rolUsuario == 1) {
  // No aplicar ninguna condición adicional
$partes->where('P.estadoparte_id','=','5');
} else {
  // Filtrar por el usuario asignado si el rol es diferente de 1
  $partes->where('P.asignadoa', '=',  Auth::user()->id)
        ->where('P.estadoparte_id','=','5');   /*   solo se mostraran los que estan en estado validado*/
}

if ($request->filled('fechaautorizacionInicio')  && $request->filled('fechaautorizacionFin')) {

$fechaInicio=$request->fechaautorizacionInicio;
$fechaFin=$request->fechaautorizacionFin;

//dd($fechaInicio,
//$fechaFin);
 $partes->whereBetween('fechaautorizacion', [$fechaInicio, $fechaFin]);
        }



$partes = $partes->get();
//dd($partes);


      return view('parte.generarparte', compact('partes'));

}


public function pdf()
{
    $pdfs = parte::paginate();

    //$pdf = PDF::loadView('parte.pdf',['pdfs'=>$pdfs]);
    //$pdf->loadHTML('<h1>Test1</h1>');
    //return $pdf->stream();

    return view('parte.pdf', compact('pdfs'));

}

/* FIN METODO - VARIABLES Y DIRECCIONAMIENTOS PARA LA GENERACION DEL CERTIFICADO */

    public function create()
    {   $currentDateTime = Carbon::now()->toDateTimeLocalString();
        $parte = new Parte();
        $ultimoId = Parte::latest('id')->first()->id ?? 0;
        $no=$ultimoId +1;
        $estado='';
        $localizaciones = Localizacion::pluck(DB::raw("CONCAT(cod_localizacion, ', ', descripcion, ', ', zona) as ubicacion"), 'id');
        $tipoparte= Tipoparte::pluck('nombre', 'id');
        $reportadopor = User::whereIn('idrol', [3, 4])->pluck('codigo', 'id');

        $autorizadopor = User::where('idrol', '=','5')->pluck('codigo', 'id');;


         $asignadoa = User::where('idrol', '=','2')->pluck('codigo', 'id');
        //dd($reportadopor);
        //dd($reportadopor);
        $Descripcionelementos = Descripcionelementos::pluck(DB::raw("CONCAT(descripcion,'-',elemento,'-',precio) as valor"), 'id');
        return view('parte.create', compact('parte','no','localizaciones','tipoparte','currentDateTime','reportadopor','asignadoa','Descripcionelementos','autorizadopor'));
        }

        public function mostrarPartes()
        {
            $totalPartes = Parte::count();

            return view('/home.blade.php', ['totalPartes' => $totalPartes]);
        }


    public function store(Request $request)
    {

   $partes= Parte::where('id',$request->idparte)->first();
   $idparte='';
   if ($partes) {
    $data=$request->all();
    $id=$request->idparte;
    $Parte = Parte::find($id);
    $data['estadoparte_id']=1;
    $Parte->fill($data);
    $Parte->save();


} else {

//$partes=Parte::create(['creadopor'=> $request->creadopor]);
//$idparte=$partes->id;
 //dd($request->creadopor);

 $datos=$request->all();
 //dd($datos);
 $datos['id']= $datos['idparte'];

 $datos['estadoparte_id']=2;
        //request()->validate(Parte::$rules);
//dd($datos);
        $parte = Parte::create($datos);


}

      //dd($datos);

      return redirect()->route('partes.index')
        ->with('success', 'Parte creado Correctamente!');

        // Validate and store the uploaded image

        //dd($request->hasFile('imgParte') );
    }




    public function show($id)
    {
        $parte = Parte::find($id);

        return view('parte.show', compact('parte'));
    }


    public function edit($id)
    {
        $parte = Parte::find($id);
        $currentDateTime =  $parte->fechacreacion;
        $localizaciones = Localizacion::pluck(DB::raw("CONCAT(cod_localizacion, ', ', descripcion, ', ', zona) as ubicacion"), 'id');
        $tipoparte= Tipoparte::pluck('nombre', 'id');
        $no=$id;
        //$reportadopor = User::where('id', '!=',Auth::user()->id)->pluck(DB::raw("CONCAT(nombres, ', ', apellidos) as nombrecompleto"),'id');
        $reportadopor = User::where('id', '!=', '')->pluck('codigo', 'id');
        $autorizadopor = User::where('id', '!=', '')->pluck('codigo', 'id');
        $asignadoa = User::where(function($query) {switch (Auth::user()->idrol) {


        /* Casos para determinar nivel de Perfil */
        /*case 1:
            $query->where('idrol', '=', '1');
            break;
        case 2:
            $query->where('idrol', '=', '2');
            break;
        case 3:
            $query->where('idrol', '=', '3');
            break;
        case 4:
            $query->where('idrol', '=', '4');
            break;


        default:
            // Lógica si no coincide con ninguno de los casos anteriores
            break;*/
    }
        })->pluck('codigo', 'id');

  /* dependinedo el estado el  debe mostrar los  estados para el selct  segun sea */

 /*

@if ($parte->estadoparte_id === 5) <!-- Hide "Comprobado" button for estado 5 Validado -->
  <!-- Show the "Comprobado" button -->
  <button style="text-align: left;" type="submit" class="btn btn-primary float-right">{{ __('Validado') }}</button>
  <!-- Add some margin between the buttons -->
  <td style="width: 10px;"></td>

  <!-- Mostrar boton "Rechazado" -->
  <button style="text-align: left; margin-right: 10px;" type="submit" name="rechazar_button" class="btn btn-danger float-right">{{ __('Rechazado') }}</button>
  {{ Form::hidden('nuevo_estadoparte_id', 1) }}
@endif*/


if (Auth::user()->idrol==1){
    $estadopPartes= Estadoparte::pluck('estadoparte', 'id');

}else{


    $estadopPartes = Estadoparte::where(function($query) use ($parte) {
        switch ($parte->estadoparte_id) {
            /* Casos para determinar  esatdo */
            case 3:
                $query->whereIn('id', [5, 7,3]);
                break;
            case 4:
                $query->whereIn('id', [5, 7,4]);
                break;
            case 5:
                $query->where('id', [4,7,5]);
                break;

            default:
                // Lógica si no coincide con ninguno de los casos anteriores
                break;
        }
    })->pluck('estadoparte', 'id');




}





       /* elmentos*/
          $Descripcionelementos = Descripcionelementos::pluck(DB::raw("CONCAT(descripcion,'-',elemento,'-',precio) as valor"), 'id');
    return view('parte.edit', compact('parte','no','localizaciones','tipoparte','currentDateTime','reportadopor','asignadoa','Descripcionelementos','autorizadopor','estadopPartes'));
    }


    public function update(Request $request,$id)
    {

        //request()->validate(Parte::$rules);
       //$rolUsuario = Auth::user()->idrol;
        $data=$request->all();

     /*  if (isset ($data['comprobado'])) {
        dd($data['comprobado']);
       }
       else{
        echo'hola mundo';
        die;
       }*/


        /* Casos para determinar nivel de Privilegios y Vistas */

      switch (Auth::user()->idrol) {
        /* Creacion del parte en estado 1 Activo y pasar a estado Revisar */
        /*case 1 : /* Basado en el Rol del Usuario "Administrador"*/
            /* $data['estadoparte_id']=2;
            break;*/


        case 2: /* Basado en el Rol del Usuario "Operario"  y pasar a estado Finalizado */
            $data['estadoparte_id']=2;
            break;

        //$data=$request->input('nuevo_estadoparte_id');
        case 3: /* Basado en el Rol del Usuario "Jefe de Obra"*/
                $data['estadoparte_id']=$request->input('estadoparte_id');
                break;

        /* Revision del parte en estado 2 Revisar */
        case 4 : /* Basado en el Rol del Usuario "Administrador"*/
                $data['estadoparte_id']=$request->input('estadoparte_id'); /* Basado en la accion que ejecuta el Usuario */
                break;
        case 5:
            $data['estadoparte_id']=$request->input('estadoparte_id');
            break;



        // Otros casos si es necesario

        default:
            // Lógica si no coincide con ninguno de los casos anteriores
            break;
    }
       $Parte = Parte::find($id);

        $Parte->fill($data);

        // Guarda los cambios en la base de datos
        $Parte->save();

        return redirect()->route('partes.index')
            ->with('success', 'Elemento actualizado correctamente');
    }

     public function destroy($id)
    {
        $Parte = User::find($id)->delete();

        return redirect()->route('partes.index')
            ->with('success', 'Elemento eliminado correctamente');
    }

    // app/Http/Controllers/PartesController.php

// app/Http/Controllers/ParteController.php

public function deleteElement($id)
{
    // Logic to delete the element from the database based on $idelementosParte
    // Return a response, for example:
    return response()->json(['message' => 'Element deleted successfully']);
}


public function eliminarParteConRelaciones($parteId)
{
    // Iniciar una transacción
    DB::beginTransaction();

    try {
        // Obtener la instancia de Parte
        $parte = Parte::find($parteId);

        if (!$parte) {
            //throw new \Exception("No se encontró la parte con ID $parteId");
 return redirect()->route('partes.index');
        }

        // Eliminar los elementos relacionados en ElementosParte
        $parte->elementosPartes()->delete();

        // Eliminar las evidencias relacionadas en Evidencia
        $parte->evidencias()->delete();

        // Finalmente, eliminar la parte principal
        $parte->delete();

        // Confirmar la transacción
        DB::commit();

           return redirect()->route('partes.index');
    } catch (\Exception $e) {
        // Revertir la transacción en caso de error
        DB::rollBack();

        return redirect()->route('partes.index');
    }
}


}

