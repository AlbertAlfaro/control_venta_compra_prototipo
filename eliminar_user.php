<?php 
include("conex.php");
$id=$_GET['id'];


$sql = "DELETE from usuarios WHERE id_usuario='$id'";
$result = mysql_query($sql);

if($result){

	header("Location:mantenimiento_usuarios.php?id=$id#table"); 
}else{
	header("Location:mantenimiento_usuarios.php?id=$id#table");

}


?>