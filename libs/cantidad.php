<?php

$product = $_POST['Product'];
       $sql = "SELECT * FROM producto WHERE nombre_producto = '$product' AND sede = '$data'";
       $result = mysqli_query($connection, $sql);

       $json = array();
        while ($row = mysqli_fetch_array($result)) {
        $json[] = array(
        'Cantidad' => $row['cantidad']
        );
    }
    $longitud = count($json);
    for ($i=0; $i < $longitud ; $i++) { 
       $cant = current($json[$i]);
       
    }

?>