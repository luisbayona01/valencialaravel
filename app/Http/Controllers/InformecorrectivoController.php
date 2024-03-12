<?php

namespace App\Http\Controllers;

use App\Models\Informecorrectivo;
use Illuminate\Http\Request;
use App\Imports\XltImport;
use PhpOffice\PhpSpreadsheet\IOFactory;
/**
 * Class InformecorrectivoController
 * @package App\Http\Controllers
 */
class InformecorrectivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informecorrectivos = Informecorrectivo::all();

        return view('informecorrectivo.index', compact('informecorrectivos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $informecorrectivo = new Informecorrectivo();
        return view('informecorrectivo.create', compact('informecorrectivo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 $file = $request->file('xlt_file');

        $reader = IOFactory::createReader('Xls');
        $reader->setReadFilter(new XltImport);

        $spreadsheet = $reader->load($file->getPathname());

        $data = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);


        foreach ($data as $key => $row) {
  if ($key <= 2) {
        continue; // Salta las primeras dos filas
    }

 //dd($row);

//Codigo Concepto ,Uds_en_garantia Uds_en_conservacion Dias_en_conservacion Euros_por_dia Total Fecha_de_carga


      informecorrectivo::create([
                'Codigo' => $row['A'], // Ajusta esto según tus columnas
                 'Concepto'=>$row['B'],
                'Uds_en_garantia' => $row['C'],
                'Uds_en_conservacion'=>$row['D'],
                'Dias_en_conservacion'=>$row['E'],
                'Euros_por_dia'=>$row['F'],
                'Total'=>$row['G']
                 ]);
        }
       return response()->json([
            'ok' => true,
            'menssage' => 'importacion exitosa',
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $informecorrectivo = Informecorrectivo::find($id);

        return view('informecorrectivo.show', compact('informecorrectivo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $informecorrectivo = Informecorrectivo::find($id);

        return view('informecorrectivo.edit', compact('informecorrectivo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Informecorrectivo $informecorrectivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Informecorrectivo $informecorrectivo)
    {
        request()->validate(Informecorrectivo::$rules);

        $informecorrectivo->update($request->all());

        return redirect()->route('informecorrectivos.index')
            ->with('success', 'Informecorrectivo Editado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $informecorrectivo = Informecorrectivo::find($id)->delete();

        return redirect()->route('informecorrectivos.index')
            ->with('success', 'Informecorrectivo Eliminado Correctamente');
    }
}
