<?php
    include('db/conexion.php');
    require 'libs/sede.php';
        $sql = "SELECT * FROM producto WHERE sede = '$data'";
        $result = mysqli_query($connection, $sql);

        $json = array();
        while ($row = mysqli_fetch_array($result)) {
            $json[] = array(
            'producto' => $row['nombre_producto'],
            'cantidad' => $row['cantidad'],
            'precio' => $row['precio']);            
        }

        $jsonstring = json_encode($json);
        echo $jsonstring;

?>