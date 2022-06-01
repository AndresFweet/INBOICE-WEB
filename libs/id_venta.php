<?php

//OBTENER ID DE LA VENTA 
    $sql = "SELECT id FROM ventas WHERE sede = '$data' AND cod_venta = '$hora'";
    $result = mysqli_query($connection, $sql);

    $json = array();
        while ($row = mysqli_fetch_array($result)) {
        $json[] = array(
        'id' => $row['id']
        );
    }
    $longitud = count($json);
    for ($i=0; $i < $longitud ; $i++) { 
       $cant = current($json[$i]);
       $id_venta = json_encode($cant);
    }

?>