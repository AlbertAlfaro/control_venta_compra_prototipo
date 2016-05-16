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
	<link rel="StyleSheet" href="css/style4.css" type="text/css"></link>
</head>
<body>
	<header>

		<center><p class="bg-primary">Control de producto compra y venta</p></center>
	</header>
	<nav>
		<ul class="nav nav-tabs">
  			<li role="presentation" class="active"><a href="menu_opciones.php">Home</a></li>
  		</ul>
	</nav>
	<center>
	<div class="jumbotron">
  		<h1>Ingrese nuevo usuario!</h1>
 
	</div>
	</center>
	
	<section>
        <?php $e=$_GET['e']; if($e==2){?>
        <div class="alert alert-danger" role="alert">Error al ingresar usuario</div>
        <?php }?>
		<form method="POST" >
  			<div class="form-group">
    			<label for="exampleInputEmail1">Nombre: </label>
    			<input type="text" name="nombre" class="form-control" id="exampleInputEmail1" placeholder="Nombre">
  			</div>
  			<div class="form-group">
    			<label for="exampleInputPassword1">clave: </label>
    			<input type="password" name="pass" class="form-control" id="pass" placeholder="Clave">
  			</div>
  			<div class="form-group">
    			<label for="exampleInputPassword1">Tipo: </label>
    			<select class="form-control" id="tipo" name="tipo">
            <option value="" selected="selected">Seleccione</option>
            <option value="Administrador">Administrador</option>
            <option value="UsuarioNormal">Usuario Normal</option>
          </select>
  			</div>
        (Si el tipo es administrador tendra todo los permisos)
        <br><br>
         <div class="form-group">
          <label for="exampleInputPassword1">Sucursales: </label>
            <br>
            
              <?php 

              $sql_user="SELECT *FROM sucursal"; //String de la consulta
              $consulta=mysql_query($sql_user);
              $i=1;
              while($su= mysql_fetch_array($consulta)){
                $id[$i]=$su["0"];
                $nom=$su["1"];
              ?>
              <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox<?php echo $i;?>" value="sucursal<?php echo $i;?>" name="sucursal<?php echo $i;?>"> <?php echo $nom;?>
              </label>
              <br>


              <?php $i++;}?>
            
          </div>
     
        <div class="form-group">
          <label for="exampleInputPassword1">Privilegios: </label>
          <br>
          <label class="checkbox-inline">
            <input type="checkbox" id="inlineCheckbox1" value="option1" name="option1"> Ingreso de productos
          </label>
          <br>
          <label class="checkbox-inline">
            <input type="checkbox" id="inlineCheckbox2" value="option2" name="option2"> Inventario de productos
          </label>
          <br>
          <label class="checkbox-inline">
            <input type="checkbox" id="inlineCheckbox3" value="option3" name="option3"> Consulta de stock
          </label>
          <br>
          <label class="checkbox-inline">
            <input type="checkbox" id="inlineCheckbox4" value="option4" name="option4"> Agregar productos a stock
          </label>
          <br>
          <label class="checkbox-inline">
            <input type="checkbox" id="inlineCheckbox5" value="option5" name="option5"> Facturar
          </label>
          <br>
          <label class="checkbox-inline">
            <input type="checkbox" id="inlineCheckbox6" value="option6" name="option6"> Generacion Reportes
          </label>
          <br>
          <label class="checkbox-inline">
            <input type="checkbox" id="inlineCheckbox7" value="option7" name="option7"> Proveedores
          </label>
          <br>
          <label class="checkbox-inline">
            <input type="checkbox" id="inlineCheckbox8" value="option8" name="option8"> Ingreso Proveedores
          </label>
          </div>
          <br>
          
 			 
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
	$nombre=$_POST['nombre'];
	$pass=MD5($_POST['pass']);
	$tipo=$_POST['tipo'];

  $privi1="Productos";
  $privi2="Inventario de productos";
  $privi3="Consulta de stock";
  $privi4="Agregar productos a stock";
  $privi5="Facturar";
  $privi6="Generacion Reportes";
  $privi7="Proveedores";
  $privi8="Ingreso Proveedores";

  $link1="productos.php";
  $link2="inventario_productos.php";
  $link3="consulta_stock.php";
  $link4="agregar_producto_stock.php";
  $link5="facturar.php";
  $link6="generar_reportes.php";
  $link7="proveedores.php";
  $link8="ingreso_proveedor.php";

	$insertar=mysql_query("INSERT INTO usuarios (usuario,pass,tipo) values('$nombre','$pass','$tipo')");
  $sql_user="SELECT MAX(id_usuario) AS id_usuario FROM usuarios"; //String de la consulta
  $consulta=mysql_query($sql_user); //Ejecuto la consulta y la almaceno en una variable
  while($max= mysql_fetch_array($consulta)){
    $id_max=$max[0];
  }
  if (isset($_POST['option1']))
  {
    $insertar_pri=mysql_query("INSERT INTO permiso (id_usuario,nombre,link) values('$id_max','$privi1','$link1')");
  }
  if (isset($_POST['option2']))
  {
    $insertar_pri=mysql_query("INSERT INTO permiso (id_usuario,nombre,link) values('$id_max','$privi2','$link2')");
  }
  if (isset($_POST['option3']))
  {
    $insertar_pri=mysql_query("INSERT INTO permiso (id_usuario,nombre,link) values('$id_max','$privi3','$link3')");
  }
  if (isset($_POST['option4']))
  {
    $insertar_pri=mysql_query("INSERT INTO permiso (id_usuario,nombre,link) values('$id_max','$privi4','$link4')");
  }
  if (isset($_POST['option5']))
  {
    $insertar_pri=mysql_query("INSERT INTO permiso (id_usuario,nombre,link) values('$id_max','$privi5','$link5')");
  }
  if (isset($_POST['option6']))
  {
    $insertar_pri=mysql_query("INSERT INTO permiso (id_usuario,nombre,link) values('$id_max','$privi6','$link6')");
  }
  if (isset($_POST['option7']))
  {
    $insertar_pri=mysql_query("INSERT INTO permiso (id_usuario,nombre,link) values('$id_max','$privi7','$link7')");
  }
  if (isset($_POST['option8']))
  {
    $insertar_pri=mysql_query("INSERT INTO permiso (id_usuario,nombre,link) values('$id_max','$privi8','$link8')");
  }

  $t=1;
  for($y=0;$y<$i;$y++){
    $sucu='sucursal'.$t;
    if (isset($_POST[$sucu]))
    {
      $eid=$id[$t];
      $insertar_sucu=mysql_query("INSERT INTO sucu_user (id_usuario,id_sucursal) values('$id_max','$eid')");
  
    }

  $t++;

  }

  if($insertar)
    {
      echo "<script>
     location.replace('mantenimiento_usuarios.php?e=1');
          </script>";     
     
    }
  else
    {
      echo "<script>
     location.replace('agregar_user.php?e=2');
          </script>";    

  
      echo mysql_error($insertar); 
     
    }


}

?>