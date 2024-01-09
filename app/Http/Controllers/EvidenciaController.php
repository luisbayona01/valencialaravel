<?php

namespace App\Http\Controllers;

use App\Models\Evidencia;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
/**
 * Class EvidenciumController
 * @package App\Http\Controllers
 */
class EvidenciaController extends Controller
{
     public function list_evidencia($idparte){

     $Evidencia=Evidencia::where('parteevidencia_id',$idparte)->get();
      //return ;
//dd($idparte,$Evidencia);
       return response()->json(['evidencias' => $Evidencia]);

     }
    public function store(Request $request)
    {
        // Validar el formulario según tus necesidades
        $request->validate([
            'file.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            // Añade más reglas de validación según sea necesario
        ]);
        $data = $request->all();
        // Obtener las imágenes del formulario
        if ($request->hasFile('file')) {
            $imagenes = $request->file('file');

            foreach ($imagenes as $imagen) {
             //dd($imagen);
                $nombreImagen = Str::slug($imagen->getClientOriginalName(), '_');

                $imagen->storeAs('img/imgPartes', $nombreImagen, 'public');

                // Almacenar la ruta completa en la base de datos
                $data['file'] = 'img/imgPartes/' . $nombreImagen;

                $evidencia = Evidencia::create($data);

                if (!$evidencia) {

                    return response()->json(['success' => false, 'message' => 'Error al guardar la evidencia']);

                }

            }
        }

        return response()->json(['success' => true, 'message' => 'Se adjuntaron evidencias al parte ']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evidencium = Evidencium::find($id);

        return view('evidencium.show', compact('evidencium'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Evidencium $evidencium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evidencia $evidencia)
    {
        request()->validate(Evidencium::$rules);

        $evidencia->update($request->all());

        return redirect()->route('evidencia.index')
            ->with('success', 'Evidencium updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $evidencium = Evidencium::find($id)->delete();

        return redirect()->route('evidencia.index')
            ->with('success', 'Evidencium deleted successfully');
    }
}
