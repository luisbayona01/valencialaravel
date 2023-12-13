<?php
namespace App\Http\Controllers;
use App\Models\Elementosparte;
use Illuminate\Http\Request;
use DB;
class ElementosController extends Controller
{
public  function save_ajax_api_elementos(request $request){
     

       Elementosparte::create(['cantidad'=>$request->input('cantidad'),
                            'precio_total'=>$request->input('total') , 
                            'parteid'=>$request->idparte , 
                            'elementosd_id'=>$request->input('idelemento')
                          ]);

   
                return response()->json([
                        'ok' => true,
                        'menssage' => 'Se agrego un nuevo elemento al parte',
                    ]);


 }
  

public function  list_data_elements_api_elemntparte($id){
  $resultados = DB::table('elemtos_parte as Ep')
    ->select('Ep.cantidad', 'Ep.precio_total', 'P.id as numeroparte', 'DSlP.elemento', 'DSlP.descripcion', 'DSlP.precio as precioU')
    ->join('parte as P', 'P.id', '=', 'Ep.parteid')
    ->join('descripcionelementos as DSlP', 'DSlP.id', '=', 'Ep.elementosd_id')
    ->where('P.id',$id)
    ->get();
  
  
  return $resultados;
  }

  }