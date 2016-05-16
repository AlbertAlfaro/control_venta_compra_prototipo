<!DOCTYPE html>
<?php 
include("conex.php"); 
include("validador.php");
?>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="StyleSheet" href="Bootstrap/css/bootstrap.min.css" type="text/css"></link>
	<link rel="StyleSheet" href="Bootstrap/css/bootstrap-theme.min.css" type="text/css"></link>
	<link rel="StyleSheet" href="css/style4.css" type="text/css"></link>
</head>
<body>
	<header>

		<center><p class="bg-primary">Control de producto compra y venta</p></center>
	</header>
	<?php include("menu.php");?>
	<center>
	<div class="jumbotron">
  		<h1>Ingrese nuevo proveedor!</h1>
 
	</div>
	</center>
	
	<section>
		<?php $e=$_GET['e']; if($e==1){?>
        <div class="alert alert-success" role="alert">Registro exitoso!</div>
        <?php }?>
        <?php $e=$_GET['e']; if($e==2){?>
        <div class="alert alert-danger" role="alert">Error al ingresar la proveedor</div>
        <?php }?>
        <?php $e=$_GET['e']; if($e==3){?>
        <div class="alert alert-info" role="alert">Proveedor ya existe!</div>
        <?php }?>

		
		<form method="POST" >
  			<div class="form-group">
    			<label for="exampleInputEmail1">Nombre: </label>
    			<input type="text" name="nombre" class="form-control" id="exampleInputEmail1" placeholder="Nombre">
  			</div>
 			 
  			<button type="submit" class="btn btn-success">Registrar</button>
		</form>
	</section>
	<footer>
      <div id="footer">
      	<div class="container">
      		<p class="text-muted credit">Todos derechos reservados <a href="http://facebook.com/">Alberto Alfaro</a> 2016.</p>
      </div>
  	</div>
	</footer>
</body>
</html>
<?php 
if($_POST){
	$nombre_pro=$_POST['nombre'];

	

    $sql_user="SELECT *FROM proveedores WHERE nombre='$nombre_pro' "; //String de la consulta
    $consulta=mysql_query($sql_user); //Ejecuto la consulta y la almaceno en una variable
    $contar=mysql_numrows($consulta); //Verifico si la consulta devuelve alguna fila 
    if($contar>0){
    	echo "<script>
     location.replace('ingreso_proveedor.php?e=3');
          </script>"; 
    }else{
	$insertar=mysql_query("INSERT INTO proveedores (nombre) values('$nombre_pro')");
    if($insertar)
    {
      echo "<script>
     location.replace('ingreso_proveedor.php?e=1');
          </script>";     
     
    }
    else
    {
      echo "<script>
     location.replace('ingreso_proveedor.php?e=2');
          </script>";    

  
      echo mysql_error($insertar); 
     
    }
}

}

?>