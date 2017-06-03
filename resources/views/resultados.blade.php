<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Resultados</title>
  <link rel="stylesheet"  href="{{asset('css/bootstrap.min.css')}}">


</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="panel panel-default">
  			<div class="panel-heading">Resultados</div>
  			<div class="panel-body">

  			 <?php foreach($resultado as $r){?>
		        <label>Tarea: </label><br>
		        @if(!is_array($r))
             	 	{{$r}}<br>
                @else
                  @foreach($r as $res)
             	 	{{$res}}<br>
             	  @endforeach
             	@endif
             <?php } ?>
  			</div>
		</div>
	</div>
</div>


    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript">



</script>
</body>
</html>