<!DOCTYPE html>
<?php 
include("conex.php");
include("validador.php"); 

session_start();
$id=$_SESSION["usuario_logiado"];
$sql_user="SELECT *FROM proveedores WHERE id_usuario='$id' "; //String de la consulta
$consulta=mysql_query($sql_user);

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

  <script type="text/javascript">

  $(document).on("click", "#send", function () {
    var myDNI = $(this).data('id');
    $("#mymodal #DNI").val( myDNI );
  });


  </script>
</head>
<body>
	<header>

		<center><p class="bg-primary">Control de producto compra y venta</p></center>
	</header>
	<?php include("menu.php");?>
	<section>
		<br>
		<br>
		<?php 
    $sql_usu="SELECT *FROM productos"; //String de la consulta
    $consul=mysql_query($sql_usu);     
    $n_row=mysql_num_rows($consul);
    ?>
    <?php $e=$_GET['e']; if($e==1){?>
        <div class="alert alert-success" role="alert">Eliminacion exitosa!</div>
        <?php }?>

  <div class="panel panel-default">
  <div class="panel-heading">Administrar productos</div>
  <div class="panel-body">
    <a href="ingreso_productos.php"><button type="button" class="btn btn-success glyphicon glyphicon-plus">Agregar</button></a>
    <br><br>
    <?php if($n_row==0){ }else{?>
    <table class="table table-hover">

      <tr>
        <td>Id productos</td>
        <td><strong>Nombre</strong></td>
        <td><strong>Marca</strong></td>
        <td><strong>Presentacion</strong></td>
        <td><strong>Accion</strong></td>
      </tr>
      <?php 
      $pp=0;
      while($datos= mysql_fetch_array($consul)){
      ?>
      <tr>
        <td><?php echo $datos[0] ?></td>
        <td><?php echo $datos[2] ?></td>
        <td><?php echo $datos[4] ?></td>
        <td><?php echo $datos[7] ?></td>
        <td>
          <div class="btn-group">
            <button type="button" class="btn btn-success glyphicon glyphicon-user dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Menu <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
              <li><a href="#" class="glyphicon glyphicon-remove" onclick="javascript:if(window.confirm('¿Confirma que desea eliminar el registro')){location.replace('eliminar_sucursal.php?id=<?php echo $datos[0] ?>&ti=P')}"> Eliminar</a></li>
              <li><a href="modificar_user.php?id=<?php echo $datos[0]?>" class="glyphicon glyphicon-pencil"> Modificar</a></li>
              <li data-toggle="modal" data-target="#mymodal"> <a id="send" class="open-modal glyphicon glyphicon-zoom-in"> Ver detalles</a></li>
            </ul>
          </div>

        </td>
      </tr>
      <?php $pp++; 
      }}?>
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

<div class="modal fade" tabindex="-1" role="dialog" id="mymodal<?php echo $ttp ?>" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Detalle de producto</h4>
      </div>
      <?php 
      $sq="SELECT *FROM productos where id_producto=1";
      $con=mysql_query($sq);
      while($d= mysql_fetch_array($con)){

        $id=$d[0];
        $des=$d[2];
        $barco=$d[1];
        $marca=$d[4];
        $embalaje=$d[6];
        $prese=$d[7];
        $esta=$d[17];
        $fecha=$d[13];
        $uti1=$d[8];
        $uti2=$d[9];
        $uti3=$d[10];
        $uti4=$d[11];
      }
      if($esta==1){
        $esta="Activo";
      }

      ?>
      <div class="modal-body">
        <table class="table table-hover">
          <tr>
            <td><strong>Campo</strong></td>
            <td><strong>Detalle</strong></td>
          </tr>
          <tr>
            <td>Id</td>
            <td><?php echo $id;?></td>
          </tr>
          <tr>
            <td>descripcion</td>
            <td><?php echo $des;?></td>
          </tr>
          <tr>
            <td>barcode</td>
            <td><?php echo $barco;?></td>
          </tr>
          <tr>
            <td>marca</td>
            <td><?php echo $marca;?></td>
          </tr>
          <tr>
            <td>embalaje</td>
            <td><?php echo $embalaje;?></td>
          </tr>
          <tr>
            <td>precentacion</td>
            <td><?php echo $prese;?></td>
          </tr>
          <tr>
            <td>estado</td>
            <td><?php echo $esta;?></td>
          </tr>
          <tr>
            <td>fecha caducidad</td>
            <td><?php echo $fecha;?></td>
          </tr>
          <tr>
            <td>% utilidad 1</td>
            <td>% utilidad 2</td>
            <td>% utilidad 3</td>
            <td>% utilidad 4</td>
          </tr>
          <tr>
            <td><?php echo $uti1;?></td>
            <td><?php echo $uti2;?></td>
            <td><?php echo $uti3;?></td>
            <td><?php echo $uti4;?></td>
          </tr>
        </table>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
