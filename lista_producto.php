<?php 
    include 'db/conexion.php';
    require 'libs/sede.php';
    //REALIZANDO CONSULTA ALA BASE DE DATOS
    $query = "SELECT * FROM producto WHERE sede = '$data'";
    $result = mysqli_query($connection, $query);
    //COMPROBACION
    if (!$result) {
        die('Error en el proceso' . mysqli_error($connection));
    }
    $json = array();
    while ($row = mysqli_fetch_array($result)) {
        $json[] = array(
        'Id' => $row['id'],  
        'Producto' => $row['nombre_producto'],
        'Cantidad' => $row['cantidad'],
        'precio' => $row['precio']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>