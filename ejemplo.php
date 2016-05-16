<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="StyleSheet" href="Bootstrap/css/bootstrap.min.css" type="text/css"></link>
	<link rel="StyleSheet" href="Bootstrap/css/bootstrap-theme.min.css" type="text/css"></link>
  	<link rel="stylesheet" href="Bootstrap/css/bootstrap-select.css">
	<link rel="StyleSheet" href="css/style1.css" type="text/css"></link>
	<link rel="StyleSheet" href="css/datepicker.css" type="text/css"></link>
	<link type="text/css" rel="stylesheet" href="jquery-ui/jquery-ui.min.css" />
  	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
  	<script src="jquery-ui/jquery-ui.js"></script> 
  	<script type="text/javascript" src="Bootstrap/js/bootstrap.min.js"></script>
  	<script type="text/javascript" src="Bootstrap/js/bootstrap-datepicker.js"></script>
  	<script type="text/javascript" src="Bootstrap/js/bootstrap-select.js"></script>
  	<style type="text/css"> #tab{width: 50%;margin: auto;}</style>
</head>
<body>
	<div id="input-dinamicos">
		<table class="table table-responsive " id="tab">
			<tr>
				<td><strong>numero1</strong></td>
				<td><strong>numero2</strong></td>
				<td><strong>subtotal</strong></td>
			</tr>

		</table>
	</div>
	<button onclick="agregar();">Agregar</button>
	<button onclick="eliminar();">Eliminar</button>

</body>
</html>
<script type="text/javascript">
var con=0;
function agregar(){
	con++;
	var fila='<tr><td><input type="text" id="nui'+con+'"</td><td><input type="text" id="nuy'+con+'"</td><td><input type="text" id="subtotal'+con+'"</td></tr>'
	$('#tab tr:last').after(fila);
}
function eliminar(){
	$('#tab tr:last').remove();
}
$(document).ready(function () {
    $('#tab').keyup(function() {
    	for(var n=1; n<=con; n++){
    		var presio=$("#nui"+n).val()
    		var	cantidad=$("#nuy"+n).val()
    		subto=parseFloat(presio)+parseFloat(cantidad)
    		$('#subtotal'+n).val(subto);
    	}

    });
    });


</script>