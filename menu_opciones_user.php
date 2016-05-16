<!DOCTYPE html>
<?php 
include("conex.php");
include("validador.php"); 

session_start();
$id=$_SESSION["usuario_logiado"];
$sql_user="SELECT *FROM permiso WHERE id_usuario='$id' "; //String de la consulta
$consulta=mysql_query($sql_user);

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
		<?php $e=$_GET['e']; if($e==10){?>
        <div class="alert alert-danger" role="alert">No tiene permisos en el link que intento ingresar</div>
        <?php }?>
		<br><br>
		<?php
		while($user_n= mysql_fetch_array($consulta)){
			$nom=$user_n["2"];
			$link=$user_n["3"];
		

		 ?>
		<div class="circulo">
			<br><br>
			<a href="<?php echo $link?>"><h2><?php echo $nom?></h2></a>
		</div>
		<?php }?>
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
