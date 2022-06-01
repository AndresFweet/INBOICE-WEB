<?php include 'db/conexion.php';
      require 'libs/sede.php';
        //CONSULTA DE LA CANTIDAD TOTAL DEL PRODUCTO
      require 'libs/cantidad.php';

    //ACTUALIZACION DE LA CANTIDAD DEL PRODUCTO
     $producto = $_POST['Product'];
     $fecha = $_POST['Fecha'];
     $precio = $_POST['Valor'];
     $cantidad = $_POST['Cantidad'];
     $sede = $data;
     $hora = time();
     $c_actual = $cant - $cantidad;
     $total = $precio * $cantidad;
     $cliente = $_POST['Cliente'];
     
     if ($cantidad < $cant) {
       $query = "UPDATE producto SET cantidad = '$c_actual' WHERE nombre_producto = '$product' AND sede = '$data'";
       $result = mysqli_query($connection, $query);
     
    //GUARDAR LA VENTA
    
    $consul = "INSERT INTO ventas(producto,cantidad,cliente,fecha,total,cod_venta,sede) VALUES('$producto','$cantidad','$cliente','$fecha','$total','$hora','$sede')";
    $result = mysqli_query($connection, $consul);

    require 'libs/id_venta.php';
    require 'libs/id_producto.php';

    $pv = "INSERT INTO productos_vendidos(id_producto,cantidad,id_venta,sede) VALUES ('$id_p','$cantidad','$id_venta','$sede')";
    $result = mysqli_query($connection, $pv);

    echo 'disponible';  

     }else{
       echo 'insuficiente';       
     }
             
?>