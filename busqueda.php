<?php

include('db/conexion.php');

$search = $_POST['search'];
if(!empty($search)) {
  $query = "SELECT * FROM producto WHERE nombre_producto LIKE '$search%'";
  $result = mysqli_query($connection, $query); 
  
  if(!$result) {
    die('Query Error' . mysqli_error($connection));
  }
  
  $json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
      'nombre' => $row['nombre_producto'],
      'cantidad' => $row['cantidad'],
      'precio' => $row['precio']
    );
  }
  //$jsonstring = json_encode($json);
  echo $jsonstring = json_encode($json);
}

?>