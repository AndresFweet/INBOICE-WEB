<?php require 'db/conexion.php'; 

    $sql = "SELECT DISTINCT(id_producto) FROM productos_vendidos";
    $result = mysqli_query($connection, $sql);

    $json = array();
    while ($row = mysqli_fetch_array($result)) {
        $json[] = array(
        $id = $row['id_producto']
        );
    }
    
    $query = "SELECT nombre_producto FROM producto WHERE id = '$id'";
    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($result)) {
        $json[] = array(
        'producto' => $row['nombre_producto']
        );
    }
    
    $jsonstring = json_encode($json);
    echo $jsonstring;
    
?>