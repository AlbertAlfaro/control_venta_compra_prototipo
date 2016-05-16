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
	<link rel="StyleSheet" href="css/style2.css" type="text/css"></link>
  <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="Bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<header>

		<center><p class="bg-primary">Control de producto compra y venta</p></center>
	</header>
	<?php include("menu.php");?>
	<center>
	<div class="jumbotron">
  		<h1>Usuarios!</h1>
 
	</div>
	</center>
	
	<section>
    <?php 
    $sql_usu="SELECT *FROM usuarios"; //String de la consulta
    $consul=mysql_query($sql_usu);     
    $n_row=mysql_num_rows($consul);
    ?>
    <?php $e=$_GET['e']; if($e==1){?>
        <div class="alert alert-success" role="alert">Modificacion exitosa!</div>
        <?php }?>
  <div class="panel panel-default">
  <div class="panel-heading">Usuarios</div>
  <div class="panel-body">
    <a href="agregar_user.php"><button type="button" class="btn btn-success glyphicon glyphicon-plus">Agregar</button></a>
    <br><br>
    <div id="table"></div>
    <table class="table table-hover">
      <tr>
        <td>Id</td>
        <td><strong>Nombre</strong></td>
        <td><strong>Tipo</strong></td>
        <td><strong>Accion</strong></td>
      </tr>
      <?php 

      while($datos= mysql_fetch_array($consul)){
      ?>
      <tr>
        <td><?php echo $datos[0] ?></td>
        <td><?php echo $datos[1] ?></td>
        <td><?php echo $datos[3] ?></td>
        <td>
          <div class="btn-group">
            <button type="button" class="btn btn-success glyphicon glyphicon-user dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Menu <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
              <li><a href="#" class="glyphicon glyphicon-remove" onclick="javascript:if(window.confirm('¿Confirma que desea eliminar el registro')){location.replace('eliminar_user.php?id=<?php echo $datos[0] ?>')}"> Eliminar</a></li>
              <li><a href="modificar_user.php?id=<?php echo $datos[0]?>" class="glyphicon glyphicon-pencil"> Modificar</a></li>
            </ul>
          </div>

        </td>
      </tr>
      <?php }?>
    </table>
  </div>
</div>
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
	$nombre=$_POST['nombre'];
	$direccion=$_POST['direccion'];
	$telefono=$_POST['telefono'];

    $sql_user="SELECT *FROM sucursal WHERE nombre='$nombre' "; //String de la consulta
    $consulta=mysql_query($sql_user); //Ejecuto la consulta y la almaceno en una variable
    $contar=mysql_numrows($consulta); //Verifico si la consulta devuelve alguna fila 
    if($contar>0){
    	echo "<script>
     location.replace('ingres_sucursal.php?e=3');
          </script>"; 
    }else{
	$insertar=mysql_query("INSERT INTO sucursal (nombre,direccion,telefono) values('$nombre','$direccion','$telefono')");
    if($insertar)
    {
      echo "<script>
     location.replace('ingres_sucursal.php?e=1');
          </script>";     
     
    }
    else
    {
      echo "<script>
     location.replace('ingres_sucursal.php?e=2');
          </script>";    

  
      echo mysql_error($insertar); 
     
    }
}

}

?>