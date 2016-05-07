<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body	
	<form action="#">

	id_problema
		<input type="text" name="id_problema" id="id_problema">
		ano <input type="text" name="ano" id="ano">
		<a href="" onclick="submit()">enviar</a>
	{!! Form::button('Login', array('class'=>'send-btn')) !!}
</form>

<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('.send-btn').click(function(){     
  	
});
</script>

</body>
</html>