<?php 
include("conex.php");
$id=$_GET['id'];
$nombre=$_GET['nom'];

echo $id;
echo $nombre;

$sql = "DELETE from permiso WHERE id_usuario='$id' AND nombre='$nombre' ";
$result = mysql_query($sql);

if($result){

	header("Location:modificar_user.php?id=$id#lugar"); 
}else{
	header("Location:modificar_user.php?id=$id#lugar");

}


?>