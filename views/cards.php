<?php 

$queri = "SELECT *,
        SUM(A.cantidad) AS cantidad
            ,B.nombre_producto
            ,B.precio
            FROM productos_vendidos AS A
            INNER JOIN producto AS B ON  A.id_producto = B.id 
            WHERE nombre_producto = '$product' AND A.sede = '$data'";
            $result = mysqli_query($connection, $queri);
            
            while($row = mysqli_fetch_array($result)){
                $cant = $row['cantidad'];
                $valor = $row['precio'];
            }  
            
           $total = $valor * $cant;

?>

<div class="container mt-2">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="icon-graph success font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-center">
                                <h2 class="text-primary"><?php echo $product ?></h2>
                                <span> Cantidad: <?php echo $cant ?></span>
                                <span>----</span>
                                <span> Total: <?php echo $total ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-3">

</div>
</div>
</div>