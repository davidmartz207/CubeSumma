<?php 
public function post_confirm(){
	$id       =Input::get('service_id');
	$servicio =Service::find($id);
    if($servicio != NULL){

    }else{
    	return Response::json(array('error'=>'3'));
    }
}

 ?>
