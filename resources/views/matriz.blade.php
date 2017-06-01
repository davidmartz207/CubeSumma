<!DOCTYPE html>
<html>
<head>
	<title>Matríz</title>
	<link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<form role="form">
				<div class="form-group">
					 
					<label for="exampleInputEmail1">
						Script a ejecutar:
					</label>
					<textarea class="form-control"> </textarea>
				</div>
				<button type="submit" class="btn btn-prumary">
					Ejecutar
				</button>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript" src="{{asset('/js/jquery-3.1.1.min.js')}}"/>
<script type="text/javascript" src="{{asset('/js/bootstrap.min.js')}}"/>
</body>
</html>