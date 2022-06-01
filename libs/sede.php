<?php

//OBTENIENDO LA SEDE DEL USUARIO
    session_start();
    $id =  $_SESSION['user_id'];
    $sql = "SELECT * FROM usuarios WHERE id = '$id'";
    $result = mysqli_query($connection, $sql);
    $json = array();
        while ($row = mysqli_fetch_array($result)) {
            $json[] = array(
            'sede' => $row['sede']);            
        }

       $longitud = count($json);
       for ($i=0; $i < $longitud ; $i++) { 
       $data = current($json[$i]);
       $jsonstring = json_encode($data);
        $data;
  }

?>