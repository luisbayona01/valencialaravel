<?php

namespace App\Http\Controllers;

use App\Models\Parte;
use App\Models\Localizacion;
use App\Models\Tipoparte;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Carbon;
 use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Descripcionelementos;
use App\Models\ElementoParte;
use App\Models\Elementosparte; // Import the Element model or replace it with the appropriate model namespace
use Illuminate\Support\Facades\Storage;



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

$partes = DB::table('parte as P')
    ->select(
        'P.id',
        'LC.cod_localizacion',
        'TP.nombre as tipoparte',
        DB::raw("CONCAT(U.nombres, '', U.apellidos) as partecreadopor"),
        'P.fechacreacion',
        DB::raw("CONCAT(UR.nombres, '', UR.apellidos) as reportadoPor"),
        'P.fechareporte',
        'P.obscreadorparte',
        DB::raw("CONCAT(UA.nombres, '', UA.apellidos) as asignadoA"),
        'P.fechaAsignacion',
        'P.obsOperador',
        'P.validado_por',
        'P.fecha_validacion',
        'P.obscliente',
        'EST.estadoparte'
    )
    ->join('tipoparte as TP', 'P.idtipoparte', '=', 'TP.id')
    ->join('localizacion as LC', 'LC.id', '=', 'P.id_localizacion')
    ->join('estadoparte as EST', 'EST.id', '=', 'P.estadoparte_id')
    ->join('users as U', 'U.id', '=', 'P.creadopor')
    ->join('users as UR', 'UR.id', '=', 'P.reportadopor')
    ->join('users as UA', 'UA.id', '=', 'P.asignadoa');

// Aplicar condición según el rol del usuario
if ($rolUsuario == 1) {
    // No aplicar ninguna condición adicional
} else {
    // Filtrar por el usuario asignado si el rol es diferente de 1
    $partes->where('P.asignadoa', '=',  Auth::user()->id);
}

$partes = $partes->get();



        return view('parte.index', compact('partes'));

    }


    public function create()
    {   $currentDateTime = Carbon::now()->toDateTimeLocalString();
        $parte = new Parte();
        $ultimoId = Parte::latest('id')->first()->id ?? 0;
        $no=$ultimoId +1;
        $estado='';
        $localizaciones = Localizacion::pluck(DB::raw("CONCAT(cod_localizacion, ', ', descripcion, ', ', zona) as ubicacion"), 'id');
        $tipoparte= Tipoparte::pluck('nombre', 'id');
        $reportadopor = User::where('id', '!=',Auth::user()->id)->pluck(DB::raw("CONCAT(nombres, ', ', apellidos) as nombrecompleto"),'id');


         $asignadoa = User::where('idrol', '=','4')->pluck(DB::raw("CONCAT(nombres, ', ', apellidos) as nombrecompleto"),'id');
     //dd($reportadopor);
   //dd($reportadopor);
$Descripcionelementos = Descripcionelementos::pluck(DB::raw("CONCAT(descripcion,'-',elemento,'-',precio) as valor"), 'id');
      return view('parte.create', compact('parte','no','localizaciones','tipoparte','currentDateTime','reportadopor','asignadoa','Descripcionelementos'));
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
 $datos['estadoparte_id']=1;
        //request()->validate(Parte::$rules);
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
        $reportadopor = User::where('id', '!=', '')->pluck(DB::raw("CONCAT(nombres, ', ', apellidos) as nombrecompleto"),'id');
     $asignadoa = User::where(function($query) {
    switch (Auth::user()->idrol) {
        case 1:
            $query->where('idrol', '=', '1');
            break;

        case 4:


            $query->where('idrol', '=', '1');
            break;

        // Otros casos si es necesario

        default:
            // Lógica si no coincide con ninguno de los casos anteriores
            break;
    }
        })->pluck(DB::raw("CONCAT(nombres, ', ', apellidos) as nombrecompleto"), 'id');



       /* elmentos*/
          $Descripcionelementos = Descripcionelementos::pluck(DB::raw("CONCAT(descripcion,'-',elemento,'-',precio) as valor"), 'id');
    return view('parte.edit', compact('parte','no','localizaciones','tipoparte','currentDateTime','reportadopor','asignadoa','Descripcionelementos'));
    }


    public function update(Request $request,$id)
    {

        //request()->validate(Parte::$rules);
       //$rolUsuario = Auth::user()->idrol;
        $data=$request->all();
       //dd($data);


      switch (Auth::user()->idrol) {
        case 1:
            $data['estadoparte_id']=1;
            break;
        case 2:
            $data['estadoparte_id']=2;
            break;
        case 3:
            $data['estadoparte_id']=5;
            break;
        case 4:
          $data['estadoparte_id']=4;
            break;
        case 5:
            $data['estadoparte_id']=3;
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



}

