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
            $Usuarios = new User(["añoCertificado" => $request->añoCertificado,
                "mesVigente" => $request->mesVigente,
                "AñoVigente" => $request->AñoVigente,
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
                "ejec_anteriores" => $request->idrejec_anterioresol,
                "ImgPortada" => $request->ImgPortada]);

            if ($Usuarios->save()) {

                //$menssage = "Usuario registrado correctamente";

                return redirect()->route('portada')
            ->with('success', 'Portada certificacion Actualizada correctamente');

            }
        }

        //return $token;



}

