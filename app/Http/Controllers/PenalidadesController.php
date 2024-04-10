<?php

namespace App\Http\Controllers;

use App\Models\Penalidades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use  DB;

/**
 * Class PenalidadesController
 * @package App\Http\Controllers
 */
class PenalidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penalidades = Penalidades::all();

        return view('penalidades.index', compact('penalidades'));

    }

    public function vistasPenalidad($id)
    {

        $penalidad = Penalidades::where('idPenalidad',$id)->get();
        //dd($penalidades);
        $penalidadesestado = DB::table('penalidadesestado')->pluck('estadopenalidad', 'id');

       $penalidades=$penalidad[0];
        return view('penalidades.vistas', compact('penalidades','penalidadesestado'));




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


public  function Updateestado(Request $request){
  //dd($_POST);
 //print_r($_POST);
/*
 [estadopenalidad_id] => [idpenalidad] => 7
*/
 DB::table('penalidades')
    ->where('idpenalidad',  $request->idpenalidad)
    ->update([
        'estadopenalidad_Id' => $request->estadopenalidad_id,
    ]);
return redirect()->route('penalidades.index')
            ->with('success', 'estado actualizado');
}

    public function create()
    {
        $penalidades = new Penalidades();
        return view('penalidades.create', compact('penalidades'));
    }

    public function modulospenalizacion()
    {
        $penalidades = new Penalidades();
        return view('penalidades.modulospenalizacion.modulospenalizacion', compact('penalidades'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /* FUNCION FORMULARIO INDEPENDIENTES POR PENALIDAD */
        //dd($request);
        //dd($Penalidad4);
        // Crear el registro para S1
        $Penalidad4 = new penalidades(["creadoPor" => $request->creadoPor,
                "fechaCreacion" => $request->fechaCreacion,
                "valorPenalidad4" => $request->S1 ? $request->S1 :
                    ($request->S1A ? $request->S1A :
                    ($request->S1B ? $request->S1B :
                    ($request->S2 ? $request->S2 :
                    ($request->S3 ? $request->S3 :
                    ($request->S4 ? $request->S4 :
                    ($request->S5 ? $request->S5 :
                    ($request->S6 ? $request->S6 :
                    ($request->S7 ? $request->S7 :
                    ($request->S8 ? $request->S8 :
                    ($request->S9 ? $request->S9 :
                    ($request->S10 ? $request->S10 :
                    ($request->S11 ? $request->S11 :
                    ($request->S12 ? $request->S12 :
                    ($request->S13 ? $request->S13 :
                    ($request->S133 ? $request->S133 :
                    ($request->S14 ? $request->S14 :
                    ($request->S15 ? $request->S15 : null))))))))))))))))),
                    "operaciones" => $request->operaciones,
                    "tipoPenalidad" => $request->tipoPenalidad,
                    "obsCreacion" => $request->obsCreacion]);


                // Establecer el estado como 1
                $Penalidad4->estadopenalidad_id = 1;


            if ($Penalidad4->save())

            {

                //$menssage = "Usuario registrado correctamente";

            return redirect()->route('penalidades.index')
            ->with('success', 'Penalizacion Creada exitosamente');

            }


        /* FUNCION DEL CRUD LARAVEL */
        request()->validate(Penalidades::$rules);

        $penalidads = Penalidades::create($request->all());

        return redirect()->route('penalidades.index')
            ->with('success', 'Penalidades created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penalidades = Penalidades::find($id);

        return view('penalidades.show', compact('penalidades'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penalidades = Penalidades::find($id);

        return view('penalidades.edit', compact('penalidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Penalidades $penalidades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penalidades $penalidades)
    {
        request()->validate(Penalidades::$rules);

        $penalidades->update($request->all());

        return redirect()->route('penalidades.index')
            ->with('success', 'Penalidad Actualizada exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $penalidades = Penalidades::find($id)->delete();

        return redirect()->route('penalidades.index')
            ->with('success', 'Penalidades eliminada exitosamente');
    }

    public function mostrarVista()
    {
        $fechaActual = date("Y-m-d H:i:s"); // Fecha y hora actual
        return View::make('penalidades/modulospenalizacion/modulospenalizacion')->with('fechaActual', $fechaActual);
    }


}
