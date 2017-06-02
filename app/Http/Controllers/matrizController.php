<?php

namespace matriz\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class matrizController extends Controller
{

	public function __construct()
    {

    }


    	public function validar()
    {
    	$dimension = Input::get('dimension');
        $accion    = Input::get('accion');
        $query     = Input::get('query');
        
        $matriz=$this->inicializar($dimension[1]);
        $this->ejecutar($matriz,$query[1]);
    }


    public function inicializar($dimension){
        $matriz=[];
        for ($i=1; $i <=$dimension ; $i++) { 
            for ($j=1; $j <=$dimension ; $j++) { 
                for ($k=1; $k <=$dimension ; $k++) {
                    $matriz[$i][$j][$k]=0; 
                }
            }   
        }
         return $matriz;
    }


    public function ejecutar($matriz , $query){
        $array = explode("\n",  $query);
        for ($i=0; $i < count($array) ; $i++) { 
            if (strpos($array[$i], 'QUERY')!==false) {
               echo $this->sumar($matriz,$array[$i]);
               echo "<br>";
            }

            if (strpos($array[$i], "UPDATE")!==false) {
                $matriz=$this->actualiza($matriz,$array[$i]);                 
            }
        }
    }

    public function actualiza($matriz , $array){
        $operacion = explode(" ",  $array);
        $x=(integer)$operacion[1];
        $y=(integer)$operacion[2];
        $z=(integer)$operacion[3];
        $w=(integer)$operacion[4];
        $matriz[$x][$y][$z]=$w;
        return $matriz;
    }


    public function sumar($matriz , $array){
        $operacion = explode(" ",$array);
        $suma=0;$i=0;
        for ($i=(integer)$operacion[1]; $i <=(integer)$operacion[4] ; $i++) { 
           for ($j=(integer)$operacion[2]; $j <=(integer)$operacion[5] ; $j++) { 
             for ($k=(integer)$operacion[3]; $k <=(integer)$operacion[6] ; $k++) { 
                $suma+=$matriz[$i][$j][$k];
              }
           }   
        }
       return $suma;       
    }
    
}
    