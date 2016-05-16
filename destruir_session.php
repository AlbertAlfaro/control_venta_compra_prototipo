<?php 
session_start();
$_SESSION['usuario_logiado']=null;
header("Location:index.php");
?>