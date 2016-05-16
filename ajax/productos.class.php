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

        $sql = "SELECT *from productos WHERE  descripcion LIKE '%$buscarProductos%' or codigobarra LIKE '%$buscarProductos%' ";
                
               
        

        $resultado = mysql_query($sql);

        while ($row = mysql_fetch_array($resultado, MYSQL_ASSOC)){
            $datos[] = array("value" => $row['descripcion'],
                 "codigobarra" => $row['codigobarra']
                
                 );
        }

        return $datos;
    }
}