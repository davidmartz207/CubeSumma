<?php 
public function post_confirm(){
	$id       =Input::get('service_id');
	$servicio =Service::find($id);
	$driver_id=Input::get('driver_id');
    if($servicio != NULL){
    	if($servicio->status_id == 6){
    		return Response::json(array('error'=>'2'));
    	}


        if($servicio->user->uuid==''){
           return Response::json(array('error'=>'0'));	
  	    }

    	if($servicio->driver_id==NULL && $servicio->estatus_id=='1'){
    	try {
      		DB::beginTransaction();
    		
				$data1=array(
                	          'available'=>'0',
    			    	    );

    			$driverTmp=Driver::update($driver_id,$data1);


    			$data2=array(
                	          'driver_id'=>$driver_id,
							  'status_id'=>'2',
							  'car_id'=> $driverTmp
    			    	    );
	    		$servicio= Service::update($id,$data2);
    	        $pushMessage="tu servicio ha sido confirmado!";
        	    $push = Push::make();

	            if ($servicio->user->uuid=='1') {
    	        	$result=$push->ios($servicio->user->uuid,$pushMessage,1,'honk.wav','Open',array('serviceId'=>$servicio->id));
        	    }else{
            		 $result=$push->android2($servicio->user->uuid,$pushMessage,1,'default','Open',array('serviceId'=>$servicio->id));
	            }
    		DB::commit();

       	} catch (\Exception $e) {
       		DB::rollback();
       		return Response::json(array('error'=>'4'));
     	}

    	}else{
    		return Response::json(array('error'=>'1'));	
    	}
    }else{
    	return Response::json(array('error'=>'3'));
    }
}

 ?>
