<?php 
    include('db/conexion.php');
    //CONSULTA AL TIPO DE USUARIO
    $host= $_SERVER["HTTP_HOST"];
    $url= $_SERVER["REQUEST_URI"];

    //echo $url;
    if ($url != "/Facturacion-electronica/index.php"){
     session_start();
    }

    $id =  $_SESSION['user_id'];
   //consulta
   $sql = "SELECT * FROM usuarios WHERE id = '$id'";
   $result = mysqli_query($connection, $sql);
  
   if(!$result) {
    die('Query Error' . mysqli_error($connection));
  }
  
  $json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
      'cargo' => $row['cargo']
    );
  }

  $longitud = count($json);
  for ($i=0; $i < $longitud ; $i++) { 
       $data = current($json[$i]);
       $jsonstring = json_encode($data);
       $data;
  }

    
?>