<!DOCTYPE html>
<?php include("conex.php");
include("validador.php"); 
$id=$_GET['id'];
$sql_user="SELECT *FROM usuarios WHERE id_usuario='$id' "; //String de la consulta
$consulta=mysql_query($sql_user);
while($user_n= mysql_fetch_array($consulta)){
    $nom=$user_n["1"];
    $clave=$user_n["2"];
    $tipo1=$user_n["3"];

}

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
  		<h1>Ingrese nuevo usuario!</h1>
 
	</div>
	</center>
	
	<section>
        <?php $e=$_GET['e']; if($e==2){?>
        <div class="alert alert-danger" role="alert">Error al ingresar usuario</div>
        <?php }?>
        <?php $e=$_GET['e']; if($e==1){?>
        <div class="alert alert-success" role="alert">Modificacion exitosa!</div>
        <?php }?>
		<form method="POST" >
  			<div class="form-group">
    			<label for="exampleInputEmail1">Nombre: </label>
    			<input type="text" name="nombre" value="<?php echo $nom ?>" class="form-control" id="exampleInputEmail1" placeholder="Nombre">
  			</div>
  			<div class="form-group">
    			<label for="exampleInputPassword1">clave: </label>
    			<input type="password" name="pass" value="<?php echo $clave ?>" class="form-control" id="pass" placeholder="Clave">
  			</div>
  			<div class="form-group">
    			<label for="exampleInputPassword1">Tipo: </label>
    			<select class="form-control" id="tipo" name="tipo">
            <option value="" selected="selected">Seleccione</option>
            <?php if($tipo1=="Administrador"){?>
            <option value="Administrador" selected="selected">Administrador</option>
            <?php }else{?>
            <option value="Administrador">Administrador</option>
            <?php }?>
            <?php if($tipo1=="UsuarioNormal"){?>
            <option value="UsuarioNormal" selected="selected">Usuario Normal </option>
            <?php }else{?>
            <option value="UsuarioNormal">Usuario Normal </option>
            <?php }?>
          </select>
  			</div>
        (Si el tipo es administrador tendra todo los permisos)
        <br><br>
         <div class="form-group">
          <label for="exampleInputPassword1">Sucursales: </label>
            <br>
            
              <?php 

              $sql_user="SELECT *FROM sucursal"; //String de la consulta
              $consulta2=mysql_query($sql_user);
              $sql_ss="SELECT *FROM sucu_user WHERE id_usuario='$id' order by id_sucursal ASC"; //String de la consulta
              $consulta3=mysql_query($sql_ss);
              $o=1;
              while($tt= mysql_fetch_array($consulta3)){
                $sucu[$o]=$tt["2"];
                $o++;
              }

              $i=1;
              $ii=1;
              while($su= mysql_fetch_array($consulta2)){
                $idd[$i]=$su["0"];
                $nom=$su["1"];
              ?>
              <label class="checkbox-inline">
              <?php if($sucu[$ii]==$idd[$i]){?>  
              <input type="checkbox" id="inlineCheckbox<?php echo $i;?>" value="sucursal<?php echo $i;?>" name="sucursal<?php echo $i;?>" checked disabled="true"> <?php echo $nom;?> <a href="eliminar_sucursal.php?id=<?php echo $id ?>&id_su=<?php  echo $idd[$i]?>&ti=S" class="glyphicon glyphicon-remove">Eliminar</a> 
              <?php $ii++;}else{?>
              <input type="checkbox" id="inlineCheckbox<?php echo $i;?>" value="sucursal<?php echo $i;?>" name="sucursal<?php echo $i;?>" > <?php echo $nom;?>
              <?php }?>
              </label>
              <br>


              <?php $i++;}?>
            
          </div>
        <?php 

        $sql_per="SELECT *FROM permiso WHERE id_usuario='$id' "; //String de la consulta
        $consulta1=mysql_query($sql_per);
        $x=0;
        while($co_per= mysql_fetch_array($consulta1)){
            $per[$x]=$co_per["2"];
            $x++;
        }
        ?>
        <div class="form-group">
          <label for="exampleInputPassword1">Privilegios: </label>
          <br>
          Nota: Puede eliminar privilegios de usuario o agregar nuevos.
          <br>
          <br>
          <label class="checkbox-inline">
            <?php  if($per[0]=="Productos" || $per[1]=="Productos" || $per[2]=="Productos" || $per[3]=="Productos" || $per[4]=="Productos" || $per[5]=="Productos"){ ?>
            <input type="checkbox" id="inlineCheckbox1" value="option1" name="option1" checked disabled="true"> Productos <a href="eliminar_privilegio.php?id=<?php echo $id ?>&nom=Productos" class="glyphicon glyphicon-remove">Eliminar</a>
            <?php }else{?>
            <input type="checkbox" id="inlineCheckbox1" value="option1" name="option1"> Productos
            <?php } ?>
          </label>

          <br>
          <label class="checkbox-inline">
            <?php  if($per[0]=="Inventario de productos" || $per[1]=="Inventario de productos" || $per[2]=="Inventario de productos" || $per[3]=="Inventario de productos" || $per[4]=="Inventario de productos" || $per[5]=="Inventario de productos"){ ?>
            <input type="checkbox" id="inlineCheckbox2" value="option2" name="option2" checked disabled="true"> Inventario de productos <a href="eliminar_privilegio.php?id=<?php echo $id ?>&nom=Inventario de productos" class="glyphicon glyphicon-remove">Eliminar</a>
            <?php }else{?>
            <input type="checkbox" id="inlineCheckbox2" value="option2" name="option2"> Inventario de productos
            <?php } ?>
          </label>
          <br>
          <label class="checkbox-inline">
            <?php  if($per[0]=="Consulta de stock" || $per[1]=="Consulta de stock" || $per[2]=="Consulta de stock" || $per[3]=="Consulta de stock" || $per[4]=="Consulta de stock" || $per[5]=="Consulta de stock"){ ?>
            <input type="checkbox" id="inlineCheckbox3" value="option3" name="option3" checked disabled="true"> Consulta de stock <a href="eliminar_privilegio.php?id=<?php echo $id ?>&nom=Consulta de stock" class="glyphicon glyphicon-remove">Eliminar</a>
            <?php }else{?>
            <input type="checkbox" id="inlineCheckbox3" value="option3" name="option3"> Consulta de stock
            <?php } ?>
          </label>
          <br>
          <label class="checkbox-inline">
            <?php  if($per[0]=="Agregar productos a stock" || $per[1]=="Agregar productos a stock" || $per[2]=="Agregar productos a stock" || $per[3]=="Agregar productos a stock" || $per[4]=="Agregar productos a stock" || $per[5]=="Agregar productos a stock"){ ?>
            <input type="checkbox" id="inlineCheckbox4" value="option4" name="option4" checked disabled="true"> Agregar productos a stock <a href="eliminar_privilegio.php?id=<?php echo $id ?>&nom=Agregar productos a stock" class="glyphicon glyphicon-remove">Eliminar</a>
            <?php }else{?>
            <input type="checkbox" id="inlineCheckbox4" value="option4" name="option4"> Agregar productos a stock
            <?php } ?>
          </label>
          <br>
          <label class="checkbox-inline">
            <?php  if($per[0]=="Facturar" || $per[1]=="Facturar" || $per[2]=="Facturar" || $per[3]=="Facturar" || $per[4]=="Facturar" || $per[5]=="Facturar"){ ?>
            <input type="checkbox" id="inlineCheckbox5" value="option5" name="option5" checked disabled="true"> Facturar <a href="eliminar_privilegio.php?id=<?php echo $id ?>&nom=Facturar" class="glyphicon glyphicon-remove">Eliminar</a>
            <?php }else{?>
            <input type="checkbox" id="inlineCheckbox5" value="option5" name="option5"> Facturar
            <?php } ?>
          </label>
          <br>
          <label class="checkbox-inline">
            <?php  if($per[0]=="Generacion Reportes" || $per[1]=="Generacion Reportes" || $per[2]=="Generacion Reportes" || $per[3]=="Generacion Reportes" || $per[4]=="Generacion Reportes" || $per[5]=="Generacion Reportes"){ ?>
            <input type="checkbox" id="inlineCheckbox6" value="option6" name="option6" checked disabled="true"> Generacion Reportes <a href="eliminar_privilegio.php?id=<?php echo $id ?>&nom=Generacion Reportes" class="glyphicon glyphicon-remove">Eliminar</a>
            <?php }else{?>
            <input type="checkbox" id="inlineCheckbox6" value="option6" name="option6"> Generacion Reportes
            <?php } ?>
          </label>
          <br>
          <label class="checkbox-inline">
            <?php  if($per[0]=="Proveedores" || $per[1]=="Proveedores" || $per[2]=="Proveedores" || $per[3]=="Proveedores" || $per[4]=="Proveedores" || $per[5]=="Proveedores"){ ?>
            <input type="checkbox" id="inlineCheckbox7" value="option7" name="option7" checked disabled="true"> Proveedores <a href="eliminar_privilegio.php?id=<?php echo $id ?>&nom=Proveedores" class="glyphicon glyphicon-remove">Eliminar</a>
            <?php }else{?>
            <input type="checkbox" id="inlineCheckbox7" value="option7" name="option7"> Proveedores
            <?php } ?>
          </label>
          <br>
          <label class="checkbox-inline">
            <?php  if($per[0]=="Ingreso Proveedores" || $per[1]=="Ingreso Proveedores" || $per[2]=="Ingreso Proveedores" || $per[3]=="Ingreso Proveedores" || $per[4]=="Ingreso Proveedores" || $per[5]=="Ingreso Proveedores"){ ?>
            <input type="checkbox" id="inlineCheckbox8" value="option8" name="option8" checked disabled="true"> Ingreso Proveedores <a href="eliminar_privilegio.php?id=<?php echo $id ?>&nom=Proveedores" class="glyphicon glyphicon-remove">Eliminar</a>
            <?php }else{?>
            <input type="checkbox" id="inlineCheckbox8" value="option8" name="option8"> Ingreso Proveedores
            <?php } ?>
          </label>
          </label>
        </div>
 			 <div id="lugar"></div>
  			<button type="submit" class="btn btn-success">Guardar</button>
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
  $passe=$_POST['pass'];
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
  if($passe==$clave){
	$update=mysql_query("UPDATE usuarios SET usuario='$nombre', tipo='$tipo' WHERE id_usuario='$id'");
}else{
  $update=mysql_query("UPDATE usuarios SET usuario='$nombre', pass='$pass', tipo='$tipo' WHERE id_usuario='$id'");


}
 //String de la consulta
  $consulta=mysql_query($sql_user); //Ejecuto la consulta y la almaceno en una variable
 
  if (isset($_POST['option1']))
  {
    $sql="SELECT *FROM permiso WHERE nombre='$privi1' and id_usuario='$id'"; //String de la consulta
    $consulta=mysql_query($sql); //Ejecuto la consulta y la almaceno en una variable
    $contar=mysql_numrows($consulta); //Verifico si la consulta devuelve alguna fila 
    if($contar>0){

    }else{
    $insertar_pri=mysql_query("INSERT INTO permiso (id_usuario,nombre,link) values('$id','$privi1','$link1')");
    }
  }
  if (isset($_POST['option2']))
  {
    $sql="SELECT *FROM permiso WHERE nombre='$privi2' and id_usuario='$id'"; //String de la consulta
    $consulta=mysql_query($sql); //Ejecuto la consulta y la almaceno en una variable
    $contar=mysql_numrows($consulta); //Verifico si la consulta devuelve alguna fila 
    if($contar>0){

    }else{
    $insertar_pri=mysql_query("INSERT INTO permiso (id_usuario,nombre,link) values('$id','$privi2','$link2')");
    }
  }

  if (isset($_POST['option3']))
  {
    $sql="SELECT *FROM permiso WHERE nombre='$privi3' and id_usuario='$id'"; //String de la consulta
    $consulta=mysql_query($sql); //Ejecuto la consulta y la almaceno en una variable
    $contar=mysql_numrows($consulta); //Verifico si la consulta devuelve alguna fila 
    if($contar>0){

    }else{
    $insertar_pri=mysql_query("INSERT INTO permiso (id_usuario,nombre,link) values('$id','$privi3','$link3')");
    }
  }

  if (isset($_POST['option4']))
  {
    $sql="SELECT *FROM permiso WHERE nombre='$privi4' and id_usuario='$id'"; //String de la consulta
    $consulta=mysql_query($sql); //Ejecuto la consulta y la almaceno en una variable
    $contar=mysql_numrows($consulta); //Verifico si la consulta devuelve alguna fila 
    if($contar>0){

    }else{
    $insertar_pri=mysql_query("INSERT INTO permiso (id_usuario,nombre,link) values('$id','$privi4','$link4')");
    }
  }

  if (isset($_POST['option5']))
  {
    $sql="SELECT *FROM permiso WHERE nombre='$privi5' and id_usuario='$id'"; //String de la consulta
    $consulta=mysql_query($sql); //Ejecuto la consulta y la almaceno en una variable
    $contar=mysql_numrows($consulta); //Verifico si la consulta devuelve alguna fila 
    if($contar>0){

    }else{
    $insertar_pri=mysql_query("INSERT INTO permiso (id_usuario,nombre,link) values('$id','$privi5','$link5')");
    }
  }

  if (isset($_POST['option6']))
  {
    $sql="SELECT *FROM permiso WHERE nombre='$privi6' and id_usuario='$id'"; //String de la consulta
    $consulta=mysql_query($sql); //Ejecuto la consulta y la almaceno en una variable
    $contar=mysql_numrows($consulta); //Verifico si la consulta devuelve alguna fila 
    if($contar>0){

    }else{
    $insertar_pri=mysql_query("INSERT INTO permiso (id_usuario,nombre,link) values('$id','$privi6','$link6')");
    }
  }

  if (isset($_POST['option7']))
  {
    $sql="SELECT *FROM permiso WHERE nombre='$privi7' and id_usuario='$id'"; //String de la consulta
    $consulta=mysql_query($sql); //Ejecuto la consulta y la almaceno en una variable
    $contar=mysql_numrows($consulta); //Verifico si la consulta devuelve alguna fila 
    if($contar>0){

    }else{
    $insertar_pri=mysql_query("INSERT INTO permiso (id_usuario,nombre,link) values('$id','$privi7','$link7')");
    }
  }

  if (isset($_POST['option8']))
  {
    $sql="SELECT *FROM permiso WHERE nombre='$privi8' and id_usuario='$id'"; //String de la consulta
    $consulta=mysql_query($sql); //Ejecuto la consulta y la almaceno en una variable
    $contar=mysql_numrows($consulta); //Verifico si la consulta devuelve alguna fila 
    if($contar>0){

    }else{
    $insertar_pri=mysql_query("INSERT INTO permiso (id_usuario,nombre,link) values('$id','$privi8','$link8')");
    }
  }

  $t=1;
  for($y=0;$y<$i;$y++){
    $sucu='sucursal'.$t;
    if (isset($_POST[$sucu]))
    {
      $eid=$idd[$t];
      $insertar_sucu=mysql_query("INSERT INTO sucu_user (id_usuario,id_sucursal) values('$id','$eid')");
  
    }

  $t++;

  }

  if($update)
    {
      echo "<script>
     location.replace('modificar_user.php?e=1&id=$id');
          </script>";     
     
    }
  else
    {
      echo "<script>
     location.replace('modificar_user.php?e=2&id=$id');
          </script>";    

  
      echo mysql_error($insertar); 
     
    }


}

?>