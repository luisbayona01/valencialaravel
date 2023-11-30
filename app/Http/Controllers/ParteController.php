<?php

namespace App\Http\Controllers;

use App\Models\Parte;
use App\Models\Localizacion;
use App\Models\Tipoparte;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Carbon;
 use Illuminate\Support\Facades\Auth;
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

        $partes =  DB::table('parte as P')
        ->select(
        'P.id',
        'LC.cod_localizacion',
        'TP.nombre as tipoparte',
        DB::raw("CONCAT(U.nombres, '', U.apellidos) as partecreadopor"),
        'P.fechacreacion',
        'P.reportadoPor',
        'P.fechareporte',
        'P.obscreadorparte',
        'P.asignadoA',
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
    ->get();

        return view('parte.index', compact('partes'));

    }


    public function create()
    {    $currentDateTime = Carbon::now()->toDateTimeLocalString();
        $parte = new Parte();
       $ultimoId = Parte::latest('id')->first()->id ?? 0;
        $no=$ultimoId +1;
        $localizaciones = Localizacion::pluck(DB::raw("CONCAT(cod_localizacion, ', ', descripcion, ', ', zona) as ubicacion"), 'id');
        $tipoparte= Tipoparte::pluck('nombre', 'id');

     //dd($no);
      return view('parte.create', compact('parte','no','localizaciones','tipoparte','currentDateTime'));
    }


    public function store(Request $request)
    {
       $datos=$request->all();
       $datos['estadoparte_id']=1;
        //request()->validate(Parte::$rules);

        $parte = Parte::create($datos);

        return redirect()->route('partes.index')
        ->with('success', 'Parte created successfully.');
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
        return view('parte.edit', compact('parte','no','localizaciones','tipoparte','currentDateTime'));
    }


    public function update(Request $request, Parte $parte)
    {
        request()->validate(Parte::$rules);

        $parte->update($request->all());

        return redirect()->route('partes.index')
            ->with('success', 'Parte updated successfully');
    }


}
