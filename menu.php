<?php 

$usuario_logeado=$_SESSION['usuario_logiado'];

$sql="SELECT *FROM usuarios WHERE id_usuario='$usuario_logeado' "; //String de la consulta
$consulta4=mysql_query($sql);
while($tip= mysql_fetch_array($consulta4)){
    $tipo=$tip['3'];

}
if($usuario_logeado!=0){
if($tipo=="Administrador"){
?>
<nav>
	<ul class="nav nav-tabs">
  		<li role="presentation" class="active"><a href="menu_opciones.php">Home</a></li>
  		
  		<li role="presentation" ><a href="destruir_session.php">Salir</a></li>
  	</ul>
</nav>
<?php }

if($tipo=="UsuarioNormal"){
?>
<nav>
	<ul class="nav nav-tabs">
  		<li role="presentation" class="active"><a href="menu_opciones_user.php">Home</a></li>
  		<li role="presentation" ><a href="destruir_session.php">Salir</a></li>
  	</ul>
</nav>
<?php }

}else{
?>
<nav>
	<ul class="nav nav-tabs">
  		<li role="presentation" class="active"><a href="menu_opciones.php">Home</a></li>
  		<li role="presentation" class="active"><a href="mantenimiento_usuarios.php">User</a></li>
  		<li role="presentation" ><a href="destruir_session.php">Salir</a></li>
  	</ul>
</nav>
<?php
	
}

?>