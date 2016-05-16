<!DOCTYPE html>
<?php 
include("conex.php");
include("validador.php"); 

session_start();
$id=$_SESSION["usuario_logiado"];
$sql_user="SELECT *FROM proveedores WHERE id_usuario='$id' "; //String de la consulta
$consulta=mysql_query($sql_user);

?>
<html lang="es">
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
  	

  	
</head>
<body>
	<header>

		<center><p class="bg-primary">Control de producto compra y venta</p></center>
	</header>
	<?php include("menu.php");?>
	<section>
		<div id="clien">
			<label>Seleccione cliente: </label>
			<div class="form-group">
    			<select class="selectpicker" data-style="btn-success" id="tipo" name="tipo">
            		<option value="" selected="selected">Seleccione</option>
            		<option value="General">General</option>
            		<option value="Cliente1">Cliente1</option>
          		</select>
  			</div>
		</div>
		<div id="fecha">
			<label>Fecha: </label>
			<input type="text" class=" form-control datepicker" data-date-format="yyyy-mm-dd" name="fecha1" id="fecha1"
           placeholder="Fecha">
		</div>
		<hr>
		<div id="buscar_producto">
			<label>Buscar producto</label>
			<input type="text" name="buscar" id="buscar" class="form-control" placeholder="Ingrese nombre de producto">	
		</div>
		<br>
		
	</section>
	<div id="factura">
			<label>FACTURACION</label>
			<table class="table table-responsive " id="detalle-fac">
				<tr class="bg-primary">
					<td><strong>Id</strong></td>
					<td><strong>Descripcion</strong></td>
					<td><strong>Stock</strong></td>
					<td><strong>Precios</strong></td>
					<td><strong>Preciove.</strong></td>
					<td><strong>Cantidad</strong></td>
					<td><strong>Subtotal</strong></td>
					<td><strong>Accion</strong></td>
				</tr>

			</table>
      <label id="total"></label>
		</div>

</body>
	<footer>
      <div id="footer">
      	<div class="container">
      		<p class="text-muted credit">Todos derechos reservados <a href="http://facebook.com/">Alberto Alfaro</a> 2016.</p>
      </div>
  	</div>
	</footer>
</body>
</html>
<script>
  $(function(){
      $.fn.datepicker.dates['es'] = {
                days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"],
                daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb", "Dom"],
                daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa", "Do"],
                months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
        };
      window.prettyPrint && prettyPrint();
      $('#fecha1').datepicker({
        format: 'yyyy-mm-dd',
        language:'es',
        
      });
      $('#fecha2').datepicker({
        format: 'yyyy-mm-dd',
        language:'es',
        });
    });
  </script>  

  <script type="text/javascript">
  var contador=0;
  var total=0;
  var subtotal=0;
  function selecionar(id_fila){
    $('#'+id_fila).remove();

  }
$(document).ready(function () {
    $('#detalle-fac').keyup(function() {
      for(var n=1; n<=contador; n++){
        var presio=$("#presio"+n).val()
        var cantidad=$("#cantidad"+n).val()
        subto=parseFloat(presio)*parseFloat(cantidad)
        if($("#presio"+n).val() != '' && $("#cantidad"+n).val() != ''){
        $('#subtotal'+n).text('$ '+subto);
      subtotal=subto;
      total=parseFloat(total)+parseFloat(subtotal);
      $('#total').text('Total: $ '+total);}
      }
      total=0;
    });
    });

             $(function(){//utizamos jquery
                $('#buscar').autocomplete({// aqui utilizamos ui
                   source : 'ajax.php',// enviamos a ajax,.pph
                   select : function(event, ui){
                   	var des=ui.item.codigobarra;
                   	var idd=ui.item.id_producto;
                   	ui.item.descripcion;

                    contador++;
                    var fila='<tr id="fila'+contador+'"><td>'+idd+'</td><td>'+'('+ui.item.codigobarra+')'+ui.item.descripcion+'</td><td>409</td><td><select class="form-control" id="select'+contador+'"><option>'+ui.item.precio1+'</option><option>'+ui.item.precio2+'</option><option>'+ui.item.precio3+'</option><option>'+ui.item.precio4+'</option></select></td><td><input type="text" name="presiov" class="form-control" id="presio'+contador+'"></td><td><input type="text" name="cant"  id="cantidad'+contador+'" size="20" class="form-control"></td><td><p id="subtotal'+contador+'"></p></td><td><span class="glyphicon glyphicon-remove-circle" style="cursor: pointer" aria-hidden="true" id="fila'+contador+'" onclick="selecionar(this.id);"></span></td></tr>';
                   	
                    $('#detalle-fac tr:last').after(fila);

                   }
                });
            });


</script>
