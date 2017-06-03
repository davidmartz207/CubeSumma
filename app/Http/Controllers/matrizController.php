<?php

namespace matriz\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class matrizController extends Controller
{

	public function __construct()
    {

    }
    //metodo: validar
    //retorna: Redirección,array
    public function validar()
    {
        $tareas    = Input::get('tareas');
    	$dimension = Input::get('dimension');
        $accion    = Input::get('accion');
        $query     = Input::get('query');
        for ($i=1; $i <= $tareas ; $i++) {
            $matriz=[]; 
            $matriz=$this->inicializar($dimension[$i]);
            $resultado[$i] = $this->ejecutar($matriz,$query[$i],$dimension[$i],$accion[$i]);       
            if(!is_array($resultado[$i])) {
                break 1;
            }
        }
        
        return view('resultados',['resultado'=>$resultado]);
        
    }

    //metodo:  inicializar
    //recibe:  dimension: tamaño de la matriz
    //retorna: array
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

    //metodo:  ejecutar
    //recibe:  matriz:    Matriz de datos inicializada
    //         query:     Elemento ubicado en el campo script del form
    //         dimension: Tamaño de la matriz
    //         accion:    Numero de tareas
    //retorna: array, string
    public function ejecutar($matriz , $query, $dimension, $accion){
        $array = explode("\n",  $query);
        $valido=0;
        if(count($array) > $accion || count($array) < $accion){
           $valido = "Error número de tareas incorrecto verifique script";
        }else{
           $valido=1;
        }

        if($valido ==1){
            $r=0; $resultado=[];
            for ($i=0; $i < count($array) ; $i++) { 
                if(is_array($matriz)){
                    if (strpos($array[$i], 'QUERY')!==false) {
                        $res=$this->sumar($matriz,$array[$i],$dimension);
                        if(!is_array($res)){
                            $resultado[$r]=$res;
                            $r++;
                        }else{
                            $resultado=$res;
                            break 1;    
                        }
                    }
                    if (strpos($array[$i], "UPDATE")!==false) {
                        $matriz=$this->actualiza($matriz,$array[$i],$dimension);                 
                    }
                }else{
                    $resultado=$matriz;
                    break 1;       
                }
            }            
        }else{
          $resultado=$valido;            
        }

        return $resultado;
    }
    //metodo:  ejecutar
    //recibe:  matriz:    Matriz de datos 
    //         query:     Elemento ubicado en el campo script del form
    //         dimension: Tamaño de la matriz
    //retorna: array, string
    public function actualiza($matriz , $array, $dimension){

        $operacion = explode(" ",  $array);
        $x=(integer)$operacion[1];
        $y=(integer)$operacion[2];
        $z=(integer)$operacion[3];
        $w=(integer)$operacion[4]; 
        $valido=0;
        if ($x<1   || $x>(integer)$dimension){
           $valido= "Error variable x debe estar en el rango 1 a ".$dimension; 
        }else{
            if ($y<1   || $y>(integer)$dimension){
               $valido= "Error variable y debe estar en el rango 1 a ".$dimension; 
            }else{
                if ($z<1   || $z>(integer)$dimension){
                    $valido= "Error variable z debe estar en el rango 1 a ".$dimension; 
                }else{
                    if ($w<-1000000000 || $w>1000000000){
                        $valido= "Error variable w debe estar en el rango -10^9 a 10^9";
                    }else{
                        $valido=1;
                    }
                }
            }
        }
        if($valido == 1){
          $matriz[$x][$y][$z]=$w;
        }else{
          $matriz=$valido;
        }
        return $matriz;
    }

    //metodo:  ejecutar
    //recibe:  matriz:    Matriz de datos inicializada
    //         query:     Elemento ubicado en el campo script del form
    //         dimension: Tamaño de la matriz
    //         accion:    Numero de tareas
    //retorna: integer, string
    public function sumar($matriz , $array,$dimension){
        $operacion = explode(" ",$array);
        $x1=(integer)$operacion[1];$x2=(integer)$operacion[4];
        $y1=(integer)$operacion[2];$y2=(integer)$operacion[5];
        $z1=(integer)$operacion[3];$z2=(integer)$operacion[6];
        $valido=0;
 
        if ( $x1 < 1 || $x1 > $x2 || $x1 > (integer)$dimension || $x2 > (integer)$dimension || $x2<1 ) {
           $valido= "Error verifique script cumpla condición 1 <= x1 <= x2 <=".$dimension; 
        }else{
            if ( $y1 < 1 || $y1 > $y2 || $y1 > (integer)$dimension || $y2 > (integer)$dimension || $y2<1 ) {
               $valido= "Error verifique script cumpla condición 1 <= y1 <= y2 <=".$dimension; 
            }else{
                if ( $z1 < 1 || $z1 > $z2 || $z1 > (integer)$dimension || $z2 > (integer)$dimension || $z2<1 ) {
                  $valido= "Error verifique script cumpla condición 1 <= z1 <= z2 <=".$dimension; 
                }else{
                  $valido =1;
                }
            }  
        }
        if ($valido==1){
            $suma=0;$i=0;
            for ($i=$x1; $i <= $x2; $i++) { 
                for ($j=$y1; $j <=$y2 ; $j++) { 
                    for ($k=$z1; $k <=$z2 ; $k++) { 
                        $suma+=$matriz[$i][$j][$k];
                    }
                }   
            }
        }else{
            $suma=array($valido);
        }

       return $suma;       
    }
    
}
    