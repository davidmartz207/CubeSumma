<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Matríz</title>
  <link rel="stylesheet"  href="{{asset('css/bootstrap.min.css')}}">


</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<form role="form" action="{{asset('/validar')}}"  id="form"   method="POST"> 
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
				<div class="form-group">	 
					<label for="exampleInputEmail1">
						Tareas:
					</label>
                    <input type="number"  value=0 name="tareas" id="tareas" onchange="agrega();">					
				</div>
				<button type="button" class="btn btn-primary" onclick="validar();">
					Ejecutar
				</button>
				<div  id="script" class="form-group">

				</div>
				
			</form>
		</div>
	</div>
</div>


    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript">
	function agrega(){
		$('#script').empty();
		for (var i = 1; i <= $('#tareas').val(); i++) {
		$('#script').append( 'Tarea'+i+'<div class="form-group">'+
				             '<label>Dimension</label><input type="number" name="dimension['+i+']" id="dimension'+i+'">'+
							 '<label>Acciones</label><input type="number" name="accion['+i+']" id="accion'+i+'"><br>'+
							 '<textarea id="query'+i+'" rows="9" name="query['+i+']" ></textarea>'+
		                     '</div>'
			                )	
		}
	}


	function validar(){
		if ($('#tareas').val() <= 0 ||  $('#tareas').val()>50 ) {
			alert("Número de tareas incorrecto Min=1 , Max=50");
			return false;
        }else{
        	if (!validaDimension()) {
        		alert("Dimensión incorrecta  Min=1 , Max=100");
        		return false;
        	}else{
        		if (!validaAccion()) {
        			alert("Numero de acciones incorrecto  Min=1 , Max=1000");
        		    return	false;
        		}else{
        			if (!validaScript()) {
        				alert("El campo de script no puede estar vacío");
        				return false;
        			}else{
        				$('#form').submit();
        			}
        		}
        	}
        }
	}

	function validaDimension(){
		var cont=0;
		for (var i = 1; i <= $('#tareas').val(); i++) {
			if ($('#dimension'+i).val() <= 0 ||  $('#dimension'+i).val()>100) {
        		cont++;
        	}
        }
        if (cont>0) {
        	return false;
        }else{
        	return true;
        }
	}
	
	function validaAccion(){
		var cont=0;
		for (var i = 1; i <= $('#tareas').val(); i++) {
			if ($('#accion'+i).val() <= 0 ||  $('#accion'+i).val()>1000) {
        		cont++;
        	}
        }
        if (cont>0) {
        	return false;
        }else{
        	return true;
        }
	}

	function validaScript(){
		var cont=0;
		for (var i = 1; i <= $('#tareas').val(); i++) {
			if ($('#query'+i).val() == "") {
        		cont++;
        	}
        }
        if (cont>0) {
        	return false;
        }else{
        	return true;
        }
	}


</script>
</body>
</html>