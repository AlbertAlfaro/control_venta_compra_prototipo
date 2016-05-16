<?php
error_reporting(0);
session_start();
function dameURL(){
$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
return $url;
}
$url=$_SERVER['REQUEST_URI'];

$usuario_logeado=$_SESSION['usuario_logiado'];
$recorte_url=substr($url, 22);
$recorte_url."?";
list($re1, $re2) = explode("?", $recorte_url);
//echo $re1;


if($usuario_logiado!="0"){
$sql_user="SELECT *FROM usuarios WHERE id_usuario='$usuario_logeado' "; //String de la consulta
$consulta=mysql_query($sql_user);
while($user_n= mysql_fetch_array($consulta)){
    $user_nom=$user_n["1"];
    $tipo=$user_n["3"];
}

if($tipo=="Administrador"){

if(!$usuario_logeado){
	header("Location:index.php");
}

}

if($tipo=="UsuarioNormal"){
	if($re1!="menu_opciones_user.php"){
	$pri="SELECT *FROM permiso WHERE id_usuario='$usuario_logeado' AND link='$re1' "; //String de la consulta
	$consult=mysql_query($pri);
	$ok=mysql_numrows($consult);

	if($ok==0){
		header("Location:menu_opciones_user.php?e=10");
	}
	}

if(!$usuario_logeado){
	header("Location:index.php");
}

}
if(!$usuario_logeado){
	header("Location:index.php");
}
}else{

}
?>