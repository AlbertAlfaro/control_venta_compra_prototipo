<!DOCTYPE html>
<?php 
include("conex.php");
include("validador.php"); 

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
	<link rel="StyleSheet" href="css/style1.css" type="text/css"></link>
  <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="Bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<header>

		<center><p class="bg-primary">Control de producto compra y venta</p></center>
	</header>
	<?php include("menu.php");?>
	<section>
		<br><br><br><br>
		<img src="img/botonblanco-construccion.png" alt="construccion" class="img-rounded">
	</section>

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