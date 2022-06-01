<?php
    include 'db/conexion.php';
    $id = $_POST['id'];
    $query = "SELECT * FROM producto WHERE id = $id ";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die('Error en los datos');
    }
    $json = array();
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
          'id' => $row['id'],  
          'nombre' => $row['nombre_producto'],
          'cantidad' => $row['cantidad'],
          'precio' => $row['precio']
        );
    }

    $jsonstring = json_encode($json);
    echo $jsonstring;
?>