<?php
    include('db/conexion.php');
    require('libs/sede.php');

    $producto = $_POST['product'];

    $sql = "SELECT * FROM producto WHERE nombre_producto = '$producto'";
    $result = mysqli_query($connection,$sql);

    //COMPROBACION
    if (!$result) {
        die('Error en el proceso' . mysqli_error($connection));
    }

    $json = array();
    while ($row = mysqli_fetch_array($result)) {
        $json[] = array(
        'precio' => $row['precio']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
    
?>