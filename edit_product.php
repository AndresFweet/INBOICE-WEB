<?php
  include('db/conexion.php');

  if (isset($_POST['id'])) {
      $producto = $_POST['producto'];
      $cantidad = $_POST['cantidad'];
      $precio = $_POST['precio'];
      $id = $_POST['id'];
      $query = "UPDATE producto SET nombre_producto = '$producto', cantidad = '$cantidad', precio = '$precio' WHERE id = '$id'";

      $result = mysqli_query($connection, $query);

      if (!$result) {
        die('ERROR');
        }
      echo "Dato Actualizado";  
        }  
?>