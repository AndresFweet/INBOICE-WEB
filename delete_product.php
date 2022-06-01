<?php

include('db/conexion.php');

if(isset($_POST['id'])){

$id = $_POST['id'];
//ELIMINAR CONSULTA
$sql = "DELETE FROM producto WHERE id = $id";
$result = mysqli_query($connection, $sql);
//COMPROBACION
if (!$result) {
    die('Error al eliminar');
}else{
    echo 'Producto eliminado correctamente';
}

}
?>