<!DOCTYPE html>
<?php include("conex.php");
include("validador.php");	

?>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="StyleSheet" href="Bootstrap/css/bootstrap.min.css" type="text/css"></link>
	<link rel="StyleSheet" href="Bootstrap/css/bootstrap-theme.min.css" type="text/css"></link>
	<link rel="StyleSheet" href="css/style1.css" type="text/css"></link>
</head>
<body>
	<header>

		<center><p class="bg-primary">Control de producto compra y venta</p></center>
	</header>
	<?php include("menu.php");?>
	<center>
	<section>
		<div id="sucursal">
			<a href="ingres_sucursal.php"><img src="http://www.confiabilidad.com.ve/images/ok.png" alt="ingrese sucursal" class="img-circle" width="200"></a>
			<h3>Ingrese sucursal</h3>
		</div>

		<div id="usuarios">
			<a href="mantenimiento_usuarios.php"><img src="http://freeiconbox.com/icon/256/17004.png" alt="ingrese sucursal" class="img-circle" width="200"></a>
			<h3>Usuarios y privilegios</h3>
		</div>

		<div id="repo">
			<a href=""><img src="http://store.airsoftelitearms.com/img/cms/Servicio_mantenimeinto.png" alt="ingrese sucursal" class="img-circle" width="200"></a>
			<h3>Mantenimiento módulos</h3>
		</div>


	</section>
	</center>
	<footer>
      <div id="footer">
      	<div class="container">
      		<p class="text-muted credit">Todos derechos reservados <a href="http://facebook.com/">Alberto Alfaro</a> 2016.</p>
      </div>
  	</div>
	</footer>
</body>
</html>
