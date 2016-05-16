<?php 
include("conex.php");
$id=$_GET['id'];
$su=$_GET['id_su'];
$ti=$_GET['ti'];

if($ti=="S"){
$sql = "DELETE from sucu_user WHERE id_usuario='$id' AND id_sucursal='$su' ";
$result = mysql_query($sql);

if($result){

	header("Location:modificar_user.php?id=$id#lugar"); 
}else{
	header("Location:modificar_user.php?id=$id#lugar");

}

}
if($ti=="P"){
$sql = "DELETE from proveedores WHERE id_proveedores='$id'";
$result = mysql_query($sql);

if($result){

	header("Location:proveedores.php?e=1"); 
}else{
	header("Location:proveedores.php?e=2");

}

}
?>