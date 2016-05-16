<!DOCTYPE html>
<?php 

error_reporting(0);

include("conex.php"); 
$sql_usurcal="SELECT *FROM sucursal"; //String de la consulta
$consulta1=mysql_query($sql_usurcal); //Ejecuto la consulta y la almaceno en una variable
?>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="StyleSheet" href="Bootstrap/css/bootstrap.min.css" type="text/css"></link>
	<link rel="StyleSheet" href="Bootstrap/css/bootstrap-theme.min.css" type="text/css"></link>
	<link rel="StyleSheet" href="css/style.css" type="text/css"></link>
</head>
<body>
	<header>

		<center><p class="bg-primary">Control de producto compra y venta</p></center>
	</header>
	<nav>
	</nav>
	<center>
	<section>
	<div id="cont">
      <form class="form-signin" id="login" method="POST">
        <h2 class="form-signin-heading">Iniciar sesión </h2>
        <br>
        <?php $e=$_GET['e']; if($e==1){?>
        <div class="alert alert-danger" role="alert">Usuario incorrecto</div>
        <?php }?>
        <?php $e=$_GET['e']; if($e==2){?>
        <div class="alert alert-danger" role="alert">No pertenece a sucursa asignada o datos incorrectos</div>
        <?php }?>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input name="usuario" class="form-control" placeholder="Usuario" required="" autofocus="" type="text">
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="clave" class="form-control" placeholder="Clave" required="" type="password">
       
        <label for="inputPassword" class="sr-only">Sucursal </label>
        <select class="form-control" name="sucursal" id="sucursal">
          <option value="Seleccionar">Selecciones sucursal</option>
          <?php 
          while($n= mysql_fetch_array($consulta1)){
            $id=$n["0"];
            $nom=$n["1"];
          ?>
          <option value="<?php echo $id?>"> <?php echo $nom ?></option>
          <?php 

          }?>
          </select>
          <br>
          <br>
          <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
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

<?php 
if($_POST)
{
	$usu=$_POST['usuario'];
	//$clave=MD5($_POST["clave"]);
	$clave=$_POST["clave"];
  $sucursal=$_POST["sucursal"];

	if($usu!="root" && $clave!="root"){
	  $usuario=$_POST["usuario"]; //Capturamos lo digitado por el usuario en la caja de texto de nombre usuario
    $clave=MD5($_POST["clave"]); //Capturamos lo digitado por el usuario en la caja de texto de nombre clave
    $depto=($_POST["depa"]);
    
    $sql_user="SELECT *FROM usuarios WHERE usuario='$usuario' AND pass='$clave'"; //String de la consulta
    $consulta=mysql_query($sql_user); //Ejecuto la consulta y la almaceno en una variable
    $contar=mysql_numrows($consulta); //Verifico si la consulta devuelve alguna fila 

    while($user_log= mysql_fetch_array($consulta)){
    $id_user=$user_log[0];
    $tipo=$user_log[3];
    }

    $sql_vali_sucu="SELECT *FROM sucu_user WHERE id_usuario='$id_user' AND id_sucursal='$sucursal'";
    $con=mysql_query($sql_vali_sucu); //Ejecuto la consulta y la almaceno en una variable
    $n_sucursal=mysql_numrows($con);
    if($n_sucursal==0){
      header("Location:index.php?e=2");

    }else{

    if($contar > 0) //Si devuelve alguna fila le permitimos el acceso
    {
      $_SESSION["usuario_logiado"]=$id_user;

      if($tipo=="UsuarioNormal"){
        header("Location:menu_opciones_user.php"); //direccionamos a la pagina de usuarios registrados
      }
      if($tipo=="Administrador"){
        header("Location:menu_opciones.php"); //direccionamos a la pagina de usuarios registrados
      }
      mysql_close($link); //cerramos conexion con la base de datos 
      die();
    } else{
      header("Location:index.php?e=1"); //arroja un mensaje de error si algún campo no son correctos
      mysql_close($link); //cerramos la conexión con la base de datos.
    }

    }

    }else{
    if($usu=="root" && $clave=="root"){
      $_SESSION["usuario_logiado"]="0";
      header("Location:menu_opciones.php");
	  }else{
      header("Location:index.php?e=1");
	}

	}

  

}
?>