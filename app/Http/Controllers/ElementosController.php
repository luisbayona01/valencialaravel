<?php
namespace App\Http\Controllers;

use App\Models\Elementosparte;
use DB;
use Illuminate\Http\Request;

class ElementosController extends Controller
{
    public function save_ajax_api_elementos(request $request)
    {

        Elementosparte::create(['cantidad' => $request->input('cantidad'),
            'precio_total' => $request->input('total'),
            'parteid' => $request->idparte,
            'elementosd_id' => $request->input('idelemento'),
        ]);

        return response()->json([
            'ok' => true,
            'menssage' => 'Elemento agregado',
        ]);

    }

    public function list_data_elements_api_elemntparte($id)
    {
        $resultados = DB::table('elemtos_parte as Ep')
            ->select('Ep.cantidad', 'Ep.precio_total', 'P.id as numeroparte', 'DSlP.elemento', 'DSlP.descripcion', 'DSlP.precio as precioU', 'Ep.idelementos_parte')
            ->join('parte as P', 'P.id', '=', 'Ep.parteid')
            ->join('descripcionelementos as DSlP', 'DSlP.id', '=', 'Ep.elementosd_id')
            ->where('P.id', $id)
            ->get();

        return $resultados;
    }

    public function updateElementos(Request $request)
    {
//    dd('Se ejecutó la función');
        $data = $request->all();
        $id = $request->id;
        $elementoParte = Elementosparte::find($id);
        //dd($elementoParte);

        unset($data['id']);
        $elementoParte->fill($data);

        // Guarda los cambios en la base de datos
        $elementoParte->save();

        return response()->json([
            'ok' => true,
            'menssage' => 'Elemento editado',
        ]);

    }

    public function deleteElementos(Request $request)
    {

        $id = $request->id;

        Elementosparte::find($id)->delete();
        //return response()->json(['message' => 'Elemento eliminado correctamente']);

        return response()->json([
            'ok' => true,
            'menssage' => 'Elemento eliminado correctamente',
        ]);

    }

}
