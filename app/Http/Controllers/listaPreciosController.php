<?php

namespace App\Http\Controllers;

use App\Models\listaPrecios;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Imports\XltImport;
use PhpOffice\PhpSpreadsheet\IOFactory;
/**
 * Class listaPreciosController
 * @package App\Http\Controllers
 */
class listaPreciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaPrecio = listaPrecios::where('estado','1')->get();

        return view('listaPrecios.index', compact('listaPrecio'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listaPrecios = new listaPrecios();
        return view('listaPrecios.create', compact('listaPrecios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request)
    {
        // Eliminar los registros existentes
        //listaPrecios::truncate();

        $file = $request->file('xlt_file');

        $reader = IOFactory::createReader('Xls');
        $reader->setReadFilter(new XltImport);

        $spreadsheet = $reader->load($file->getPathname());

        $data = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        // Update a single record
        DB::table('descripcionelementos')
        ->where('id', '<>', 0)
        ->update(['estado' => '0']);

        foreach ($data as $key => $row) {
        if ($key <= 0) {
                continue;
            }

 //dd($row);

//id ,elemento, ud, descripcion, precio

        listaPrecios::create([
                'elemento' => $row['A'], // Ajusta esto según tus columnas
                'ud'=>$row['B'],
                'descripcion' => $row['C'],
                'precio'=>$row['D'],
                ]);
        }
       return response()->json([
            'ok' => true,
            'menssage' => 'importacion exitosa',
        ]);

    }

    public function eliminarRegistros(Request $request) {
        try {
           DB::table('descripcionelementos')
        ->where('id', '<>', 0)
        ->update(['estado' => '0']);
            return response()->json(['message' => 'Registros eliminados con éxito'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar registros: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listaPrecios = listaPrecios::find($id);

        return view('listaPrecios.show', compact('listaPrecios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listaPrecios = listaPrecios::find($id);

        return view('listaPrecios.edit', compact('listaPrecios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  listaPrecios $listaPrecios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, listaPrecios $listaPrecios)
    {
        request()->validate(listaPrecios::$rules);

        $listaPrecios->update($request->all());

        return redirect()->route('listaPrecios.index')
            ->with('success', 'listaPrecios updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    /*
    public function destroy($id)
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
    */
}
