<!DOCTYPE html>
<?php 
include("validador.php");
include("conex.php"); ?>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="StyleSheet" href="Bootstrap/css/bootstrap.min.css" type="text/css"></link>
	<link rel="StyleSheet" href="Bootstrap/css/bootstrap-theme.min.css" type="text/css"></link>
	<link rel="StyleSheet" href="css/style3.css" type="text/css"></link>
</head>
<body>
	<header>

		<center><p class="bg-primary">Control de producto compra y venta</p></center>
	</header>
	<?php include("menu.php");?>
	<center>
	<div class="jumbotron">
  		<h1>Ingrese nuevo producto!</h1>
 
	</div>
	</center>
	
	<section>
		<?php $e=$_GET['e']; if($e==1){?>
        <div class="alert alert-success" role="alert">Registro exitoso!</div>
        <?php }?>
        <?php $e=$_GET['e']; if($e==2){?>
        <div class="alert alert-danger" role="alert">Error al ingresar el producto</div>
        <?php }?>
        <?php $e=$_GET['e']; if($e==3){?>
        <div class="alert alert-info" role="alert">producto ingresado ya existe!</div>
        <?php }?>

		
		<form method="POST" >
  			<div class="panel panel-default">
          <div class="panel-heading">Código de barra</div>
          <div class="panel-body">
            <div class="form-group">
                <input type="text" name="codigo_barra" class="form-control" id="exampleInputEmail1" placeholder="Digite codigo de barra">
             </div>
          </div>
       
        
          <div class="panel-heading">Descripción</div>
          <div class="panel-body">
            <div class="form-group">
                 <textarea rows="2" cols="110" name="descripcion" id="descripcion" placeholder="Descripcion"></textarea> 
             </div>
          </div>

          <div class="panel-heading"></div>
          <div class="panel-body">
            <div id="precio1">
            <div class="form-group">
              <label for="exampleInputPassword1">Unidad </label>
                <input type="text" name="unidad" class="form-control" id="exampleInputEmail1" placeholder="Unidad">
             </div>
           </div>
           <div id="precio2">
            <div class="form-group">
              <label for="exampleInputPassword1">Marca</label>
                <input type="text" name="marca" class="form-control" id="exampleInputEmail1" placeholder="Marca">
             </div>
           </div>

           <div id="precio3">
            <div class="form-group">
              <label for="exampleInputPassword1">Color</label>
                <input type="text" name="color" class="form-control" id="exampleInputEmail1" placeholder="Color">
             </div>
           </div>

           <div id="precio4">
            <div class="form-group">
              <label for="exampleInputPassword1">Embalaje</label>
                <input type="text" name="embalaje" class="form-control" id="embalaje" placeholder="Embalaje">
             </div>

           </div>
          </div>
       
       
          <div class="panel-heading">Precentación</div>
          <div class="panel-body">
            <div class="form-group">
                 <textarea rows="2" cols="110" name="presentacion" id="presentacion" placeholder="Presentacion"></textarea> 
             </div>
          </div>

           <div class="panel-heading">Precio</div>
          <div class="panel-body">
            <div id="precio1">
            <div class="form-group">
              <label for="exampleInputPassword1">Utilidad precio 1 </label>
                <input type="text" name="precio1" class="form-control" id="exampleInputEmail1" placeholder="Utilidad precio 1">
             </div>
           </div>
           <div id="precio2">
            <div class="form-group">
              <label for="exampleInputPassword1">Utilidad precio 2 </label>
                <input type="text" name="precio2" class="form-control" id="exampleInputEmail1" placeholder="Utilidad precio 2">
             </div>
           </div>

           <div id="precio3">
            <div class="form-group">
              <label for="exampleInputPassword1">Utilidad precio 3 </label>
                <input type="text" name="precio3" class="form-control" id="exampleInputEmail1" placeholder="Utilidad precio 3">
             </div>
           </div>

           <div id="precio4">
            <div class="form-group">
              <label for="exampleInputPassword1">Utilidad precio 4 </label>
                <input type="text" name="precio4" class="form-control" id="exampleInputEmail1" placeholder="Utilidad precio 4">
             </div>

           </div>
          </div>
          <div class="panel-heading">Mas opciones</div>
          
          <div class="panel-body">
            <div id="uti1">
            <div class="form-group">
              <label for="exampleInputPassword1">Utilidad por defecto </label>
               <select class="form-control" name="defecto">
            <option value="" >Seleccione</option>
            <option value="Defecto 1">Defecto 1</option>
            <option value="Defecto 1">Defecto 2</option>
          </select>
             </div>
           </div>
           <div id="uti2">
            <div class="form-group">
              <label for="exampleInputPassword1">Fecha Expiracion  </label>
                <input type="text" name="fecha" class="form-control" id="exampleInputEmail1" placeholder="Fecha de caducidad">
             </div>
           </div>

           <div id="uti3">
            <div class="form-group">
              <label for="exampleInputPassword1">Existencias minimas </label>
                <input type="text" name="existencias_min" class="form-control" id="exampleInputEmail1" placeholder="Existencias minimas">
             </div>
           </div>
        </div>
         <div class="panel-body">
            <div id="util1">
            <div class="form-group">
              <label for="exampleInputPassword1">Seleccione Categoria </label>
               <select class="form-control" name="categoria">
                  <option value="">Seleccione</option>
                  <option value="Niños">Niños</option>
                  <option value="Adolecentes">Adolecentes</option>
                  <option value="Formal">Formal</option>
                </select>
             </div>
           </div>
           <div id="util2">
            <div class="form-group">
              <label for="exampleInputPassword1">Proveedor</label>
                <select class="form-control" name="proveedor">
                  <option>Seleccione</option>
                  <?php 
                  $sql_provee="SELECT * FROM proveedores ";
                  $res = mysql_query($sql_provee);
                  while($row= mysql_fetch_array($res)){
                    $id=$row[0];
                    $nom=$row[1];
                  ?>
                  <option value="<?php echo $id ?>"><?php echo $nom ?></option>
                  <?php }?>
                </select>
             </div>
           </div>

           <div id="util3">
            <div class="form-group">
              <label for="exampleInputPassword1">Activo</label>
              <br>
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox1" value="option1" name="option1"> 
                </label>
             </div>
           </div>
           <div id="util4">
            <div class="form-group">
              <label for="exampleInputPassword1">Activar utilidad</label>
              <br>
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox2" value="option2" name="option2"> 
                </label>
             </div>
           </div>
           
        </div>
        </div>
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
	$codigoba=$_POST['codigo_barra'];
  $des=$_POST['descripcion'];
  $unidad=$_POST['unidad'];
  $color=$_POST['color'];
  $marca=$_POST['marca'];
  $embalaj=$_POST['embalaje'];
  $presentacion=$_POST['presentacion'];
  $precio1=$_POST['precio1'];
  $precio2=$_POST['precio2'];
  $precio3=$_POST['precio3'];
  $precio4=$_POST['precio4'];
  $defecto=$_POST['defecto'];
  $fecha=$_POST['fecha'];
  $existencias_min=$_POST['existencias_min'];
  $categoria=$_POST['categoria'];
  $proveedor=$_POST['proveedor'];
  $activo=0;
  if (isset($_POST['option1']))
  {
    $activo=1;
  }
	$insertar=mysql_query("INSERT INTO productos (codigo_barra,descripcion,unidad,marca,color,embalaje,precentacion,precio1,precio2,precio3,precio4,defecto,fecha_expi,existencias_min,categoria,id_proveedor,activo) 
    values('$codigoba','$des','$unidad','$marca','$color','$embalaj','$presentacion','$precio1','$precio2','$precio3','$precio4','$defecto','$fecha','$existencias_min','$categoria','$proveedor','$activo')");
    if($insertar)
    {
      echo "<script>
     location.replace('ingreso_productos.php?e=1');
          </script>";     
     
    }
    else
    {
    echo "<script>
     location.replace('ingreso_productos.php?e=2');
          </script>";    

  
      echo mysql_error($insertar); 
     
    }
}


?>