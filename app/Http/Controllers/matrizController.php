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
    	$script    = explode("\n", trim(Input::get('script')));
        $tareas    = (integer) $script[0];
        
        $Tarea = []; $query=[];
        $t=0;$q=0;
        for ($i=1; $i < count($script); $i++) { 
        	$evalua= explode(" ", $script[$i]);
        	if(is_numeric($evalua[0])){
        		$Tarea[$t]=$script[$i];
        		$t++;
        	}else{
        		$query[$q]=$script[$i];
        		$q++;
        	}
        }


        for ($i=0; $i < count($Tarea); $i++) { 
        	$evalua= explode(" ", $tarea[$i]);
            for ($j=0; $j < $evalua[1]; $j++) { 
            	
            }
        }

        echo count($Tarea)."<br>";
        echo var_dump($query);
    	
    }
    
}
    