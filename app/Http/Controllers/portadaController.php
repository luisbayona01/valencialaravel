<?php

namespace App\Http\Controllers;

use App\Models\portada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
 use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Pagination\Paginator;
use PDF;





/**
 * Class portadaController
 * @package App\Http\Controllers
 */
class portadaController extends Controller
{

    public function portada()
    {
        $portada = new portada();

        return view('portada', compact('user','roles', 'estado', 'codigo'));
    }

    public function store(Request $request)
    {

        //$password='Etra1234';//

            //dd($datarequest);
            $Usuarios = new portada(["anoCertificado" => $request->anoCertificado,
                "anoVigente" => $request->anoVigente,
                "contratista" => $request->contratista,
                "contactoContratista" => $request->contactoContratista,
                "ubicacion" => $request->ubicacion,
                "obra"=>$request->obra,
                "fechaInicioContrato"=>$request->fechaInicioContrato,
                "plazoejecucion" => $request->plazoejecucion,
                "iva" => $request->iva,
                "bajaobtenida" => $request->bajaobtenida,
                "fechaAdjudicacion"=>$request->fechaAdjudicacion,
                "beneficioind" => $request->beneficioind,
                "gastosgenerales" => $request->gastosgenerales,
                "imgportada" => $request->imgportada]);

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

        //return $token;



}

