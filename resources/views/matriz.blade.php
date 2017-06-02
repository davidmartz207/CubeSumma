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
			<form role="form" action="{{asset('/validar')}}" method="POST"> 
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
				<div class="form-group">	 
					<label for="exampleInputEmail1">
						Tareas:
					</label>
                    <input type="number"  value=0 name="tareas" id="tareas" onchange="agrega();">					
				</div>
				<button type="submit" class="btn btn-primary">
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
				             '<label>Dimension</label><input type="number" name="dimension['+i+']">'+
							 '<label>Querys</label><input type="number" name="accion['+i+']"><br>'+
							 '<textarea class="class="form-control" rows="10"" name="query['+i+']"></textarea>'+
		                     '</div>'
			                )	
		}
	}
	


</script>
</body>
</html>