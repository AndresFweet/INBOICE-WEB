<?php

//OBTENER ID DEL PRODUCTO

    $sql = "SELECT id FROM producto WHERE sede = '$data' AND nombre_producto = '$producto'";
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
       $id_producto = json_encode($cant);
       $id_p = str_replace('"', '', $id_producto);
       echo $id_p;
    }

?>