<?php
class Productos
{
    public function  __construct() {
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '1234';
        $dbname = 'ads';

        mysql_connect($dbhost, $dbuser, $dbpass);

        mysql_select_db($dbname);   
    }

    public function buscarProductos($buscarProductos){
        $datos = array();

        $sql = "SELECT *from productos WHERE codigobarra LIKE '%$buscarProductos%' or descripcion LIKE '%$buscarProductos%'";
                
               
        

        $resultado = mysql_query($sql);

        while ($row = mysql_fetch_array($resultado, MYSQL_ASSOC)){// aqui ocupamos dos array 
            $datos[] = array("value" => $row['descripcion'],
                            "id_producto"=> $row['id_producto'],
                            "descripcion"=> $row['descripcion'],
                            "codigobarra"=> $row['codigobarra'],
                            "precio1"=> $row['precio1'],
                            "precio2"=> $row['precio2'],
                            "precio3"=> $row['precio3'],
                            "precio4"=> $row['precio4']
			     
                 );
        }

        return $datos;
    }
}