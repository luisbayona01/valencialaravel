<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Balance;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToCollection;
use DB;
class BalancesImport implements ToCollection 
{
  


     public function collection(Collection $rows)
    {    $data=[];
    
      
     for ($j=7; $j <count($rows) ; $j++) {
          //echo $rows[$j][8];
          //die();
          $cuenta= $rows[$j][0].''.$rows[$j][1].''.$rows[$j][2].''.$rows[$j][3].''.$rows[$j][4];
          $cuenta=str_replace(' ', '', $cuenta);
          $nit = intval($rows[$j][5]);
  //echo $saldo_anterior=$rows[$j][9]."<br>";
            //echo $this->limpiaracart($saldo_anterior)."<br>";
         $Balance = new Balance([
                'cuenta' => $cuenta,
                'nit' => $nit,
                'dig_verificacion' => $rows[$j][6],
                'descripcion' => $rows[$j][7],
                'saldo_anterior' => $rows[$j][9],
                'debitos' => $rows[$j][10],
                'creditos' => $rows[$j][11],
                'nuevo_saldo' => $rows[$j][12],
                'userid'=>Auth::user()->id 
       
                                     
            ]);

          $Balance->save();
        if ($Balance->cuenta=='') {
                $this->updatecuentas($Balance->id);
               //echo  $Balance->id."<br>";
          }

    }
        
     

       
      
    }


 public function limpiarnumerc($s) 
{ 


//Quitando Caracteres Especiales 

            $s= str_replace('09', '9', $s); 
            $s= str_replace('08', '8', $s);
            $s= str_replace('05', '5', $s);
            $s= str_replace('06', '6', $s);
            $s= str_replace('07', '7', $s);
            $s = str_replace('04', '4', $s);
            $s = str_replace('03', '3', $s);
            $s = str_replace('02', '2', $s);
            $s = str_replace('01', '1', $s);
            return $s; 
}
    public function limpiaracart($s)
    {
     

            $s= str_replace('.', '', $s); 
            $s= str_replace(',', '', $s); 
            return $s; 
    
}

    public function updatecuentas($n)
    {

        $sql = "SELECT  cuenta FROM balance WHERE id = (SELECT MAX(id) FROM balance WHERE id < $n)";
        $data= DB::select($sql);
    foreach ($data as $datos) {
          
           $Balance= Balance::where('id',$n)->update(['cuenta'=>$datos->cuenta]);
               
      }         

         

  }
    
}