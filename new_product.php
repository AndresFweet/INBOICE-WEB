<?php
    //include 'db/database.php';
    include 'db/conexion.php';
    require 'libs/sede.php';

    $producto = $_POST['producto'];
    
    $query = "SELECT * FROM producto WHERE nombre_producto = '$producto' AND sede = '$data'";
    $result = mysqli_query($connection, $query);

        $json = array();
    while ($row = mysqli_fetch_array($result)) {
        $json[] = array(
        'producto' => $row['nombre_producto']
        );
    }
    $jsonstring = json_encode($json);
    //echo $jsonstring;
    if ($jsonstring == '[]') {
        if(isset($_POST['producto']) && isset($_POST['cantidad']) && isset($_POST['precio'])){
        $n_producto = $_POST['producto'];
        $cantidad = $_POST['cantidad']; 
        $precio = $_POST['precio']; 
        $producto = strtoupper($n_producto);
        //INSERTANDO LOS DATOS OBTENIDOS
        
        $query = "INSERT INTO producto(nombre_producto,cantidad,precio,sede) VALUES('$producto','$cantidad','$precio','$data')";
        $result = mysqli_query($connection, $query);
        //COMPROBANDO SI TENEMOS UN RESULTADO
        if (!$result) {
            die('Ha ocurrido un problema');
        }else{
            echo 'Nuevo producto Añadido';
        }
        
    } 
    }else{
        echo 'existe';   
    }
  
 

  
        
    

?>